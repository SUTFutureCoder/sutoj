<?php require("admin-header.php");?>
<link rel=stylesheet href='css/bootstrap.min.css' type='text/css'>
<link rel=stylesheet href='css/bootstrap-responsive.min.css' type='text/css'>

<form action='settingpasses_print.php' method=post>
      <legend>批量自动设置密码</legend>
<br />
	队伍范围:<br>由: team<input type=text size=2 name="user_id" class="input-small" value=1 >至: team<input type=text size=2 name="fin_user_id" class="input-small" value= <?php $sql = "SELECT team_id FROM users WHERE team_id = (SELECT max(team_id) FROM users)";
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	echo $row[0];
	?> ><br />
	密码位数 <input type=text size=2 name="length" class="input-small"><br />
	输出文件名 <input type=text size=2 name="xls_name" ><br />		
	附加备注:<input type=text size=10 name="addin" class="input-xxlarge"><br />
	<?php require("../include/set_post_key.php");?>
	<input type='hidden' name='do' value='do'>
	<input type=submit value='生成'>
</form>
