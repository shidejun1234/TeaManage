<?php
require_once 'dbconfig.php';
header("content-type:text/html;charset=utf-8");
if (! isset ( $_SESSION )) {
  session_start ();
}
if (! isset ( $_SESSION ['userdddName'] )) {
  header ( "location:login.php" );
} else {
  $newsTitle=$_POST['newstitle'];
  $newsJianjie=$_POST['newsjianjie'];
  $newsContent=$_POST['newscontent'];
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

        $imageName=iconv("UTF-8", "gbk",$newsTitle.date("YmdHis",time())."_". $_FILES["file"]["name"]);
        move_uploaded_file($_FILES["file"]["tmp_name"],
          "upload/" . $imageName);
        //$protocol = empty($_SERVER['HTTP_X_CLIENT_PROTO']) ? 'http:' : $_SERVER['HTTP_X_CLIENT_PROTO'] . ':';
        $newsImage="https://".$_SERVER['SERVER_NAME']."/tea/upload/" .$newsTitle.date("YmdHis",time())."_". $_FILES["file"]["name"];
        date_default_timezone_set("Asia/Shanghai");
        $newsTime=date("Y/m/d H:i:s",time());
        $sql = "INSERT INTO news(id, newsTitle, newsJianjie, newsContent, newsImage, newsTime) VALUES (null,'$newsTitle','$newsJianjie','$newsContent','$newsImage','$newsTime')";
        if (mysql_query ( $sql )) {
          echo "添加成功！！！<br/>";
          echo "<a href='news.php'>返回</a>";
        } else {
          echo "添加失败！！！<br/>";
          echo "<a href='news.php'>返回</a>";
        }

    }
  }else{
    echo "请选择图片";
    echo "<a href='news.php'>返回</a>";
  }
}
?>