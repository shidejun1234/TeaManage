<?php
require_once 'dbconfig.php';
//取表单数据
$newsid = $_POST['newsid'];
$newstitle = $_POST['newstitle'];
$newsjianjie = $_POST['newsjianjie'];
$newscontent = $_POST['newscontent'];
date_default_timezone_set("Asia/Shanghai");
$newsTime=date("Y/m/d H:i:s",time());
//sql语句中字符串数据类型都要加引号，数字字段随便
$sql = "UPDATE `news` SET `newsTitle`='$newstitle',`newsJianjie`='$newsjianjie',`newsContent`='$newscontent',`newsTime`='$newsTime' WHERE id='$newsid'";
//exit($sql);
if(mysql_query($sql)){
    echo "修改成功！！！";
}else{
    echo "修改失败！！！";
}