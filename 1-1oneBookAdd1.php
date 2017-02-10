<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>单本入库</title>
</head>

<body>

<?php
include "connect.php";
$bno=$_POST["bno"];
$category=$_POST["category"];
$title=$_POST["title"];
$press=$_POST["press"];
$year=$_POST["year"];
$author=$_POST["author"];
$price=$_POST["price"];
$total=$_POST["total"];
$sql = "INSERT INTO book(bno, category, title, press, year, author, price, total, stock)
VALUES ('".$bno."', '".$category."', '".$title."', '".$press."', $year, '".$author."', $price, $total, $total)";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
    header("Location: 1-1oneBookAdd.php");
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

</body>
</html>