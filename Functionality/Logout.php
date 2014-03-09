<?php
	session_start();
	if (!$_SESSION['Email']) {
		header('Location: ../Index.php');
	} else {
		session_destroy();
		header('Location: ../Index.php');
	}
	
?>