<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>控制中心</title>
	<link rel=stylesheet href='../css/sutoj.css' type='text/css'>
</head>
<body>
<?php
require("../include/user.class.php");
@session_start();
if($_SESSION['U'] -> getU_id() != "admin"){
echo "非法操作";
exit(0);
}

    require('../include/db_info.inc.php');
	?>
<div class="marquee" ><marquee scrollamount="2" width=100% scrolldelay="40" onmouseover="javascript:this.stop();" onmouseout="javascript:this.start();"><b style="margin-right:20px"><br/>
<a href="#" style="color:red"><?PHP

echo "抄袭监视SAC系统";
?>
</a><br/>
</b></marquee></div>
<?php	
		
		

	$sql = "SELECT * FROM sim ORDER BY sim DESC";
	$result = mysql_query($sql);
	echo "<div style=\"left:10px;float:left;\">";
	echo "<h1 style=\"color:red\">抄袭作弊详情</h1>";

	echo "<table border='1'>
	
	<tr>
	<th>队伍号</th>
	<th>被抄袭队伍号</th>
	<th>相似度</th>
	<th>抄袭源码</th>
	<th>被抄袭源码</th>
	
	</tr>
	";
	while($row = mysql_fetch_array($result))
	{	
		$s_id = $row['s_id'];
		$sim_s_id = $row['sim_s_id'];
		$sql2 = "SELECT * FROM solution WHERE solution_id = '$s_id'";
		$result2 = mysql_query($sql2);
		$row2 = mysql_fetch_array($result2);
		$sql3 = "SELECT * FROM solution WHERE solution_id = '$sim_s_id'";
		$result3 = mysql_query($sql3);
		$row3 = mysql_fetch_array($result3);
		
		$sql4 = "SELECT * FROM source_code WHERE solution_id = '$s_id'";
		$result4 = mysql_query($sql4);
		$row4 = mysql_fetch_array($result4);
		$sql5 = "SELECT * FROM source_code WHERE solution_id = '$sim_s_id'";
		$result5 = mysql_query($sql5);
		$row5 = mysql_fetch_array($result5);
		
		
		//echo "<form  action=\"login_SAC_return.php\" method=\"post\">";
		echo "<tr>";
		echo "<td>" . $row2['user_id'] . "</td>";
		echo "<td>" . $row3['user_id'] . "</td>";		
		echo "<td>" . $row['sim'] . "</td>";
		echo "<td>" . $row4['source'] . "</td>";
		echo "<td>" . $row5['source'] . "</td>";
		//echo "<td><input type=\"text\" name=\"time\" style=\"display:none\" value=\"$time\"/>	<input name=\"Submit1\" type=\"submit\" value=\"判定作弊\" /> </td>";
		echo "<tr/>";
		echo "<tr>";
		echo "<tr/></form>";
		
	}
	echo "</table>";
	echo "</div>";	
	
?>

</body>
</html>
