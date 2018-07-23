<?php
require_once 'dbconfig.php';
header("content-type:text/html;charset=utf-8");
if (! isset ( $_SESSION )) {
  session_start ();
}
if (! isset ( $_SESSION ['userdddName'] )) {
  header ( "location:login.php" );
} else {
  if ((($_FILES["imageTop"]["type"] == "image/gif")
    || ($_FILES["imageTop"]["type"] == "image/jpeg")
    || ($_FILES["imageTop"]["type"] == "image/pjpeg")
    || ($_FILES["imageTop"]["type"] == "image/png"))&&
    (($_FILES["imageHot"]["type"] == "image/gif")
      || ($_FILES["imageHot"]["type"] == "image/jpeg")
      || ($_FILES["imageHot"]["type"] == "image/pjpeg")
      || ($_FILES["imageHot"]["type"] == "image/png"))&&
    (($_FILES["imageDian"]["type"] == "image/gif")
      || ($_FILES["imageDian"]["type"] == "image/jpeg")
      || ($_FILES["imageDian"]["type"] == "image/pjpeg")
      || ($_FILES["imageDian"]["type"] == "image/png"))&&
    (($_FILES["imageCenter"]["type"] == "image/gif")
      || ($_FILES["imageCenter"]["type"] == "image/jpeg")
      || ($_FILES["imageCenter"]["type"] == "image/pjpeg")
      || ($_FILES["imageCenter"]["type"] == "image/png"))){
    if ($_FILES["imageTop"]["error"] > 0&&$_FILES["imageHot"]["error"] > 0&&$_FILES["imageDian"]["error"] > 0&&$_FILES["imageCenter"]["error"] > 0)
    {
      echo "出错";
    }
    else
    {

      //设置需要删除的文件夹
      $path = "imagesUpload/";
      if(is_dir($path)){
        //扫描一个文件夹内的所有文件夹和文件并返回数组
        $p = scandir($path);
        foreach($p as $val){
          //排除目录中的.和..
          if($val !="." && $val !=".."){
            unlink($path.$val);
          }
        }
      }

      $quan=$_POST['quan'];
      $wenhua=$_POST['wenhua'];
      $protocol = empty($_SERVER['HTTP_X_CLIENT_PROTO']) ? 'http:' : $_SERVER['HTTP_X_CLIENT_PROTO'] . ':';
      $imageTop=iconv("UTF-8", "gbk",$_FILES["imageTop"]["name"]);
      move_uploaded_file($_FILES["imageTop"]["tmp_name"],
        "imagesUpload/" . $imageTop);
      $imageTop=$protocol."//".$_SERVER['SERVER_NAME']."/tea/imagesUpload/" .$imageTop;

      $imageHot=iconv("UTF-8", "gbk",$_FILES["imageHot"]["name"]);
      move_uploaded_file($_FILES["imageHot"]["tmp_name"],
        "imagesUpload/" . $imageHot);
      $imageHot=$protocol."//".$_SERVER['SERVER_NAME']."/tea/imagesUpload/" .$imageHot;

      $imageDian=iconv("UTF-8", "gbk",$_FILES["imageDian"]["name"]);
      move_uploaded_file($_FILES["imageDian"]["tmp_name"],
        "imagesUpload/" . $imageDian);
      $imageDian=$protocol."//".$_SERVER['SERVER_NAME']."/tea/imagesUpload/" .$imageDian;

      $imageCenter=iconv("UTF-8", "gbk",$_FILES["imageCenter"]["name"]);
      move_uploaded_file($_FILES["imageCenter"]["tmp_name"],
        "imagesUpload/" . $imageCenter);
      $imageCenter=$protocol."//".$_SERVER['SERVER_NAME']."/tea/imagesUpload/" .$imageCenter;

      date_default_timezone_set("Asia/Shanghai");
      $imagesTime=date("Y/m/d h:i:s",time());
      $sql = "INSERT INTO `images`(`id`, `imageTop`, `wenhua`, `imageHot`, `imageDian`, `imageCenter`, `quan`, `imagesTime`) VALUES (1,'$imageTop','$wenhua','$imageHot','$imageDian','$imageCenter','$quan','$imagesTime')";
      if (mysql_query ( $sql )) {
        echo "添加成功！！！<br/>";
        echo "<a href='images.php'>返回</a>";
      } else {
        $sql2 = "UPDATE `images` SET `imageTop`='$imageTop',`wenhua`='$wenhua',`imageHot`='$imageHot',`imageDian`='$imageDian',`imageCenter`='$imageCenter',`quan`='$quan',`imagesTime`='$imagesTime' WHERE id=1";
        if (mysql_query ( $sql2 )) {
          echo "修改成功！！！<br/>";
          echo "<a href='images.php'>返回</a>";
        }else{
          echo "修改成功！！！<br/>";
          echo "<a href='images.php'>返回</a>";
        }
      }

    }
  }else{
    echo "请选择图片";
    echo "<a href='images.php'>返回</a>";
  }
}
?>