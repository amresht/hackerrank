<?php
require_once (__DIR__.'/crest.php');
require_once (__DIR__.'/DBConnection.php');
require_once (__DIR__.'/helperFunction.php');

// migrateAccountCstmColumns();
/**
 * Account Custom table's field Migration from SugarCRM to Bitrix24
 */
function migrateAccountCstmColumns() {

	$getaccountCstmCol = mysqli_query(getSugarCRMDBConnection(), "SELECT `COLUMN_NAME`,`DATA_TYPE` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='accounts_cstm' and COLUMN_NAME IN ('first_name_c','last_name_c','title_c','service_type_c','order_submitted_date_c','phone_c','fax_c','mobile_c','comments_c','address_hidden_c','online_marketing_consultant_c','omc_assign_date_c','collection_status_c','date_in_collections_c','callfire_statistics_date_c','remove_whisper_popup_c','package_type_c','cell_phone_c','setup_fee_c','recurring_fee_c','chargeback_date_c','activation_date_c','activation_type_c','gcsm_c','collection_letter_status_c','collection_letter_status_dat_c','no_winback_c','actions_in_30_days_c','impressions_in_90_days_c','actions_in_90_days_c','web_optimizator_c','content_editor_c','active_c','penalized_account_status_c','penalized_listing_status_c','fake_address_city_c','fake_address_state_c','fake_address_postalcode_c','fake_address_country_c','fake_address_c','google_keyword_1_c','google_keyword_3_c','google_keyword_4_c','google_listing_link_c','business_description_c','google_account_c','free_website_c','webdesign_comments_c','calendar_c','number_of_listings_c','add_phone_c','extra_phone_c','in_business_since_c','areas_served_c','license_information_c','additional_hours_c','payments_accepted_c','discounts_and_specials_c','google_password_c','date_free_website_created_c','website_index_c','goiter_c','impressions_in_30_days_l_c','impressions_in_90_days_l_c','actions_in_30_days_l_c','actions_in_90_days_l_c','refill_c','lp_designer_c','google_review_form_c','balance_due_c','cost_c','position_check_phone_c','opener_manager_c','discount_from_c','discount_to_c','user_id_c','user_id1_c','user_id2_c','qb_id_c','list_of_services_c','need_appointment_c','prices_c','guarantees_or_warranty_c','certificates_awards_bbb_c','languages_spoken_c','randdcomments_c','validation_c','tech_issue_c','transaction_date_c','caspio_view_c','collection_box_c','basic_price_c','quality_assurance_analyst_c','quality_assurance_aanalyst_c','ask_for_additional_phone_c','calls_iframe_c','activation_status_c','timezone_offset_c','user_id3_c','user_id4_c','custom_web_tech_c','callfire_info_c','winback_status_c','nearest_10_miles_c','nearest_30_miles_c','no_upsale_c','user_id5_c','account_graph_c','repgen_link_c','ss_check_status_c','centralized_address_c','user_id6_c','user_id7_c','citations_c','rm_stages_c','user_id8_c','collection_stage_date_c','user_id9_c','winback_status_date_c','winback_bucket_c','winback_assign_date_c','last_concact_date_c','winback_bucket_status_c','last_call_c','cf_status_c','released_by_qa_c','net_promoter_score_field_c','iframe_test_c','website_redesign_date_c','qb_customer_c','call_screening_start_date_c','call_screening_end_date_c','listing_usage_c','review_management_c','roi_tool_c')");
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

		$createaccount = CRest::call('crm.company.userfield.add', [
			'fields' => $fieldsArr
		]);

		echo '<pre>';
		print_r($createaccount);
		echo "COLUMN_NAME = >".$transformedaccountCstmCol['COLUMN_NAME'];
		echo '</pre><hr>';
	}
	exit('THE END!');
}

migrateAccountColumns();
/**
 * Account table's field Migration from SugarCRM to Bitrix24
 */
function migrateAccountColumns() {
	
	$getaccountCstmCol = mysqli_query(getSugarCRMDBConnection(), "SELECT `COLUMN_NAME`,`DATA_TYPE` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_NAME`='accounts' and COLUMN_NAME IN ('assigned_user_id','billing_address_city','billing_address_country','billing_address_postalcode','billing_address_state','billing_address_street','deleted','industry','modified_user_id','phone_fax')");
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

		$createaccount = CRest::call('crm.company.userfield.add', [
			'fields' => $fieldsArr
		]);

		echo '<pre>';
		print_r($createaccount);
		echo "COLUMN_NAME = >".$transformedaccountCstmCol['COLUMN_NAME'];
		echo '</pre><hr>';
	}
	exit('THE END!');
}gmdate