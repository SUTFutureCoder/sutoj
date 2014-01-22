<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>控制中心</title>
	<link rel=stylesheet href='../css/sutoj.css' type='text/css'>
</head>
<body>
<?php
@session_start();
if($_SESSION['user_id'] != "admin")
echo "非法操作";




    require_once('../include/db_info.inc.php');
	?>
<div class="marquee" ><marquee scrollamount="2" width=100% scrolldelay="40" onmouseover="javascript:this.stop();" onmouseout="javascript:this.start();"><b style="margin-right:20px"><br/>
<a href="#" style="color:red"><?PHP

echo "参赛队伍学院专业统计";
?>
</a><br/>
</b></marquee></div>
<?PHP	
		
		
	$i = 0;
	$sql = "SELECT * FROM users ORDER BY team_number1 DESC";
	$result = mysql_query($sql);
	echo "<div style=\"left:10px;float:left;\">";
	while($row = mysql_fetch_array($result))
	{	
	
		$num[$i] = $row['team_number1'];
		$num[$i + 1] = $row['team_number2'];
		$num[$i + 2] = $row['team_number3'];
		$i += 3;
		
	}
	
	echo "</div>";
	

	
	
	
	
	
	
?>

</body>
</html>