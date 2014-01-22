<?php
@session_start(); 
if(isset($_SESSION['user_id']))$tips='yes';
else $tips='no';
include "./contest/include/db_info.inc.php";
?>
