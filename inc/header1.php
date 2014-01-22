<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
		</div>
	</div> <!-- /login -->	
<?php
	@session_start ();
	if(!isset($_SESSION['user_id']))
	{
		header("location:index.php");
	}

?>
    <!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
	    	<li class="left">&nbsp;</li>
	        <li>你好 <?php echo $_SESSION['user_id']; ?></li>
			<li class="sep">|</li>
			<li id="toggle">
				<a id="open" href="update.php">修改信息 </a>|
				<a id="open" href="inc/logout.php"> 注销</a>
			</li>
	    	<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
	
</div>

<div>


   <!-- HEADER -->
<div class="head-warp">
  <div class="head">
	<h1><img alt="" src="icon/apple-touch-icon.png" width="50" height="50" /></h1>
    <div class="nav-box">
      <ul>
        <li><a href="index.php">首页</a></li>
        <li class="cur"><a href="problemset.php">比赛题目</a></li>
        <li><a href="status.php">提交情况</a></li>
        <li><a href="contestrank.php">现场排名</a></li>
        <li><a href="inc/songqiunew.php" target="_blank">送球</a></li>
        <li><a href="team.php">参赛队</a></li>
      </ul>
      <div class="nav-line"></div>
    </div>
  </div>
</div><div class="marquee" style="top:0px!important"><marquee  scrollamount="2" width=100% scrolldelay="40" onmouseover="javascript:this.stop();" onmouseout="javascript:this.start();"><b style="margin-right:20px"><br/>
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


