<?php
require_once 'dbconfig.php';
header("content-type:text/html;charset=utf-8");
if (! isset ( $_SESSION )) {
    session_start ();
}
if (! isset ( $_SESSION ['userdddName'] )) {
    header ( "location:login.php" );
}else{
    //取表单数据
$id = $_POST['id'];
$stats = $_POST['stats'];

if ($stats=="已看") {
    $stats="1";
}else{
    $stats="0";
}

//sql语句中字符串数据类型都要加引号，数字字段随便
$sql = "UPDATE `person` SET `stats`='$stats' WHERE id=$id";
//exit($sql);

if ($stats=="1") {
    $stats="已看";
}else{
    $stats="未看";
}

if(mysql_query($sql)){
    echo "修改成功，已经修改为".$stats."！！！";
}else{
    echo "修改失败！！！";
}
}



