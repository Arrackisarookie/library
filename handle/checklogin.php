<?php 
	require_once('connect.php');

	$islogin = false;
	session_start();
	if (isset($_SESSION['islogin']) && $_SESSION['islogin']) {
		$islogin = true;
		$sid = $_SESSION['sid'];
		$username = $_SESSION['username'];
	}
?>