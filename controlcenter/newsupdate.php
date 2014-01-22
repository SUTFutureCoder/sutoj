<?PHP 
	include("../include/db_info.inc.php");
?>


					<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST')
					{
						if(@$_POST['volunteer_news'])
						{
						$content = $_POST['volunteer_news'];
						$sql = "UPDATE news SET content= '$content' WHERE 	news_id = 2";
						$result = mysql_query($sql);
						}
						else{
						$content = $_POST['contest_news'];
						$sql = "UPDATE news SET content= '$content' WHERE 	news_id = 1";
						$result = mysql_query($sql);

						}
						if($result)
						{
								echo "<br><br><br><br><center><h1>修改成功</h1><h2 style=\"color:#F00; font-family:微软雅黑;\"></center>";

						}
						else
						{
							echo "<br><br><br><br><center><h1>修改失败</h1></center>";

						}
						
						
					}

					
					
					
					?> 		