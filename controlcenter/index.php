<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>控制中心</title>
</head>

<?php
@session_start();
if($_SESSION['user_id'] != "admin")
echo "非法操作";
    require_once('../include/db_info.inc.php');
	require_once('../inc/turnid.php');
?>

<frameset cols="20,90">
<frame name="menu" src="menu.php">
<frame name="main" src="about:blank">

<noframes>

</noframes>
</frameset>
</html>
