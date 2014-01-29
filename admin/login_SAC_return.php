<?php

	if(!$_SERVER['REQUEST_METHOD'] == 'POST'){
	echo "非法操作";
	exit(0);	
	}
    require('../include/db_info.inc.php');

	$time = $_POST['time'];
	$sql = "UPDATE loginlog SET cheater = 1 WHERE time = '$time'";
	$result = mysql_query($sql) or die("ERROR");	
	header("Location: login_SAC.php");
	
?>
