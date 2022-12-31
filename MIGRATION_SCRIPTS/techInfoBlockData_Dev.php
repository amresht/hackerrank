<?php
require_once (__DIR__.'/crest.php');
require_once (__DIR__.'/DBConnection.php');
require_once (__DIR__.'/helperFunction.php');

migrateTechDataLimitedRecords();
function migrateTechDataLimitedRecords(){
	$maximumRecords = 114000; //113905;
	$loopValue = 35502; 
	while($loopValue<= $maximumRecords){
		$currentUpperLimit =$loopValue+1000;
		$currentLowerLimit =$loopValue+1;
		$loopStr = $currentLowerLimit." , ".$currentUpperLimit;
		migrateTechData($loopStr);
		$loopValue=$currentUpperLimit;
	}
}

function migrateTechData($queryLimit =10) {

	/**
	 * Constant for modules
	 */
	$moduleName ='Tech';
	$crmUniqueFieldName = 'ID';

	/**
	 * Fields needs to be changed on each module
	 */
	$GLOBALS['techCustomColumn'] = array("automation_status_c"=>"PROPERTY_282","automation_start_c"=>"PROPERTY_281","google_review_direct_link_c"=>"PROPERTY_280","review_management_email_c"=>"PROPERTY_279","review_management_password_c"=>"PROPERTY_278","dont_write_reviews_c"=>"PROPERTY_277","google_placement_6_c"=>"PROPERTY_276","reson_for_change_k6_c"=>"PROPERTY_275","google_keyword_6_c"=>"PROPERTY_274","google_keword_6_alt_c"=>"PROPERTY_273","city_size_c"=>"PROPERTY_272","existing_etp_ovi_c"=>"PROPERTY_271","distance_from_the_center_c"=>"PROPERTY_270","address_in_city_borders_c"=>"PROPERTY_269","address_recognized_c"=>"PROPERTY_268","city_opulation_c"=>"PROPERTY_267","website_c"=>"PROPERTY_266","phone_c"=>"PROPERTY_265","address_c"=>"PROPERTY_264","company_name_c"=>"PROPERTY_263","google_listing_date_c"=>"PROPERTY_262","dirs_email_pass_c"=>"PROPERTY_261","dirs_email_c"=>"PROPERTY_260","domain_email_pass_c"=>"PROPERTY_259","domain_email_c"=>"PROPERTY_258","google_listing_link_small_c"=>"PROPERTY_257","long_kws_c"=>"PROPERTY_256","mid_kws_c"=>"PROPERTY_255","short_kws_c"=>"PROPERTY_254","neighbourhood_checkbox_c"=>"PROPERTY_253","neighbourhood_c"=>"PROPERTY_252","ak_c"=>"PROPERTY_251","reson_for_change_k5_c"=>"PROPERTY_250","reson_for_change_k4_c"=>"PROPERTY_249","reson_for_change_k3_c"=>"PROPERTY_248","reson_for_change_k2_c"=>"PROPERTY_247","reson_for_change_k1_c"=>"PROPERTY_246","kws_last_updated_c"=>"PROPERTY_245","dirs_password_c"=>"PROPERTY_244","position_check_phones_c"=>"PROPERTY_243","online_list_of_services_c"=>"PROPERTY_242","online_tech_name_c"=>"PROPERTY_241","online_remove_whisper_popup_c"=>"PROPERTY_240","online_customer_status_c"=>"PROPERTY_239","online_customer_type_c"=>"PROPERTY_238","online_web_optimizator_c"=>"PROPERTY_237","online_shipping_street_city_c"=>"PROPERTY_236","online_google_password_c"=>"PROPERTY_235","online_google_account_c"=>"PROPERTY_234","online_order_submitted_date_c"=>"PROPERTY_233","online_cell_phone_c"=>"PROPERTY_232","online_business_type_c"=>"PROPERTY_231","online_in_business_since_c"=>"PROPERTY_230","online_free_website_link_c"=>"PROPERTY_229","online_additional_hours_c"=>"PROPERTY_228","online_google_listing_link_c"=>"PROPERTY_227","online_shipping_street_posta_c"=>"PROPERTY_226","online_shipping_street_c"=>"PROPERTY_225","online_shipping_street_state_c"=>"PROPERTY_224","date_cancel_c"=>"PROPERTY_223","online_last_name_c"=>"PROPERTY_222","online_first_name_c"=>"PROPERTY_221","online_callfire_number_c"=>"PROPERTY_220","video_link_c"=>"PROPERTY_219","google_plus_business_page_li_c"=>"PROPERTY_218","business_twitter_link_c"=>"PROPERTY_217","facebook_business_page_c"=>"PROPERTY_216","online_payments_accepted_c"=>"PROPERTY_215","online_discounts_and_special_c"=>"PROPERTY_214","online_add_phone_c"=>"PROPERTY_213","online_fax_c"=>"PROPERTY_212","online_phone_c"=>"PROPERTY_211","online_areas_served_c"=>"PROPERTY_210","online_website_c"=>"PROPERTY_209","all_keywordss_c"=>"PROPERTY_208","google_keword_5_alt_c"=>"PROPERTY_207","google_keword_4_alt_c"=>"PROPERTY_206","google_keword_3_alt_c"=>"PROPERTY_205","google_keword_2_alt_c"=>"PROPERTY_204","google_keword_1_alt_c"=>"PROPERTY_203","post_to_your_place_c"=>"PROPERTY_202","d10_5_5_c"=>"PROPERTY_201","username_and_password_c"=>"PROPERTY_200","google_placement_5_c"=>"PROPERTY_199","google_placement_4_c"=>"PROPERTY_198","google_placement_3_c"=>"PROPERTY_197","google_placement_2_c"=>"PROPERTY_196","google_placement_1_c"=>"PROPERTY_195","payments_accepted_c"=>"PROPERTY_194","license_information_c"=>"PROPERTY_193","areas_served_c"=>"PROPERTY_192","position_check_phone_c"=>"PROPERTY_191","extra_phone_c"=>"PROPERTY_190","add_phone_c"=>"PROPERTY_189","webdesign_comments_c"=>"PROPERTY_188","links_c"=>"PROPERTY_187","more_c"=>"PROPERTY_186","google_review_from_c"=>"PROPERTY_185","google_reviews_c"=>"PROPERTY_184","google_notes_c"=>"PROPERTY_183","google_submit_date_c"=>"PROPERTY_182","impressions_in_90_days_c"=>"PROPERTY_181","actions_in_90_days_c"=>"PROPERTY_180","actions_in_30_days_c"=>"PROPERTY_179","impressions_in_30_days_c"=>"PROPERTY_178","google_keyword_5_c"=>"PROPERTY_177","google_keyword_4_c"=>"PROPERTY_176","google_keyword_3_c"=>"PROPERTY_175","google_keyword_2_c"=>"PROPERTY_174","google_keyword_1_c"=>"PROPERTY_173","fake_address_c"=>"PROPERTY_172","penalized_listing_status_c"=>"PROPERTY_171","penalized_account_status_c"=>"PROPERTY_170");

	function getData($data) {
		$returnArray = [];
		foreach ($GLOBALS['techCustomColumn'] as $key => $value) {
			if(array_key_exists($key, $data)) {
				$returnArray[$value] = $data[$key];
				if($key == 'dont_write_reviews_c') {
					$returnArray[$value] = !empty($data[$key]) ? (($data[$key] == 1) ? 118 : 119) : null;
				}
				if($key == 'neighbourhood_checkbox_c') {
					$returnArray[$value] = !empty($data[$key]) ? (($data[$key] == 1) ? 116 : 117) : null;
				}
			}
		}
		return $returnArray;
	}

	/**
	 * Queries needs to be changed on each module
	 */
	$getTechs = mysqli_query(getSugarCRMDBConnection(), "SELECT id FROM `techs_techs` INNER JOIN `techs_techs_cstm` ON techs_techs.id=techs_techs_cstm.id_c order by id LIMIT $queryLimit");
	$i = 0;

	foreach ($getTechs as $key => $tech) {
		$i++;
		// print("<pre>".print_r($tech,true)."</pre>");

		$configArr['IBLOCK_TYPE_ID']= "advertising";
		$configArr['IBLOCK_ID'] 	= 23;
		$configArr['ELEMENT_CODE'] 	= "element".$i;
		$fieldsArr['ID'] 			= $tech['id'];
		$fieldsArr['NAME'] 			= !empty($tech['name']) ? $tech['name'] : 'No Name found';
		$fieldsArr['DATE_CREATE'] 	= date('m/d/Y h:i:s a', (strtotime($tech['date_entered'])+(2.5*60*60)) );
		//$fieldsArr['TIMESTAMP_X'] 	= date('m/d/Y h:i:s a', strtotime($tech['date_modified']));
		$fieldsArr['PROPERTY_168'] 	= getBtxId($tech['modified_user_id'],'User');
		$fieldsArr['PROPERTY_169'] 	= getBtxId($tech['assigned_user_id'],'User');

		$fieldsArr = array_merge($fieldsArr, getData($tech));
		$configArr['FIELDS'] = $fieldsArr;
		
		// Generate the coloumn name and tagged property
		// $apiLog = CRest::call('lists.field.get', $fieldsArr );
		// $str = "";
		// foreach ($apiLog['result'] as $key => $value) {
		// 	$code = strtolower($value['CODE']);
		// 	if(array_key_exists($code,$GLOBALS['techCustomColumn'])){
		// 		$str .= '"'.$code.'"=>"'.$key.'",';
		// 	}
		// }
		// echo $str;

		//Curl to update the modified date
		$querydata = http_build_query(array(
            'iblockid' => '23',  
            'elementcode' => "element".$i,
			'modifiedon' => date('Y-m-d H:i:s', strtotime($tech['date_modified'])),
		));
		

		$apiLog = CRest::call('lists.element.add', $configArr);
		apiLog($apiLog,$fieldsArr,$moduleName,$crmUniqueFieldName);

		curl_call_update($querydata);

		// print("<pre>".print_r($apiLog,true)."</pre>");
	}
	exit('THE END!'."\n");
}

function curl_call_update($querydata)
{
	$queryurl = 'https://bitrix24-devl.411reports.com/bxwebhook/update_listdefault_props.php';
    $curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_HEADER => 0,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => $queryurl,
		CURLOPT_POSTFIELDS => $querydata,
	));
 
    $result = curl_exec($curl);
}
