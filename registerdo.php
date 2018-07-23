<?php
include('dbconfig.php');
header("content-type:text/html;charset=utf-8");
//取表单数据
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = sha1($password);

//sql语句中字符串数据类型都要加引号，数字字段随便
$sql = "INSERT INTO user(id, username, password,stats) VALUES (null,'$username','$password2',0)";
//exit($sql);

if(mysql_query($sql)){
	echo "注册成功！！！<br/>";
	echo "<a href='login.php'>去登录</a>";
}else{
	echo "注册失败！！！<br/>";
	echo "<a href='register.php'>重注册</a>";
}


