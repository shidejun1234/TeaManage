<?php
if (! isset ( $_SESSION )) {
    session_start ();
}
unset($_SESSION["userdddName"]);
header("location:login.php");