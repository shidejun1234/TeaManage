<?php
if (! isset ( $_SESSION )) {
	session_start ();
}
if (isset ( $_SESSION ['userdddName'] )) {
    $userName = $_SESSION ['userdddName'];
// 计算当前文件名
    $url = $_SERVER ['PHP_SELF'];
    $start = strrpos ( $url, '/' );
    $end = strrpos ( $url, '.' );
    $menuName = substr ( $url, $start + 1, $end - $start - 1 );
    ?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>搞茶后台系统</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- MORRIS CHART STYLES-->
        <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->

        <script type="text/javascript" src="js/laydate.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-cls-top " role="navigation"
            style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span> <span
                class="icon-bar"></span> <span class="icon-bar"></span> <span
                class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">搞茶后台系统</a>
        </div>
        <div
        style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
        用户名：<?=$userName?>&nbsp;&nbsp;<a href="updatepwd.php" class="btn btn-danger square-btn-adjust">修改密码</a>&nbsp;&nbsp;<a href="register.php" class="btn btn-danger square-btn-adjust">用户注册</a>&nbsp;&nbsp;<a href="loginout.php" class="btn btn-danger square-btn-adjust">退出登录</a>
    </div>
</nav>
<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center"><img src="assets/img/find_user.png"
                class="user-image img-responsive" /></li>
                <li><a <?="images"==$menuName?"class='active-menu'":""?>
                    href="images.php"><i class="glyphicon glyphicon-picture fa-3x"></i> 修改图片</a></li>
                    <li><a <?="news"==$menuName?"class='active-menu'":""?>
                        href="news.php"><i class="glyphicon glyphicon-credit-card fa-3x"></i> 添加新闻</a></li>
                        <li><a <?="shownews"==$menuName?"class='active-menu'":""?>
                            href="shownews.php"><i class="glyphicon glyphicon-list-alt fa-3x"></i> 文章信息</a></li>
                            <?php
                            if($userName=='sysnaica'){
                                echo "<li><a ";
                                echo "index"==$menuName?"class='active-menu'":"";
                                echo " href='index.php'><i class='glyphicon glyphicon-user fa-3x'></i> 客户留言</a></li>";
                            }else{
                                echo "";
                            }
                            ?>
                            </ul>
                        </div>
                    </nav>
                    <!-- /. NAV SIDE  -->
                    <?php
                }else{
                    header ( "location:login.php" );
                }

                ?>
