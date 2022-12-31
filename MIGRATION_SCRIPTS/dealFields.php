<?php
require_once (__DIR__.'/crest.php');

function getSugarCRMDBConnection() {
	
	$ini =  include('app_config.php');

	$crmhost        = $ini['crmhost'];
	$crmusername    = $ini['crmusername'];
	$crmpassword    = $ini['crmpassword'];
	$crmdbname      = $ini['crmdbname'];
	$conn           = mysqli_connect( $crmhost , $crmusername ,$crmpassword, $crmdbname ) or die("Couldn't connect crm");
	return $conn;
}

/**
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

// migrateDealCstmColumns();
/**
 * Deal Custom table's field Migration from SugarCRM to Bitrix24
 */
function migrateDealCstmColumns() {

	$getDealCstmCol = mysqli_query(getSugarCRMDBConnection(), "SELECT `COLUMN_NAME`,`DATA_TYPE` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='aos_quotes_cstm' and COLUMN_NAME NOT IN ('id_c')");
	
	foreach ($getDealCstmCol as $leadCstmCol) {
		$transformedDealCstmCol= transformData($leadCstmCol);
		$fieldsArr = array(
			"FIELD_NAME" => $transformedDealCstmCol['COLUMN_NAME'],
			"EDIT_FORM_LABEL" => ucfirst(rtrim(str_replace('_', ' ', $transformedDealCstmCol['COLUMN_NAME']),'_c')),
			"LIST_COLUMN_LABEL" => ucfirst(rtrim(str_replace('_', ' ', $transformedDealCstmCol['COLUMN_NAME']),'_c')),
			"USER_TYPE_ID" => $transformedDealCstmCol['BITRIX_DATA_TYPE'] 
		);
		if(array_key_exists('BITRIX_DATA_LIST',$transformedDealCstmCol)){
			array_push($fieldsArr, $transformedDealCstmCol['BITRIX_DATA_LIST']);
		}

		$createDeal = CRest::call('crm.deal.userfield.add', [
			'fields' => $fieldsArr
		]);

		echo '<pre>';
		print_r($createDeal);
		echo "COLUMN_NAME = >".$transformedDealCstmCol['COLUMN_NAME'];
		echo '</pre><hr>';
	}
	exit('THE END!');
}

// migrateDealColumns();
/**
 * Deal table's field Migration from SugarCRM to Bitrix24
 */
function migrateDealColumns() {
	
	$getDealCstmCol = mysqli_query(getSugarCRMDBConnection(), "SELECT `COLUMN_NAME`,`DATA_TYPE` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='aos_quotes' and COLUMN_NAME NOT IN ('created_by','currency_id','date_entered','date_modified','description','id','modified_user_id','assigned_user_id',name','tax_amount')");
	foreach ($getDealCstmCol as $leadCstmCol) {
		$transformedDealCstmCol= transformData($leadCstmCol);
		$fieldsArr = array(
			"FIELD_NAME" => $transformedDealCstmCol['COLUMN_NAME'],
			"EDIT_FORM_LABEL" => ucfirst(rtrim(str_replace('_', ' ', $transformedDealCstmCol['COLUMN_NAME']),'_c')),
			"LIST_COLUMN_LABEL" => ucfirst(rtrim(str_replace('_', ' ', $transformedDealCstmCol['COLUMN_NAME']),'_c')),
			"USER_TYPE_ID" => $transformedDealCstmCol['BITRIX_DATA_TYPE'] 
		);
		if(array_key_exists('BITRIX_DATA_LIST',$transformedDealCstmCol)){
			array_push($fieldsArr, $transformedDealCstmCol['BITRIX_DATA_LIST']);
		}

		$createDeal = CRest::call('crm.deal.userfield.add', [
			'fields' => $fieldsArr
		]);

		echo '<pre>';
		print_r($createDeal);
		echo "COLUMN_NAME =>".$transformedDealCstmCol['COLUMN_NAME'];
		echo '</pre><hr>';
	}
	exit('THE END!');
}

// migrateDealToImportColumns();
/**
 * lead_to_import table's field Migration from SugarCRM to Bitrix24
 */
function migrateDealToImportColumns() {
	
	$getDealCstmCol = mysqli_query(getSugarCRMDBConnection(), "SELECT `COLUMN_NAME`,`DATA_TYPE` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='leads_to_import' and COLUMN_NAME IN ('client_name','first_name','last_name','date_added','phone','email','assigned_to','user_name','user_id','lang','lead_source','lead_status','lead_status_real','lead_id')");
	foreach ($getDealCstmCol as $leadCstmCol) {
		$transformedDealCstmCol= transformData($leadCstmCol);
		$fieldsArr = array(
			"FIELD_NAME" => $transformedDealCstmCol['COLUMN_NAME'].'_LTI',
			"EDIT_FORM_LABEL" => ucfirst(rtrim(str_replace('_', ' ', $transformedDealCstmCol['COLUMN_NAME']),'_c')),
			"LIST_COLUMN_LABEL" => ucfirst(rtrim(str_replace('_', ' ', $transformedDealCstmCol['COLUMN_NAME']),'_c')),
			"USER_TYPE_ID" => $transformedDealCstmCol['BITRIX_DATA_TYPE'] 
		);
		if(array_key_exists('BITRIX_DATA_LIST',$transformedDealCstmCol)){
			array_push($fieldsArr, $transformedDealCstmCol['BITRIX_DATA_LIST']);
		}

		$createDeal = CRest::call('crm.deal.userfield.add', [
			'fields' => $fieldsArr
		]);

		echo '<pre>';
		print_r($createDeal);
		echo "COLUMN_NAME = >".$transformedDealCstmCol['COLUMN_NAME'];
		echo '</pre><hr>';
	}
	exit('THE END!');
}

// migrateSingleColumns();
/**
 * Single Field Migration from SugarCRM to Bitrix24
 */
function migrateSingleColumns() {

		$fieldsArr = array(
			"FIELD_NAME" => 'leads_sms_text_messages',
			"EDIT_FORM_LABEL" => 'Deals SMS Text Messages',
			"LIST_COLUMN_LABEL" => 'Deals SMS Text Messages',
			"USER_TYPE_ID" => 'crm_multifield'
		);
		$createDeal = CRest::call('crm.deal.userfield.add', [ 'fields' => $fieldsArr ]);
		print_r($createDeal);
		exit('THE END!');
}