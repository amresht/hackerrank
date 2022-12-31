<?php
require_once (__DIR__.'/DBConnection.php');
CONST env = 'Dev';
/**
 * Get Britrix24 User id from Sugar CRM User ID
 */
function apiLog($apiLog, $crmFields, $moduleName, $crmUniqueFieldName = 'id') {

	if(array_key_exists('error',$apiLog)) {
		$query = mysqli_query(getLocalDBConnection(), "INSERT INTO api_log_".$moduleName."_".env." (`error_description`,`crm_id`, `error`) VALUES ('".$apiLog['error_description']."', '".$crmFields[$crmUniqueFieldName]."', 1)");
		echo $apiLog['error_description']." => "."Error for $crmFields[$crmUniqueFieldName]\n";
	}
	else {
		mysqli_query(getLocalDBConnection(), "INSERT INTO api_log_".$moduleName."_".env." (`bitrix_id`, `crm_id`, `error`, `environment`) VALUES (".$apiLog['result'].", '".$crmFields[$crmUniqueFieldName]."', 0)");
        echo $apiLog['result']." =>".$crmFields[$crmUniqueFieldName]."\n";
	}
}




/**
 *  ---------- Field Helpers ----------
 * Datatype Conversion Function Migration from SugarCRM to Bitrix24
 */
function transformData($tableColumnData){

	switch($tableColumnData['DATA_TYPE']){

		case 'varchar': $tableColumnData['BITRIX_DATA_TYPE'] = 'string';
						break;

		case 'char':    $tableColumnData['BITRIX_DATA_TYPE'] = 'string';
						break;

		case 'text':    $tableColumnData['BITRIX_DATA_TYPE'] = 'string';
						break;

		case 'date':    $tableColumnData['BITRIX_DATA_TYPE'] = 'date';
						break;

		case 'datetime': $tableColumnData['BITRIX_DATA_TYPE'] = 'datetime';
						break;

		case 'tinyint': $tableColumnData['BITRIX_DATA_TYPE'] = 'enumeration';
						$tableColumnData['BITRIX_DATA_LIST'] = json_encode(array(array("VALUE"=>"0"),array("VALUE"=>"1")));
						break;

		case 'decimal': $tableColumnData['BITRIX_DATA_TYPE'] = 'string';
						break;

		case 'int':     $tableColumnData['BITRIX_DATA_TYPE'] = 'integer';
						break;

		default :       $tableColumnData['BITRIX_DATA_TYPE'] = 'string';
						break;
	}
	return $tableColumnData;
}



/**
 * Datatype Conversion Function Migration from SugarCRM to Bitrix24 ONLY for Product as it works on the basis of the Property Type
 */
function transformDataProduct($tableColumnData){

	switch($tableColumnData['DATA_TYPE']){

		case 'varchar': $tableColumnData['PROPERTY_TYPE'] = 'S';
						$tableColumnData['USER_TYPE'] = '';
						break;

		case 'char':    $tableColumnData['PROPERTY_TYPE'] = 'S';
						$tableColumnData['USER_TYPE'] = '';
						break;

		case 'text':    $tableColumnData['PROPERTY_TYPE'] = 'S';
						$tableColumnData['USER_TYPE'] = '';
						break;

		case 'date':    $tableColumnData['PROPERTY_TYPE'] = 'S';
						$tableColumnData['USER_TYPE'] = 'Date';
						break;

		case 'datetime': $tableColumnData['PROPERTY_TYPE'] = 'S';
						$tableColumnData['USER_TYPE'] = 'DateTime';
						break;

		case 'tinyint': $tableColumnData['PROPERTY_TYPE'] = 'L';
						$tableColumnData['BITRIX_DATA_LIST'] = [
							"LIST_TYPE" => "L",
							"MULTIPLE" => "N",
							"ROW_COUNT" => 2,
							"VALUES" => [
								"Y" => [
					                "ID"=> "Y",
					                "VALUE" => "Yes",
					                "SORT" => 100,
					                "DEF" => "N"
					            ],
					            "N" => [
					                "ID" => "N",
					                "VALUE" => "No",
					                "SORT" => 200,
					                "DEF" => "N"
					            ],
							],
						];
						break;

		case 'decimal': $tableColumnData['PROPERTY_TYPE'] = 'S';
						$tableColumnData['USER_TYPE'] = 'Money';
						break;

		case 'int':     $tableColumnData['PROPERTY_TYPE'] = 'N';
						$tableColumnData['USER_TYPE'] = '';
						break;

		default :       $tableColumnData['PROPERTY_TYPE'] = 'S';
						$tableColumnData['USER_TYPE'] = '';
						break;
	}
	return $tableColumnData;
}
?>