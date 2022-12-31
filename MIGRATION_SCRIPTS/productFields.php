<?php
require_once (__DIR__.'/crest.php');
require_once (__DIR__.'/DBConnection.php');
require_once (__DIR__.'/helperFunction.php');



// migrateProductCstmColumns();
/**
 * Product Custom table's field Migration from SugarCRM to Bitrix24
 */
function migrateProductCstmColumns() {

	$getProductCstmCol = mysqli_query(getSugarCRMDBConnection(), "SELECT `COLUMN_NAME`,`DATA_TYPE` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='aos_products_cstm' and COLUMN_NAME IN ('qb_item_code1_c','qb_item_code2_c','recurring_unit_c','recurring_value_c','setup_price_c','status_c')");
	
	foreach ($getProductCstmCol as $leadCstmCol) {
		$transformedProductCstmCol= transformDataProduct($leadCstmCol);
		$fieldsArr = array(
			"NAME" => ucfirst(rtrim(str_replace('_', ' ', $transformedProductCstmCol['COLUMN_NAME']),'_c')),
			"PROPERTY_TYPE" => $transformedProductCstmCol['PROPERTY_TYPE'],
			"USER_TYPE" => $transformedProductCstmCol['USER_TYPE']
		);
		if(array_key_exists('BITRIX_DATA_LIST',$transformedProductCstmCol)){
			array_push($fieldsArr, $transformedProductCstmCol['BITRIX_DATA_LIST']);
		}

		$createProduct = CRest::call('crm.product.property.add', [
			'fields' => $fieldsArr
		]);

		echo '<pre>';
		print_r($createProduct);
		echo "COLUMN_NAME = >".$transformedProductCstmCol['COLUMN_NAME'];
		echo '</pre><hr>';
	}
	exit('THE END!');
}

// migrateProductColumns();
/**
 * Product table's field Migration from SugarCRM to Bitrix24
 */
function migrateProductColumns() {
	
	$getProductCstmCol = mysqli_query(getSugarCRMDBConnection(), "SELECT `COLUMN_NAME`,`DATA_TYPE` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='aos_products' and COLUMN_NAME IN (
		'aos_product_category_id','assigned_user_id','category','contact_id','date_modified','part_number','type','url','deleted')");
	foreach ($getProductCstmCol as $leadCstmCol) {
		$transformedProductCstmCol= transformDataProduct($leadCstmCol);
		$fieldsArr = array(
			"NAME" => ucfirst(rtrim(str_replace('_', ' ', $transformedProductCstmCol['COLUMN_NAME']),'_c')),
			"PROPERTY_TYPE" => $transformedProductCstmCol['PROPERTY_TYPE'],
			"USER_TYPE" => $transformedProductCstmCol['USER_TYPE']
		);
		if(array_key_exists('BITRIX_DATA_LIST',$transformedProductCstmCol)){
			array_push($fieldsArr, $transformedProductCstmCol['BITRIX_DATA_LIST']);
		}

		$createProduct = CRest::call('crm.product.property.add', [
			'fields' => $fieldsArr
		]);

		echo '<pre>';
		print_r($createProduct);
		echo "COLUMN_NAME = >".$transformedProductCstmCol['COLUMN_NAME'];
		echo '</pre><hr>';
	}
	exit('THE END!');
}

// migrateProductToImportColumns();
/**
 * lead_to_import table's field Migration from SugarCRM to Bitrix24
 */
function migrateProductToImportColumns() {
	
	$getProductCstmCol = mysqli_query(getSugarCRMDBConnection(), "SELECT `COLUMN_NAME`,`DATA_TYPE` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='leads_to_import' and COLUMN_NAME IN ('client_name','first_name','last_name','date_added','phone','email','assigned_to','user_name','user_id','lang','lead_source','lead_status','lead_status_real','lead_id')");
	foreach ($getProductCstmCol as $leadCstmCol) {
		$transformedProductCstmCol= transformDataProduct($leadCstmCol);
		$fieldsArr = array(
			"FIELD_NAME" => $transformedProductCstmCol['COLUMN_NAME'].'_LTI',
			"EDIT_FORM_LABEL" => ucfirst(rtrim(str_replace('_', ' ', $transformedProductCstmCol['COLUMN_NAME']),'_c')),
			"LIST_COLUMN_LABEL" => ucfirst(rtrim(str_replace('_', ' ', $transformedProductCstmCol['COLUMN_NAME']),'_c')),
			"USER_TYPE_ID" => $transformedProductCstmCol['BITRIX_DATA_TYPE'] 
		);
		if(array_key_exists('BITRIX_DATA_LIST',$transformedProductCstmCol)){
			array_push($fieldsArr, $transformedProductCstmCol['BITRIX_DATA_LIST']);
		}

		$createProduct = CRest::call('crm.product.property.add', [
			'fields' => $fieldsArr
		]);

		echo '<pre>';
		print_r($createProduct);
		echo "COLUMN_NAME = >".$transformedProductCstmCol['COLUMN_NAME'];
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
			//"ID" => 'service_type12' ,
			"NAME" => 'service type',
			"PROPERTY_TYPE" => 'Number',
			"USER_TYPE" => 'Number'
		);
		$createProduct = CRest::call('crm.product.property.add', [ 'fields' => $fieldsArr ]);
		print_r($createProduct);
		exit('THE END!');
}