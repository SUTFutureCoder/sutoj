//CopyRight SUTOJ ajax BY:*Chen 

var XHR;	
function ajax(id,mode){
if(mode == 1)
checkid();
if(mode == 2)
checkteamname();

function createXHR(){  			
	if(window.ActiveXObject){
		XHR=new ActiveXObject('Microsoft.XMLHTTP');
	}else if(window.XMLHttpRequest){
		XHR=new XMLHttpRequest();
	}
}
function checkid(){
	var userid=document.getElementById(id).value;
	createXHR();	
	XHR.open("GET","include/checkid.php?id="+userid,true);
	XHR.onreadystatechange=SUTOJ;
	XHR.send(null);
	//alert(id);
}

function checkteamname(){
	var userid=document.getElementById(id).value;
	createXHR();	
	XHR.open("GET","include/checkteamname.php?id="+userid,true);
	XHR.onreadystatechange=SUTOJ;
	XHR.send(null);
	//alert(id);
}
function SUTOJ(){
	if(XHR.readyState == 4){
		if(XHR.status == 200){	
			var textHTML=XHR.responseText;			
			document.getElementById('team_tips').innerHTML=textHTML;
			if(textHTML)
			document.getElementById(id).focus();
			//alert(id);			
		}
	}
}

}
