<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<?php 
    require_once("../include/db_info.inc.php");
	$view_title= "LOGIN";

	if (isset($_SESSION['user_id'])){
	echo "<a href=logout.php>Please logout First!</a>";
	exit(1);
	}
	require_once("../include/my_func.inc.php");


	
	function check_login($user_id, $password)
	{
		$SAC = $_SERVER['HTTP_USER_AGENT'];
		$user_id = mysql_real_escape_string($user_id);
		$pass = md5($_POST['password']);
		session_destroy();
		session_start();
		$sql="INSERT INTO `loginlog` VALUES('$user_id','$pass','".$_SERVER['REMOTE_ADDR']."',NOW(), '$SAC', '0')";
		@mysql_query($sql) or die (mysql_error());
		$sql="SELECT `user_id`,`password` FROM `users` WHERE `user_id`='".$user_id."'";
		$result=mysql_query($sql);
		$row = mysql_fetch_array($result);
		if($row && pwCheck($password,$row['password'])){
			$user_id=$row['user_id'];
			mysql_free_result($result);
			return $user_id;
		}
		mysql_free_result($result);
		return false; 
	}
	
	
    $user_id = $_POST['user_id'];
	$password = $_POST['password'];
   if (get_magic_quotes_gpc ()) {
        $user_id= stripslashes ( $user_id);
        $password= stripslashes ( $password);
   }
    $sql="SELECT `rightstr` FROM `privilege` WHERE `user_id`='".mysql_real_escape_string($user_id)."'";
    $result=mysql_query($sql);
	$login=check_login($user_id,$password);
	
	
	
	if ($login)
    {
		$_SESSION['user_id']=$login;
		
		$sql="SELECT `authorizee` FROM `users` WHERE `user_id`='".$user_id."'";
		$result=mysql_query($sql);
		$row = mysql_fetch_array($result);

//		echo $row['authorizee'] ;
		if($login == "admin")
		{$_SESSION['administrator']=1;}	
		if($row['authorizee'] == "Volunteer")
		{$_SESSION['authorizee'] = "Volunteer";}
		$sql="SELECT `freshman_contest` FROM `users` WHERE `user_id`='$user_id'";
		$result=mysql_query($sql);
		$row = mysql_fetch_array($result);		
		echo $_SESSION['freshman_contest'] = $row['freshman_contest'];
		
		echo mysql_error();
		while ($result&&$row=mysql_fetch_assoc($result))
			$_SESSION[$row['rightstr']]=true;
		echo "<script language='javascript'>\n";
		echo "history.go(-2);\n";
		echo "</script>";
	}else{
		
		echo "<script language='javascript'>\n";
		echo "alert('错误的用户名或密码!');\n";
		echo "history.go(-1);\n";
		echo "</script>";
	}
?>
