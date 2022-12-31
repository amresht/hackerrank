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
	 * Fields needs to be changed on each module
	 */
 	$ProductsCSTMColumns= array('qb_item_code1_c','qb_item_code2_c','recurring_unit_c','recurring_value_c','setup_price_c','status_c');

	$ProductsColumns= array('cost','created_by','currency_id','date_entered','date_modified','deleted','description','id','maincode','modified_user_id','name','price','product_image');

	$BitrixColumnName = array('DATE_CREATE' => 'date_entered','DATE_MODIFY' => 'date_modified',  'CREATED_BY_ID' => 'created_by', 'ASSIGNED_BY_ID' => 'assigned_user_id', 'NAME' => 'first_name', 'ADDRESS' => 'primary_address_street', 'ADDRESS_CITY' => 'primary_address_city', 'ADDRESS_PROVINCE' => 'primary_address_state', 'ADDRESS_POSTAL_CODE' => 'primary_address_postalcode', 'ADDRESS_COUNTRY' => 'primary_address_country', 'ADDRESS_2' => 'alt_address_street', 'ORIGINATOR_ID' => 'lead_source', 'STATUS_ID' => 'status', 'OPPORTUNITY' => 'opportunity_amount', 'BIRTHDAY' => 'birthdate', 'WEB' => 'website');

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
		$fieldsArr['PROPERTY_94'] 	= ($Product['deleted'] == 1) ? 98 : 99; //dev env
		$fieldsArr['PROPERTY_95'] 	= getBitrixId($Product['assigned_user_id'],'User');
		$fieldsArr['PROPERTY_96'] 	= $Product['part_number'];
		$fieldsArr['PROPERTY_97'] 	= $Product['category'];
		$fieldsArr['PROPERTY_98'] 	= $Product['type'];
		$fieldsArr['PRICE'] 		= $Product['price'];
		$fieldsArr['CURRENCY_ID'] 	= $Product['currency_id'];
		$fieldsArr['PROPERTY_99'] 	= $Product['url'];
		$fieldsArr['PROPERTY_100'] 	= getBitrixId($Product['contact_id'],'Contact');
		$fieldsArr['PROPERTY_101'] 	= $Product['aos_product_category_id'];
		$fieldsArr['PROPERTY_102'] 	= (empty($Product['setup_price_c']) || (float)$Product['setup_price_c'] == 0) ? 0.00 : $Product['setup_price_c'];
		$fieldsArr['PROPERTY_103'] 	= $Product['recurring_value_c'];
		$fieldsArr['PROPERTY_104'] 	= $Product['recurring_unit_c'];
		$fieldsArr['PROPERTY_105'] 	= $Product['status_c'];
		$fieldsArr['PROPERTY_106'] 	= $Product['qb_item_code1_c'];
		$fieldsArr['PROPERTY_107'] 	= $Product['none'];
		$fieldsArr['ACTIVE'] 		= ($Product['status_c']=='Active') ? 'Y' : 'N';

		// print("<pre>".print_r($fieldsArr,true)."</pre>"); exit();

		// $apiLog = CRest::call('crm.product.add', [ 'fields' => $fieldsArr ]);
		// apiLog($apiLog,$fieldsArr,$moduleName,$crmUniqueFieldName);
	}
	exit('THE END!'."\n");
}
