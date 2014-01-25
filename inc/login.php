<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<?php 
    require("../include/db_info.inc.php");
    require("../include/user.class.php");
	$view_title= "LOGIN";
	if (isset($_SESSION['U'])){
	echo "<a href=logout.php>Please logout First!</a>";
	exit(1);
	}
	require("../include/my_func.inc.php");


	
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
	if(!(ctype_alnum($user_id) && ctype_alnum($password))){
		echo "<script language='javascript'>\n";
		echo "alert('检测到非法字符，请重新输入');\n";
		echo "history.go(-1);\n";
		echo "</script>";
		exit(0);
	}
   if (get_magic_quotes_gpc ()) {
        $user_id= stripslashes ( $user_id);
        $password= stripslashes ( $password);
   }
    $sql="SELECT `rightstr` FROM `privilege` WHERE `user_id`='".mysql_real_escape_string($user_id)."'";
    $result=mysql_query($sql);
	$login=check_login($user_id,$password);
	
	
	
	if ($login)
    {
    
    	$sql = "SELECT * FROM `users` WHERE `user_id` =  '$login'";
    	$result = mysql_query($sql);
    	$row = mysql_fetch_array($result);
    	    	
    	$_SESSION['U'] = new User($row['team_id'], $row['user_id'], $row['team_number1'], $row['team_member1'], $row['team_number2'], $row['team_member2'], $row['team_number3'], $row['team_member3'], $row['team_telephone'], $row['freshman_contest'], $row['submit'], $row['solved'], $row['defunct'], $row['ip'], $row['accesstime'], $row['volume'], $row['language'], $row['reg_time'], $row['nick'], $row['authorizee']);    
    	
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
