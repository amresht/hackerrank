<?php
require_once (__DIR__.'/crest.php');
require_once (__DIR__.'/DBConnection.php');
require_once (__DIR__.'/helperFunction.php');


migrateContactData();

function migrateContactData() {

	$moduleName ='Contact';
	$crmUniqueFieldName = 'ID';
	
 	/**
	  * New Fields in Bitrix24
	  */
	$contactCSTMColumns= array("activation_link_c", "alternative_contact_c", "billing_notification_c", "contact_number_c", "dashboard_username_c", "date_spoked_with_customer_c", "days_before_bd_c", "extra_phone_number_c",  "mail_after_transaction_c", "mailing_city_c", "mailing_state_c", "mailing_street_c", "mailing_street_city_c", "mailing_street_country_c", "mailing_street_postalcode_c", "mailing_street_state_c", "mailing_zip_c", "preferred_language_c", "secondary_email_c", "transaction_id_c", "user_id_c", "vault_id_c");
	
	/**
	 * Existing Fields in Bitirx24
	 */
	$contactColumns= array('ID','DATE_CREATE','DATE_MODIFY','MODIFY_BY_ID','CREATED_BY_ID','ASSIGNED_BY_ID','NAME','LAST_NAME','TITLE','ADDRESS','ADDRESS_CITY','ADDRESS_PROVINCE','ADDRESS_POSTAL_CODE','ADDRESS_COUNTRY','ADDRESS_2');
	
	/**
	 * Nomenclature mismatch in bitrix and SugarCRM
	 */
	$BitrixColumnName = array('DATE_CREATE' => 'date_entered','DATE_MODIFY' => 'date_modified', 'MODIFY_BY_ID' => 'modified_user_id' , 'CREATED_BY_ID' => 'created_by', 'ASSIGNED_BY_ID' => 'assigned_user_id', 'NAME' => 'first_name', 'ADDRESS' => 'primary_address_street', 'ADDRESS_CITY' => 'primary_address_city', 'ADDRESS_PROVINCE' => 'primary_address_state', 'ADDRESS_POSTAL_CODE' => 'primary_address_postalcode', 'ADDRESS_COUNTRY' => 'primary_address_country', 'ADDRESS_2' => 'alt_address_street');
	
	/**
	 * Key and there modules for mapping
	 */
	$keyModulePair = array("MODIFY_BY_ID"=>'User',"CREATED_BY_ID"=>'User',"ASSIGNED_BY_ID"=>'User');
	
	$getContacts = mysqli_query(getSugarCRMDBConnection(), "SELECT * FROM contacts LEFT JOIN contacts_cstm ON contacts.id = contacts_cstm.id_c WHERE contacts.deleted = 0 order by date_entered desc LIMIT 1000, 50");
	foreach($getContacts as $contact) {
		
		/**
		 * Custom Fields in Bitrix24
		 */
		foreach($contactCSTMColumns as $column) {
			if(array_key_exists($column,$keyModulePair)) {
				$contactColumn = getBitrixId($contact[strtolower($column)],$keyModulePair[strtoupper($column)]);
			}
			else{
				$contactColumn = $contact[strtolower($column)];
			}
			$fieldsArr["UF_CRM_".strtoupper($column)] = $contactColumn;
		}
		
		/**
		 * Default Fields in Bitrix24
		 */
		foreach($contactColumns as $column){
			/**
			 * The fileds those don't follow with the SugarCRM nomenclature
			 */
			if(array_key_exists($column,$BitrixColumnName)) {
				
				if(array_key_exists($column,$keyModulePair)) {
					$contactColumn = getBitrixId($contact[strtolower($BitrixColumnName[$column])],$keyModulePair[strtoupper($column)]);
				}
				else{
					$contactColumn = $contact[strtolower($BitrixColumnName[$column])];
				}

				$fieldsArr[strtoupper($column)] = $contactColumn;
			}

			/**
			 * The fileds those do follow with the SugarCRM nomenclature
			 */
			else {
				if(array_key_exists($column,$keyModulePair)) {
					$contactColumn = getBitrixId($contact[strtolower($column)],$keyModulePair[strtoupper($column)]);
				}
				else{
					$contactColumn = $contact[strtolower($column)];
				}
				$fieldsArr[strtoupper($column)]= $contactColumn;
			}
		}

		$apiLog = CRest::call('crm.contact.add', [ 'fields' => $fieldsArr ]);
		apiLog($apiLog, $fieldsArr, $moduleName, $crmUniqueFieldName);
	}
	exit('THE END!'."\n");
}