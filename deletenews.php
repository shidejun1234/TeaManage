<?php
require_once 'dbconfig.php';
header("content-type:text/html;charset=utf-8");
//取表单数据
$id = $_POST['id'];
//sql语句中字符串数据类型都要加引号，数字字段随便
$sql = "DELETE FROM `news` WHERE id in ($id)";
//exit($sql);
if(mysql_query($sql)){
	echo "删除成功！！！";
}else{
	echo "删除失败！！！";
}


