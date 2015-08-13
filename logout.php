<?php
ob_start();
session_start();
if(isset($_SESSION["user"]) && $_SESSION["pass"]){
	session_unset($_SESSION["user"]);
	session_unset($_SESSION["pass"]);
	session_unset($_SESSION["dntc"]);
	session_unset($_SESSION["dn"]);
	header("location: login.php");
	}
else {
	header("location: login.php");
	}
?>