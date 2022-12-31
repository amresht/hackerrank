<?php
require_once (__DIR__.'/crest.php');
require_once (__DIR__.'/DBConnection.php');
require_once (__DIR__.'/helperFunction.php');


migrateContactData();

function migrateContactData() {

	$moduleName ='Deal';
	$crmUniqueFieldName = 'ID';
	
 	/**
	  * New Fields in Bitrix24
	 */
	$dealCSTMColumns= array("approval_issue","approval_status","billing_account_id","billing_address_city","billing_address_country","billing_address_postalcode","billing_address_state","billing_address_street","billing_contact_id","deleted","discount_amount","expiration","invoice_status","number","opportunity_id","products_categories","shipping_address_city","shipping_address_country","shipping_address_postalcode","shipping_address_state","shipping_address_street","shipping_amount","shipping_tax","shipping_tax_amt","stage","subtotal_amount","subtotal_tax_amount","template_ddown_c","term","total_amount","total_amt","accmark_c","account_number_c","agent_c","agreement_received_c","agreement_type_c","audit_type_c","auto_payment_c","autopayment_off_reason_c","billing_date_c","cancel_date_c","cancel_reason_additional_c","cancel_reason_c","cancel_reason_primary_c","cancel_reason_secondary_c","canceled_non_payment_date_c","card_changer_c","cc_zip_c","charging_group_c","class_c","closer_com_2_c","closer_com_c","date_agent_passed_c","deal_stage_history_c","department_additional_c","department_secondary_c","departments_primary_c","due_to_renew_c","external_charge_c","failed_prepaid_transaction_c","iframe_sale_c","iframe_setup_invoice_c","in_prepaid_test_c","mail_after_transaction_c","new_invoice_c","next_billing_date_c","nmi_connection_date_c","opener_com_c","placement_validation_c","price_per_lead_c","promo_offer_c","ptp_a_c","ptp_c","reason_for_assignment_c","reason_for_nab_c","recurring_date_c","recurring_unit_c","recurring_value_c","rtp_c","sales_misrep_c","sales_misrep_type_c","status_at_the_moment_of_canc_c","take_over_c","team_member_name_c","total_setup_c","type_of_cancel_c","user_id_c","user_id1_c","user_id2_c","user_id3_c","user_id4_c","user_id5_c","user_id6_c","user_id7_c","user_id8_c","user_id9_c","vault_id_c","waive_final_bill_c");
	
	/**
	 * Existing Fields in Bitirx24
	 */
	$dealColumns= array('ID','DATA_CREATE','DATA_MODIFY','MODIFY_BY_ID','CREATED_BY_ID','ASSIGNED_BY_ID','TITLE','ADDITIONAL_INFO','BANK_DETAIL_ID','BEGINDATE','CATEGORY_ID','CLOSED','CLOSEDATE','COMMENTS','COMPANY_ID','CONTACT_ID','CONTACT_IDS','CURRENCY_ID','IS_NEW','IS_RECURRING','IS_RETURN_CUSTOMER','LEAD_ID','LOCATION_ID','OPENED','OPPORTUNITY','ORIGINATOR_ID','ORIGIN_ID','PROBABILITY','QUOTE_ID','STAGE_ID','STAGE_SEMANTIC_ID','TAX_VALUE','TYPE_ID');
	
	/**
	 * Nomenclature mismatch in bitrix and SugarCRM
	 */
	$BitrixColumnName = array('DATA_CREATE' => 'date_entered','DATA_MODIFY' => 'date_modified', 'MODIFY_BY_ID' => 'modified_user_id' , 'CREATED_BY_ID' => 'created_by', 'ASSIGNED_BY_ID' => 'assigned_user_id', 'TITLE' => 'name','ADDITIONAL_INFO' => 'description', 'TAX_VALUE' => 'tax_amount', 'CURRENCY_ID' => 'currency_id',);
	
	/**
	 * Key and there modules for mapping
	 */
	$keyModulePair = array("MODIFY_BY_ID"=>'User',"CREATED_BY_ID"=>'User',"ASSIGNED_BY_ID"=>'User','CONTACT_ID'=>"Contact",'COMPANY_ID'=>"Company",'LEAD_ID'=>"Lead");
	
	$getDeals = mysqli_query(getSugarCRMDBConnection(), "SELECT * FROM aos_quotes LEFT JOIN aos_quotes_cstm ON aos_quotes.id = aos_quotes_cstm.id_c WHERE aos_quotes.deleted = 0 order by date_entered desc LIMIT 0, 2");
	
	foreach($getDeals as $deal) {
		
		/**
		 * Custom Fields in Bitrix24
		 */
		foreach($dealCSTMColumns as $column) {
			if(array_key_exists($column,$keyModulePair)) {
				$dealColumn = getBitrixId($deal[strtolower($column)],$keyModulePair[strtoupper($column)]);
			}
			else{
				$dealColumn = $deal[strtolower($column)];
			}
			$fieldsArr["UF_CRM_".strtoupper($column)] = $dealColumn;
		}
		
		/**
		 * Default Fields in Bitrix24
		 */
		foreach($dealColumns as $column){
			/**
			 * The fileds those don't follow with the SugarCRM nomenclature
			 */
			if(array_key_exists($column,$BitrixColumnName)) {
				
				if(array_key_exists($column,$keyModulePair)) {
					$dealColumn = getBitrixId($deal[strtolower($BitrixColumnName[$column])],$keyModulePair[strtoupper($column)]);
				}
				else{
					$dealColumn = $deal[strtolower($BitrixColumnName[$column])];
				}

				$fieldsArr[strtoupper($column)] = $dealColumn;
			}

			/**
			 * The fileds those do follow with the SugarCRM nomenclature
			 */
			else {
				if(array_key_exists($column,$keyModulePair)) {
					$dealColumn = getBitrixId($deal[strtolower($column)],$keyModulePair[strtoupper($column)]);
				}
				else{
					$dealColumn = $deal[strtolower($column)];
				}
				$fieldsArr[strtoupper($column)]= $dealColumn;
			}
		}

		$apiLog = CRest::call('crm.deal.add', [ 'fields' => $fieldsArr ]);
		apiLog($apiLog, $fieldsArr, $moduleName, $crmUniqueFieldName);
	}
	exit('THE END!'."\n");
}