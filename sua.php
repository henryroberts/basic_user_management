<?php
ob_start();// xem conment bên file xóa nếu bạn chưa hiểu
session_start(); //// xem conment bên file xóa nếu bạn chưa hiểu
$id_thanhvien = $_GET["id_tv"]; // nhận biến id_thanhvien từ thanh địa chỉ để sử dụng cho truy vấn sql
include("connect.php"); // triệu gọi file kết nối
include("functions.php");// triệu gọi file functions để xử dụng function cho check form
$rows = @mysql_fetch_array(mysql_query("SELECT * FROM `thanh_vien` WHERE `id_thanhvien` = $id_thanhvien"));
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>sửa thành viên</title>
<link rel="stylesheet" type="text/css" href="themmoi_thanhvien.css" />
</head>
<body>
<?php
//kiểm tra xem người dùng có nhấn submit không
if(isset($_POST["submit"])){
	// kiểm tra username có trống không
	if($_POST["user"] == ""){
		$error = '<span style="color:red;">(*)</span>';
		}
		// kiểm tra username có có ngắn hơn 4 hay dài hơn 16 ký tự không. hàm này xây dựng bên file functions
		elseif(checkLength($_POST["user"], 4, 16)) {
			$error = '<span style="color:red;">(*)</span>';
			}
			else {
				$user = $_POST["user"];
				}
		// kiểm tra password có trống không
		if($_POST["pass"] == ""){
			$error2 = '<span style="color:red;">(*)</span>';
			}
		// kiểm tra password có có ngắn hơn 4 hay dài hơn 16 ký tự không. hàm này xây dựng bên file functions
		elseif(checkLength($_POST["pass"], 4, 16)) {
		$error2 = '<span style="color:red;">(*)</span>';
		}
		else {
			$pass = md5($_POST["pass"]); // mã hóa pass để đảm bảo bảo mật
			}
		/* hàm sql_num_rows sẽ tra về số bản ghi trong db vì vậy ta sử dụng nó để kiếm tra xem tài khoản này đã tồn tại
		trong db hay chưa. nếu nó > 0 thì tk đã tồn tại còn <= 0 thì tại khoản chưa tồn tại. */
		if(mysql_num_rows(mysql_query("SELECT * FROM `thanh_vien` WHERE `tai_khoan` = '$user'")) >0){
		$error3 = '<span style="color:red;">(*)</span>';
		}
		// kiểm tra quyền truy cập là member hay admin để truy vấn
		if($_POST["lc"] == "member"){
			$qtc = 1;
			}
			elseif($_POST["lc"] == "admin") {
				$qtc = 2;
				}
		if(!isset($error) && !isset($error2) && !isset($error3)){
			//truy vấn update db
			$sql = "UPDATE `thanh_vien` SET `tai_khoan` = '$user', `mat_khau` = '$pass', `quyen_truy_cap` = $qtc WHERE `id_thanhvien` = $id_thanhvien";
			$query = mysql_query($sql);
			header("location: ql_thanhvien.php");
			}
	}
?>
<form method="post">
  <h1>Update Information</h1>
  <p style="color:#FF0004;"><?php if(isset($error) || isset($error2) || isset($error3)){echo "Có điều gì đó sau mong
  bạn kiểm tra lại nơi có chứa ký tự (*)"; } ?></p>
  <fieldset>
	<label for="name">Username: <?php if(isset($error) || isset($error3)){echo $error;} ?></label>
	<input type="text" id="name" name="user" value="<?php echo $rows["tai_khoan"]; ?>">
	<label for="mail">Password: <?php if(isset($error2)){echo $error2;} ?></label>
	<input type="password" id="mail" name="pass" value="<?php echo $rows["mat_khau"]; ?>">
	<select name="lc">
	<option value="Unselect">Lựa chọn quyền truy cập</option> 
	<option value="member" <?php if($rows["quyen_truy_cap"] == 1){echo 'selected="selected"';} ?>>Member</option>
	<option value="admin" <?php if($rows["quyen_truy_cap"] == 2){echo 'selected="selected"';} ?>>Admin</option>
  </select>
  </fieldset>
  <button type="submit" name="submit" />Update info</button>
</form>
</body>
</html>