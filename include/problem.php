<?php

function addproblem($problem_id, $title, $time_limit, $memory_limit, $description, $input, $output, $sample_input, $sample_output, $hint, $source, $spj,$OJ_DATA) {
	$problem_id = mysql_real_escape_string($problem_id);
	$title=mysql_real_escape_string($title);
	$time_limit=mysql_real_escape_string($time_limit);
	$memory_limit=mysql_real_escape_string($memory_limit);
	$description=mysql_real_escape_string($description);
	$input=mysql_real_escape_string($input);
	$output=mysql_real_escape_string($output);
	$sample_input=mysql_real_escape_string($sample_input);
	$sample_output=mysql_real_escape_string($sample_output);
//	$test_input=($test_input);
//	$test_output=($test_output);
	$hint=mysql_real_escape_string($hint);
	$source=mysql_real_escape_string($source);
//	$spj=($spj);
	
	$sql = "INSERT into `problem` (`problem_id`,`title`,`time_limit`,`memory_limit`,
	`description`,`input`,`output`,`sample_input`,`sample_output`,`hint`,`source`,`spj`,`in_date`,`defunct`)
	VALUES('$problem_id','$title','$time_limit','$memory_limit','$description','$input','$output',
			'$sample_input','$sample_output','$hint','$source','$spj',NOW(),'N')";
	//echo $sql;
	@mysql_query ( $sql ) or die ( mysql_error () );
	$pid = $problem_id;
	echo "<br>Add $pid  ";
	$basedir = "$OJ_DATA/$pid";
	if(!isset($OJ_SAE)||!$OJ_SAE){
			echo "[$title]data in $basedir";
	}
}
function mkdata($pid,$filename,$input,$OJ_DATA){
	
	$basedir = "$OJ_DATA/$pid";
	
	$fp = @fopen ( $basedir . "/$filename", "w" );
	if($fp){
		fputs ( $fp, preg_replace ( "(\r\n)", "\n", $input ) );
		fclose ( $fp );
	}else{
		echo "Error while opening".$basedir . "/$filename ,try [chgrp -R www-data $OJ_DATA] and [chmod -R 771 $OJ_DATA ] ";
		
	}
	
	
	
}

?>
