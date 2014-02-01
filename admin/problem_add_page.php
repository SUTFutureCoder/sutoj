<html>
<head>
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel=stylesheet href='css/bootstrap.min.css' type='text/css'>
<link rel=stylesheet href='css/bootstrap-responsive.min.css' type='text/css'>
<title>New Problem</title>
</head>
<body leftmargin="30" >
<?php require("admin-header.php");?>
<?php require("../include/db_info.inc.php");?>

<?php
include("../extra/fckeditor/fckeditor.php") ;
?>
      <legend>添加题目</legend>

<form method=POST action=problem_add.php>

<p align=left>Problem Id:<input type=text name=problem_id size=20 
value=<?php 
$sql = "SELECT MAX(problem_id) FROM problem";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
if($row)
echo ++$row[0];
else
echo 1001;
?>><br>	<a style="color:red">之前已添加到<?php $pre_add = --$row[0];
$sql = "SELECT * FROM contest WHERE contest_id = 0";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
if(!$row['fresh']){
	$num = 1000;
	$pre_num = $pre_add % ( $row['problem_sum'] + $row['pre_problem_sum'] + 1);
	if($pre_add > $num + $row['pre_problem_sum'])	
		echo "正赛-第" . $pre_num . "题";
	else
		echo "热身赛-第" .  $pre_num . "题";
}
else{
	$num = 1000;
	if($pre_add <= $num + 2 * $row['problem_sum']){
		if($pre_add <= $num + $row['problem_sum']){
			$pre_num = $pre_add % ($row['problem_sum']);
			if($pre_num)
				echo "老生正赛-第" . $pre_num . "题";
			else
				echo "老生正赛-第" . $row['problem_sum'] . "题";
		}
		else{
			$pre_num = $pre_add % ($row['problem_sum'] * 2);
			if($pre_num)
				echo "新生正赛-第" . $pre_num . "题";
			else
				echo "新生正赛-第" . $row['problem_sum'] . "题";
		}
	}
	else{
		if($pre_add <= $num + 2 * $row['problem_sum'] + $row['pre_problem_sum']){
			$pre_num = ($pre_add - 2 * $row['problem_sum']) % ($row['pre_problem_sum']);
			if($pre_num)
				echo "老生热身赛-第" . $pre_num . "题";
			else
				echo "老生热身赛-第" . $row['pre_problem_sum'] . "题";
			
		}
		else{
			$pre_num = ($pre_add - 2 * $row['problem_sum'] - $row['pre_problem_sum']) % ($row['pre_problem_sum']);
			if($pre_num)
				echo "新生热身赛-第" . $pre_num . "题";
			else
				echo "新生热身赛-第" . $row['pre_problem_sum'] . "题";
		}
	}
}
echo "<br>";
for($i = 1001; $i <= $pre_add; $i++){
	$sql = "SELECT problem_id FROM problem WHERE problem_id = '$i'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	if(!$row)
		echo "请注意其中题号为" . $i . "尚未添加";
}

?></a><br>
<p align=left>Title:<a style="color:red;"><?php $sort = 65; $sort += $pre_num; echo "  ". chr($sort) . ":"?></a><input class="input input-xxlarge" type=text name=title size=71></p>
<p align=left>Time Limit:<input type=text name=time_limit size=20 value=1>S</p>
<p align=left>Memory Limit:<input type=text name=memory_limit size=20 value=128>MByte</p>
<p align=left>Description:<br><!--<textarea rows=13 name=description cols=80></textarea>-->

<?php
$description = new FCKeditor('description') ;
$description->BasePath = '../extra/fckeditor/' ;
$description->Height = 250 ;
$description->Width=800;

$description->Value = '' ;
$description->Create() ;
?>
</p>

<p align=left>Input:<br><!--<textarea rows=13 name=input cols=80></textarea>-->

<?php
$input = new FCKeditor('input') ;
$input->BasePath = '../extra/fckeditor/' ;
$input->Height = 250 ;
$input->Width=800;

$input->Value = '' ;
$input->Create() ;
?>
</p>

</p>
<p align=left>Output:<br><!--<textarea rows=13 name=output cols=80></textarea>-->


<?php
$output = new FCKeditor('output') ;
$output->BasePath = '../extra/fckeditor/' ;
$output->Height = 250 ;
$output->Width=800;

$output->Value = '' ;
$output->Create() ;
?>

</p>
<p align=left>Sample Input:<br><textarea  class="input input-xxlarge"  rows=13 name=sample_input cols=80></textarea></p>
<p align=left>Sample Output:<br><textarea  class="input input-xxlarge"  rows=13 name=sample_output cols=80></textarea></p>
<p align=left>Test Input:<br><textarea  class="input input-xxlarge" rows=13 name=test_input cols=80></textarea></p>
<p align=left>Test Output:<br><textarea  class="input input-xxlarge"  rows=13 name=test_output cols=80></textarea></p>
<p align=left>Hint:<br>
<?php
$output = new FCKeditor('hint') ;
$output->BasePath = '../extra/fckeditor/' ;
$output->Height = 250 ;
$output->Width=800;

$output->Value = '' ;
$output->Create() ;
?>
</p>
<p>SpecialJudge: N<input type=radio name=spj value='0' checked>Y<input type=radio name=spj value='1'></p>
<p align=left>Source:<br><textarea name=source rows=1 cols=70></textarea></p>
<div align=center>
<?php require("../include/set_post_key.php");?>
<input type=submit value=Submit name=submit>
</div></form>
<p>

</body></html>

