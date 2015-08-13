<?php
ob_start(); // xem conment bên file xóa nếu bạn chưa hiểu
session_start(); // xem conment bên file xóa nếu bạn chưa hiểu
include_once("functions.php"); // triệu gọi file functions để dùng cho check form
include_once("connect.php"); // triệu gọi file kết nối để truy vấn
// kiểm tra sự tồn tại của session
if(isset($_SESSION["user"]) && isset($_SESSION["pass"]) && isset($_SESSION["dntc"]) == "tca"){
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Form</title>
  <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="themmoi_thanhvien.css" />
</head>
<body>
<?php
// kiểm tra trạng thái xem người dùng đã submit form chưa?
if(isset($_POST["submit"])){
	// kiểm tra username hoặc pass có rỗng không. hàm được xây dựng bên file functions
	if($_POST["user"] == "" || $_POST["pass"] == ""){
		$error = "các trường không được để trống";
		}
		// kiểm tra username hoặc pass có <4 và >16 không. hàm được xây dựng bên file functions
		elseif(checkLength($_POST["user"], 4, 16) || checkLength($_POST["pass"], 4, 16)) {
			$error2 = "username hoặc password phải có độ dài từ 4 đến 16 ký tự";
			}
			else {
				$user = $_POST["user"];
				$pass = md5($_POST["pass"]);
				}
		// kiểm tra quyền truy cập
		if($_POST["lc"] == "Unselect"){
			$error3 = "bạn phải lựa chọn quyền truy cập";
			}
			elseif($_POST["lc"] == "member") {
				$qtc = 1;
			}
			elseif($_POST["lc"] == "admin"){
				$qtc = 2;
				}
			//đọc lại comment bên file sua nếu bạn chưa hiểu chỗ này
			if(mysql_num_rows(mysql_query("SELECT * FROM `thanh_vien` WHERE `tai_khoan` = '$user'")) >0){
			$error4 = "username đã tồn tại";
			}
	//kiểm tra nếu tồn tại session user, pass, quyền truy cập và không tồn tại lỗi thì truy vấn
	if(isset($user) && isset($pass) && isset($qtc) && !isset($error4)){
				$sql = "INSERT INTO `thanh_vien` VALUES (null, '$user', '$pass', $qtc)";
				$query = mysql_query($sql);
				header("location: ql_thanhvien.php");
		}
	}
?>
<form method="post">
  <h1>Add member</h1>
  <p style="color:#FF0004;"><?php if(isset($error)){ echo $error;}elseif(isset($error2)){echo $error2;}elseif(isset($error3)){echo $error3;}elseif(isset($error4)){echo $error4;} ?></p>
  <fieldset>
	<label for="name">Username:</label>
	<input type="text" id="name" name="user">
	<label for="mail">Password:</label>
	<input type="password" id="mail" name="pass">
	<select name="lc">
	<option value="Unselect">Lựa chọn quyền truy cập</option>
	<option value="member">Member</option>
	<option value="admin">Admin</option>
  </select>
  </fieldset>
  <button type="submit" name="submit" />Add member</button>
</form>
</body>
</html>
<?php
}
else{
  header("location: login.php");
  }
?>