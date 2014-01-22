
var xmlhttp=false,ajaxCallback;
function ajaxRequest (filename)
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
	xmlhttp.open("GET",filename,true);
	xmlhttp.onreadystatechange = ajaxResponse;
	xmlhttp.send();
}
function ajaxResponse()
{
	if(xmlhttp.readyState != 4)
		return ;
	if(xmlhttp.status ==200)
	{
		ajaxCallback();
	}
	else 
		alert ("Request failed:"+xmlhttp.statusText());
	return true;
}
