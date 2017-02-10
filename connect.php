<?php
$servername = "localhost:3306";
$username = $_SESSION['name'];
$password = $_SESSION['password'];

// 创建连接
$conn = @new mysqli($servername, $username, $password);

// 检测连接
if ($conn->connect_error) {
    //echo"连接数据库失败，请检查用户名或密码<br/>";
    echo "<a href='index.php'>返回登陆界面</a>";
}
else{
    mysqli_select_db($conn,'bookmanage');
    //echo"连接数据库成功<br/>";
}

?>