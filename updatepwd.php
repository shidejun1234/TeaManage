
<?php

header("content-type:text/html;charset=utf-8");
if (! isset ( $_SESSION )) {
    session_start ();
}
if (! isset ( $_SESSION ['userdddName'] )) {
    header ( "location:login.php" );
}else{



?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>修改密码</title>
<!-- BOOTSTRAP STYLES-->
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLES-->
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<!-- CUSTOM STYLES-->
<link href="assets/css/custom.css" rel="stylesheet" />
<!-- GOOGLE FONTS-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans'
    rel='stylesheet' type='text/css' />
</head>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /> <br />
                <h2>修改密码</h2>
                <br />
            </div>
        </div>
        <div class="row ">
            <div
                class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong> 请输入密码信息 </strong>
                    </div>
                    <div class="panel-body">
                        <form role="form" action='updatepwddo.php' name="myForm" method='post'>
                            <br />
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <input type="password" class="form-control" placeholder="请输入原密码"
                                    name='password' id='password'/>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="请输入新密码"
                                    name='newPassword' id='newPassword'/>
                            </div>
                            <input type='buttom' class="btn btn-primary " id="sub" value='确认修改'/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

    <script>

        $("#sub").click(function(event) {
            var password = $("#password").val();
            var newPassword = $("#newPassword").val();
            var fm = new FormData();
            fm.append('password',password);
            fm.append('newPassword', newPassword);
            $.ajax(
            {
                url: 'updatepwddo.php',
                type: 'POST',
                data: fm,
                contentType: false, //禁止设置请求类型
                processData: false, //禁止jquery对DAta数据的处理,默认会处理
                //禁止的原因是,FormData已经帮我们做了处理
                success: function (result) {
                    //测试是否成功
                    //但需要你后端有返回值
                    alert(result);
                    window.location.href="index.php";
                }
            }
            );
        });



    </script>

</body>
</html>

<?php

}
?>