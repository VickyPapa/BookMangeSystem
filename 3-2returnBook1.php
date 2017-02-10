<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>还书</title>
</head>

<body>
<?php
include "connect.php";
$cno=$_POST["cno"];
$bno=$_POST["bno"];
$sql = "select * from borrow
where cno=$cno and return_date is null";
$result = $conn->query($sql);
echo "该用户借书记录如下：";
if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
        echo "<br> cno: ". $row["cno"]. " - bno: " . $row["bno"]. " - borrow_date: ". $row["borrow_date"]. " - return_date: " . $row["return_date"]. " - ano: " . $row["ano"];
    }
} else {
    //echo "0 results";
}
$sql = "select bno from borrow
where bno=$bno and return_date is null";
$result = mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
if($count=="0"){
    echo "<br>归还失败，该用户没有借过该书";
}
else{
    $sql = "update book set stock=stock+1
where bno=$bno";
    mysqli_query($conn,$sql);
    $sql = "update borrow set return_date=NOW()
where bno=$bno and cno=$cno";  //这里0可以改成变量
    mysqli_query($conn,$sql);
    echo "<br>归还成功";
}
//$sql = "case
//when $subsql > 0 then $subsql1
//else $subsql2
//end
//";
//$sql = "update book set stock=stock-1
//where bno=$bno and stock>0";
//$sql = "select date_add(min(borrow_date), interval 1 month) from borrow
//where bno=$bno";
?>

</body>
</html>