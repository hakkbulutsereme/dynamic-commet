<?php
@ob_start();
	@session_start();
	date_default_timezone_set('Europe/Istanbul');

if (basename($_SERVER['PHP_SELF'])==basename(__FILE__)) {
	exit(' Erişim Engellendi.');
};

	
	$db_user 	= "root";
	$db_pass 	= "";
	$db_name 	= "veritabani";
	$host_name 	= "localhost";

	try {
	    $db  	= new PDO("mysql:host=$host_name;dbname=$db_name", $db_user, $db_pass);
	} catch (PDOException $e) {
	    echo 'Connection failed: '.$e->getMessage();
	}

	$db->query("SET NAMES utf8");
	$db->query("SET CHARACTER SET utf8");
	$db->query("SET COLLATION_CONNECTION = 'utf8_general_ci'");

?>