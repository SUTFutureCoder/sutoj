<?php 
if(isset($_POST['do'])){
	require("../include/my_func.inc.php");
	require("../include/db_info.inc.php");
	for($i = $_POST['user_id']; $i <= $_POST['fin_user_id']; $i++){	
		$user_id = "team" . $i;
		$length = $_POST['length'];
		$passwd = $passwd_bak = create_password($length);
    	if (get_magic_quotes_gpc ()) {
			$user_id = stripslashes ( $user_id);
			$passwd = stripslashes ( $passwd);
		}
		$user_id=mysql_real_escape_string($user_id);
		$passwd=pwGen($passwd);
		$sql="update `users` set `password`='$passwd' where `user_id`='$user_id'  and user_id not in( select user_id from privilege where rightstr='administrator') ";
		mysql_query($sql);
		
		
		$data[$i][0] = $user_id;
		$data[$i][1] = $passwd_bak;
		$data[$i][2] = $_POST['addin'];	
	}	
	$title = array('报名号', '密码', '注释');
	exportexcel($data, $title, $_POST['xls_name']);
}
?>
