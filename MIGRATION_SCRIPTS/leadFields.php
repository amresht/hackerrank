<?php
require_once (__DIR__.'/crest.php');
require_once (__DIR__.'/DBConnection.php');
require_once (__DIR__.'/helperFunction.php');

// migrateLeadCstmColumns();
/**
 * Lead Custom table's field Migration from SugarCRM to Bitrix24
 */
function migrateLeadCstmColumns() {

	$getLeadCstmCol = mysqli_query(getSugarCRMDBConnection(), "SELECT `COLUMN_NAME`,`DATA_TYPE` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='leads_cstm' and COLUMN_NAME IN ('list_of_services_c','need_appointment_c','prices_c','guarantees_or_warranty_c','certificates_awards_bbb_c','languages_spoken_c','business_type_c','tech_issue_c','basic_price_c','ask_for_additional_phone_c','acton_lead_score_c','promo_offer_c','roi_tool_c','is_unsubscribed_c','lead_source_id_c','lead_channel_c','lead_campaign_c','retargeting_c')");
	
	foreach ($getLeadCstmCol as $leadCstmCol) {
		$transformedLeadCstmCol= transformData($leadCstmCol);
		$fieldsArr = array(
			"FIELD_NAME" => $transformedLeadCstmCol['COLUMN_NAME'],
			"EDIT_FORM_LABEL" => ucfirst(rtrim(str_replace('_', ' ', $transformedLeadCstmCol['COLUMN_NAME']),'_c')),
			"LIST_COLUMN_LABEL" => ucfirst(rtrim(str_replace('_', ' ', $transformedLeadCstmCol['COLUMN_NAME']),'_c')),
			"USER_TYPE_ID" => $transformedLeadCstmCol['BITRIX_DATA_TYPE'] 
		);
		if(array_key_exists('BITRIX_DATA_LIST',$transformedLeadCstmCol)){
			array_push($fieldsArr, $transformedLeadCstmCol['BITRIX_DATA_LIST']);
		}

		$createLead = CRest::call('crm.lead.userfield.add', [
			'fields' => $fieldsArr
		]);

		echo '<pre>';
		print_r($createLead);
		echo "COLUMN_NAME = >".$transformedLeadCstmCol['COLUMN_NAME'];
		echo '</pre><hr>';
	}
	exit('THE END!');
}

// migrateLeadColumns();
/**
 * Lead table's field Migration from SugarCRM to Bitrix24
 */
function migrateLeadColumns() {
	
	$getLeadCstmCol = mysqli_query(getSugarCRMDBConnection(), "SELECT `COLUMN_NAME`,`DATA_TYPE` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='leads' and COLUMN_NAME IN ('phone_home','phone_mobile','phone_work','phone_other','phone_fax','deleted','salutation','do_not_call','alt_address_city','alt_address_state','alt_address_postalcode','alt_address_country','converted','refered_by','lead_source_description','reports_to_id','account_description','opportunity_id','opportunity_name','campaign_id','portal_name','portal_app')");
	foreach ($getLeadCstmCol as $leadCstmCol) {
		$transformedLeadCstmCol= transformData($leadCstmCol);
		$fieldsArr = array(
			"FIELD_NAME" => $transformedLeadCstmCol['COLUMN_NAME'],
			"EDIT_FORM_LABEL" => ucfirst(rtrim(str_replace('_', ' ', $transformedLeadCstmCol['COLUMN_NAME']),'_c')),
			"LIST_COLUMN_LABEL" => ucfirst(rtrim(str_replace('_', ' ', $transformedLeadCstmCol['COLUMN_NAME']),'_c')),
			"USER_TYPE_ID" => $transformedLeadCstmCol['BITRIX_DATA_TYPE'] 
		);
		if(array_key_exists('BITRIX_DATA_LIST',$transformedLeadCstmCol)){
			array_push($fieldsArr, $transformedLeadCstmCol['BITRIX_DATA_LIST']);
		}

		$createLead = CRest::call('crm.lead.userfield.add', [
			'fields' => $fieldsArr
		]);

		echo '<pre>';
		print_r($createLead);
		echo "COLUMN_NAME = >".$transformedLeadCstmCol['COLUMN_NAME'];
		echo '</pre><hr>';
	}
	exit('THE END!');
}

// migrateLeadToImportColumns();
/**
 * lead_to_import table's field Migration from SugarCRM to Bitrix24
 */
function migrateLeadToImportColumns() {
	
	$getLeadCstmCol = mysqli_query(getSugarCRMDBConnection(), "SELECT `COLUMN_NAME`,`DATA_TYPE` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='leads_to_import' and COLUMN_NAME IN ('client_name','first_name','last_name','date_added','phone','email','assigned_to','user_name','user_id','lang','lead_source','lead_status','lead_status_real','lead_id')");
	foreach ($getLeadCstmCol as $leadCstmCol) {
		$transformedLeadCstmCol= transformData($leadCstmCol);
		$fieldsArr = array(
			"FIELD_NAME" => $transformedLeadCstmCol['COLUMN_NAME'].'_LTI',
			"EDIT_FORM_LABEL" => ucfirst(rtrim(str_replace('_', ' ', $transformedLeadCstmCol['COLUMN_NAME']),'_c')),
			"LIST_COLUMN_LABEL" => ucfirst(rtrim(str_replace('_', ' ', $transformedLeadCstmCol['COLUMN_NAME']),'_c')),
			"USER_TYPE_ID" => $transformedLeadCstmCol['BITRIX_DATA_TYPE'] 
		);
		if(array_key_exists('BITRIX_DATA_LIST',$transformedLeadCstmCol)){
			array_push($fieldsArr, $transformedLeadCstmCol['BITRIX_DATA_LIST']);
		}

		$createLead = CRest::call('crm.lead.userfield.add', [
			'fields' => $fieldsArr
		]);

		echo '<pre>';
		print_r($createLead);
		echo "COLUMN_NAME = >".$transformedLeadCstmCol['COLUMN_NAME'];
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
			"EDIT_FORM_LABEL" => 'Leads SMS Text Messages',
			"LIST_COLUMN_LABEL" => 'Leads SMS Text Messages',
			"USER_TYPE_ID" => 'crm_multifield'
		);
		$createLead = CRest::call('crm.lead.userfield.add', [ 'fields' => $fieldsArr ]);
		print_r($createLead);
		exit('THE END!');
}