<?php require_once 'base.php';?>

<?php

if (! isset ( $_SESSION )) {
    session_start ();
}
if (! isset ( $_SESSION ['userdddName'] )) {
    header ( "location:login.php" );
}

?>

<?php
require_once 'dbconfig.php';
// 访问student
$query = "select * from images";
$result = mysql_query($query);
?>

<style>
    .fileinput-button {
        position: relative;
        display: inline-block;
        overflow: hidden;
    }

    .fileinput-button input{
        position:absolute;
        right: 0px;
        top: 0px;
        opacity: 0;
        -ms-filter: 'alpha(opacity=0)';
        font-size: 200px;
    }


</style>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2  align="center">修改图片</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default" style="text-align: center;">
                    <form action="upload_image.php" method="post" name="myForm" enctype="multipart/form-data">
                        <?php

                        $row = mysql_fetch_array($result);

                        ?>
                        <br/>
                        <text>修改顶部图片</text>
                        <br/>
                        <img src="<?=$row['imageTop']?>" width="20%" style="border: 1px solid #000000;">
                        <br/><br/>
                        <div class="btn btn-success fileinput-button">
                            <label for="file">修改图片</label>
                            <input type="file" name="imageTop" id="imageTop" onchange="chan(this)"/>
                        </div>
                        <br/><br/>
                        <text>修改品牌文化描述（<text style="color: #ff0000;">&amp;emsp;</text>相当于一个中文空格）</text>
                        <br/>
                        <textarea name="wenhua" id="wenhua" rows="8" cols="40" onchange="edit(this)"><?=$row['wenhua']?></textarea>
                        <br/><br/>
                        <text>修改热销产品图片</text>
                        <br/>
                        <img src="<?=$row['imageHot']?>" width="20%" style="border: 1px solid #000000;">
                        <br/><br/>
                        <div class="btn btn-success fileinput-button">
                            <label for="file">修改图片</label>
                            <input type="file" name="imageHot" id="imageHot" onchange="chan(this)"/>
                        </div>
                        <br/><br/>
                        <text>修改门店实况图片</text>
                        <br/>
                        <img src="<?=$row['imageDian']?>" width="20%" style="border: 1px solid #000000;">
                        <br/><br/>
                        <div class="btn btn-success fileinput-button">
                            <label for="file">修改图片</label>
                            <input type="file" name="imageDian" id="imageDian" onchange="chan(this)"/>
                        </div>
                        <br/><br/>
                        <text>修改中间图片</text>
                        <br/>
                        <img src="<?=$row['imageCenter']?>" width="20%" style="border: 1px solid #000000;">
                        <br/><br/>
                        <div class="btn btn-success fileinput-button">
                            <label for="file">修改图片</label>
                            <input type="file" name="imageCenter" id="imageCenter" onchange="chan(this)"/>
                        </div>
                        <br/><br/>
                        <text>修改优惠券数值</text>
                        <br/>
                        <input type="text" name="quan" id="quan" value="<?=$row['quan']?>" style="text-align:center;" onchange="edit(this)">
                    </form>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>

    </div>

</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    function chan(e){
        var img = e.files[0];
        var name=e.name;
        var fm = new FormData();
        fm.append('fileName',name);
        fm.append('file', img);
        $.ajax(
        {
            url: 'editimage.php',
            type: 'POST',
            data: fm,
            contentType: false, //禁止设置请求类型
            processData: false, //禁止jquery对DAta数据的处理,默认会处理
            //禁止的原因是,FormData已经帮我们做了处理
            success: function (result) {
                //测试是否成功
                //但需要你后端有返回值
                alert(result);
                window.location.reload();
            }
        }
        );
    };
    function edit(e){
        $.ajax(
        {
            url: 'editimage.php',
            type: 'POST',
            data: {
                edit:e.value,
                fileName:e.name
            },
            success: function (result) {
                //测试是否成功
                //但需要你后端有返回值
                alert(result);
                window.location.reload();
            }
        }
        );
    }
</script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>
</body>
</html>

