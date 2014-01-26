<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $view_title?></title>
	<link rel=stylesheet href="css/sutoj.css" type="text/css">
</head>
	<?php require("inc/header1.php");?>

<body>
	 <div id="content" style="margin: 0px auto;">
   
   		    <div class="carousel-box">
         <div class="box">
            <div class="border-right">
               <div class="border-left">
                  <div class="left-top-corner">
                     <div class="right-top-corner">
                        <div class="inner">
<br>

<div id=main>	
	
<link href='extra/highlight/styles/shCore.css' rel='stylesheet' type='text/css'/> 
<link href='extra/highlight/styles/shThemeDefault.css' rel='stylesheet' type='text/css'/> 
<script src='extra/highlight/scripts/shCore.js' type='text/javascript'></script> 
<script src='extra/highlight/scripts/shBrushCpp.js' type='text/javascript'></script> 
<script src='extra/highlight/scripts/shBrushCss.js' type='text/javascript'></script> 
<script src='extra/highlight/scripts/shBrushJava.js' type='text/javascript'></script> 
<script src='extra/highlight/scripts/shBrushDelphi.js' type='text/javascript'></script> 
<script src='extra/highlight/scripts/shBrushRuby.js' type='text/javascript'></script> 
<script src='extra/highlight/scripts/shBrushBash.js' type='text/javascript'></script>
<script src='extra/highlight/scripts/shBrushPython.js' type='text/javascript'></script> 
<script src='extra/highlight/scripts/shBrushPhp.js' type='text/javascript'></script> 
<script src='extra/highlight/scripts/shBrushPerl.js' type='text/javascript'></script> 
<script src='extra/highlight/scripts/shBrushCSharp.js' type='text/javascript'></script> 
<script src='extra/highlight/scripts/shBrushVb.js' type='text/javascript'></script>

<script language='javascript'> 
SyntaxHighlighter.config.bloggerMode = false;
SyntaxHighlighter.config.clipboardSwf = 'extra/highlight/scripts/clipboard.swf';
SyntaxHighlighter.all();
</script>
<?php
	
	switch($sproblem_id)
	{
		case 1001: $sproblem_id = "A"; break;
		case 1002: $sproblem_id = "B"; break;
		case 1003: $sproblem_id = "C"; break;
		case 1004: $sproblem_id = "D"; break;
		case 1005: $sproblem_id = "E"; break;
		case 1006: $sproblem_id = "F"; break;
		case 1007: $sproblem_id = "G"; break;
		case 1008: $sproblem_id = "H"; break;
		case 1009: $sproblem_id = "A"; break;
		case 1010: $sproblem_id = "B"; break;
		case 1011: $sproblem_id = "C"; break;
		case 1012: $sproblem_id = "D"; break;
		case 1013: $sproblem_id = "E"; break;
		case 1014: $sproblem_id = "F"; break;
		case 1015: $sproblem_id = "G"; break;
		case 1016: $sproblem_id = "H"; break;
	}

   if ($ok==true){
		if($view_user_id!=$_SESSION['U'] -> getU_id())
			echo "<a href='mail.php?to_user=$view_user_id&title=$MSG_SUBMIT $id'>Mail the auther</a>";
		$brush=strtolower($language_name[$slanguage]);
		if ($brush=='pascal') $brush='delphi';
		if ($brush=='obj-c') $brush='c';
		if ($brush=='freebasic') $brush='vb';
		echo "<pre class=\"brush:".$brush.";\">";
		ob_start();
		echo "/**************************************************************\n";
		echo "\tProblem: $sproblem_id\n\tUser: $suser_id\n";
		echo "\tLanguage: ".$language_name[$slanguage]."\n\tResult: ".$judge_result[$sresult]."\n";
		if ($sresult==4){
			echo "\tTime:".$stime." ms\n";
			echo "\tMemory:".$smemory." kb\n";
		}
		echo "****************************************************************/\n\n";
		$auth=ob_get_contents();
		ob_end_clean();

		echo htmlspecialchars(str_replace("\n\r","\n",$view_source))."\n".$auth."</pre>";
		
	}else{
		
		echo "I am sorry, You could not view this code!";
	}
?>
</div><!--end main-->


		       <div class="wrapper">
					  </div> 
                  </div>
               </div>
            </div>

            <div class="border-bot">
               <div id="footer">
      <p><br/> (C) 沈阳工业大学ACM实验室</p>
   </div>

               <div class="left-bot-corner">
                  <div class="right-bot-corner">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   </div>
   </div>	<?php require("inc/footer.php");?>

</body>
</html>
