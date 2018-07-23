<?php
require_once 'dbconfig.php';
if (! isset ( $_SESSION )) {
  session_start ();
}
$userName="";
if (isset ( $_SESSION ['userdddName'] )) {
    $userName = $_SESSION ['userdddName'];
}
$password = $_POST['password'];
$newPassword = $_POST['newPassword'];
if(strlen($newPassword)<6){
    echo "密码最短得6位";
    exit;
}
$password2 = sha1($password);
$newPassword2 = sha1($newPassword);
$sql = "SELECT `id` FROM `user` WHERE username='$userName' and password='$password2'";
//$sql = "UPDATE `user` SET `password`='$newPassword2' WHERE password='$password2' and username='$userName'";

$result=mysql_query($sql);
if($row=mysql_fetch_array($result)){
    $id=$row['id'];
    $sql2 = "UPDATE `user` SET `password`='$newPassword2' WHERE id=$id";
    if(mysql_query($sql2)){
        echo "修改成功！！！";
    }else{
        echo "修改失败！！！";
    }
}else{
    echo "原密码错误！！！";
}



?>
