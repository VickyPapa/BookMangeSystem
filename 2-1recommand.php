<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>热门推荐</title>
</head>

<body>

<?php
include "connect.php";
$sql = "select * from book
order by (total-stock) desc limit 10";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
        echo "<br> title: ". $row["title"];
    }
}
?>

</body>
</html>