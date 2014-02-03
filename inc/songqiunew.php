<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>送球系统</title>
	<link rel=stylesheet href='../css/sutoj.css' type='text/css'>
</head>
<body>
<?php
require("../include/user.class.php");
require('../include/db_info.inc.php');
//echo $_SESSION['authorizee'];
if(@$_SESSION['U'] -> getAut() != "Volunteer")
{
if($_SESSION['U'] -> getU_id() != "admin")
{
echo "<h1 style=\"color:red\">抱歉您不是志愿者，无法使用送球系统。</h1>";
exit(0);
}
}


    require('turnid.php');

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

	/*$sql = "SELECT * FROM  `users` WHERE  `user_id` = '".$_SESSION['user_id']."'";
	$result= mysql_query($sql);
	$ball = mysql_fetch_array($result);
	//echo $ball['nick'];
	*///用于wifi进行志愿者分组，但由于没有无线路由器条件，所以取消

	//从solution中提取AC队伍信息
	$sql = "SELECT * FROM solution WHERE result = 4 AND balloon != 1 ORDER BY solution_id";
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
	while($row = mysql_fetch_array($result) )
	{	
	
		$team_id = substr($row['user_id'], 4, 10);
		//if((($ball['nick'] - 1 )* 10 < $team_id && $team_id <= $ball['nick'] * 10 ) || $_SESSION['user_id'] == "admin")
		if(($_SESSION['U'] -> getU_id() == "v1" && $team_id >=1 && $team_id <= 48 ) || $_SESSION['U'] -> getU_id() == "admin" )
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
		if(($_SESSION['U'] -> getU_id() == "v2" && $team_id >=49 && $team_id <= 100 ) || $_SESSION['U'] -> getU_id() == "admin" )		
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
		if($row['user_id'])
		$team_id = substr($row['user_id'], 4, 10);
		else
		$team_id = "";
		//if((($ball['nick'] - 1 )* 10 < $team_id && $team_id <= $ball['nick'] * 10 ) || $_SESSION['user_id'] == "admin")
		if(($_SESSION['U'] -> getU_id() == "v1" && $team_id >=1 && $team_id <= 48 ) || $_SESSION['U'] -> getU_id() == "admin" )
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
		if(($_SESSION['U'] -> getU_id() == "v2" && $team_id >=49 && $team_id <= 100 ) || $_SESSION['U'] -> getU_id() == "admin" )		
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
	}
	echo "</table>";

	
	echo "</div>";
	
	
	
	
	
	
	
?>

</body>
</html>
