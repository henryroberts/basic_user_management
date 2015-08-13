<?php
ob_start();// loại bỏ thông báo lỗi của header cho xampp phiên bản thấp hoặc các host không hỗ trợ loại bỏ lỗi của header
session_start(); // triệu gọi thư viện session
//kiểm tra sự tồn tại session vì lý do bảo mật
if(isset($_SESSION["user"]) && isset($_SESSION["pass"]) && isset($_SESSION["dntc"]) == "tca"){
	include_once("connect.php"); // triệu gọi file kết nối
	$id_thanhvien = $_GET["id_tv"]; // nhận biến id_thanhvien để truy vấn
	$sql = "DELETE FROM `thanh_vien` WHERE `id_thanhvien` = $id_thanhvien"; // truy vấn
	$query = mysql_query($sql); // thực thi truy vấn
	header("location: ql_thanhvien.php"); // thực thi xong thì chuyển hướng admin về trang quản lý
	}
	else {
		header("location: index.php");
		}
?>