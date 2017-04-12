<?php
	//Start session
	session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['myemail'])){
    header("location:login.php");
    }
    //require_once('../wp-includes/pluggable.php');
    //}
?>