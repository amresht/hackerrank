<?php
require_once (__DIR__.'/crest.php');
require_once (__DIR__.'/DBConnection.php');
require_once (__DIR__.'/helperFunction.php');

migrateProductData();
/**
 * Product Migration from SugarCRM to Bitrix24
 */
function migrateProductData() {

	/**
	 * Constant for modules
	 */
	$moduleName ='Product';
	$crmUniqueFieldName = 'ID';


	/**
	 * Queries needs to be changed on each module
	 */
	$getProducts = mysqli_query(getSugarCRMDBConnection(), "SELECT * FROM `aos_products` LEFT JOIN `aos_products_cstm` ON aos_products.id=aos_products_cstm.id_c");

	foreach ($getProducts as $Product) {
		// print("<pre>".print_r($Product,true)."</pre>"); exit();

		$fieldsArr['ID'] 			= $Product['id'];
		$fieldsArr['NAME'] 			= $Product['name'];
		$fieldsArr['DATE_CREATE'] 	= $Product['date_entered'];
		$fieldsArr['TIMESTAMP_X'] 	= $Product['date_modified'];
		$fieldsArr['MODIFIED_BY'] 	= getBitrixId($Product['modified_user_id'],'User');
		$fieldsArr['CREATED_BY'] 	= getBitrixId($Product['created_by'],'User');
		$fieldsArr['DESCRIPTION'] 	= $Product['description'];
		$fieldsArr['PROPERTY_374'] 	= ($Product['deleted'] == 1) ? 978 : 979;
		$fieldsArr['PROPERTY_375'] 	= getBitrixId($Product['assigned_user_id'],'User');
		$fieldsArr['PROPERTY_376'] 	= $Product['part_number'];
		$fieldsArr['PROPERTY_377'] 	= $Product['category'];
		$fieldsArr['PROPERTY_378'] 	= $Product['type'];
		$fieldsArr['PRICE'] 		= $Product['price'];
		$fieldsArr['CURRENCY_ID'] 	= $Product['currency_id'];
		$fieldsArr['PROPERTY_379'] 	= $Product['url'];
		$fieldsArr['PROPERTY_380'] 	= getBitrixId($Product['contact_id'],'Contact');
		$fieldsArr['PROPERTY_381'] 	= $Product['aos_product_category_id'];
		$fieldsArr['PROPERTY_382'] 	= (empty($Product['setup_price_c']) || (float)$Product['setup_price_c'] == 0) ? 0.00 : $Product['setup_price_c'];
		$fieldsArr['PROPERTY_383'] 	= $Product['recurring_value_c'];
		$fieldsArr['PROPERTY_384'] 	= $Product['recurring_unit_c'];
		$fieldsArr['PROPERTY_385'] 	= $Product['status_c'];
		$fieldsArr['PROPERTY_386'] 	= $Product['qb_item_code1_c'];
		$fieldsArr['PROPERTY_387'] 	= $Product['none'];
		$fieldsArr['ACTIVE'] 		= ($Product['status_c']=='Active') ? 'Y' : 'N';

		// print("<pre>".print_r($fieldsArr,true)."</pre>"); exit();

		// $apiLog = CRest::call('crm.product.add', [ 'fields' => $fieldsArr ]);
		// apiLog($apiLog,$fieldsArr,$moduleName,$crmUniqueFieldName);
	}
	exit('THE END!'."\n");
}
