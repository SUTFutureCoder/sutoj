
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv='refresh' content='60'>
	<?php require_once("inc/header1.php");?>

	<title><?php echo $view_title?></title>
	<link rel=stylesheet href='css/sutoj.css' type='text/css'>

</head>
<body>

	
	 <div id="content" style="margin: 0px auto;">
   
   		    <div class="carousel-box">
         <div class="box">
            <div class="border-right">
               <div class="border-left">
                  <div class="left-top-corner">
                     <div class="right-top-corner">
                        <div class="inner">
<div id=main>



<div id=center>
<table id=result-tab class="table table-striped content-box-header" align=center width=80%>
<thead>
<tr  class='success toprow' >
<th ><?php echo $MSG_RUNID?>
<th ><?php echo $MSG_USER?>
<th ><?php echo $MSG_PROBLEM?>
<th ><?php echo $MSG_RESULT?>
<th ><?php echo $MSG_MEMORY?>
<th ><?php echo $MSG_TIME?>
<th ><?php echo $MSG_LANG?>
<th ><?php echo $MSG_CODE_LENGTH?>
<th ><?php echo $MSG_SUBMIT_TIME?>
</tr>
</thead>

<tbody>
			<?php 
			
			$cnt=0;
			foreach($view_status as $row){
				if ($cnt) 
					echo "<tr class='oddrow'>";
				else
					echo "<tr class='evenrow'>";
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
</table>

</div>
<div id=center>
<?php echo "[<a href=status.php?".$str2.">Top</a>]&nbsp;&nbsp;";
if (isset($_GET['prevtop']))
        echo "[<a href=status.php?".$str2."&top=".$_GET['prevtop'].">Previous Page</a>]&nbsp;&nbsp;";
else
        echo "[<a href=status.php?".$str2."&top=".($top+20).">Previous Page</a>]&nbsp;&nbsp;";
echo "[<a href=status.php?".$str2."&top=".$bottom."&prevtop=$top>Next Page</a>]";
?>
</div>




</div><!--end main-->
</body>
<script type="text/javascript">
  var i=0;
  var judge_result=[<?php
  foreach($judge_result as $result){
    echo "'$result',";
  }
?>''];
//alert(judge_result[0]);
function findRow(solution_id){
    var tb=window.document.getElementById('result-tab');
     var rows=tb.rows;

      for(var i=1;i<rows.length;i++){
                var cell=rows[i].cells[0];
//              alert(cell.innerHTML+solution_id);
        if(cell.innerHTML==solution_id) return rows[i];
      }
}

function fresh_result(solution_id)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
     var tb=window.document.getElementById('result-tab');
     var row=findRow(solution_id);
     //alert(row);
     var r=xmlhttp.responseText;
     var ra=r.split(",");
//     alert(r);
//     alert(judge_result[r]);
      var loader="<img width=18 src=image/loader.gif>";
     row.cells[3].innerHTML="<span class='btn btn-warning'>"+judge_result[ra[0]]+"</span>"+loader;
     row.cells[4].innerHTML=ra[1];
     row.cells[5].innerHTML=ra[2];
     if(ra[0]<4)
        window.setTimeout("fresh_result("+solution_id+")",2000);
     else
        window.location.reload();

    }
  }
xmlhttp.open("GET","status-ajax.php?solution_id="+solution_id,true);
xmlhttp.send();
}
<?php if ($last>0&&$_SESSION['user_id']==$_GET['user_id']) echo "fresh_result($last);";?>
</script>
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

</html>
