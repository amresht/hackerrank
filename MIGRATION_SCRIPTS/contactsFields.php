<?php
require_once (__DIR__.'/crest.php');
require_once (__DIR__.'/DBConnection.php');
require_once (__DIR__.'/helperFunction.php');

migrateAccountCstmColumns();
/**
 * Account Custom table's field Migration from SugarCRM to Bitrix24
 */
function migrateAccountCstmColumns() {

	$getaccountCstmCol = mysqli_query(getSugarCRMDBConnection(), "SELECT `COLUMN_NAME`,`DATA_TYPE` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='accounts_cstm' and COLUMN_NAME IN ()");
	
	foreach ($getaccountCstmCol as $accountCstmCol) {
		$transformedaccountCstmCol= transformData($accountCstmCol);
		$fieldsArr = array(
			"FIELD_NAME" => $transformedaccountCstmCol['COLUMN_NAME'],
			"EDIT_FORM_LABEL" => ucfirst(rtrim(str_replace('_', ' ', $transformedaccountCstmCol['COLUMN_NAME']),'_c')),
			"LIST_COLUMN_LABEL" => ucfirst(rtrim(str_replace('_', ' ', $transformedaccountCstmCol['COLUMN_NAME']),'_c')),
			"USER_TYPE_ID" => $transformedaccountCstmCol['BITRIX_DATA_TYPE'] 
		);
		if(array_key_exists('BITRIX_DATA_LIST',$transformedaccountCstmCol)){
			array_push($fieldsArr, $transformedaccountCstmCol['BITRIX_DATA_LIST']);
		}

		$createaccount = CRest::call('crm.lead.userfield.add', [
			'fields' => $fieldsArr
		]);

		echo '<pre>';
		print_r($createaccount);
		echo "COLUMN_NAME = >".$transformedaccountCstmCol['COLUMN_NAME'];
		echo '</pre><hr>';
	}
	exit('THE END!');
}

// migrateAccountColumns();
/**
 * Account table's field Migration from SugarCRM to Bitrix24
 */
function migrateAccountColumns() {
	
	$getaccountCstmCol = mysqli_query(getSugarCRMDBConnection(), "SELECT `COLUMN_NAME`,`DATA_TYPE` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='accounts' and COLUMN_NAME IN ()");
	foreach ($getaccountCstmCol as $accountCstmCol) {
		$transformedaccountCstmCol= transformData($accountCstmCol);
		$fieldsArr = array(
			"FIELD_NAME" => $transformedaccountCstmCol['COLUMN_NAME'],
			"EDIT_FORM_LABEL" => ucfirst(rtrim(str_replace('_', ' ', $transformedaccountCstmCol['COLUMN_NAME']),'_c')),
			"LIST_COLUMN_LABEL" => ucfirst(rtrim(str_replace('_', ' ', $transformedaccountCstmCol['COLUMN_NAME']),'_c')),
			"USER_TYPE_ID" => $transformedaccountCstmCol['BITRIX_DATA_TYPE'] 
		);
		if(array_key_exists('BITRIX_DATA_LIST',$transformedaccountCstmCol)){
			array_push($fieldsArr, $transformedaccountCstmCol['BITRIX_DATA_LIST']);
		}

		$createaccount = CRest::call('crm.lead.userfield.add', [
			'fields' => $fieldsArr
		]);

		echo '<pre>';
		print_r($createaccount);
		echo "COLUMN_NAME = >".$transformedaccountCstmCol['COLUMN_NAME'];
		echo '</pre><hr>';
	}
	exit('THE END!');
}
