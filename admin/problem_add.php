<?php require("admin-header.php");
require("../include/check_post_key.php");
require("../include/db_info.inc.php");
require("../include/problem.php");
// contest_id

$problem_id = $_POST['problem_id'];
$title = $_POST ['title'];
$time_limit = $_POST ['time_limit'];
$memory_limit = $_POST ['memory_limit'];
$description = $_POST ['description'];
$input = $_POST ['input'];
$output = $_POST ['output'];
$sample_input = $_POST ['sample_input'];
$sample_output = $_POST ['sample_output'];
$test_input = $_POST ['test_input'];
$test_output = $_POST ['test_output'];
$hint = $_POST ['hint'];
$source = $_POST ['source'];
$spj = $_POST ['spj'];
if (get_magic_quotes_gpc ()) {
	$problem_id = stripslashes($problem_id);
	$title = stripslashes ( $title);
	$time_limit = stripslashes ( $time_limit);
	$memory_limit = stripslashes ( $memory_limit);
	$description = stripslashes ( $description);
	$input = stripslashes ( $input);
	$output = stripslashes ( $output);
	$sample_input = stripslashes ( $sample_input);
	$sample_output = stripslashes ( $sample_output);
	$test_input = stripslashes ( $test_input);
	$test_output = stripslashes ( $test_output);
	$hint = stripslashes ( $hint);
	$source = stripslashes ( $source);
	$spj = stripslashes ( $spj);
	$source = stripslashes ( $source );
}

//echo "->".$OJ_DATA."<-"; 
addproblem ($problem_id, $title, $time_limit, $memory_limit, $description, $input, $output, $sample_input, $sample_output, $hint, $source, $spj, $OJ_DATA );
$pid = $problem_id;
$basedir = "$OJ_DATA/$pid";
//echo $basedir;
//exit(0);
mkdir ( $basedir );
if(strlen($sample_output)&&!strlen($sample_input)) $sample_input="0";
if(strlen($sample_input)) mkdata($pid,"sample.in",$sample_input,$OJ_DATA);
if(strlen($sample_output))mkdata($pid,"sample.out",$sample_output,$OJ_DATA);
if(strlen($test_output)&&!strlen($test_input)) $test_input="0";
if(strlen($test_input))mkdata($pid,"test.in",$test_input,$OJ_DATA);
if(strlen($test_output))mkdata($pid,"test.out",$test_output,$OJ_DATA);

$sql="insert into `privilege` (`user_id`,`rightstr`)  values('".$_SESSION['U'] -> getU_id()."','p$pid')";
mysql_query($sql);
$_SESSION["p$pid"]=true;
	
//echo "<a href=quixplorer/index.php?action=list&dir=$pid&order=name&srt=yes>Add More Test Data</a>";
/*	*/
?>


