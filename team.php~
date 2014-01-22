﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿﻿<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<?php
include "include/db_info.inc.php";
include "inc/head.php";
include "inc/header1.php";
?> 






<style>
table {  
*border-collapse: collapse; /* IE7 and lower */  
border-spacing: 0;  
width: 90%;  
}  
  
.bordered {  
border: solid #ccc 1px;  
-moz-border-radius: 6px;  
-webkit-border-radius: 6px;  
border-radius: 6px;  
-webkit-box-shadow: 0 1px 1px #ccc;  
-moz-box-shadow: 0 1px 1px #ccc;  
box-shadow: 0 1px 1px #ccc;  
left:2px;
}  
  
.bordered tr:hover {  
background: #b1f8ef;  
-o-transition: all 0.1s ease-in-out;  
-webkit-transition: all 0.1s ease-in-out;  
-moz-transition: all 0.1s ease-in-out;  
-ms-transition: all 0.1s ease-in-out;  
transition: all 0.1s ease-in-out;  
}  
  
.bordered td, .bordered th {  
border-left: 1px solid #ccc;  
border-top: 1px solid #ccc;  
padding: 10px;  
text-align: left;  
color: black;
}  
  
.bordered th {  
background-color: #dce9f9;  
background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc), to(#dce9f9));  
background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);  
background-image: -moz-linear-gradient(top, #ebf3fc, #dce9f9);  
background-image: -ms-linear-gradient(top, #ebf3fc, #dce9f9);  
background-image: -o-linear-gradient(top, #ebf3fc, #dce9f9);  
background-image: linear-gradient(top, #ebf3fc, #dce9f9);  
-webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;  
-moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;  
border-top: none;  
text-shadow: 0 1px 0 rgba(255,255,255,.5);  
}  
  
.bordered td:first-child, .bordered th:first-child {  
border-left: none;  
}  
  
.bordered th:first-child {  
-moz-border-radius: 6px 0 0 0;  
-webkit-border-radius: 6px 0 0 0;  
border-radius: 6px 0 0 0;  
}  
  
.bordered th:last-child {  
-moz-border-radius: 0 6px 0 0;  
-webkit-border-radius: 0 6px 0 0;  
border-radius: 0 6px 0 0;  
}  
  
.bordered th:only-child{  
-moz-border-radius: 6px 6px 0 0;  
-webkit-border-radius: 6px 6px 0 0;  
border-radius: 6px 6px 0 0;  
}  
  
.bordered tr:last-child td:first-child {  
-moz-border-radius: 0 0 0 6px;  
-webkit-border-radius: 0 0 0 6px;  
border-radius: 0 0 0 6px;  
}  
  
.bordered tr:last-child td:last-child {  
-moz-border-radius: 0 0 6px 0;  
-webkit-border-radius: 0 0 6px 0;  
border-radius: 0 0 6px 0;  
}  
  

}  
  
</style>  
 <div id="content" style="margin: 0px auto;">
   
   		    <div class="carousel-box">
         <div class="box">
            <div class="border-right">
               <div class="border-left">
                  <div class="left-top-corner">
                     <div class="right-top-corner">
                        <div class="inner">

					   <div class="find">
 				       <h3>参赛队伍</h3>
					<div class="margin"><img src="images/margin.jpg"/></div>
<?php



$sql = "SELECT * FROM users ORDER BY team_id ";
$result =mysql_query($sql);



if($result)
{
	
	
	echo "	<center>

	<table width=\"90%\"; border=\"0\"; style=\" font-size:20px; font-family:微软雅黑;\" class=\"bordered\">
	<thead> 
	<tr align=\"center\" height=\"15px;\">
  		<td width=10% >team号</td>
    	<td width=20% >队名</td>
    	<td width=20% >队长</td>
    	<td width=20% >队员</td>
    	<td width=20% >队员</td>
    	<td width=10% >新生赛</td>
  	</tr>
	</thead> ";
	while ($row = mysql_fetch_array($result))
  	{
	if($row["team_id"] <= 0)
	continue;
	
	
	if($row["freshman_contest"])
	$row["freshman_contest"] = "Y";
	else
	$row["freshman_contest"] = "N";
	echo "<tr align=\"center\">
  		<td  align=\"center\">$row[user_id]</td>
    	<td height=50>$row[nick]</td>
    	<td>$row[team_member1]</td>
    	<td>$row[team_member2]</td>
    	<td>$row[team_member3]</td>
    	<td>$row[freshman_contest]</td>
  	</tr>";
	}
}

echo "</table>";
echo "</center>";

echo "</br></br></br></br>"
?> 	

						</div>

					   <div id="result">
					   
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
   </div>




<?php include("inc/footer.php");
?>


