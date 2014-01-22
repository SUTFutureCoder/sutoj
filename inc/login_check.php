<?php
include "../include/db_info.inc.php";
session_destroy();
session_start();
$sql = "SELECT * FROM users WHERE user_id = '$_POST[user]'";
$rezult=mysql_query($sql);
if($rezult)
{
	$info=mysql_fetch_array($rezult);
	if($info)
	{
		$psw=MD5($_POST['password']);
		if($info['password']==$psw)
		{
			$_SESSION['user_id']=$info['user_id'];
			mysql_free_result($rezult);
			
			$sql="SELECT rightstr FROM privilege WHERE user_id='$info[user_id]'";
			$result=mysql_query($sql);
			if($result)
			{
				while ($row=mysql_fetch_assoc($result))
				{
					$_SESSION[$row['rightstr']]=true;
				}
			}
			echo '1';
		}
		else
			echo '0';
	}
	else
		echo '0';
}
else
	echo '0';
?>
