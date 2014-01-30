<?php
function pwGen($password,$md5ed=False) 
{
	if (!$md5ed) $password=md5($password);
	$salt = sha1(rand());
	$salt = substr($salt, 0, 4);
	$hash = base64_encode( sha1($password . $salt, true) . $salt ); 
	return $hash; 
}

function pwCheck($password,$saved)
{
	if (isOldPW($saved)){
		$mpw = md5($password);
		if ($mpw==$saved) return True;
		else return False;
	}
	$svd=base64_decode($saved);
	$salt=substr($svd,20);
	$hash = base64_encode( sha1(md5($password) . $salt, true) . $salt );
	if (strcmp($hash,$saved)==0) return True;
	else return False;
}

function isOldPW($password)
{
	for ($i=strlen($password)-1;$i>=0;$i--)
	{
		$c = $password[$i];
		if ('0'<=$c && $c<='9') continue;
		if ('a'<=$c && $c<='f') continue;
		if ('A'<=$c && $c<='F') continue;
		return False;
	}
	return True;
}

function is_valid_user_name($user_name){
	$len=strlen($user_name);
	for ($i=0;$i<$len;$i++){
		if (
			($user_name[$i]>='a' && $user_name[$i]<='z') ||
			($user_name[$i]>='A' && $user_name[$i]<='Z') ||
			($user_name[$i]>='0' && $user_name[$i]<='9') ||
			$user_name[$i]=='_'||
			($i==0 && $user_name[$i]=='*') 
		);
		else return false;
	}
	return true;
}




function sec2str($sec){
	return sprintf("%02d:%02d:%02d",$sec/3600,$sec%3600/60,$sec%60);
}

function is_running($cid){
	require_once("db_info.inc.php");
	$sql="SELECT count(*) FROM `contest` WHERE `contest_id`='$cid' AND `end_time`>NOW()";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$cnt=intval($row[0]);
	mysql_free_result($result);
	return $cnt>0;
}

function check_ac($cid,$pid){
	require_once("db_info.inc.php");
	$sql="SELECT count(*) FROM `solution` WHERE `contest_id`='$cid' AND `num`='$pid' AND `result`='4' AND `user_id`='".$_SESSION['user_id']."'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$ac=intval($row[0]);
	mysql_free_result($result);
	if ($ac>0) return "<font color=green>Y</font>";
	$sql="SELECT count(*) FROM `solution` WHERE `contest_id`='$cid' AND `num`='$pid' AND `user_id`='".$_SESSION['user_id']."'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$sub=intval($row[0]);
	mysql_free_result($result);
	if ($sub>0) return "<font color=red>N</font>";
	else return "";
}

function create_password($pw_length){
	$randpwd = "";
	for($i = 0; $i < $pw_length; $i++){
		$randctl = mt_rand(0,2);
		switch($randctl){
			case 0: $randpwd .= chr(mt_rand(48,57)); break;
			case 1: $randpwd .= chr(mt_rand(65,90)); break;
			case 2: $randpwd .= chr(mt_rand(97,122));break;		
		}	
	}
	return $randpwd;
}

/**
    * 导出数据为excel表格
    *@param $data    一个二维数组,结构如同从数据库查出来的数组
    *@param $title   excel的第一行标题,一个数组,如果为空则没有标题
    *@param $filename 下载的文件名
    *@examlpe 
    $stu = M ('User');
    $arr = $stu -> select();
    exportexcel($arr,array('id','账户','密码','昵称'),'文件名!');
*/
function exportexcel($data=array(),$title=array(),$filename='report'){
    header("Content-type:application/octet-stream");
    header("Accept-Ranges:bytes");
    header("Content-type:application/vnd.ms-excel;charset=UTF-8");  
    header("Content-Disposition:attachment;filename=".$filename.".xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    //导出xls 开始
    if (!empty($title)){
        foreach ($title as $k => $v) {
            $title[$k]=$v;
        }
        $title= implode("\t", $title);
        echo "$title\n";
    }
    if (!empty($data)){
        foreach($data as $key=>$val){
            foreach ($val as $ck => $cv) {
                $data[$key][$ck]=$cv;
            }
            $data[$key]=implode("\t", $data[$key]);
            
        }
        echo implode("\n",$data);
    }
 }

?>
