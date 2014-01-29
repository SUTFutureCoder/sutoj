<html>
<head>
<?php require("admin-header.php");?>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title>reg_time setting</title>
<link rel=stylesheet href='css/bootstrap.min.css' type='text/css'>
<link rel=stylesheet href='css/bootstrap-responsive.min.css' type='text/css'>
</head>
<?php
	require("../include/const.inc.php");
	$description="";
 	if (isset($_POST['syear']))
{	
	require("../include/db_info.inc.php");
	require("../include/check_post_key.php");
	
	$starttime=intval($_POST['syear'])."-".intval($_POST['smonth'])."-".intval($_POST['sday'])." ".intval($_POST['shour']).":".intval($_POST['sminute']).":00";
	$endtime=intval($_POST['eyear'])."-".intval($_POST['emonth'])."-".intval($_POST['eday'])." ".intval($_POST['ehour']).":".intval($_POST['eminute']).":00";
	
	$sql = "UPDATE contest SET start_time = '$starttime', end_time = '$endtime' WHERE contest_id = -1";
	//echo $sql;
	mysql_query($sql) or die(mysql_error());
	
	echo "<script>alert('设置成功！');</script>";
}

?>
	
	<form method=POST >
         <legend>更改开放注册时间</legend>
	<p align=left>注册开始时间:<br>&nbsp;&nbsp;&nbsp;
	Year:<input  class=input-mini type=text name=syear value=<?php echo date('Y')?> size=4 >
	Month:<input class=input-mini  type=text name=smonth value=<?php echo date('m')?> size=2 >
	Day:<input class=input-mini type=text name=sday size=2 value=<?php echo date('d')?> >&nbsp;
	Hour:<input class=input-mini    type=text name=shour size=2 value=<?php echo date('H')?>>&nbsp;
	Minute:<input class=input-mini    type=text name=sminute value=00 size=2 ></p>
	<p align=left>注册结束时间:<br>&nbsp;&nbsp;&nbsp;
	Year:<input class=input-mini    type=text name=eyear value=<?php echo date('Y')?> size=4 >
	Month:<input class=input-mini    type=text name=emonth value=<?php echo date('m')?> size=2 >
	
	Day:<input class=input-mini  type=text name=eday size=2 value=<?php echo date('d')+(date('H')+4>23?1:0)?>>&nbsp;
	Hour:<input class=input-mini  type=text name=ehour size=2 value=<?php echo (date('H')+5)%24?>>&nbsp;
	Minute:<input class=input-mini  type=text name=eminute value=00 size=2 ></p>
	<?php require("../include/set_post_key.php");?>
	<br/>
	<p><input type=submit value=Submit name=submit><input type=reset value=Reset name=reset></p>
	</form>


