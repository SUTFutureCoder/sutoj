<link rel=stylesheet href='css/bootstrap.min.css' type='text/css'>
<link rel=stylesheet href='css/bootstrap-responsive.min.css' type='text/css'>
<style>
thead{
	color:red;
}
.bordered tr:hover {  
background: #b1f8ef;  
-o-transition: all 0.1s ease-in-out;  
-webkit-transition: all 0.1s ease-in-out;  
-moz-transition: all 0.1s ease-in-out;  
-ms-transition: all 0.1s ease-in-out;  
transition: all 0.1s ease-in-out;  
}  
</style>
<?php 
if(isset($_POST['do'])){
	require("../include/my_func.inc.php");
	require("../include/db_info.inc.php");
	for($i = 1; $i <= $_POST['fin_user_id']; $i++){	
		$sql = "SELECT * FROM users WHERE team_id = '$i'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		for($n = 0, $m = 0; $n < 3; $n++, $m += 2){
			$team_number1[$n] = substr($row['team_number1'], $m, 2);
			$team_number2[$n] = substr($row['team_number2'], $m, 2);
			$team_number3[$n] = substr($row['team_number3'], $m, 2);
		}
		$grade[$team_number1[0]]++;
		$grade[$team_number2[0]]++;
		$grade[$team_number3[0]]++;
		$school[$team_number1[1]]++;
		$school[$team_number2[1]]++;
		$school[$team_number3[1]]++;
		$major[$team_number1[1] . $team_number1[2]]++;
		$major[$team_number2[1] . $team_number2[2]]++;
		$major[$team_number3[1] . $team_number3[2]]++;
		$grade_major[$team_number1[0] . $team_number1[1] . $team_number1[2]]++;
		$grade_major[$team_number2[0] . $team_number2[1] . $team_number2[2]]++;
		$grade_major[$team_number3[0] . $team_number3[1] . $team_number3[2]]++;
	}	
	
	
	$grade_key = array_keys($grade);	//获取键值【关键分类信息】
	sort($grade_key);					//第一次排序，找出0值
	unset($grade_key[0]);				//消除0值
	sort($grade_key);					//第二次排序，恢复从零开始
	$grade_key_count = count($grade_key);
	
	$school_key = array_keys($school);
	sort($school_key);
	unset($school_key[0]);
	sort($school_key);
	$school_key_count = count($school_key);
	//var_dump($school_key);
	
	$major_key = array_keys($major);
	sort($major_key);
	unset($major_key[0]);
	sort($major_key);
	$major_key_count = count($major_key);
	
	$grade_major_key = array_keys($grade_major);
	sort($grade_major_key);
	unset($grade_major_key[0]);
	unset($grade_major_key[1]);		//清除NULL
	sort($grade_major_key);
	$grade_major_key_count = count($grade_major_key);
	
	//var_dump($school);
		
//基础信息已获取完毕，准备提取
	for($i = 0; $i < $grade_key_count; $i++){
		$grade_result[$i][0] = $grade_key[$i];
		$grade_result[$i][1] = $grade[$grade_key[$i]];	
	}
	//var_dump($grade_result);
	for($i = 0; $i < $school_key_count; $i++){
		$sql_school = "SELECT `id`, `student_school`, `student_major` FROM student_information WHERE `id` LIKE '__". $school_key[$i] .  "___'";	//探嗅中文学院名称
		$result = mysql_query($sql_school);
		$row = mysql_fetch_array($result);
		//var_dump($row);
		//echo $row[1];
		//break;
		
		//for($n = 0; $n < $)
		$school_result[$i][0] = $row[1];
		$school_result[$i][1] = $school[$school_key[$i]];
	}
	//var_dump($school_result); 
	
	for($i = 0; $i < $major_key_count; $i++){
		$sql_major = "SELECT `id`, `student_school`, `student_major` FROM student_information WHERE `id` LIKE '__". $major_key[$i] .  "_'";
		$result = mysql_query($sql_major);
		$row = mysql_fetch_array($result);
		
		//var_dump($row);
		$major_result[$i][0] = $row[1] . "-" . $row[2];
		$major_result[$i][1] = $major[$major_key[$i]];	
	}
	//var_dump($major_result);
	
	//var_dump($grade_major_key);
	for($i = 0; $i < $grade_major_key_count; $i++){
		$sql_grade_major = "SELECT `id`, `student_school`, `student_major` , `student_grade` FROM student_information WHERE `id` LIKE '". $grade_major_key[$i] .  "_'";
		$result = mysql_query($sql_grade_major);
		$row = mysql_fetch_array($result);
		
		//var_dump($row);
		$grade_major_result[$i][0] = $row[3] . "-" . $row[1] . "-" . $row[2];
		$grade_major_result[$i][1] = $grade_major[$grade_major_key[$i]];
	}	
	//var_dump($grade_major_result);
	
function fore($array){	
	foreach($array as $k => $v){
	echo "<tr>";
		if(is_int($v)){
			echo "<td>$v</td>";
		}else if(is_array($v)){
			foreach($v as $k2 => $v2){
				echo "<td>$v2</td>";			
			}		
		}
	echo "</tr>";	
	}
	echo "</tbody>";
}

	echo "<table class=\"table bordered table-bordered\">
	<thead>
	<tr>
	<th>年级分类</th>
	<th>人数</th>
	</tr>
	</thead>
	<tbody>";
	fore($grade_result);
	
	echo "<thead>
	<tr>
	<th>学院分类</th>
	<th>人数</th>
	</tr>
	</thead>
	<tbody>";
	fore($school_result);
	
	echo "<thead>
	<tr>
	<th>专业分类</th>
	<th>人数</th>
	</tr>
	</thead>
	<tbody>";
	fore($major_result);
	
	echo "<thead>
	<tr>
	<th>综合分类</th>
	<th>人数</th>
	</tr>
	</thead>
	<tbody>";
	fore($grade_major_result);
	
	echo "</table>";
}
?>
