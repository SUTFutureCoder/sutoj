<html>
<head>
<?php require("admin-header.php");?>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title>Add a contest</title>
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
	
	$pre_starttime=intval($_POST['pre_syear'])."-".intval($_POST['pre_smonth'])."-".intval($_POST['pre_sday'])." ".intval($_POST['pre_shour']).":".intval($_POST['pre_sminute']).":00";
	$pre_endtime=intval($_POST['pre_eyear'])."-".intval($_POST['pre_emonth'])."-".intval($_POST['pre_eday'])." ".intval($_POST['pre_ehour']).":".intval($_POST['pre_eminute']).":00";
	
    $title = $_POST['title'];
	$pre = $_POST['pre'];
	$private = $_POST['private'];
	$pre_contest = $_POST['pre_contest'];
	$contest = $_POST['contest'];

	if (get_magic_quotes_gpc ()){
    	$title = stripslashes ($title);
     	$private = stripslashes ($private);
     	$pre = stripslashes ($pre);
     	$pre_contest = stripslashes ($pre_contest);
		$contest = stripslashes ($contest);
     }

	$title=mysql_real_escape_string($title);
	$private=mysql_real_escape_string($private);
	$pre=mysql_real_escape_string($pre);
	$pre_contest = mysql_real_escape_string($pre_contest);
	$contest = mysql_real_escape_string($contest);
	
	
	$sql = "UPDATE contest SET title = '$title', start_time = '$starttime', end_time = '$endtime', pre_start_time = '$pre_starttime', pre_end_time = '$pre_endtime', private = '$private', pre = '$pre', pre_problem_sum = '$pre_contest', problem_sum = '$contest' WHERE contest_id = 0";
	//echo $sql;
	mysql_query($sql) or die(mysql_error());
	mysql_query("TRUNCATE TABLE schoolcontest_problem");	
	
	$num = 1001;
	for($i = 0; $i < $contest; $i++, $num++){
		mysql_query("INSERT INTO schoolcontest_problem (`problem_id`, `contest_id`, `num`) VALUES ('$num', 0, '$i')")or die(mysql_error());	
	}
	for($i = 0; $i < $contest; $i++, $num++){
		mysql_query("INSERT INTO schoolcontest_problem (`problem_id`, `contest_id`, `num`) VALUES ('$num', 1, '$i')")or die(mysql_error());
	}
	for($i = 0; $i < $pre_contest; $i++, $num++){
		mysql_query("INSERT INTO schoolcontest_problem (`problem_id`, `contest_id`, `num`) VALUES ('$num', 2, '$i')")or die(mysql_error());	
	}
	for($i = 0; $i < $pre_contest; $i++, $num++){
		mysql_query("INSERT INTO schoolcontest_problem (`problem_id`, `contest_id`, `num`) VALUES ('$num', 3, '$i')")or die(mysql_error());	
	}
	echo "<script>alert('设置成功！');</script>";
}
?>
	
	<form method=POST >
         <legend>更改比赛信息</legend>
	<p align=left>比赛标题:<input class=input-xxlarge  type=text name=title size=71 value="<?php echo isset($title)?$title:""?>"></p>
	<p align=left>正赛开始时间:<br>&nbsp;&nbsp;&nbsp;
	Year:<input  class=input-mini type=text name=syear value=<?php echo date('Y')?> size=4 >
	Month:<input class=input-mini  type=text name=smonth value=<?php echo date('m')?> size=2 >
	Day:<input class=input-mini type=text name=sday size=2 value=<?php echo date('d')?> >&nbsp;
	Hour:<input class=input-mini    type=text name=shour size=2 value=<?php echo date('H')?>>&nbsp;
	Minute:<input class=input-mini    type=text name=sminute value=00 size=2 ></p>
	<p align=left>正赛结束时间:<br>&nbsp;&nbsp;&nbsp;
	Year:<input class=input-mini    type=text name=eyear value=<?php echo date('Y')?> size=4 >
	Month:<input class=input-mini    type=text name=emonth value=<?php echo date('m')?> size=2 >
	
	Day:<input class=input-mini  type=text name=eday size=2 value=<?php echo date('d')+(date('H')+4>23?1:0)?>>&nbsp;
	Hour:<input class=input-mini  type=text name=ehour size=2 value=<?php echo (date('H')+5)%24?>>&nbsp;
	Minute:<input class=input-mini  type=text name=eminute value=00 size=2 ></p>
	
	<p align=left>热身赛开始时间:<br>&nbsp;&nbsp;&nbsp;
	Year:<input  class=input-mini type=text name=pre_syear value=<?php echo date('Y')?> size=4 >
	Month:<input class=input-mini  type=text name=pre_smonth value=<?php echo date('m')?> size=2 >
	Day:<input class=input-mini type=text name=pre_sday size=2 value=<?php echo date('d')?> >&nbsp;
	Hour:<input class=input-mini    type=text name=pre_shour size=2 value=<?php echo date('H')?>>&nbsp;
	Minute:<input class=input-mini    type=text name=pre_sminute value=00 size=2 ></p>
	<p align=left>热身赛结束时间:<br>&nbsp;&nbsp;&nbsp;
	Year:<input class=input-mini    type=text name=pre_eyear value=<?php echo date('Y')?> size=4 >
	Month:<input class=input-mini    type=text name=pre_emonth value=<?php echo date('m')?> size=2 >
	
	Day:<input class=input-mini  type=text name=pre_eday size=2 value=<?php echo date('d')+(date('H')+4>23?1:0)?>>&nbsp;
	Hour:<input class=input-mini  type=text name=pre_ehour size=2 value=<?php echo (date('H')+3)%24?>>&nbsp;
	Minute:<input class=input-mini  type=text name=pre_eminute value=00 size=2 ></p>
	
	进行阶段:<select name=pre><option value=0>正赛</option><option value=1>热身赛</option></select>
	
	描述:<select name=private><option value=0>公有</option><option value=1>私有</option></select>

	<?php require("../include/set_post_key.php");?>
	<br>题量设置:<br>热身赛<input class=input-mini type=text size=2 name=pre_contest value=5>
	正赛<input class=input-mini type=text size=2 name=contest value=8>
	<br>
	<br/>
	<p><input type=submit value=Submit name=submit><input type=reset value=Reset name=reset></p>
	</form>


