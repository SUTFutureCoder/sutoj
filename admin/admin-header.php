<?php 
require("../include/user.class.php");
require("../include/contest.class.php");
require("../include/db_info.inc.php");
@session_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php if (!($_SESSION['U'] -> getU_id() == "admin"||
			isset($_SESSION['contest_creator'])||
			isset($_SESSION['problem_editor']))){
	echo "<a href='../index.php'>Please Login First!</a>";
	exit(1);
}
    	$sql_admin = "SELECT * FROM contest WHERE contest_id = 0";
    	$result_admin = mysql_query($sql_admin);
    	$row_admin = mysql_fetch_array($result_admin);
    	
    	$_SESSION['C'] = new Contest($row_admin['contest_id'], $row_admin['title'], $row_admin['start_time'], $row_admin['end_time'], $row_admin['pre_start_time'], $row_admin['pre_end_time'], $row_admin['defunct'], $row_admin['pre'], $row_admin['fresh'], $row_admin['problem_sum'], $row_admin['pre_problem_sum'], $row_admin['private']); 

?>

