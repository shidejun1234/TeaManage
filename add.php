<?php
include('dbconfig.php');
$uName=$_POST['uName'];
$phone=$_POST['phone'];
$liuyan=$_POST['liuyan'];
$time=$_POST['time'];
if($uName==""){
    echo "别秀了！";
    exit;
}
$sql2="select id from person where uName='$uName' and phone='$phone' and stats='0'";
$result=mysql_query($sql2);
$row = mysql_fetch_array($result);
if ($row!=null) {
    echo "姓名为".$uName."，手机号码为".$phone."的客户已经留言过了，请耐心等待我们与您沟通";
}else{
    $sql="INSERT INTO `person`(`uName`, `phone`, `liuyan`, `time`, `stats`) VALUES ('$uName','$phone','$liuyan','$time','0')";
    $query=mysql_query($sql);
    if ($query) {
        echo "留言成功";
    }else{
        echo "留言失败";
    }
}
?>