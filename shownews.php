<?php require_once 'base.php';?>



<?php
require_once 'dbconfig.php';
// 访问student
$query = "select * from news order by newsTime desc";
$result = mysql_query($query);
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
            <h2  align="center">新闻信息</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover"
                            id="dataTables-example">
                            <thead>
                             <tr>
                               <th><input type='checkbox' id="checkAll" name='checkAll'></th>
                               <th>ID</th>
                               <th>标题</th>
                               <th>内容简介</th>
                               <th>文章图片</th>
                               <th>创建时间</th>
                               <th>操作</th>
                           </tr>
                       </thead>
                       <tbody>
                          <?php
                          $line = 0;
                          while ($row = mysql_fetch_array($result)) {
                            $line ++;
                            $linecolor = $line % 2 == 0 ? 'odd gradeX' : 'even gradeC';
                            echo "<tr class='$linecolor'>";
                            echo "<td><input type='checkbox' name='box' id='box' value='".$row['id']."'></td>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td width='10%'>" . $row['newsTitle'] . "</td>";
                            echo "<td width='20%'>" . $row['newsJianjie'] . "</td>";
                            echo "<td width='20%'><img src='" . $row['newsImage'] . "' alt='' width='50%'></td>";
                            echo "<td>" . $row['newsTime'] . "</td>";
                            echo "<td><form action='editNews.php' method='post'><input type='hidden' name='editNews' type='text' value='".$row['id']."'><input type='submit' value='编辑' id='edit' class='btn btn-danger btn-sm shiny deletethis'>&nbsp;&nbsp;<input type='button' name='".$row['id']."' value='删除' id='delete' class='btn btn-danger btn-sm shiny deletethis'></form></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                    <input style="float: right;" type='button' value='删除选中' id='deletecheck' class='btn btn-danger btn-sm shiny'>
                </table>
            </div>

        </div>
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
  $('.deletethis[type=button][id=delete]').click(function(event) {
    var f=confirm("确定删除吗?");
    if (!f) {
      return;
    };
    $.ajax({
       type: "POST",
       url: "deletenews.php",
       data: {
          id:this.name

      },
      success: function(data){
          alert(data);
          window.location.reload();
      }
  });
});
  $('#checkAll').click(function(event) {
    var userids=this.checked;
  //获取name=box的复选框 遍历输出复选框
  $("input[name=box]").each(function(){
    this.checked=userids;
});
});
  $('#deletecheck').click(function(event) {
    var f=confirm("确定删除吗?");
    if (!f) {
      return;
    };
    var ids="";
    $("input[name='box']:checked").each(function() { // 遍历选中的checkbox


      ids+=this.value+",";
  });
    ids = ids.substring(0, ids.lastIndexOf(','));
    $.ajax({
       type: "POST",
       url: "deletenews.php",
       data: {
          id:ids

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
</body>
</html>

