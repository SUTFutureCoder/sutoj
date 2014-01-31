<?php
require("../include/user.class.php");
@session_start();
if($_SESSION['U'] -> getU_id() != "admin"){
	echo "身份验证失败";
	exit(0);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<title>控制面板</title>
<link rel="stylesheet" type="text/css" href="jq-ui/themes/cupertino/easyui.css" id="swicth-style">
<script type="text/javascript" src="jq-ui/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="jq-ui/jquery.easyui.min.js"></script>
<link rel="stylesheet" type="text/css" href="jq-ui/style.css" id="swicth-style">
</head>

<body class="easyui-layout">
<div region="north" border="false" class="cs-north" style="height:30px; overflow:hidden">
		<div class="cs-north-bg"style="top:0%" >
		<ul class="ui-skin-nav">				
			<li class="li-skinitem" title="gray"><span class="gray" rel="gray"></span></li>
			<li class="li-skinitem" title="pepper-grinder"><span class="pepper-grinder" rel="pepper-grinder"></span></li>
			<li class="li-skinitem" title="blue"><span class="blue" rel="blue"></span></li>
			<li class="li-skinitem" title="cupertino"><span class="cupertino" rel="cupertino"></span></li>
			<li class="li-skinitem" title="dark-hive"><span class="dark-hive" rel="dark-hive"></span></li>
			<li class="li-skinitem" title="sunny"><span class="sunny" rel="sunny"></span></li>
		</ul>	
		</div>	</div>
	<div region="west" border="true" split="true" title="索引" class="cs-west">
			<div class="easyui-accordion" fit="true" border="false">
				<div title="比赛相关">
					<a href="javascript:void(0);" src="watch.php" class="cs-navi-tab">查看OJ运行状态</a></p>
					<a href="javascript:void(0);" src="contest_news.php" class="cs-navi-tab">比赛新闻编辑</a></p>
					<a href="javascript:void(0);" src="volunteer_news.php" class="cs-navi-tab">志愿者新闻编辑</a></p>
					<a href="javascript:void(0);" src="login_SAC.php" class="cs-navi-tab">登陆作弊监视</a></p>
					<a href="javascript:void(0);" src="sim_SAC.php" class="cs-navi-tab">抄袭作弊监视</a></p>
				</div>
				<div title="OJ相关">
					<a href="javascript:void(0);" src="regtime_setting.php" class="cs-navi-tab">设置注册时间</a></p>
					<a href="javascript:void(0);" src="contest_setting.php" class="cs-navi-tab">更改比赛信息</a></p>
					<a href="javascript:void(0);" src="../../public/news/shuma/diannao.htm" class="cs-navi-tab">添加题目</a></p>
					<a href="javascript:void(0);" src="../../public/news/shuma/diannao.htm" class="cs-navi-tab">更改题目</a></p>
					<a href="javascript:void(0);" src="../../public/news/shuma/pingban.htm" class="cs-navi-tab">重判</a></p>
					<a href="javascript:void(0);" src="../../public/news/shuma/yingyong.htm" class="cs-navi-tab">导入题目</a></p>
					<a href="javascript:void(0);" src="../../public/news/shuma/kuwan.htm" class="cs-navi-tab">导出题目</a></p>
				</div>
				<div title="用户相关">
					<a href="javascript:void(0);" src="changepass.php" class="cs-navi-tab">更改密码</a></p>
					<a href="javascript:void(0);" src="settingpasses_auto.php" class="cs-navi-tab">批量生成随机密码</a></p>
					<a href="javascript:void(0);" src="../team.php" class="cs-navi-tab">参赛队伍</a></p>
					<a href="javascript:void(0);" src="statistics_auto.php" class="cs-navi-tab">参赛队伍专业分布情况统计</a></p>
				</div>
		</div>
	</div>
	<div id="mainPanle" region="center" border="true" border="false">
		 <div id="tabs" class="easyui-tabs"  fit="true" border="false" >
                <div title="Home">
				<div class="cs-home-remark">
					<h1>SUTOJ控制面板</h1> <br>
					<h2>Shenyang University Of Technology <br>
Online Judge 14.04LTS <br>
ver:Hummingbird <br>
Copyright 2010-2014 <br> 
© SUT ACM TEAM <br>
Powered By hustoj <br>
All Copyright Reserved <br>
GPL2.0 2011</h2>&nbsp;</div>
				</div>
        </div>
	</div>

	<div region="south" border="false" class="cs-south">©沈阳工业大学ACM实验室</div>
	
	<div id="mm" class="easyui-menu cs-tab-menu">
		<div id="mm-tabupdate">刷新</div>
		<div class="menu-sep"></div>
		<div id="mm-tabclose">关闭</div>
		<div id="mm-tabcloseother">关闭其他</div>
		<div id="mm-tabcloseall">关闭全部</div>
	</div>
</body>
</html>
