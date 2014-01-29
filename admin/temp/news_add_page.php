<html>
<head>
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>New Problem</title>
</head>
<body leftmargin="30" >

<?php require("admin-header.php");
 require("../include/db_info.inc.php");
if (!$_SESSION['U'] -> getU_id() == "admin"){
	echo "<a href='../index.php'>Please Login First!</a>";
	exit(1);
}

include("../fckeditor/fckeditor.php") ;
?>
<form method=POST action=news_add.php>

<p align=left>Post a News</p>
<p align=left>Title:<input type=text name=title size=71></p>

<p align=left>Content:<br>
<?php
$description = new FCKeditor('content') ;
$description->BasePath = '../fckeditor/' ;
$description->Height = 450 ;
$description->Width=800;

$description->Value = '<p></p>' ;
$description->Create() ;
?>
</p>
<?php require("../include/set_post_key.php");?>
<input type=submit value=Submit name=submit>
</div></form>
<p>
<?php require("../inc/footer.php");?>
</body></html>

