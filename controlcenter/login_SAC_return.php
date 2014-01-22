<?php

	if(!$_SERVER['REQUEST_METHOD'] == 'POST'){
	echo "非法操作";
	exit(0);
	
	}

@session_start();
//if($_SESSION['user_id'] != "Volunteer")
//echo "抱歉您不是志愿者，无法使用送球系统。";




    require_once('../include/db_info.inc.php');

	$time = $_POST['time'];
	//更改指定题号的solution中balloon参数
	$sql = "UPDATE loginlog SET cheater = 1 WHERE time = '$time'";
	$result = mysql_query($sql) or die("ERROR");
	
	header("Location: login_SAC.php");
	
?>
