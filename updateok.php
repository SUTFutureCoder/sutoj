﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<?php
require "inc/head.php";
include "inc/header1.php";
?>



 <div id="content" style="margin: 0px auto;">
   
   		    <div class="carousel-box">
         <div class="box">
            <div class="border-right">
               <div class="border-left">
                  <div class="left-top-corner">
                     <div class="right-top-corner">
                        <div class="inner">

					   <div class="find">
 				       <h3>注册信息确认</h3>
					<div class="margin"><img src="images/margin.jpg"/></div>

<?php
//安全性转换
$team_number2 = mysql_real_escape_string($_POST['team_number2']);
$team_member2 = mysql_real_escape_string($_POST['team_member2']);
$team_number3 = mysql_real_escape_string($_POST['team_number3']);
$team_member3 = mysql_real_escape_string($_POST['team_member3']);
$team_name = mysql_real_escape_string($_POST['team_name']);
$team_telephone = mysql_real_escape_string($_POST['team_telephone']);
$password = mysql_real_escape_string($_POST['password']);



if($_SERVER['REQUEST_METHOD']=='POST')
{
	//修改数据表
	if($_POST['password'] != $_POST['password_2'])
	{
			echo "<br><br><br><br><center><h1 style=\"color:#F00; font-family:微软雅黑;\">修改失败 两次密码不一致</h1></center><br><br><br><br><br>";
								echo "<br><br><input  value=\"确认\" class=\"button\" onclick=\"location='update.php'\"/><br><br><br><br><br>";
			goto a;
	}
	
	if(!($_POST['password'] && $_POST['password_2']))
	{
			echo "<br><br><br><br><center><h1 style=\"color:#F00; font-family:微软雅黑;\">修改失败 未输入密码</h1></center><br><br><br><br><br>";
								echo "<br><br><input  value=\"确认\" class=\"button\" onclick=\"location='update.php'\"/><br><br><br><br><br>";
			goto a;

	
	}

	if(!($_POST['team_name']))
	{
			echo "<br><br><br><br><center><h1 style=\"color:#F00; font-family:微软雅黑;\">修改失败 未输入队名</h1></center><br><br><br><br><br>";
								echo "<br><br><input  value=\"确认\" class=\"button\" onclick=\"location='update.php'\"/><br><br><br><br><br>";
			goto a;

	
	}
								
						$sql="SELECT count(*) FROM `users` WHERE team_number1 !='' AND (team_number1='$_POST[team_number2]' or team_number1='$_POST[team_number3]')";//判断学号有没有被注册
						$sql2="SELECT count(*) FROM `users` WHERE team_number2 !='' AND (team_number2='$_POST[team_number2]' or team_number2='$_POST[team_number3]')";//判断学号有没有被注册
						$sql3="SELECT count(*) FROM `users` WHERE team_number3 !='' AND (team_number3='$_POST[team_number2]' or team_number3='$_POST[team_number3]')";//判断学号有没有被注册
						$sql4="SELECT count(*) FROM `users` WHERE nick !='' AND (nick='$_POST[team_name]')";//判断队伍名有没有被注册
						
						$result = mysql_query ($sql);
						$result2 = mysql_query ($sql2);
						$result3 = mysql_query ($sql3);
						$result4 = mysql_query ($sql4);
						
						$info = mysql_fetch_array ($result);
						$info2 = mysql_fetch_array ($result2);
						$info3 = mysql_fetch_array ($result3);
						$info4 = mysql_fetch_array ($result4);
						
						if($info['count(*)']>1 || ($info['count(*)'] == 1 && $_POST['team_number1_ed'] != $_POST['team_number1']) || $info2['count(*)']>1 || ($info2['count(*)'] == 1 && $_POST['team_number2_ed'] != $_POST['team_number2']) || $info3['count(*)']>1 ||($info3['count(*)'] == 1 && $_POST['team_number3_ed'] != $_POST['team_number3']) || $info4['count(*)']>1 || ($info4['count(*)'] == 1 && $_POST['team_name_ed'] != $_POST['team_name']))
						{
							
							echo "<center><h1 style=\"color:#F00; font-family:微软雅黑;\">报名失败</h1><h2 style=\"color:#F00; font-family:微软雅黑;\">学号或队伍名已经被注册</h2></center><br><br><br><br>";
							echo "<br><br><input  value=\"确认\" class=\"button\" onclick=\"location='index.php'\"/><br><br><br><br><br>";
							goto a;
						}

			$password = md5($_POST['password']);

	$sql ="UPDATE users SET nick='$_POST[team_name]', team_number2 = '$_POST[team_number2]', team_member2 = '$_POST[team_member2]', team_number3 = '$_POST[team_number3]', team_member3 = '$_POST[team_member3]', team_telephone = '$_POST[team_telephone]', password='$password' WHERE user_id = '". $_SESSION['U'] -> getU_id() ."'";
	
	$result = mysql_query($sql);
	
	
	if($result) 
	{
		if($result)
			{
				$_SESSION['U'] -> setT_n2($_POST['team_number2']);
				$_SESSION['U'] -> setT_m2($_POST['team_member2']);
				$_SESSION['U'] -> setT_n3($_POST['team_number3']);
				$_SESSION['U'] -> setT_m3($_POST['team_member3']);
				$_SESSION['U'] -> setT_tel($_POST['team_telephone']);
				$_SESSION['U'] -> setNic($_POST['team_name']);
				
				echo "<br><br><br><br><center><h1 style=\"color:red;\">修改成功</h1></center>";
				
				
			}
		else
			echo "<br><br><br><br><center><h1 style=\"color:red;\">修改失败</h1></center>";
	}
	else
	{
			echo "<br><br><br><br><center><h1 style=\"color:red;\">修改失败</h1></center>";
	}

								echo "<br><br><input  value=\"确认\" class=\"button\" onclick=\"location='index.php'\"/><br><br><br><br><br>";
a:

								}
else
	{
		header("location:index.php");
	}
	
	

	
?>
		       <div class="wrapper">
					  </div> 
                  </div>
               </div>
            </div>

            <div class="border-bot">
               <div id="footer">
      <p><br/> (C) 沈阳工业大学ACM实验室</p>
   </div>

               <div class="left-bot-corner">
                  <div class="right-bot-corner">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   </div>
   </div>




<?php include("inc/footer.php");
?>

