<?php require_once 'base.php';?>
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
                <h2  align="center">添加新闻</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default" style="text-align: center;">
                    <form action="upload_file.php" method="post" onSubmit="return confirm();" enctype="multipart/form-data">
                        <br/>
                        <label>请输入标题:</label>
                        <br/>
                        <input type="text" name="newstitle" id="newstitle" size="100" />
                        <br/><br/>
                        <div class="btn btn-success fileinput-button">
                            <label for="file">上传缩略图</label>
                            <input type="file" name="file" id="file" />
                        </div><span id="stats"><text style="color:#ff0000;">(还未上传图片)</text></span>
                        <br/><br/>
                        <label>请选择内容简介:</label>
                        <br/>
                        <textarea name="newsjianjie" id="newsjianjie" rows="20" cols="100"></textarea>
                        <br/><br/>
                        <label>请输入文章内容（<text style="color: #ff0000;">如未正常显示，请刷新一下</text>）</label>
                        <br/>
                        <div class="fileinput-button">
                            <script id="newscontent" name="newscontent" type="text/plain" style="height:500px;"></script>
                        </div>
                        <br/><br/>
                        <input class="btn btn-success fileinput-button" type="submit" name="submit" value="确认提交" />
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
    <script type="text/javascript">
        $("#file").change(function(event) {
            var aa=$("#file").val();
            var arr = aa.split('\\');
            $("#stats").text("(已上传图片 图片名："+arr[arr.length-1]+")");
        });

        function confirm(){
            var newsImage=$("#file").val();
            var newstitle=$("#newstitle").val();
            var newsJianjie=$("#newsjianjie").val();
            if (newsImage=="") {
                alert("请上传缩略图！！！");
                return false;
            }else if(newstitle=="") {
                alert("请填写标题！！！");
                return false;
            }else if(newsJianjie=="") {
                alert("请填写简介！！！");
                return false;
            }else{
                return true;
            }

        }
    </script>
</body>
</html>

