<?php @session_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel=stylesheet href='../css/hoj.css' type='text/css'>
<?php if (!($_SESSION['user_id'] == "admin"||
			isset($_SESSION['contest_creator'])||
			isset($_SESSION['problem_editor']))){
	echo "<a href='../index.php'>Please Login First!</a>";
	exit(1);
}
require_once("../include/db_info.inc.php");
?>

