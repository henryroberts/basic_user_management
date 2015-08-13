<?php
ob_start();
session_start();
include_once("connect.php"); //triệu gọi file kết nối
// kiểm tra session
if(isset($_SESSION["user"]) && isset($_SESSION["pass"]) && isset($_SESSION["dn"]) == "tcu"){
	?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thành viên</title>
<link href="css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1><?php echo "Xin chào  <span style=\"color:#167F92; text-transform: uppercase;\">".$_SESSION["user"]."</span><a href=\"logout.php\"><span style=\"float:right; text-decoration: none; color:#167F92; \">Đăng xuất</span></a> "?></h1>
<p style="color:#167F92">Thông báo: Bạn không phải admin nên bạn không có quyền thêm sửa xóa thành viên</p>
<table class="responstable">
  <tr>
      <th>ID Thành Viên</th>
      <th style="text-align: center">Tên tài khoản</th>
      <th style="text-align: center">Mật khẩu</th>
  </tr>
  <?php
        /* Lọc ra những người có trong db có quyền truy cập khác 2. có nghĩa là lọc ra thành viên. vì đây là trang thành viên.
         Để đảm bảo bảo mật thì thành viên không được xem thông tin về admin */
		$sql = "SELECT * FROM `thanh_vien` WHERE `quyen_truy_cap` != 2";
        $query = mysql_query($sql);
        while ($row = mysql_fetch_array($query)) {
            ?>
            <tr>
             <td><?php echo $row["id_thanhvien"] ?></td>
             <td><?php echo $row["tai_khoan"] ?></td>
             <td><?php echo $row["mat_khau"] ?></td>
           </tr>
           <?php 
        }
  
  ?>
</table>
</body>
</html>
<?php
	}
	else{
		header("location: index.php");
		}
?>