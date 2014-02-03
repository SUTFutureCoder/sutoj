<html>
<head>
<?php require("admin-header.php");?>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title>Add a contest</title>
<link rel=stylesheet href='css/bootstrap.min.css' type='text/css'>
<link rel=stylesheet href='css/bootstrap-responsive.min.css' type='text/css'>
</head>
<?php
	$description="";
 	if (isset($_POST['syear']))
{	
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
	$fresh = $_POST['fresh'];
	$balloon = $_POST['balloon'];

	if (get_magic_quotes_gpc ()){
    	$title = stripslashes ($title);
     	$private = stripslashes ($private);
     	$pre = stripslashes ($pre);
     	$pre_contest = stripslashes ($pre_contest);
		$contest = stripslashes ($contest);
		$fresh = stripslashes($fresh);
		$balloon = stripslashes($balloon);
     }

	$title=mysql_real_escape_string($title);
	$private=mysql_real_escape_string($private);
	$pre=mysql_real_escape_string($pre);
	$pre_contest = mysql_real_escape_string($pre_contest);
	$contest = mysql_real_escape_string($contest);
	$fresh = mysql_real_escape_string($fresh);
	$balloon = mysql_real_escape_string($balloon);
	
	
	$sql = "UPDATE contest SET title = '$title', start_time = '$starttime', end_time = '$endtime', pre_start_time = '$pre_starttime', pre_end_time = '$pre_endtime', private = '$private', pre = '$pre', pre_problem_sum = '$pre_contest', problem_sum = '$contest' , fresh = '$fresh' WHERE contest_id = 0";
	//echo $sql;
	mysql_query($sql) or die(mysql_error());
	mysql_query("TRUNCATE TABLE schoolcontest_problem");	
	

	$num = 1001;
	for($i = 0; $i < $contest; $i++, $num++){
		mysql_query("INSERT INTO schoolcontest_problem (`problem_id`, `contest_id`, `num`) VALUES ('$num', 0, '$i')")or die(mysql_error());	
	}
if($fresh){
	for($i = 0; $i < $contest; $i++, $num++){
		mysql_query("INSERT INTO schoolcontest_problem (`problem_id`, `contest_id`, `num`) VALUES ('$num', 1, '$i')")or die(mysql_error());
	}
}
	for($i = 0; $i < $pre_contest; $i++, $num++){
		mysql_query("INSERT INTO schoolcontest_problem (`problem_id`, `contest_id`, `num`) VALUES ('$num', 2, '$i')")or die(mysql_error());	
	}
if($fresh){
	for($i = 0; $i < $pre_contest; $i++, $num++){
		mysql_query("INSERT INTO schoolcontest_problem (`problem_id`, `contest_id`, `num`) VALUES ('$num', 3, '$i')")or die(mysql_error());	
	}
}

	preg_match_all('/./u', $balloon, $balloons);
	mysql_query("TRUNCATE TABLE balloon");
	for($i = 0; $i < count($balloons[0]); $i++){
		$color = $balloons[0][$i];
		$sql = "INSERT INTO balloon (color) VALUES ('$color')";
		mysql_query($sql);
	}

	echo "<script>alert('设置成功！'); window.location.reload();</script>";
}
?>
	
	<form method=POST>
         <legend>更改比赛信息</legend>
         
	<p align=left>比赛标题:<input class=input-xxlarge  type=text name=title size=71 onBlur="if (value ==''){value='<?php echo $_SESSION['C'] -> getTitle()?>'}" onClick="if(this.value!='')this.value=''" value="<?php echo $_SESSION['C'] -> getTitle()?>"></p>
	<p align=left>正赛开始时间:<br>&nbsp;&nbsp;&nbsp;
	Year:<input  class=input-mini type=text name=syear
	onBlur="if (value ==''){value='<?php echo substr($_SESSION['C'] -> getS_time(), 0, 4)?>'}" onClick="if(this.value!='')this.value=''" value="<?php echo substr($_SESSION['C'] -> getS_time(), 0, 4)?>"
	 size=4 >
	Month:<input class=input-mini  type=text name=smonth onBlur="if (value ==''){value='<?php echo substr($_SESSION['C'] -> getS_time(), 5, 2)?>'}" onClick="if(this.value!='')this.value=''" value="<?php echo substr($_SESSION['C'] -> getS_time(), 5, 2)?>" size=2 >
	Day:<input class=input-mini type=text name=sday size=2 onBlur="if (value ==''){value='<?php echo substr($_SESSION['C'] -> getS_time(), 8, 2)?>'}" onClick="if(this.value!='')this.value=''" value="<?php echo substr($_SESSION['C'] -> getS_time(), 8, 2)?>" >&nbsp;
	Hour:<input class=input-mini    type=text name=shour size=2 onBlur="if (value ==''){value='<?php echo substr($_SESSION['C'] -> getS_time(), 11, 2)?>'}" onClick="if(this.value!='')this.value=''" value="<?php echo substr($_SESSION['C'] -> getS_time(), 11, 2)?>">&nbsp;
	Minute:<input class=input-mini    type=text name=sminute value=00 size=2 ></p>
	<p align=left>正赛结束时间:<br>&nbsp;&nbsp;&nbsp;
	Year:<input class=input-mini    type=text name=eyear onBlur="if (value ==''){value='<?php echo substr($_SESSION['C'] -> getE_time(), 0, 4)?>'}" onClick="if(this.value!='')this.value=''" value="<?php echo substr($_SESSION['C'] -> getE_time(), 0, 4)?>" size=4 >
	Month:<input class=input-mini    type=text name=emonth onBlur="if (value ==''){value='<?php echo substr($_SESSION['C'] -> getE_time(), 5, 2)?>'}" onClick="if(this.value!='')this.value=''" value="<?php echo substr($_SESSION['C'] -> getE_time(), 5, 2)?>" size=2 >
	
	Day:<input class=input-mini  type=text name=eday size=2 onBlur="if (value ==''){value='<?php echo substr($_SESSION['C'] -> getE_time(), 8, 2)?>'}" onClick="if(this.value!='')this.value=''" value="<?php echo substr($_SESSION['C'] -> getE_time(), 8, 2)?>">&nbsp;
	Hour:<input class=input-mini  type=text name=ehour size=2 onBlur="if (value ==''){value='<?php echo substr($_SESSION['C'] -> getE_time(), 11, 2)?>'}" onClick="if(this.value!='')this.value=''" value="<?php echo substr($_SESSION['C'] -> getE_time(), 11, 2)?>">&nbsp;
	Minute:<input class=input-mini  type=text name=eminute value=00 size=2 ></p>
	
	<p align=left>热身赛开始时间:<br>&nbsp;&nbsp;&nbsp;
	Year:<input  class=input-mini type=text name=pre_syear onBlur="if (value ==''){value='<?php echo substr($_SESSION['C'] -> getP_S_time(), 0, 4)?>'}" onClick="if(this.value!='')this.value=''" value="<?php echo substr($_SESSION['C'] -> getP_S_time(), 0, 4)?>" size=4 >
	Month:<input class=input-mini  type=text name=pre_smonth onBlur="if (value ==''){value='<?php echo substr($_SESSION['C'] -> getP_S_time(), 5, 2)?>'}" onClick="if(this.value!='')this.value=''" value="<?php echo substr($_SESSION['C'] -> getP_S_time(), 5, 2)?>" size=2 >
	Day:<input class=input-mini type=text name=pre_sday size=2 onBlur="if (value ==''){value='<?php echo substr($_SESSION['C'] -> getP_S_time(), 8, 2)?>'}" onClick="if(this.value!='')this.value=''" value="<?php echo substr($_SESSION['C'] -> getP_S_time(), 8, 2)?>" >&nbsp;
	Hour:<input class=input-mini    type=text name=pre_shour size=2 onBlur="if (value ==''){value='<?php echo substr($_SESSION['C'] -> getP_S_time(), 11, 2)?>'}" onClick="if(this.value!='')this.value=''" value="<?php echo substr($_SESSION['C'] -> getP_S_time(), 11, 2)?>">&nbsp;
	Minute:<input class=input-mini    type=text name=pre_sminute value=00 size=2 ></p>
	<p align=left>热身赛结束时间:<br>&nbsp;&nbsp;&nbsp;
	Year:<input class=input-mini    type=text name=pre_eyear onBlur="if (value ==''){value='<?php echo substr($_SESSION['C'] -> getP_S_time(), 0, 4)?>'}" onClick="if(this.value!='')this.value=''" value="<?php echo substr($_SESSION['C'] -> getP_E_time(), 0, 4)?>" size=4 >
	Month:<input class=input-mini    type=text name=pre_emonth onBlur="if (value ==''){value='<?php echo substr($_SESSION['C'] -> getP_E_time(), 5, 2)?>'}" onClick="if(this.value!='')this.value=''" value="<?php echo substr($_SESSION['C'] -> getP_E_time(), 5, 2)?>" size=2 >
	
	Day:<input class=input-mini  type=text name=pre_eday size=2 onBlur="if (value ==''){value='<?php echo substr($_SESSION['C'] -> getP_E_time(), 8, 2)?>'}" onClick="if(this.value!='')this.value=''" value="<?php echo substr($_SESSION['C'] -> getP_E_time(), 8, 2)?>">&nbsp;
	Hour:<input class=input-mini  type=text name=pre_ehour size=2 onBlur="if (value ==''){value='<?php echo substr($_SESSION['C'] -> getP_E_time(), 11, 2)?>'}" onClick="if(this.value!='')this.value=''" value="<?php echo substr($_SESSION['C'] -> getP_E_time(), 11, 2)?>">&nbsp;
	Minute:<input class=input-mini  type=text name=pre_eminute value=00 size=2 ></p>
	
	<a style="color:red">进行阶段:</a><select name=pre><option value=0>正赛</option><option value=1  <?if($_SESSION['C'] -> getPre()) echo "selected=selected";?> >热身赛</option></select>
	
	描述:<select name=private><option value=0>公有</option><option value=1  <?if($_SESSION['C'] -> getPri()) echo "selected=selected";?>>私有</option></select>
	<br>
	是否添加新生组:<select name=fresh><option value=0>否</option><option value=1  <?if($_SESSION['C'] -> getFresh()) echo "selected=selected";?>>是</option></select>
	<br>

	<?php require("../include/set_post_key.php");?>
	题量设置:<br>热身赛<input class=input-mini type=text size=2 name=pre_contest onBlur="if (value ==''){value='<?echo $_SESSION['C'] -> getP_P_sum()?>'}" onClick="if(this.value!='')this.value=''" value="<?echo $_SESSION['C'] -> getP_P_sum()?>">
	正赛<input class=input-mini type=text size=2 name=contest onBlur="if (value ==''){value='<?echo $_SESSION['C'] -> getP_sum()?>'}" onClick="if(this.value!='')this.value=''" value="<?echo $_SESSION['C'] -> getP_sum()?>">
	<br>
	气球设置:<input class=input-xxlarge  type=text name=balloon size=71  onBlur="if (value ==''){value='<?
	if($_SESSION['C'] -> getBal())
		echo join("", $_SESSION['C'] -> getBal());
	else
		echo "红紫黄粉蓝橘绿白";			
	?>'}" onClick="if(this.value!='')this.value=''" value="<?
	if($_SESSION['C'] -> getBal())
		echo join("", $_SESSION['C'] -> getBal());
	else
		echo "红紫黄粉蓝橘绿白";?>" >
	<br>
	<br/>
	<p><input type=submit value=Submit name=submit><input type=reset value=Reset name=reset></p>
	</form>



