<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>送球系统</title>
	<link rel=stylesheet href='../css/sutoj.css' type='text/css'>
</head>
<body>
<?php
@session_start();
if(@$_SESSION['authorizee'] != "Volunteer")
echo "抱歉您不是志愿者，无法使用送球系统。";




    require_once('../include/db_info.inc.php');
    require_once('turnid.php');

	$occurtime = date("Y-m-d H:i:s");
	$sql = "SELECT * FROM  `contest` WHERE  `contest_id` =201311";
	$result= mysql_query($sql);
	$conteststart=mysql_fetch_array($result);
	//echo $conteststart['start_time'];

	if($occurtime < $conteststart['start_time'])
	{
	echo "</br></br><h1 style=\"color:blue\">比赛尚未开始，敬请期待". $conteststart['start_time']  ."</h1></br></br></br></br></br>";

exit(0);


	}
	if( $occurtime > $conteststart['end_time'])
	{
	echo "</br></br><h1 style=\"color:blue\">比赛已经结束，感谢您的关注！</h1></br></br></br></br></br>";

exit(0);
	}
	?>
<div class="marquee" ><marquee scrollamount="2" width=100% scrolldelay="40" onmouseover="javascript:this.stop();" onmouseout="javascript:this.start();"><b style="margin-right:20px"><br/>
<a href="#" style="color:red"><?PHP

	//从news提取志愿者实时消息

	$sql = "SELECT * FROM news WHERE user_id = 'volunteer'";
	$result = mysql_query($sql, $conn);
	if(!$result){
		echo "欢迎使用沈阳工业大学Online Judge!";
	}
	else{
		$news = mysql_fetch_array($result);
		echo $news['content'];
	}
?>
</a><br/>
</b></marquee></div>
<?PHP	

	//从solution中提取AC队伍信息
	$sql = "SELECT * FROM solution WHERE result = 4 AND balloon != 1";
	$result = mysql_query($sql);
	echo "<div style=\"left:10px;float:left;\">";
	echo "<h1>送球名单</h1>";

	echo "<table border='1'>
	
	<tr>
	<th>队伍号</th>
	<th>气球颜色</th>
	<th>确认</th>
	</tr>
	";
	while($row = mysql_fetch_array($result))
	{	
		echo "<form  action=\"songqiureturn.php\" method=\"post\">";

		$id = $row['solution_id'];
		echo "<tr>";
		echo "<td>" . $row['user_id'] . "</td>";
		echo "<td>" . turnballoon($row['problem_id']) . "</td>";
		echo "<td><input type=\"text\" name=\"id\" style=\"display:none\" value=\"$id\"/>	<input name=\"Submit1\" type=\"submit\" value=\"送球\" />
 </td>";
		echo "<tr/>";
		echo "<tr>";
		echo "<tr/></form>";
	}
	echo "</table>";
	echo "</div>";
	
	//历史操作记录
	$sql = "SELECT * FROM solution WHERE result = 4 AND balloon = 1 ORDER BY solution_id DESC ";
	$result = mysql_query($sql);
	echo "<div style=\"right:10px; float:right;\">";
	echo "<h1>历史记录</h1>";
	echo "<table border='1'>
	
	<tr>
	<th>队伍号</th>
	<th>气球颜色</th>
	<th>确认</th>
	</tr>
	";
	while($row = mysql_fetch_array($result))
	{
		echo "<form  action=\"songqiureturnback.php\" method=\"post\">";

		$id = $row['solution_id'];
		echo "<tr>";
		echo "<td>" . $row['user_id'] . "</td>";
		echo "<td>" . turnballoon($row['problem_id']) . "</td>";
		echo "<td><input type=\"text\" name=\"id\" style=\"display:none\" value=\"$id\"/>	<input name=\"Submit1\" type=\"submit\" value=\"撤销\" />
 </td>";
		echo "<tr/>";
		echo "<tr>";
		echo "<tr/></form>";
	}
	echo "</table>";

	
	echo "</div>";
	
	
	
	
	
	
	
?>

</body>
</html>