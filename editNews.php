<?php require_once 'base.php';?>

<?php
require_once 'dbconfig.php';
// 访问student
$id=$_POST['editNews'];
$query = "select * from news where id=$id";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
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
                <h2  align="center">修改新闻</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default" style="text-align: center;">
                    <form enctype="multipart/form-data">
                    <input type='hidden' id="newsid" name='newsid' type='text' value="<?=$row['id']?>">
                        <br/>
                        <label>请输入标题:</label>
                        <br/>
                        <input type="text" name="newstitle" id="newstitle" size="20" value="<?=$row['newsTitle']?>"/>
                        <br/><br/>
                        <label>请选择内容简介:</label>
                        <br/>
                        <textarea name="newsjianjie" id="newsjianjie" rows="5" cols="20"><?=$row['newsJianjie']?></textarea>
                        <br/><br/>
                        <label>请输入文章内容（<text style="color: #ff0000;">如未正常显示，请刷新一下</text>）</label>
                        <br/>
                        <div class="fileinput-button">
                            <script id="newscontent" name="newscontent" type="text/plain"><?=$row['newsContent']?></script>
                        </div>
                        <br/><br/>
                        <input class="btn btn-success fileinput-button" type="button" id="submit" name="submit" value="确认修改" />
                        <br/><br/>
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
    $("#submit").click(function(event) {
        var newsid=$("#newsid").val();
        var newstitle=$("#newstitle").val();
        var newsjianjie=$("#newsjianjie").val();
        var newscontent=ue.getContent();
       $.ajax({
     type: "POST",
     url: "editNewsdo.php",
     data: {
      newsid:newsid,
      newstitle:newstitle,
      newsjianjie:newsjianjie,
      newscontent:newscontent
    },
    success: function(data){
      alert(data);
      window.location.reload();
    }
  });
    });
</script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>
<script type="text/javascript" src="ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('newscontent');
    </script>
</body>
</html>

