<?php
//connect to server
$connect = mysql_connect("localhost", "root", "") or die("not connect to server");
// select database
$select = mysql_select_db("qlthanhvien", $connect) or die("not connect to database");
// set language
$set_lang = mysql_query("SET NAMES 'utf8'");
?>