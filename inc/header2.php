<?php require "head.php"; ?>
   <!-- HEADER -->
<div class="head-warp">
  <div class="head">
	<h1><img alt="" src="icon/apple-touch-icon.png" width="50" height="50" /></h1>
    <div class="nav-box">
      <ul>
        <li class="cur"><a href="index.html">首页</a></li>
        <li><a href="problemset.php">比赛题目</a></li>
        <li><a href="status.php" target="_blank">提交情况</a></li>
        <li><a href="contestrank.php">现场排名</a></li>
        <li><a href="inc/songqiunew.php" target="_blank">送球</a></li>
        <li><a href="team.php">参赛队</a></li>
      </ul>
      <div class="nav-line"></div>
    </div>
  </div>
</div><div class="marquee" style="top:-8px!important"><marquee scrollamount="2" width=100% scrolldelay="40" onmouseover="javascript:this.stop();" onmouseout="javascript:this.start();"><b style="margin-right:20px"><br/>
<a href="#" style="color:red"><?php


	$sql = "SELECT * FROM news WHERE 'defunct' != 'Y'";
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


