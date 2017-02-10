<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
include "connect.php";
/**
 * $splitChar 字段分隔符
 * $file 数据文件文件名
 * $table 数据库表名
 * $conn 数据库连接
 * $fields 数据对应的列名
 * $insertType 插入操作类型，包括INSERT,REPLACE
 */
function loadTxtDataIntoDatabase($splitChar,$file,$table,$conn,$fields=array(),$insertType='INSERT'){
    if(empty($fields)) $head = "{$insertType} INTO `{$table}` VALUES('";
    else $head = "{$insertType} INTO `{$table}`(`".implode('`,`',$fields)."`) VALUES('";  //数据头
    $end = "')";
    $sqldata = trim(file_get_contents($file));
    //$sqldata = trim($sqldata,'()');
    if(preg_replace('/\s*/i','',$splitChar) == '') {
        $splitChar = '/(\w+)(\s+)/i';
        $replace = "$1','";
        $specialFunc = 'preg_replace';
    }else {
        $splitChar = $splitChar;
        $replace = "','";
        $specialFunc = 'str_replace';
    }
    //处理数据体，二者顺序不可换，否则空格或Tab分隔符时出错
    //$sqldata = preg_replace('/(\s*)(\n+)(\s*)/i',')'),('',$sqldata);  //替换换行
    $sqldata = str_replace("(","",$sqldata);
    $sqldata = str_replace(")","",$sqldata);
    //$sqldata = preg_replace('/\(.*?\)/', '', $sqldata);
    $sqldata = preg_replace('/(\s*)(\n+)(\s*)/i','\'),(\'',$sqldata);  //替换换行
    $sqldata = $specialFunc($splitChar,$replace,$sqldata);        //替换分隔符
    $query = $head.$sqldata.$end;  //数据拼接
    //echo $query;
    if(mysqli_query($conn,$query)) return array(true);
    else {
        return array(false,mysqli_error($conn),mysqli_errno($conn));
    }
}
$splitChar = ', ';  //分隔符是一个逗号加空格
$file = $_POST["file"];
//$fields = array('bno', 'category', 'title', 'press', 'year', 'author', 'price', 'total', 'stock');
$fields = array('bno', 'category', 'title', 'press', 'year', 'author', 'price', 'total');
$table = 'book';
$result = loadTxtDataIntoDatabase($splitChar,$file,$table,$conn,$fields);
mysqli_query($conn,"UPDATE book SET stock=total
WHERE stock is NULL");
if (array_shift($result)){
    //echo 'Success!<br/>';
    header("Location: 1-2moreBookAdd.php");
}else {
    //echo 'Failed!--Error:'.array_shift($result).'<br/>';
}


?>
</body>
</html>