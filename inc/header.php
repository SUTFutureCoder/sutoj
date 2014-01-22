<script src="js/slide.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(
	function()
	{
		var active1 = false;
		var active2 = false;
		$('#add_img').hover(
			function()
			{
				$(this).attr('src','images/add_active.png')	
			},
			function()
			{
				$(this).attr('src','images/add.png')	
			}
		);
		$('#add_img').click(
			function()
			{
				if((active1==false)&&(active2==false))
				{
					show('#team_member1');
					active1 = true;	
				}
				else if((active1==false)&&(active2==true))
				{
					show('#team_member1');
					$('#add_img').animate({opacity:0});
					active1 = true;	
				}
				else if((active1==true)&&(active2==false))
				{
					show('#team_member2');
					$('#add_img').animate({opacity:0});
					active2 = true;	
				}
			}
		);
		$('#cancel_img1').hover(
			function()
			{
				$(this).attr('src','images/cancel_active.png')	
			},
			function()
			{
				$(this).attr('src','images/cancel.png')	
			}
		);
		$('#cancel_img1').click(
			function()
			{
					hide('#team_member1');
					$('#add_img').animate({opacity:1});
					form.team_number2.value = "";
					form.team_member2.value = "";
					active1 = false;	
			}
		);
		$('#cancel_img2').hover(
			function()
			{
				$(this).attr('src','images/cancel_active.png')	
			},
			function()
			{
				$(this).attr('src','images/cancel.png')	
			}
		);
		$('#cancel_img2').click(
			function()
			{
					hide('#team_member2');
					$('#add_img').animate({opacity:1});
					form.team_number3.value = "";
					form.team_member3.value = "";
					active2 = false;	
			}
		);
	}
);
</script>




<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">
<form id="form" name="form" action="register.php" method="post"  class="team" target="_top">
<div id="table">
    <div id="table_title">
        <ul>
            <li style="margin-left:25%;">学号</li>
            <li style="margin-left:35%;">姓名</li>
        </ul>
    </div>
    <div  id="team">
    	<div id="team_leader" class="all_member" style="padding-top:15px;">
			<div style="float:left;width:10%; margin-top:12px; margin-right:5px; margin-left:-5px;;text-align:left;"><img id="add_img" src="images/add.png" width="16px" />&nbsp;&nbsp;队长:</div>
            <div style="float:left;width:40%;"><input type="text" id="num1" class="field" name="team_number1" onblur="javascript:return check_number1(form)"/><font id="number1_tips"></font></div>
            <div style="float:left;width:40%;"><input type="text" class="field" name="team_member1" /><font id="member1_tips"></font></div>
        </div>
        <div id="team_member1" class="all_member" style="display:none">
        	<div style="float:left;width:20%;text-align:center;"><img id="cancel_img1" src="images/cancel.png" width="16px" />&nbsp;&nbsp;队员:</div>
            <div style="float:left;width:40%;"><input type="text" id="num2" class="field" name="team_number2"  onblur="check_number2(form)" /><font id="number2_tips"></font></div>
            <div style="float:left;width:40%;"><input type="text" class="field" name="team_member2" /></div>
        </div>
        <div id="team_member2"  class="all_member" style="display:none;">
        	<div style="float:left;width:20%;text-align:center;"><img id="cancel_img2" src="images/cancel.png" width="16px" />&nbsp;&nbsp;队员:</div>
            <div style="float:left;width:40%;"><input type="text" id="num3" class="field" name="team_number3"  onblur="check_number3(form)" /><font id="number3_tips"></font></div>
            <div style="float:left;width:40%;"><input type="text" class="field" name="team_member3" /></div>
        </div>
    </div>
</div>
<div>
	<a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><input name="freshman_contest" type="radio" id="freshman_contest" value=1 checked />新生赛&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="freshman_contest" type="radio" id="freshman_contest" value=0 />校赛
</div>


<div id="team_info">
	<table cellpadding="5px">
    	<tr>
        	<td>队名:</td>
            <td><input type="text" class="field"  name="team_name" /></td>
            <td>联系方式:</td>
            <td><input type="text" class="field"  name="team_telephone" /></td>
        </tr>
        <tr>
        	<td>密码:</td>
            <td><input type="password" class="field"  name="password" /></td>
            <td>确认密码:</td>
            <td><input type="password" class="field"  name="password_2" /></td>
        </tr>
        <tr>
        	<td colspan="4">
            	<input class="button" type="reset" value="清空" />
                <input class="button" type="submit" value="提交" onclick="jacascript:return check(form)" /> 
                <font id="team_tips"></font>           
            </td>
        </tr>
    </table>
    					<h1 class="padlock">比赛注册</h1>

</div> 
</form>

			</div>

			<div class="left right">
				<form class="clearfix" action="inc/login.php" method="post">
					<h1 class="padlock">用户登录</h1>
					<label class="grey" for="log" >报名号:</label>
					<input class="field" type="text" name="user_id" id="log" value="" size="23" />
					<label class="grey" for="pwd" >密码:</label>
					<input class="field" type="password" name="password" id="pwd" size="23" />
        			<div class="clear"></div>
					<input type="submit" name="submit" value="Login" class="bt_login" />
				</form>
			</div>
		</div>
	</div> <!-- /login -->	

    <!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
	    	<li class="left">&nbsp;</li>
	        <li>你好</li>
			<li class="sep">|</li>
			<li id="toggle">
				<a class="open" id="open" href="#">登录 | 注册</a>
				<a id="close" style="display: none;" class="close" href="#">关闭面板</a>			
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
        <li class="cur"><a href="index.php">首页</a></li>
        <li><a class="openh" >比赛题目</a></li>
        <li><a class="openh" >提交情况</a></li>
        <li><a class="openh" >现场排名</a></li>
        <li><a class="openh" >送球</a></li>
        <li><a href="team_nosession.php"  target="_blank">参赛队</a></li>
      </ul>
      <div class="nav-line"></div>
    </div>
  </div>
</div><div class="marquee" ><marquee scrollamount="2" width=100% scrolldelay="40" onmouseover="javascript:this.stop();" onmouseout="javascript:this.start();"><b style="margin-right:20px"><br/>
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


