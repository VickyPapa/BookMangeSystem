<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>图书搜索</title>
    <style type="text/css">
        body{
            font:14px/28px "微软雅黑";
        }
        .contact *:focus{outline :none;}
        .contact{
            width: 700px;
            height: auto;
            background: #f6f6f6;
            margin: 40px auto;
            padding: 10px;
        }
        .contact ul {
            width: 650px;
            margin: 0 auto;
        }
        .contact ul li{
            border-bottom: 1px solid #dfdfdf;
            list-style: none;
            padding: 12px;
        }
        .contact ul li label {
            width: 120px;
            display: inline-block;
            float: left;
        }
        .contact ul li input[type=text],.contact ul li input[type=password]{
            width: 220px;
            height: 25px;
            border :1px solid #aaa;
            padding: 3px 8px;
            border-radius: 5px;
        }
        .contact ul li input:focus{
            border-color: #c00;

        }
        .contact ul li input[type=text]{
            transition: padding .25s;
            -o-transition: padding  .25s;
            -moz-transition: padding  .25s;
            -webkit-transition: padding  .25s;
        }
        .contact ul li input[type=password]{
            transition: padding  .25s;
            -o-transition: padding  .25s;
            -moz-transition: padding  .25s;
            -webkit-transition: padding  .25s;
        }
        .contact ul li input:focus{
            padding-right: 70px;
        }
        .btn{
            position: relative;
            left: 300px;
        }
        .tips{
            color: rgba(0, 0, 0, 0.5);
            padding-left: 10px;
        }
        .tips_true,.tips_false{
            padding-left: 10px;
        }
        .tips_true{
            color: green;
        }
        .tips_false{
            color: red;
        }
    </style>
</head>

<body>

<div class="contact" >
    <form name="form1" action="2-2search1.php" method="post">
        <ul>
            <li>
                <label>书号：</label>
                <input type="text" name="bno" placeholder="请输入书号" />
            </li>
            <li>
                <label>类别：</label>
                <input type="text" name="category" placeholder="请输入类别" />
            </li>
            <li>
                <label>书名：</label>
                <input type="text" name="title" placeholder="请输入书名" />
            </li>
            <li>
                <label>出版社：</label>
                <input type="text" name="press" placeholder="请输入出版社" />
            </li>
            <li>
                <label>年份：</label>
                <input type="text" name="year" placeholder="请输入年份" />
            </li>
            <li>
                <label>作者：</label>
                <input type="text" name="author" placeholder="请输入作者" />
            </li>
            <li>
                <label>价格：</label>
                <input type="text" name="price" placeholder="请输入价格" />
            </li>
            <li>
                <label>数量：</label>
                <input type="text" name="total" placeholder="请输入数量" />
            </li>
            <li>
                <label>排序属性：</label>
                <input type="text" name="standard" placeholder="请输入排序属性" />
            </li>
            <li>
                <label>排序顺序：</label>
                <input type="text" name="order" placeholder="请输入顺序" />
            </li>
        </ul>
        <b class="btn"><input type="submit" value="搜索"/>
            <input type="reset" value="取消"/></b>
    </form>
</div>

</body>
</html>