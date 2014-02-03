<?php
class Global_elem{
	const DOMAIN_NAME = "沈阳工业大学ACM";
	const URL = "http://acm.sut.edu.cn/";
	const HEADER_NAME = "沈阳工业大学ACM-LAB";
	const LOGO = "image/logo.png";
	const CHAR_SET = "urf-8";
	const AUTHOR = "SUT ACM TEAM";
	const KEYWORDS = "sut,acm,acm-icpc,沈阳工业大学,Shenyang University Of Technology";	
	function get_title($title,$domain="沈阳工业大学ACM"){return $title.'-'.$domain;}	
	function get_copyright($Y){return  "Shenyang University Of Technology \nOnline Judge 14.04LTS \nver:Hummingbird \nCopyright 2010-".$Y." \n© SUT ACM TEAM \nPowered By SUTACM LAB. & hustoj \nAll Copyright Reserved \nGPL2.0 2011 ";}
}
?>

