<?php
	require "../inc/DBConnect.php";
	
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	
	// // htmlentities
	// if(!preg_match("/^[[:alnum:][:punct:] ]{6,25}$/i",$_POST['password'])) {
			
			// print '<script type="text/javascript">';
			// print 'alert("Невалидна парола.")';
			// print '</script>'; 
			// exit;
	// }
	// if(!empty($address)) {
		// if(!preg_match("/^[0-9]{1,}+[a-zA-Z0-9]{0,}+[ ]{1}+[a-zA-Z0-9[ ]{1,}$/",htmlentities($_POST['address']))) {
			// //include "register.php";
			// print '<script type="text/javascript">';
			// print 'alert("Невалиден адрес")';
			// print '</script>'; 
			// exit;
		// }
	// }
	// if(!empty($phone)) {
		// if(!preg_match("/^[0-9]{8,}$/",htmlentities($_POST['phone']))) {
			// include "register.php";
			// print '<script type="text/javascript">';
			// print 'alert("Невалиден телефонен номер.")';
			// print '</script>'; 
			// exit;
		// }
	// }
	
	//Random String of salt used for everyone
	//$salt = 'tpqwtq77';

	# Hash password
	// $passwords[] = $user_password;
	// $passwords[] = md5($user_password);
	// $passwords[] = md5($salt. $user_password);

	// $repasswords[] = $user_password2;
	// $repasswords[] = md5($user_password2);
	// $repasswords[] = md5($salt. $user_password2);

	// //Show each one
	// foreach($passwords as $password) {
		// $password;
	// }
	// foreach($repasswords as $repassword) {
		// $repassword;
	// }
	
	// Check e-mail address already exists
	$checkEmailQuery = "SELECT * FROM USERS WHERE EMAIL='$email'";
	$checkuser = OCIParse($db,$checkEmailQuery);
	if(!$checkuser)  {
		echo "Възникна грешка с изпълнението на заявката.\n"; 
		exit; 
	}
	// echo '<script>alert(1);</script>';
	OCIExecute($checkuser);
	
	$rows= OCIFetchStatement($checkuser,$result);
	
	if($rows > 0){
		header('Location: ../Ima rezultat.php');
	} else {

		$checkLastUserID = "SELECT MAX(USERID) AS USERID FROM USERS";
		
		$checkUserID = OCIParse($db,$checkLastUserID);
		OCIExecute($checkUserID);
		if(!$checkUserID)  {
			echo "Възникна грешка с изпълнението на заявката.\n"; 
			exit; 
		}
		
		OCIExecute($checkUserID); 	
		
		OCIFetch($checkUserID);
					
		$register = "INSERT INTO USERS (USERID, ROLEID, FIRSTNAME, LASTNAME, EMAIL, PASSWORD, COUNTRYID, CITYID, ADDRESS, PHONE, CREATEDATE) 
						values ('".(OCIResult($checkUserID,"USERID") + 1)."', '3', '$firstName', '$lastName', '$email', '$password', '2', '4', '$address', '$phone', to_date('".date('d-M-Y')."'))";
					
		$stmt = OCIParse($db, $register);
	  
		if(!$stmt)  {
			echo "Възникна грешка с изпълнението на заявката.\n"; 
			exit; 
		}
		
		OCIExecute($stmt); 
		
		session_start();
		$_SESSION['Email'] = $email;
		$_SESSION['Role'] = "User";
		header('Location: ../Profile.php');
	}
?>