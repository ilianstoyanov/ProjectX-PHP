<?php
	//database connection
	require_once('../inc/DBConnect.php');

	// Get values from login form
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$query = "SELECT USERS.Email, USER_ROLE.NAME AS ROLE FROM USERS 
				INNER JOIN USER_ROLE ON USER_ROLE.ROLEID = USERS.ROLEID
				WHERE Email = '$email' AND PASSWORD = '$password'";
	
	$result = OCIParse($db,$query);
	
	OCIExecute($result);
	
	OCIFetch($result);
	
	if(OCIResult($result,"EMAIL")) {
		session_start();
		$_SESSION['Email'] = OCIResult($result,"EMAIL");
		$_SESSION['Role'] = OCIResult($result,"ROLE");
		
		if(OCIResult($result,"ROLE") == "Admin") {
			
			header('Location: ../Users.php');
		} else {
			
			header('Location: ../Profile.php');
		}
	} else {
		header('Location: ../Re-Login.php');
	}
?>