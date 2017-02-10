<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>添加借书证</title>
</head>

<body>
<?php
include "connect.php";
$cno=$_POST["cno"];
$cname=$_POST["cname"];
$department=$_POST["department"];
$type=$_POST["type"];
$sql = "INSERT INTO card(cno, cname, department, type)
VALUES ('".$cno."', '".$cname."', '".$department."', '".$type."')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
    header("Location: 4-1addCard.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

</body>
</html>