<?php
    include('dbconfig.php');
    $sql="select id,newsTitle,newsJianjie,newsContent,newsImage from news order by newsTime desc";
    $query=mysql_query($sql);
    while($rs=mysql_fetch_array($query)){
        $output[]=array('id'=>$rs['id'],'newsTitle'=>$rs['newsTitle'],'newsJianjie'=>$rs['newsJianjie'],'newsContent'=>$rs['newsContent'],'newsImage'=>$rs['newsImage']);
    }
    echo json_encode($output,320);
?>