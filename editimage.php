<?php
require_once 'dbconfig.php';
header("content-type:text/html;charset=utf-8");
if (! isset ( $_SESSION )) {
  session_start ();
}
if (! isset ( $_SESSION ['userdddName'] )) {
  header ( "location:login.php" );
} else {
  if (isset($_POST['edit'])&&isset($_POST['fileName'])) {
        $edit=$_POST['edit'];
        $fileName=$_POST['fileName'];
        date_default_timezone_set("Asia/Shanghai");
        $imagesTime=date("Y/m/d H:i:s",time());
        $sql = "UPDATE `images` SET `$fileName`='$edit',`imagesTime`='$imagesTime' WHERE id=1";
        if (mysql_query ( $sql )) {
          echo "修改成功！！！";
        }else{
          echo "修改成功！！！";
        }
  }else{
    if ((($_FILES["file"]["type"] == "image/gif")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/png"))){
    if ($_FILES["file"]["error"] > 0)
    {
      echo "Error: " . $_FILES["file"]["error"] . "<br />";
    }
    else
    {
        $fileName=$_POST['fileName'];
        //$protocol = empty($_SERVER['HTTP_X_CLIENT_PROTO']) ? 'http:' : $_SERVER['HTTP_X_CLIENT_PROTO'] . ':';
        $imgName=$_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"],
        "imagesUpload/" . iconv("UTF-8", "gbk",$_FILES["file"]["name"]));
        $imgName="https://".$_SERVER['SERVER_NAME']."/tea/imagesUpload/" .$imgName;
        date_default_timezone_set("Asia/Shanghai");
        $imagesTime=date("Y/m/d H:i:s",time());
        $sql = "UPDATE `images` SET `$fileName`='$imgName',`imagesTime`='$imagesTime' WHERE id=1";
        if (mysql_query ( $sql )) {
          echo "修改成功！！！";
        }else{
          echo "修改成功！！！";
        }

    }
  }else{
    echo "请选择图片";
  }
  }
}
?>


