// JavaScript Document
//验证表单是否为空
function check(form)
{
	if(document.form.hidden.value=="no")
	{
		return false;
	}
	if(document.form.team_number1.value=="")
	{
		number1_tips.innerHTML="&nbsp;学号不能为空";
		form.team_number1.focus();
		return false;
	}
	if(document.form.team_member1.value=="")
	{
		member1_tips.innerHTML="&nbsp;姓名不能为空";
		if(document.form.hidden.value!="no")
		{
			number1_tips.innerHTML="";
		}
		form.team_member1.focus();
		return false;
	}
	if(document.form.team_name.value=="")
	{
		tips.innerHTML="&nbsp;队名不能为空";
		if(document.form.hidden.value!="no")
		{
			member1_tips.innerHTML="";
			number1_tips.innerHTML="";
		}
		form.team_name.focus();
		return false;
	}
	if(document.form.team_telephone.value=="")
	{
		tips.innerHTML="&nbsp;联系方式不能为空";
		if(document.form.hidden.value!="no")
		{
			member1_tips.innerHTML="";
			number1_tips.innerHTML="";
		}
		form.team_telephone.focus();
		return false;
	}
	if(document.form.password.value=="")
	{
		tips.innerHTML="&nbsp;密码不能为空";
		if(document.form.hidden.value!="no")
		{
			member1_tips.innerHTML="";
			number1_tips.innerHTML="";
		}
		form.password.focus();
		return false;
	}
	if(document.form.password_2.value=="")
	{
		tips.innerHTML="&nbsp;确认密码不能为空";
		if(document.form.hidden.value!="no")
		{
			member1_tips.innerHTML="";
			number1_tips.innerHTML="";
		}
		form.password_2.focus();
		return false;
	}
	if(document.form.password.value!=document.form.password_2.value)
	{
		tips.innerHTML="&nbsp;密码不一致,请重新输入";
		if(document.form.hidden.value!="no")
		{
			member1_tips.innerHTML="";
			number1_tips.innerHTML="";
		}
		form.password.focus();
		return false;
	}
	//校验学号
	var patrn =/^[0-9]{1,9}$/;
	if(!patrn.exec(document.form.team_number1.value)||document.form.team_number1.value.length!=9)
	{
		number1_tips.innerHTML="&nbsp;学号不合法";
		form.team_number1.focus();
		return false;	
	}
	if(document.form.team_number2.value!="")
	{
		if(document.form.team_number1.value==document.form.team_number2.value || document.form.team_number1.value==document.form.team_number3.value|| document.form.team_number2.value==document.form.team_number3.value)
	{
		number1_tips.innerHTML="&nbsp;学号不能重复";
		return false;
	}
		if(!patrn.exec(document.form.team_number2.value)||document.form.team_number2.value.length!=9)
		{
			number2_tips.innerHTML="&nbsp;学号不合法";
			if(document.form.hidden.value!="no")
			{
				number1_tips.innerHTML="";
			}
			form.team_number2.focus();
			return false;	
		}
	}
	if(document.form.team_number3.value!="")
	{
		if(document.form.team_number1.value==document.form.team_number2.value || document.form.team_number1.value==document.form.team_number3.value|| document.form.team_number2.value==document.form.team_number3.value)
	{
		number1_tips.innerHTML="&nbsp;学号不能重复";
		return false;
	}
		if(!patrn.exec(document.form.team_number3.value)||document.form.team_number3.value.length!=9)
		{
			number3_tips.innerHTML="&nbsp;学号不合法";
			if(document.form.hidden.value!="no")
			{
				number1_tips.innerHTML="";
				number2_tips.innerHTML="";
			}
			form.team_number3.focus();
			return false;	
		}
	}
	//校验手机号
	var patrn2 =/^[0-9]{1,11}$/;
	if(!patrn2.exec(document.form.team_telephone.value)|| document.form.team_telephone.value.length!=11)
	{
		tips.innerHTML="&nbsp;手机号不合法";
		if(document.form.hidden.value!="no")
		{
			number1_tips.innerHTML="";
			number2_tips.innerHTML="";
			number3_tips.innerHTML="";
		}
		form.team_telephone.focus();
		return false;	
	}
	
}
//验证学号是否已存在
function check_number1(form)
{
	if(form.team_number1.value!="")
	{
		ajaxCallback = DisplayResults;
		ajaxRequest('acm_2_check_number_ajax.php?number='+form.team_number1.value);
		function DisplayResults ()
		{
			//alert(ajaxreq.responseText);
			if(ajaxreq.responseText=='1')
			{
				number1_tips.innerHTML="该学号已存在";
				form.hidden.value="no";
			}
			else
			{
				number1_tips.innerHTML="";
				form.hidden.value="yes";
			}
		}
	}
}
function check_number2(form)
{
	if(form.team_number2.value!="")
	{
		ajaxCallback = DisplayResults;
		ajaxRequest('acm_2_check_number_ajax.php?number='+form.team_number2.value);
		function DisplayResults ()
		{
			//alert(ajaxreq.responseText);
			if(ajaxreq.responseText=='1')
			{
				number2_tips.innerHTML="该学号已存在";
				form.hidden.value="no";
			}
			else
			{
				number2_tips.innerHTML="";
				form.hidden.value="yes";
			}
		}
	}
}
function check_number3(form)
{
	if(form.team_number3.value!="")
	{
		ajaxCallback = DisplayResults;
		ajaxRequest('acm_2_check_number_ajax.php?number='+form.team_number3.value);
		function DisplayResults ()
		{
			//alert(ajaxreq.responseText);
			if(ajaxreq.responseText=='1')
			{
				number3_tips.innerHTML="该学号已存在";
				form.hidden.value="no";
			}
			else
			{
				number3_tips.innerHTML="";
				form.hidden.value="yes";
			}
		}
	}
}