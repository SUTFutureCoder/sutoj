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
<?php require("admin-header.php");
include("../extra/fckeditor/fckeditor.php") ;
?>
      <legend>添加题目</legend>

<form method=POST action=problem_add.php>

<p align=left>Problem Id:<input type=text name=problem_id size=20 
value=<?php 
$P_max = $_SESSION['C'] -> getP_max(); 
if($P_max)
echo ++$P_max;
else
echo 1001;
?>><br>	<a style="color:red"><?php 
$pre_add = --$P_max;

if(!$_SESSION['C'] -> getFresh()){
	echo "之前已添加到";
	$num = 1000;
	$pre_num = $pre_add % ( $_SESSION['C'] -> getP_sum() + $_SESSION['C'] -> getP_P_sum() + 1);
	if($pre_add > $num + $_SESSION['C'] -> getP_P_sum())	
		echo "正赛-第" . $pre_num . "题 -> " . $pre_add;
	else
		echo "热身赛-第" .  $pre_num . "题 -> " . $pre_add;
}
else{
	echo "之前已添加到";
	$num = 1000;
	if($pre_add <= $num + 2 * $_SESSION['C'] -> getP_sum()){
		if($pre_add <= $num + $_SESSION['C'] -> getP_sum()){
			$pre_num = $pre_add % ($_SESSION['C'] -> getP_sum());
			if($pre_num)
				echo "老生正赛-第" . $pre_num . "题 -> " . $pre_add;
			else
				echo "老生正赛-第" . $_SESSION['C'] -> getP_sum() . "题 -> " . $pre_add;
		}
		else{
			$pre_num = $pre_add % ($_SESSION['C'] -> getP_sum() * 2);
			if($pre_num)
				echo "新生正赛-第" . $pre_num . "题 -> " . $pre_add;
			else
				echo "新生正赛-第" . $_SESSION['C'] -> getP_sum() . "题 -> " . $pre_add;
		}
	}
	else{
		if($pre_add <= $num + 2 * $_SESSION['C'] -> getP_sum() + $_SESSION['C'] -> getP_P_sum()){
			$pre_num = ($pre_add - 2 * $_SESSION['C'] -> getP_sum()) % ($_SESSION['C'] -> getP_P_sum());
			if($pre_num)
				echo "老生热身赛-第" . $pre_num . "题 -> " . $pre_add;
			else
				echo "老生热身赛-第" . $_SESSION['C'] -> getP_P_sum() . "题 -> " . $pre_add;
			
		}
		else{
			$pre_num = ($pre_add - 2 * $_SESSION['C'] -> getP_sum() - $_SESSION['C'] -> getP_P_sum()) % ($_SESSION['C'] -> getP_P_sum());
			if($pre_num)
				echo "新生热身赛-第" . $pre_num . "题 -> " . $pre_add;
			else
				echo "新生热身赛-第" . $_SESSION['C'] -> getP_P_sum() . "题 -> " . $pre_add;
		}
}

echo "<br>";

if(($_SESSION['C'] -> getP_max() >= (1000 + $_SESSION['C'] -> getP_sum() + $_SESSION['C'] -> getP_P_sum()) && !$_SESSION['C'] -> getFresh()) || (($_SESSION['C'] -> getP_max() >= (1000 + ($_SESSION['C'] -> getP_sum() + $_SESSION['C'] -> getP_P_sum()) * 2) && $_SESSION['C'] -> getFresh()))){
	echo "注意！题号已溢出或已满。请检查以下控制面板自动生成的提示信息！<br>";
	echo "当前已添加的最大题号 -> " . $_SESSION['C'] -> getP_max();
	echo " 设定的正赛题数 -> " . $_SESSION['C'] -> getP_sum();
	echo " 设定的热身赛题数 -> " . $_SESSION['C'] -> getP_P_sum();
	echo " 是否添加新生组，是-1、否-0 -> " . $_SESSION['C'] -> getFresh();
	echo "<br>";
	echo "<br>";
	echo "理论的最大题数 -> " . ( ($_SESSION['C'] -> getP_sum() + $_SESSION['C'] -> getP_P_sum() ) * pow(2, $_SESSION['C'] -> getFresh()) + 1000);
	echo "<br>如需更改，请点击左侧的【更改比赛信息】";
	echo "<br>";

}


}
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

