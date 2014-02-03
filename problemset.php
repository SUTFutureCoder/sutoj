<?php 
	$OJ_CACHE_SHARE=false;
	$cache_time=60;
	require "inc/head.php";
    $view_title= "Problem Set";
	$first=1000;
  //if($OJ_SAE) $first=1;
$sql="SELECT max(`problem_id`) as upid FROM `problem`";
$page_cnt=100;
$result=mysql_query($sql);
echo mysql_error();
$row=mysql_fetch_object($result);
$cnt=intval($row->upid)-$first;
$cnt=$cnt/$page_cnt;

  //remember page
  $page="1";
if (isset($_GET['page'])){
    $page=intval($_GET['page']);
    if($_SESSION['U'] -> getU_id()){
         $sql="update users set volume=$page where user_id='".$_SESSION['U'] -> getU_id() ."'";
         mysql_query($sql);
    }
}else{
    if($_SESSION['U'] -> getU_id()){
            $sql="select volume from users where user_id='".$_SESSION['U'] -> getU_id() ."'";
            $result=@mysql_query($sql);
            $row=mysql_fetch_array($result);
            $page=intval($row[0]);
    }
    if(!is_numeric($page))
        $page='1';
}
  //end of remember page



$pstart=$first+$page_cnt*intval($page)-$page_cnt;
$pend=$pstart+$page_cnt;

$sub_arr=Array();
// submit
if ($_SESSION['U'] -> getU_id()){
$sql="SELECT `problem_id` FROM `solution` WHERE `user_id`='".$_SESSION['U'] -> getU_id() ."'".
                                                                       //  " AND `problem_id`>='$pstart'".
                                                                       // " AND `problem_id`<'$pend'".
	" group by `problem_id`";
$result=@mysql_query($sql) or die(mysql_error());
while ($row=mysql_fetch_array($result))
	$sub_arr[$row[0]]=true;
}

$acc_arr=Array();
// ac
if ($_SESSION['U'] -> getU_id()){
$sql="SELECT `problem_id` FROM `solution` WHERE `user_id`='".$_SESSION['U'] -> getU_id()."'".
                                                                       //  " AND `problem_id`>='$pstart'".
                                                                       //  " AND `problem_id`<'$pend'".
	" AND `result`=4".
	" group by `problem_id`";
$result=@mysql_query($sql) or die(mysql_error());
while ($row=mysql_fetch_array($result))
	$acc_arr[$row[0]]=true;
}

if(isset($_GET['search'])&&trim($_GET['search'])!=""){
	$search=mysql_real_escape_string($_GET['search']);
    $filter_sql=" ( title like '%$search%' or source like '%$search%')";
    
}else{
     $filter_sql="  `problem_id`>='".strval($pstart)."' AND `problem_id`<'".strval($pend)."' ";
}

if ($_SESSION['U'] -> getAut() == "admin"){
	
	$sql="SELECT `problem_id`,`title`,`source`,`submit`,`accepted` FROM `problem` WHERE $filter_sql ";
	
}
else{
	$now=strftime("%Y-%m-%d %H:%M",time());
	$sql="SELECT `problem_id`,`title`,`source`,`submit`,`accepted` FROM `problem` ".
	"WHERE `defunct`='N' ";
}

$sql.=" ORDER BY `problem_id`";
$result=mysql_query($sql) or die(mysql_error());

$view_total_page=$cnt+1;

