<?php
    require_once('config.php');
    if (!($con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE))) {
        echo mysqli_error();
    }
    if (!mysqli_query($con, 'set names utf8')) {
        echo mysqli_error();
    }
?>