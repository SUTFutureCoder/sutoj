<?php require("bodyheader.php"); ?>
<script type="text/javascript" src="include/jquery-latest.js"></script> 
<script type="text/javascript" src="include/jquery.tablesorter.js"></script> 
<script type="text/javascript">
$(document).ready(function() 
    { 
        $("#problemset").tablesorter(); 
    } 
); 
</script>


					
<?PHP

if($_SESSION['U'] -> getAut() != "admin")
{		
	

	if(($occurtime < $contesttime['pre_start_time'] && $contesttime['pre']) || ($occurtime < $contesttime['start_time'] && !$contesttime['pre']))
	{
	echo "</br></br><h1 style=\"color:blue\">比赛尚未开始，敬请期待". $conteststart['pre_start_time']  ."</h1></br></br></br></br></br>";
	require("bodyfooter.php");
exit(0);
	}
	if(($occurtime > $contesttime['pre_end_time'] && $contesttime['pre']) || ($occurtime > $contesttime['end_time'] && !$contesttime['pre']))
	{
	echo "</br></br><h1 style=\"color:blue\">比赛已经结束，感谢您的关注！</h1></br></br></br></br></br>";
	require("bodyfooter.php");
exit(0);
	}

}


?>
<h3 align='center'>
 

</h3><center>


	<table id='problemset' width='90%'class='table table-striped'>
                <thead>

                          <tr class='toprow'>
                            <th width='3%'  ></th>
                          	<th width='120px'><A><?php echo $MSG_PROBLEM_ID?></A></th>
                            <th><?php echo $MSG_TITLE?></th>
                            <th width='10%'><?php echo "Status"?></th>
                          </tr>
                </thead>

		  
			<tbody>
			<?php 
			$cnt=0;
			foreach($view_problemset as $row){
				if ($cnt) 
					echo "<tr class='oddrow blue'>";
				else
					echo "<tr class='evenrow blue'>";
				foreach($row as $table_cell){
					echo "<td>";
					echo "\t".$table_cell;
					echo "</td>";
				}
				
				echo "</tr>";
				
				$cnt=1-$cnt;
			}
			?>
			</tbody>
			</table></center>

<?php require("bodyfooter.php");?>
