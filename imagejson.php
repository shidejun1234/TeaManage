<?php
    include('dbconfig.php');
    $sql="SELECT * FROM `images`";
    $query=mysql_query($sql);
    $rs=mysql_fetch_assoc($query);
    echo json_encode($rs,320);
?>