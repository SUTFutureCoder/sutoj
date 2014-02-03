<?php require_once("bodyheader.php"); 

	if($_SESSION['U'] -> getAut() != "admin")
	{
		$occurtime = date("Y-m-d H:i:s");

		if($_SESSION['C'] -> getPre() && $occurtime < $_SESSION['C'] -> getP_S_time()){
		echo "</br></br><h1 style=\"color:blue\">热身赛尚未开始，敬请期待" . $_SESSION['C'] -> getP_S_time() . "</h1></br></br></br></br></br>";
		goto end;
	}
	
	if($_SESSION['C'] -> getPre() && $occurtime > $_SESSION['C'] -> getP_E_time() && $occurtime <= $_SESSION['C'] -> getP_S_time()){
		echo "</br></br><h1 style=\"color:blue\">热身赛已经结束，感谢您的参与！敬请期待正赛" . $_SESSION['C'] -> getP_S_time() . "</h1></br></br></br></br></br>";
		goto end;
	}	

	if(!$_SESSION['C'] -> getPre() && $occurtime < $_SESSION['C'] -> getS_time()){
		echo "</br></br><h1 style=\"color:blue\">比赛尚未开始，敬请期待" . $_SESSION['C'] -> getS_time() . "</h1></br></br></br></br></br>";
		goto end;
	}
		
	if(!$_SESSION['C'] -> getPre() && $occurtime >= $_SESSION['C'] -> getE_time()){
		echo "</br></br><h1 style=\"color:blue\">比赛已经结束，感谢您的关注！</h1></br></br></br></br></br>";
		goto end;
	}
}

	if ($pr_flag){
		echo "<title>$MSG_PROBLEM $row->problem_id. -- $row->title</title>";
		require_once("inc/turnid.php");
		$turnedid = turnid($id);

		echo "<center><p style=\"font-size:30px;color:blue;\">$turnedid: $row->title</p>";
	}else{
		$PID="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		echo "<title>$MSG_PROBLEM $PID[$pid]: $row->title </title>";
		echo "<center><h2>$MSG_PROBLEM $PID[$pid]: $row->title</h2>";
	}
	echo "<span class=green>$MSG_Time_Limit: </span>$row->time_limit Sec&nbsp;&nbsp;";
	echo "<span class=green>$MSG_Memory_Limit: </span>".$row->memory_limit." MB";
	if ($row->spj) echo "&nbsp;&nbsp;<span class=red>Special Judge</span>";
	echo "<br>"; 
	
	
	echo "</center>";
	
	echo "<div class=\"panel_title\">$MSG_Description</div><div class=\"panel_content\">".$row->description."</div><div class=\"panel_bottom\">&nbsp;</div>";


	echo "<div class=\"panel_title\">$MSG_Input</div><div class=\"panel_content\">".$row->input."</div><div class=\"panel_bottom\">&nbsp;</div>";
	if(!$_SESSION['freshman_contest'])
	{
	echo "<div class=\"panel_title\">$MSG_Output</div><div class=\"panel_content\">".$row->output."</div><div class=\"panel_bottom\">&nbsp;</div>";
	
	$ie6s="";
	$ie6e="";
	if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE'))
	{
		$ie6s="<pre>";
		$ie6e="</pre>";
	}
	$sinput=str_replace("<","&lt;",$row->sample_input);
  $sinput=str_replace(">","&gt;",$sinput);
	$soutput=str_replace("<","&lt;",$row->sample_output);
  $soutput=str_replace(">","&gt;",$soutput);
	echo "<div class=\"panel_title\">$MSG_Sample_Input</div>
			<div class=\"panel_content\"><span class=sampledata>".$ie6s.($sinput).$ie6e."</span></div><div class=\"panel_bottom\">&nbsp;</div>";
	echo "<div class=\"panel_title\">$MSG_Sample_Output</div>
			<div class=\"panel_content\"><span class=sampledata>".$ie6s.($soutput).$ie6e."</span></div><div class=\"panel_bottom\">&nbsp;</div>";
	}
	echo "<center>";
	if ($pr_flag){
		echo "<a  href='submitpage.php?id=$id'><img src=\"images/submit.jpg\" /></a>";
	}else{
		echo "[<a href='submitpage.php?cid=$cid&pid=$pid&langmask=$langmask'>$MSG_SUBMIT</a>]";
	}
	echo "</center>";
	
	end:
	?>
	</div>
		   
<?php require_once("bodyfooter.php");?>

