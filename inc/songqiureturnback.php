<?php

	if(!$_SERVER['REQUEST_METHOD'] == 'POST'){
	echo "非法操作";
	exit(0);
	
	}

@session_start();
//if($_SESSION['user_id'] != "Volunteer")
//echo "抱歉您不是志愿者，无法使用送球系统。";




    require('../include/db_info.inc.php');
    require('turnid.php');

	$id = $_POST['id'];
	//更改指定题号的solution中balloon参数
	$sql = "UPDATE solution SET balloon = 0 WHERE solution_id = $id";
	$result = mysql_query($sql) or die("ERROR");
	
	header("Location: songqiunew.php");
	
?>
