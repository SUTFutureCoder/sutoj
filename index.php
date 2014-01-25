<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="icon/favicon.ico" type="image/x-icon">
<link rel="icon" href="icon/favicon.ico" type="image/x-icon">
<?php require("inc/head.php");?>
<title><?php echo $domain_name;?></title>
</head>
<body style="background-image: url('images/background.jpg')">
<div>
<?php
@session_start ();
if(isset($_SESSION['U']))
	require "inc/header1.php";
else
	require "inc/header.php";
?>
<?php require("inc/content.php");?>
</div>
</div>
</body>
</html>
