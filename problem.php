<?php 
$cache_time=30; 
$OJ_CACHE_SHARE=false;
include "inc/head.php";	
$now=strftime("%Y-%m-%d %H:%M",time());
	
if (isset($_GET['cid'])) $ucid="&cid=".intval($_GET['cid']);
else $ucid="";

$pr_flag=false;
$co_flag=false;
if (isset($_GET['id'])){
	// practice
	$id=intval($_GET['id']);
  //require("oj-header.php");
	if ($_SESSION['U'] -> getAut() != "admin" && $id!=1000 )
		$sql="SELECT * FROM `problem` WHERE `problem_id`=$id AND `defunct`='N' ";
	else
		$sql="SELECT * FROM `problem` WHERE `problem_id`=$id";

	$pr_flag=true;
}else if (isset($_GET['cid']) && isset($_GET['pid'])){
	// contest
	$cid=intval($_GET['cid']);
	$pid=intval($_GET['pid']);

	if ($_SESSION['U'] -> getAut() != "admin")
		$sql="SELECT langmask,private,defunct FROM `contest` WHERE `defunct`='N' AND `contest_id`=$cid AND `start_time`<'$now'";
	else
		$sql="SELECT langmask,private,defunct FROM `contest` WHERE `defunct`='N' AND `contest_id`=$cid";
	$result=mysql_query($sql);
	$rows_cnt=mysql_num_rows($result);
	$row=mysql_fetch_row($result);
	$contest_ok=true;
	if ($row[1] && !isset($_SESSION['c'.$cid])) $contest_ok=false;
	if ($row[2]=='Y') $contest_ok=false;
	if ($_SESSION['U'] -> getAut() == "admin") $contest_ok=true;
				
	
    $ok_cnt=$rows_cnt==1;		
	$langmask=$row[0];
	mysql_free_result($result);
	if ($ok_cnt!=1){
		// not started
		$view_errors=  "No such Contest!";
	
		exit(0);
	}else{
		// started
		$sql="SELECT * FROM `problem` WHERE `defunct`='N' ";
	}
	// public
	if (!$contest_ok){
	
		$view_errors= "Not Invited!";
		require("JudgeOnline/template/".$OJ_TEMPLATE."/error.php");
		exit(0);
	}
	$co_flag=true;
}else{
	$view_errors=  "<title>$MSG_NO_SUCH_PROBLEM</title><h2>$MSG_NO_SUCH_PROBLEM</h2>";
	require("JudgeOnline/template/".$OJ_TEMPLATE."/error.php");
	exit(0);
}
$result=mysql_query($sql) or die(mysql_error());

	
if (mysql_num_rows($result)!=1){
	$view_errors="";
	$view_title= "<title>$MSG_NO_SUCH_PROBLEM!</title>";
	$view_errors.= "<h2>$MSG_NO_SUCH_PROBLEM!</h2>";	
	exit(0);
}else{
	$row=mysql_fetch_object($result);	
	$view_title= $row->title;	
}
mysql_free_result($result);


require("inc/problempage.php");

?>
