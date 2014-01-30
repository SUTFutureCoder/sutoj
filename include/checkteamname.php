<?php
	require("db_info.inc.php");
	$_GET['id'] = mysql_real_escape_string($_GET['id']);
	$sql="SELECT nick FROM users WHERE nick = '$_GET[id]'";
	$query=mysql_query($sql);
	if(is_array(mysql_fetch_array($query))){
		echo "<a style='color:red;'>队名\"". $_GET['id'] ."\"已存在</a>";		
	}
?>
