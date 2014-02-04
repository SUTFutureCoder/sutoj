<?php
function turnid($id)
{
	$chr = 64;
	if($_SESSION['C'] -> getPre()){		
		$id = ($id - 1000 - $_SESSION['C'] -> getP_sum() * pow(2, $_SESSION['C'] -> getFresh())) % $_SESSION['C'] -> getP_P_sum();
		if(!$id)
			$id = $_SESSION['C'] -> getP_P_sum();						
	}
	else{
		$id = ($id - 1000) % $_SESSION['C'] -> getP_sum();
		if(!$id)
			$id = $_SESSION['C'] -> getP_sum();
	}		
	$chr += $id;					
	return chr($chr);
}
		
function turnballoon($id)
{
	if($_SESSION['C'] -> getPre()){		
		$id = ($id - 1000 - $_SESSION['C'] -> getP_sum() * pow(2, $_SESSION['C'] -> getFresh())) % $_SESSION['C'] -> getP_P_sum();
		if(!$id)
			$id = $_SESSION['C'] -> getP_P_sum();						
	}
	else{
		$id = ($id - 1000) % $_SESSION['C'] -> getP_sum();
		if(!$id)
			$id = $_SESSION['C'] -> getP_sum();
	}		
	$sql = "SELECT * FROM balloon WHERE id = '$id'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);				
	return $row['color'];
}
?>
