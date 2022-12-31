<?php
require_once (__DIR__.'/crest.php');
require_once (__DIR__.'/DBConnection.php');
require_once (__DIR__.'/helperFunction.php');

migrateLeadData();
/**
 * Leads Migration from SugarCRM to Bitrix24
 */
function migrateLeadData() {

	/**
	 * Constant for modules
	 */
	$moduleName ='Lead';
	$crmUniqueFieldName = 'ID';
	/**
	 * New Fields for Bitrix24
	 */
 	$leadsCSTMColumns= array('description','deleted','salutation','department','do_not_call','phone_home','phone_mobile','phone_work','phone_other','phone_fax','primary_address_street','primary_address_city','primary_address_state','primary_address_postalcode','primary_address_country','alt_address_street','alt_address_city','alt_address_state','alt_address_postalcode','alt_address_country','assistant','assistant_phone','converted','refered_by','lead_source','lead_source_description','status','status_description','reports_to_id','account_name','account_description','contact_id','account_id','opportunity_id','opportunity_name','opportunity_amount','campaign_id','birthdate','portal_name','portal_app','website','id_c','comments_c','company_c','industry_c','street_c','state_c','zip_code_c','order_submitted_date_c','service_type_c','user_id_c','user_id1_c','user_id2_c','list_id_c','dialer_campaign_c','lead_number_c','leadmap_c','in_business_since_c','areas_served_c','license_information_c','hours_of_operation_c','additional_hours_c','address_hidden_c','business_description_c','discounts_and_specials_c','name_as_it_appears_on_the_ca_c','cvv_number_c','setup_fee_c','date_postcard_sent_c','omc_assign_date_c','activation_date_c','activation_type_c','validation_c','advices_c','billing_street_c','billing_state_c','billing_city_c','billing_zip_code_c','city_c','alternate_email_address_c','months_paid_in_advance_c','card_type_c','payments_accepted_c','recurring_fee_c','user_id3_c','vendor_id_c','shipping_adress_line_2_c','recording_filename_c','did_c','agent_id_c','dialer_call_id_c','dialer_group_c','gender_c','phone_login_c','user_group_c','dateend11_c','dateend10_c','assign_to_c','test13_c','no_winback_c','website_index_c','cost_per_click_c','currency_id','cost_per_lead_c','amount_spent_c','total_mount_c','refill_c','current_discount_c','collections_follow_up_date_c','google_submit_date_c','superpages_submit_date_c','balance_due_c','due_to_renew_c','campaign_start_c','initial_charge_date_c','collection_letter_status_dat_c','add_phone_c','monday_from_c','tuesday_from_c','wednesday_from_c','thursday_from_c','friday_from_c','saturday_from_c','sunday_from_c','monday_to_c','tuesday_to_c','wednesday_to_c','thursday_to_c','friday_to_c','saturday_to_c','sunday_to_c','call_cycle_created_c','parent_c','date_cycle_started_c','dialer_frame_c','appointment_datetime_c','p1_status_c','appointment_date_c','report_link_c','list_of_services_c','need_appointment_c','prices_c','guarantees_or_warranty_c','certificates_awards_bbb_c','languages_spoken_c','business_type_c','tech_issue_c','basic_price_c','ask_for_additional_phone_c','acton_lead_score_c','promo_offer_c','roi_tool_c','is_unsubscribed_c','lead_source_id_c','lead_channel_c','lead_campaign_c','retargeting_c');
	
	/**
	 * Alredy there in Bitrix24 module
	 */
	$leadsColumns= array('ID','DATE_CREATE','DATE_MODIFY','MODIFY_BY_ID','CREATED_DY_ID','ASSIGNED_BY_ID','NAME','LAST_NAME','TITLE','ADDRESS','ADDRESS_CITY','ADDRESS_PROVINCE','ADDRESS_POSTAL_CODE','ADDRESS_COUNTRY','ADDRESS_2');
	/**
	 * Nomenclature changes in Bitrix and SugarCRM
	 */
	$BitrixColumnName = array('DATE_CREATE' => 'date_entered','DATE_MODIFY' => 'date_modified', 'MODIFY_BY_ID' => 'modified_user_id' , 'CREATED_DY_ID' => 'created_by', 'ASSIGNED_BY_ID' => 'assigned_user_id', 'NAME' => 'first_name', 'ADDRESS' => 'primary_address_street', 'ADDRESS_CITY' => 'primary_address_city', 'ADDRESS_PROVINCE' => 'primary_address_state', 'ADDRESS_POSTAL_CODE' => 'primary_address_postalcode', 'ADDRESS_COUNTRY' => 'primary_address_country', 'ADDRESS_2' => 'alt_address_street', 'ORIGINATOR_ID' => 'lead_source', 'STATUS_ID' => 'status', 'OPPORTUNITY' => 'opportunity_amount', 'BIRTHDAY' => 'birthdate', 'WEB' => 'website');
	/**
	 * UF_CRM_CAMPAIGN_ID
	 * UF_CRM_OPPORTUNITY_ID
	 * UF_CRM_REPORTS_TO_ID
	 * UF_CRM_LEAD_SOURCE_ID_C
	 * UF_CRM_CURRENCY_ID
	 * UF_CRM_DIALER_CALL_ID_C
	 * UF_CRM_AGENT_ID_C
	 * UF_CRM_DID_C
	 * UF_CRM_VENDOR_ID_C
	 * UF_CRM_LIST_ID_C
	 * UF_CRM_USER_ID3_C
	 * UF_CRM_USER_ID2_C
	 * UF_CRM_USER_ID1_C
	 * UF_CRM_USER_ID_C
	 */
	$keyModulePair = array("USER_ID_C"=>'User',"USER_ID1_C"=>'User',"USER_ID2_C"=>'User',"USER_ID3_C"=>'User',"MODIFY_BY_ID"=>'User',"CREATED_DY_ID"=>'User',"ASSIGNED_BY_ID"=>'User');
	/**
	 * Queries needs to be changed on each module
	 */
	$getLeads = mysqli_query(getSugarCRMDBConnection(), "SELECT * FROM leads LEFT JOIN leads_cstm ON leads.id = leads_cstm.id_c WHERE leads.deleted = 0 LIMIT 1000,100");

	foreach ($getLeads as $lead) {

		/**
		 * Custom Fields in Bitrix24
		 */
		foreach($leadsCSTMColumns as $columns){	
			
			if(array_key_exists($columns,$keyModulePair)) {
				$leadColumn = getBitrixId($lead[strtolower($columns)],$keyModulePair[strtoupper($columns)]);
			}
			else{
				$leadColumn = $lead[strtolower($columns)];
			}
			$fieldsArr["UF_CRM_".strtoupper($columns)]= $leadColumn;
		}

		/**
		 * Default Fields in Bitrix24
		 */
		foreach($leadsColumns as $columns){
			/**
			 * The fileds those don't follow with the SugarCRM nomenclature
			 */
			if (array_key_exists($columns,$BitrixColumnName)) {
				if(array_key_exists($columns,$keyModulePair)) {
					$leadColumn = getBitrixId($lead[strtolower($BitrixColumnName[$columns])],$keyModulePair[strtoupper($columns)]);
				}
				else{
					$leadColumn = $lead[strtolower($BitrixColumnName[$columns])];
				}
				$fieldsArr[strtoupper($columns)]= $leadColumn;
			}

			/**
			 * The fileds those do follow with the SugarCRM nomenclature
			 */
			else {
				if(array_key_exists($columns,$keyModulePair)) {
					$leadColumn = getBitrixId($lead[strtolower($columns)],$keyModulePair[strtoupper($columns)]);
				}
				else{
					$leadColumn = $lead[strtolower($columns)];
				}
				$fieldsArr[strtoupper($columns)]= $leadColumn;
			}
		}
		$apiLog = CRest::call('crm.lead.add', [ 'fields' => $fieldsArr ]);
		apiLog($apiLog,$fieldsArr,$moduleName,$crmUniqueFieldName);
	}
	exit('THE END!'."\n");
}