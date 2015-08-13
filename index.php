<?php
ob_start();
session_start();
require_once("functions.php");
include_once("connect.php");
    if(! isset($_SESSION["dntc"]) == "tca" && ! isset($_SESSION["dn"]) == "tcu") {
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Dark Login Form</title>
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
<?php
if(isset($_POST["submit"])){
	if(checkEmpty($_POST["user"]) || checkEmpty($_POST["pass"])){
		// kiểm tra nếu rỗng thì khởi tạo biến để báo nhập username và password vào ngay tại input
		$error1 = 'placeholder="Please enter your username"';
		$error2 = 'placeholder="Please enter your password"';
		}
		elseif(checkLength($_POST["user"], 4, 10) || checkLength($_POST["pass"], 4, 10)){
			// kiểm tra độ dài ký tự nếu quá ngắn hoặc quá dài thì khởi tạo biến để báo ngay tại input
			$error3 = 'placeholder="U must be between 4 and 10 characters"';
			$error4 = 'placeholder="P must be between 4 and 10 characters"';
			}
		else{
			$user = $_POST["user"];
			$pass = md5($_POST["pass"]); // mã hóa password để đảm bảo bảo mật
			}
	if(isset($user) && isset($pass)){
			$sql = 'SELECT * FROM thanh_vien WHERE tai_khoan = "'.$user.'" AND mat_khau = "'.$pass.'"'; // tvan
			$qr = mysql_query($sql); // thực thi truy vấn
			$rows = mysql_num_rows($qr); // đếm số dòng trả về từ câu truy vấn
			$qtc = mysql_fetch_array($qr); // tạo biến quản lý quyền truy cập
			if($rows == 0){
				$error5 = 'Placeholder = "Invalid username"';
				$error6 = 'Placeholder = "Invalid password"';
				}
				else{
					// kiểm tra quyền truy cập để tao session quyền truy cập riêng cho admin và member
					if($qtc["quyen_truy_cap"] == 2){
							$_SESSION["user"] = $user;
							$_SESSION["pass"] = $pass;
							$_SESSION["dntc"] = "tca";
							header("location: ql_thanhvien.php");
						}
						else{
							$_SESSION["user"] = $user;
							$_SESSION["pass"] = $pass;
                            $_SESSION["dn"] = "tcu";
							header("location: N_user.php");
							}
					}
		}
	}
?>
 
  <form method="post" class="login">
    <p>
      <label for="login">Username:</label>
      <input type="text" name="user" id="login" <?php if(isset($error1)){echo $error1;}elseif(isset($error3)){echo $error3;}elseif(isset($error5)){echo $error5;}else{echo 'placeholder = "Username"';} ?> >
    </p>
    <p>
      <label for="password">Password:</label>
      <input type="password" name="pass" id="password" <?php if(isset($error2)){echo $error2;}elseif(isset($error4)){echo $error4;}elseif(isset($error6)){echo $error6;}else{echo 'placeholder = "Password"';} ?> >
    </p>
    <p class="login-submit">
      <button type="submit" class="login-button" name="submit">Login</button>
    </p>
    <p class="forgot-password"><a href="index.html">Forgot your password?</a></p>
  </form>
</body>
</html>
<?php 
      }
      elseif (isset ($_SESSION["dntc"]) == "tca") {
      header("location: ql_thanhvien.php");
        }
    elseif (isset ($_SESSION["dn"]) == "tcu") {
    header("location: N_user.php");
        }
    else {
    header("location: N_user.php");
        }
?>