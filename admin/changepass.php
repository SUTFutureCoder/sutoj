<?php require("admin-header.php");?>
<link rel=stylesheet href='css/bootstrap.min.css' type='text/css'>
<link rel=stylesheet href='css/bootstrap-responsive.min.css' type='text/css'>
<?php if (!($_SESSION['U'] -> getU_id() == "admin"|| isset($_SESSION['password_setter']) )){
	echo "<a href='../index.php'>Please Login First!</a>";
	exit(1);
}
if(isset($_POST['do'])){
	//echo $_POST['user_id'];
	require("../include/check_post_key.php");
	//echo $_POST['passwd'];
	require("../include/my_func.inc.php");
	
	$user_id=$_POST['user_id'];
    $passwd =$_POST['passwd'];
    if (get_magic_quotes_gpc ()) {
		$user_id = stripslashes ( $user_id);
		$passwd = stripslashes ( $passwd);
	}
	$user_id=mysql_real_escape_string($user_id);
	$passwd=pwGen($passwd);
	$sql="update `users` set `password`='$passwd' where `user_id`='$user_id'  and user_id not in( select user_id from privilege where rightstr='administrator') ";
	mysql_query($sql);
	if (mysql_affected_rows()==1) echo "Password Changed!";
  else echo "没有这个用户或您的权限不足";
}
?>
<form action='changepass.php' method=post>
      <legend>更改密码</legend>
<br />
	User: team<input type=text size=10 name="user_id" class="input-small"><br />
	Pass:<input type=text size=10 name="passwd"><br />
	<?php require("../include/set_post_key.php");?>
	<input type='hidden' name='do' value='do'>
	<input type=submit value='Change'>
</form>
