<?php require("admin-header.php");?>
<link rel=stylesheet href='css/bootstrap.min.css' type='text/css'>
<link rel=stylesheet href='css/bootstrap-responsive.min.css' type='text/css'>

<form action='statistics_print.php' method=post>
      <legend>批量自动统计学院信息</legend>
	<input type=text size=2 name="fin_user_id" class="input-small" value= <?php $sql = "SELECT team_id FROM users WHERE team_id = (SELECT max(team_id) FROM users)";
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	echo $row[0];
	?> style="display:none">
	<br />		
	<?php require("../include/set_post_key.php");?>
	<input type='hidden' name='do' value='do'>
	<input type=submit value='生成'>
</form>
