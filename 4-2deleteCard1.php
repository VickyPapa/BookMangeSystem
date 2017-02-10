<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>删除借书证</title>
</head>

<body>
<?php
include "connect.php";
$cno=$_POST["cno"];
$sql = "DELETE FROM card WHERE cno=$cno";
if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
    header("Location: 4-2deleteCard.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

</body>
</html>