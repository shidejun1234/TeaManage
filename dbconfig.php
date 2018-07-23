<?php
    header("Content-type:text/html;charset=utf-8");
    $dbname='';
    $host='';
    $user='';
    $password='';
    $link=@mysql_connect($host, $user, $password);
    if (!$link) {
        die("错误：".mysql_error($link));
    }
    if (!mysql_select_db($dbname, $link)) {
        die("错误：".mysql_error($link));
    }
    mysql_query("set names utf8");
?>