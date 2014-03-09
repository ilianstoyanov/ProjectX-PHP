<?php
	/* Set oracle user login and password info */
	$dbUser ="system";
	$dbPassword ="oracle";
	$dbName= "XE";

	$db = OCILogon($dbUser, $dbPassword, $dbName);

	if (!$db){
		echo "An error occurred connecting to the database."; 
		exit; 
	}
?>