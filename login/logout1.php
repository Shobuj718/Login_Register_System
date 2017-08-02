<?php 

	session_start();
	require_once "functions.php";

		$user = new LoginRegistration();
		$user->logOutUser();
		header("Location: login1.php?response=1"); //redirects the login1 file
		exit();

?>