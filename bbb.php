<?php
    include('dbconfig.php');
    $id=$_GET['id'];
    $sql="select * from news where id=$id";
    $query=mysql_query($sql);
    $rs=mysql_fetch_assoc($query);
    echo json_encode($rs,320);
?>