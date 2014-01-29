<?php
require("../include/check_post_key.php");
if ($_SESSION['U'] -> getAut() != "admin"){
	echo "<a href='../loginpage.php'>Please Login First!</a>";
	exit(1);
}
 // contest_id
$title = $_POST ['title'];
$content = $_POST ['content'];
$user_id=$_SESSION['U'] -> getU_id();
if (get_magic_quotes_gpc ()) {
	$title = stripslashes ( $title);
	$content = stripslashes ( $content );
}
$title=mysql_real_escape_string($title);
$content=mysql_real_escape_string($content);
$user_id=mysql_real_escape_string($user_id);
$sql="insert into news(`user_id`,`title`,`content`,`time`) values('$user_id','$title','$content',now())";
mysql_query ( $sql );
echo "<script>window.location.href=\"contest_list.php\";</script>";
?>

