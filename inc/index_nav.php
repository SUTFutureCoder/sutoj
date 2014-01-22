<?
///////////////////////////////////////////////////////////////////////
/////
/////		此处写的是主页nav部分
/////		函数能读取指定目录下的指定php文件并读取文件中$title="";的部分
/////
///////////////////////////////////////////////////////////////////////
?>
<?php
function getnav($dir) 
{
		$d = dir($dir);echo '<li>';
while($entry = $d->read()) 
{//读取文件列表
//忽略无文件情况
	if(!is_file($entry)) continue;
	//将文件名与扩展名分开
	list($filename,$fileext) = split('\.',$entry,2);
	if(ereg("^index",$filename)||$filename=="more"||$fileext!="php")continue;
	//选出php文件	,搜寻第一行,类似$title="*****";
	$linknm="";
	$fp=fopen($entry,"r");
	while($buffer=fgets($fp,4096)) 
	{//开始读文件
		$buffer = trim($buffer);//去两端空格
		if(ereg("title*=*\'",$buffer))
		{
			eval($buffer);
			$linknm = $title;
			break;
		}
	}
	fclose($fp);
	echo "<a href=\"$entry\">$linknm</a></li><li>";
}$d->close();
}
?>

<nav><ul><li><a href="index.php"><img src="image/home.gif" alt="首页" ><span>首页</span></a></li><?php getnav("./")?><a href="more.php">more</a></li></ul></nav>