$cnt=0;
$problemset=Array();
$view_problemset=Array();
$i=0;
$problem = 'A';
while ($row=mysql_fetch_object($result)){
	
	$problemset[$i]=Array();
	if (isset($sub_arr[$row->problem_id])){
		if (isset($acc_arr[$row->problem_id])) 
			$problemset[$i][0]="<div class='btn btn-success'>Y</div>";
		else 
			$problemset[$i][0]= "<div class='btn btn-danger'>N</div>";
	}else{
		$problemset[$i][0]= "<div class=none> </div>";
	}
	
	$problemset[$i][2]="<div class='center'><a href='problem.php?id=".$row->problem_id."'>".$row->title."</a></div>";;
	$problemset[$i][3]="<div class='center'><nobr>".mb_substr($row->source,0,8,'utf8')."</nobr></div >"; //三号把队伍答题情况写上
	
	$i++;}

	$occurtime = date("Y-m-d H:i:s");
	
	//$sql = "SELECT * FROM  `contest` WHERE  `contest_id` =0";//比赛时间
	//$result = mysql_query($sql);
	//$row = mysql_fetch_array($result);

	if($_SESSION['U'] -> getAut() == "admin"){ //admin后门

	for($i = 0; $i < 26; $i++ ){
	$problemset[$i][1]="<div class='center'>".$problem."</div>";
	$view_problemset[$i][0] = $problemset[$i][0];
	$view_problemset[$i][1] = $problemset[$i][1];
	$view_problemset[$i][2] = $problemset[$i][2];
	$view_problemset[$i][3] = $problemset[$i][3];
	$problem++;
	}
	mysql_free_result($result);
	require("inc/problemsetpage.php");
	exit(0);
	}
if($occurtime >= $_SESSION['C'] -> getS_time() && $occurtime <= $_SESSION['C'] -> getE_time() && !$_SESSION['C'] -> getPre() && $_SESSION['C'] -> getFresh()){	//存在新生组 && 非热身
	for($i = 0; $i < $_SESSION['C'] -> getP_sum(); $i++ ){	
	if(!$_SESSION['U'] -> getF_test())	//老生
	{
	$problemset[$i][1]="<div class='center'>".$problem."</div>";
	$view_problemset[$i][0] = $problemset[$i][0];
	$view_problemset[$i][1] = $problemset[$i][1];
	$view_problemset[$i][2] = $problemset[$i][2];
	$view_problemset[$i][3] = $problemset[$i][3];
	$problem++;
	}
	else	//新生
	{
	$problemset[$i][1]="<div class='center'>".$problem."</div>";
	$view_problemset[$i][0] = $problemset[$i + $_SESSION['C'] -> getP_sum()][0];
	$view_problemset[$i][1] = $problemset[$i][1];
	$view_problemset[$i][2] = $problemset[$i + $_SESSION['C'] -> getP_sum()][2];
	$view_problemset[$i][3] = $problemset[$i + $_SESSION['C'] -> getP_sum()][3];
	$problem++;
	}
	}
}

if($occurtime >= $_SESSION['C'] -> getP_S_time() && $occurtime <= $_SESSION['C'] -> getP_E_time()  && $_SESSION['C'] -> getPre()){	//热身赛
	for($i = 0; $i < $_SESSION['C'] -> getP_P_sum(); $i++ ){
	if(!$_SESSION['U'] -> getF_test())
	{
	$problemset[$i][1]="<div class='center'>".$problem."</div>";
	$view_problemset[$i][0] = $problemset[$i + ($_SESSION['C'] -> getP_sum() * pow(2, $_SESSION['C'] -> getFresh()))][0];
	$view_problemset[$i][1] = $problemset[$i][1];
	$view_problemset[$i][2] = $problemset[$i + ($_SESSION['C'] -> getP_sum() * pow(2, $_SESSION['C'] -> getFresh()))][2];
	$view_problemset[$i][3] = $problemset[$i + ($_SESSION['C'] -> getP_sum() * pow(2, $_SESSION['C'] -> getFresh()))][3];
	$problem++;
	}
	else
	{
	$problemset[$i][1]="<div class='center'>".$problem."</div>";
	$view_problemset[$i][0] = $problemset[$i + ($_SESSION['C'] -> getP_sum() * pow(2, $_SESSION['C'] -> getFresh()) + $_SESSION['C'] -> getP_P_sum())][0];
	$view_problemset[$i][1] = $problemset[$i][1];
	$view_problemset[$i][2] = $problemset[$i + ($_SESSION['C'] -> getP_sum() * pow(2, $_SESSION['C'] -> getFresh()) + $_SESSION['C'] -> getP_P_sum())][2];
	$view_problemset[$i][3] = $problemset[$i + ($_SESSION['C'] -> getP_sum() * pow(2, $_SESSION['C'] -> getFresh()) + $_SESSION['C'] -> getP_P_sum())][3];
	$problem++;
	}
}
	
}
mysql_free_result($result);
require("inc/problemsetpage.php");
?>
