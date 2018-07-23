<?php require_once 'base.php';?>


<?php
require_once 'dbconfig.php';
// 访问student
$query = "select * from person order by time desc";
$result = mysql_query($query);
if (! isset ( $_SESSION )) {
  session_start ();
}
$userName="";
if (isset ( $_SESSION ['userdddName'] )) {
    $userName = $_SESSION ['userdddName'];
    }
if($userName!='sysnaica'){
  header ( "location:news.php" );
}else{

?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2  align="center">客户基本信息</h2>
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
                 <th>姓名</th>
                 <th>手机号码</th>
                 <th>留言</th>
                 <th>留言时间</th>
                 <th>状态</th>
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
                echo "<td>" . $row['uName'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['liuyan'] . "</td>";
                echo "<td>" . $row['time'] . "</td>";
                $stats1="";
                if($row['stats']=="1"){
                  $stats1="checked";
                }
                $stats2="";
                if($row['stats']=="0"){
                  $stats2="checked";
                }
                echo "<td><div class='form-group input-group'>
                <div align='left'>&nbsp;&nbsp;
                  <input type='radio' id='stats' placeholder='状态' ".$stats1." name='".$row['id']."' value='已看'/>已看 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' id='stats'
                  placeholder='状态' ".$stats2." name='".$row['id']."' value='未看'/>未看
                </div>
              </div></td>";
              echo "<td><input type='button' name='".$row['id']."' value='删除' id='delete' class='btn btn-danger btn-sm shiny deletethis'></td>";
              echo "</tr>";
            }
            ?>
          </tbody>
          <input style="float: right;margin-right: 3%;" type='button' value='删除选中' id='deletecheck' class='btn btn-danger btn-sm shiny'>
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
  $('input[type=radio]').change(function(event) {
    $.ajax({
     type: "POST",
     url: "stats.php",
     data: {
      id:this.name,
      stats:this.value

    },
    success: function(data){
      alert(data);
      window.location.reload();
    }
  });
  });
  $('.deletethis[type=button]').click(function(event) {
    var f=confirm("确定删除吗?");
    if (!f) {
      return;
    };
    $.ajax({
     type: "POST",
     url: "delete.php",
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
     url: "delete.php",
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

<?php

}

?>

