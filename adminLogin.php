<?php
session_start(); //全局变量——用户名和密码
$_SESSION['name']=$_POST["fname"];
$_SESSION['password']=$_POST["password"];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>图书管理系统登录页面</title>
</head>
<body>
<?php
include "connect.php";
if (!$conn->connect_error) {
    header("Location: admin.php");
}
?>
</body>
</html>