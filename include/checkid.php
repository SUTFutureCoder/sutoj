<?php
	require("db_info.inc.php");
	$_GET['id'] = mysql_real_escape_string($_GET['id']);
	$sql="SELECT team_number1, team_number2, team_number3 FROM users WHERE team_number1 = '$_GET[id]' OR team_number2 = '$_GET[id]' OR team_number3 = '$_GET[id]'";
	$query=mysql_query($sql);
	if(is_array(mysql_fetch_array($query))){
		echo "<a style='color:red;'>学号". $_GET['id'] ."已存在</a>";		
	}
?>
