<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<?php require("inc/header1.php");?>
	<link rel=stylesheet href='css/sutoj.css' type='text/css'>
	<title><?php echo $view_title?></title>
	
<script type="text/javascript" src="include/jquery.tablesorter.js"></script> 
<script type="text/javascript">
$(document).ready(function() 
    { 

 $.tablesorter.addParser({ 
        // set a unique id 
        id: 'punish', 
        is: function(s) { 
            // return false so this parser is not auto detected 
            return false; 
        }, 
        format: function(s) { 
            // format your data for normalization 
	    var v=s.toLowerCase().replace(/\:/,'').replace(/\:/,'').replace(/\(-/,'.').replace(/\)/,''); 
	    //alert(v);
	    v=parseFloat('0'+v);
	    return v>1?v:v+Number.MAX_VALUE-1;
        }, 
        // set type, either numeric or text 
        type: 'numeric' 
    }); 

        $("#rank").tablesorter({ 
            headers: { 
                4: { 
                    sorter:'punish' 
                }
		
<?php
for ($i=0;$i<$pid_cnt;$i++){
                echo ",".($i+5).": { ";
                echo "    sorter:'punish' ";
                echo "}";
}
?>
            } 
        }); 
    } 
); 
</script>

	
</head>
<body>
	 <div id="content" style="margin: 0px auto!important;width:100%;">
   
   		    <div class="carousel-box" >
         <div class="box"  style="width:1100px!important;margin-left:-8%!important;">
            <div class="border-right">
               <div class="border-left">
                  <div class="left-top-corner">
                     <div class="right-top-corner">
                        <div class="inner">
<div id=main>


	<table align=center width=90% >
		<thead>

<?php
$rank=1;
?>
<center><h3>Contest RankList -- <?php echo $title?></h3><a href="contestrank.xls.php?cid=<?php echo $cid?>" >Download</a></center>
<table id=rank><thead><tr class=toprow align=center><td class="{sorter:'false'}" width=5%>Rank<th width=10%>User<th width=10%>Nick<th width=5%>Penalty
<?php
for ($i=0;$i<$pid_cnt;$i++)
	echo "<th class=\"{sorter:'punish'}\"><a href=problem.php?cid=$cid&pid=$i>$PID[$i]</a>";
     echo "</tr></thead>\n<tbody>";
for ($i=0;$i<$user_cnt;$i++){
	if ($i&1) echo "<tr class=oddrow align=center>\n";
	else echo "<tr class=evenrow align=center>\n";


	if($rank >= 1 && $rank <= 3)	
	echo "<td style=\"color:red;	background-color:#FFFF00;\">";
	if(($rank >= 4 && $rank <= 12 && !$_SESSION['U'] -> getF_test()) || ($rank >= 4 && $rank <= 9 && $_SESSION['U'] -> getF_test()))
	echo "<td style=\"color:red;	background-color:#CCCCCC;\">";
	if(($rank >= 13 && $rank <= 30 && !$_SESSION['U'] -> getF_test()) || ($rank >= 10 && $rank <= 18 && $_SESSION['U'] -> getF_test()))
	echo "<td style=\"color:red;	background-color:#FF9933;\">";
	if(($rank >30 && !$_SESSION['U'] -> getF_test()) || ($rank >18 && $_SESSION['U'] -> getF_test()))
	echo "<td style=\"color:red;	\">";

	if($rank == 1)
	{echo "Winner";	$uuid=$U[$i]->user_id; $nick=$U[$i]->nick;
 		if($nick[0]!="*")
			$rank++;
		else 
			echo "*";
 	goto a;}
	
//	  	echo "<td style=\"color:red;\">";
		$uuid=$U[$i]->user_id;
		$nick=$U[$i]->nick;
		if($nick[0]!="*")
			echo $rank++;
		else 
			echo "*";
		
a:
	$usolved=$U[$i]->solved;
	$_GET['user_id'] = $_SESSION['U'] -> getU_id();
  if($uuid==$_GET['user_id']) echo "<td>";
  else echo"<td>";
	echo "<a name=\"$uuid\" >$uuid</a>";
	echo "<td alt=\"\"><div style=\"width:100px;overflow:hidden\"><a>".$U[$i]->nick."</a></div>";
	//echo "<td><a href=status.php?user_id=$uuid&cid=$cid>$usolved</a>";
	echo "<td class=red>".sec2str($U[$i]->time);
	//判题部分
	for ($j=0;$j<$pid_cnt;$j++){
		$bg_color="eeeeee";
		 if (isset($U[$i]->p_ac_sec[$j])&&$U[$i]->p_ac_sec[$j]>0){
                	$aa=0x33+$U[$i]->p_wa_num[$j]*32;
                        $aa=$aa>0xaa?0xaa:$aa;
                	$aa=dechex($aa);
			$bg_color="$aa"."ff"."$aa";
                
                
                  //$bg_color="aaffaa";
                        if($uuid==$first_blood[$j]){
                                $bg_color="33ff00";
                        }
			
                        
                        
		}else if(isset($U[$i]->p_wa_num[$j])&&$U[$i]->p_wa_num[$j]>0) {
                        $aa=0xaa-$U[$i]->p_wa_num[$j]*10;
                        $aa=$aa>16?$aa:16;
                	$aa=dechex($aa);
			$bg_color="ff$aa$aa";
		}
		
		
		 echo "<td class=well style='padding:1px;background-color:$bg_color;color:white;'>";
		if(isset($U[$i])){
			if (isset($U[$i]->p_ac_sec[$j])&&$U[$i]->p_ac_sec[$j]>0)
				echo sec2str($U[$i]->p_ac_sec[$j]);
			if (isset($U[$i]->p_wa_num[$j])&&$U[$i]->p_wa_num[$j]>0) 
				echo "(-".$U[$i]->p_wa_num[$j].")";
		}
	}
	echo "</tr>\n";
}
     echo "</tbody></table>";
?>


	<script language="JavaScript">
function myrefresh(){
window.location.reload();
}
setTimeout('myrefresh()',15000); 
</script>

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

</html>
