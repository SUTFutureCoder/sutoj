<?php
		function turnid($id)
		{
		switch($id)
		{
			case 1001: case 1009: case 1017: case 1022: $turnedid = "A"; break;
			case 1002: case 1010: case 1018: case 1023: $turnedid = "B"; break;
			case 1003: case 1011: case 1019: case 1024: $turnedid = "C"; break;
			case 1004: case 1012: case 1020: case 1025: $turnedid = "D"; break;
			case 1005: case 1013: case 1021: case 1026: $turnedid = "E"; break;
			case 1006: case 1014: $turnedid = "F"; break;
			case 1007: case 1015: $turnedid = "G"; break;
			case 1008: case 1016: $turnedid = "H"; break;
			
		
		
		}
		
		return $turnedid;
		}
		
		function turnballoon($turnedballoon)
		{
			switch($turnedballoon)
			{
			case 1001: case 1009: case 1017: case 1022: $turnedballoon = "红"; break;
			case 1002: case 1010: case 1018: case 1023: $turnedballoon = "紫"; break;
			case 1003: case 1011: case 1019: case 1024: $turnedballoon = "黄"; break;
			case 1004: case 1012: case 1020: case 1025: $turnedballoon = "粉"; break;
			case 1005: case 1013: case 1021: case 1026: $turnedballoon = "蓝"; break;
			case 1006: case 1014: $turnedballoon = "橘黄"; break;
			case 1007: case 1015: $turnedballoon = "绿"; break;
			case 1008: case 1016: $turnedballoon = "白"; break;		
			
			}	
		
		return $turnedballoon;

		
		}
?>
