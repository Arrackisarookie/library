<?php 
	require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '\library\config.php');
    if (!($con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE))) {
        echo mysqli_error();
    }
    if (!mysqli_query($con, 'set names utf8')) {
        echo mysqli_error();
    }

	session_start();
	
	if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
        echo "<script>alert('非管理员！');window.location.href='../login';</script>";
    }
?>