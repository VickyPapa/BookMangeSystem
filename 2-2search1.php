<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>图书搜索</title>
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
$standard=$_POST["standard"];
$order=$_POST["order"];
$sql = "select * from book
where ";
if($bno != null){
    $temp = "bno='$bno' and ";
    $sql = $sql.$temp;
}
if($category != null){
    $temp = "category='$category' and ";
    $sql = $sql.$temp;
}
if($title != null){
    $temp = "title='$title' and ";
    $sql = $sql.$temp;
}
if($press != null){
    $temp = "press='$press' and ";
    $sql = $sql.$temp;
}
if($year != null){
    $temp = "year=$year and ";
    $sql = $sql.$temp;
}
if($author != null){
    $temp = "author='$author' and ";
    $sql = $sql.$temp;
}
if($price != null){
    $temp = "price=$price and ";
    $sql = $sql.$temp;
}
if($total != null){
    $temp = "total=$total and ";
    $sql = $sql.$temp;
}
$sql=trim($sql,"and ");
if($order != null){
    $temp = "order by ";
    $sql = $sql.$temp;
    $temp = $standard;
    $sql = $sql.$temp;
    $sql = str_replace("书号","bno ",$sql);
    $sql = str_replace("类别","category ",$sql);
    $sql = str_replace("书名","title ",$sql);
    $sql = str_replace("出版社","press ",$sql);
    $sql = str_replace("年份","year ",$sql);
    $sql = str_replace("作者","author ",$sql);
    $sql = str_replace("价格","price ",$sql);
    $sql = str_replace("数量","total ",$sql);
    if($standard == "升序"){
        $temp = "asc ";
        $sql = $sql.$temp;
    }
    if($standard == "降序"){
        $temp = "desc ";
        $sql = $sql.$temp;
    }
}

$sql = $sql.";";
//echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
        echo "<br> bno: ". $row["bno"]. " - category: " . $row["category"]. " - title: ". $row["title"]. " - press: " . $row["press"]. " - year: " . $row["year"]. " - author: " . $row["author"]. " - price: " . $row["price"]. " - total: " . $row["total"]. " - stock: " . $row["stock"];
    }
}
?>

</body>
</html>