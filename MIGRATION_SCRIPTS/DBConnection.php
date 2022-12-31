<?php

/**
 * CRM DB Connection
 */
function getSugarCRMDBConnection() {

	$ini =  include('app_config.php');

	$crmhost        = $ini['crmhost'];
	$crmusername    = $ini['crmusername'];
	$crmpassword    = $ini['crmpassword'];
	$crmdbname      = $ini['crmdbname'];
	$conn           = mysqli_connect( $crmhost , $crmusername ,$crmpassword, $crmdbname ) or die("Couldn't connect crm");
	return $conn;
}

/**
 * Caching DB to Store LOG
 */
function getLocalDBConnection() {

	$ini =  include('app_config.php');

	$crmhost        = $ini['localhost'];
	$crmusername    = $ini['localusername'];
	$crmpassword    = $ini['localpassword'];
	$crmdbname      = $ini['localdbname'];
	$conn           = mysqli_connect( $crmhost , $crmusername ,$crmpassword, $crmdbname ) or die("Couldn't connect crm");
	return $conn;
}

?>