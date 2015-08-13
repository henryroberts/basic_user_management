<?php
ob_start();
session_start();
include_once("connect.php"); // triệu gọi file kết nối
// kiểm tra các session
if(isset($_SESSION["user"]) && isset($_SESSION["pass"]) && isset($_SESSION["dntc"]) == "tca"){
	?>
<script>
function xoatv(){
var conf = confirm("bạn có chắc chắn muốn xóa thành viên này không?");
return conf;
}
</script>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
    table tr th a {color: #ffffff; text-decoration: none;}
    table tr th a:hover {color: #ffff00;}
	table tr td a {text-decoration:none; color:#024457;}
	table tr td a:hover {text-decoration:underline;}
</style>
</head>

<body>
    <h1><?php echo "Xin chào  <span style=\"color:#167F92; text-transform: uppercase;\">".$_SESSION["user"]."</span>
    <a href=\"logout.php\"><span style=\"float:right; text-decoration: none; color:#167F92; \">Đăng xuất</span></a> "?></h1>
<form method="get">
<table class="responstable">
  
  <tr>
      <th colspan="3">Quản lý thành viên</th>
      <th colspan="3" style="text-align: center"><a href="themmoi_thanhvien.php">Thêm mới một thành viên</a></th>
  </tr>
  <tr>
      <th>ID Thành Viên</th>
      <th style="text-align: center">Tên tài khoản</th>
      <th style="text-align: center">Mật khẩu</th>
      <th style="text-align: center">Quyền truy cập</th>
      <th style="text-align: center">Sửa</th>
      <th style="text-align: center">Xóa</th>
  </tr>
  <?php
        //lọc ra tất cả thông tin về thành viên
		$sql = "SELECT * FROM `thanh_vien`";
        $query = mysql_query($sql);
        while ($row = mysql_fetch_array($query)) {
            ?>
            <tr>
             <td><?php echo $row["id_thanhvien"] ?></td>
             <td><?php echo $row["tai_khoan"] ?></td>
             <td><?php echo $row["mat_khau"] ?></td>
             <td style="text-align: center"><?php echo $row["quyen_truy_cap"] ?></td>
             <td style="text-align: center"><a href="sua.php?id_tv=<?php echo $row["id_thanhvien"]; ?>">sửa</a></td>
             <td style="text-align: center"><a onClick="return xoatv();" href="xoa.php?id_tv=<?php echo $row["id_thanhvien"]; ?>">Xóa</a></td>
           </tr>
           <?php 
        }
  
  ?>
  
</table>
</form>
</body>
</html>
<?php
	}
	else{
		header("location: index.php");
		}
?>
