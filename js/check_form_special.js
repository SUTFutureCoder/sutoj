// JavaScript Document
//验证表单是否为空
function check(form)
{
//	alert($("input[name=Radio1]:radio:checked").val());
	if(document.form.password.value==document.form.password_2.value)
	{
		team_tips.innerHTML="";
	}
	if(document.form.hidden.value=="no")
	{
		return false;
	}
	if(document.form.team_number1.value=="")
	{
		number1_tips.innerHTML="<br/>学号不能为空";
		form.team_number1.focus();
		return false;
	}
	var rname=/[\u4E00-\u9FA5]/;
 if( !rname.test(document.form.team_member1.value))  {
		member1_tips.innerHTML="<br/>姓名不合法";
     document.form.team_member1.focus();
	 document.form.team_member1.select();
     return false;
  }
	if(document.form.team_member1.value=="")
	{
		member1_tips.innerHTML="<br/>姓名不能为空";
		if(document.form.hidden.value!="no")
		{
			number1_tips.innerHTML="";
		}
		form.team_member1.focus();
		return false;
	}
		if(document.form.team_name.value.length>=50)
	{

		team_tips.innerHTML="队名不能大于50个字符";
		if(document.form.hidden.value!="no")
		{
			member1_tips.innerHTML="";
			number1_tips.innerHTML="";
		}
		form.team_name.focus();

		return false;
	}

	if(document.form.team_name.value==="")
	{

		team_tips.innerHTML="队名不能为空";
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
		team_tips.innerHTML="联系方式不能为空";
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
		team_tips.innerHTML="密码不能为空";
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
		team_tips.innerHTML="确认密码不能为空";
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
		team_tips.innerHTML="密码不一致,请重新输入";
		if(document.form.hidden.value!="no")
		{
			member1_tips.innerHTML="";
			number1_tips.innerHTML="";
		}
		form.password.focus();
		return false;
	}
	//校验学号
	
	if(document.form.team_number1.value!=document.form.team_number2.value)
	{
		number1_tips.innerHTML="";
	}
	if(document.form.team_number1.value!=document.form.team_number3.value)
	{
		number1_tips.innerHTML="";
	}
	if(document.form.team_number2.value!=document.form.team_number3.value)
	{
		number2_tips.innerHTML="";
	}
	var patrn =/^[0-9]{1,9}$/;
	if(!patrn.exec(document.form.team_number1.value)||document.form.team_number1.value.length!=9)
	{
		number1_tips.innerHTML="学号不合法";
		form.team_number1.focus();
		return false;	
	}
	if(document.form.team_number2.value!="")
	{
		if(document.form.team_number1.value==document.form.team_number2.value)
		{
			number1_tips.innerHTML="学号不能重复";
			return false;
		}
		if(!patrn.exec(document.form.team_number2.value)||document.form.team_number2.value.length!=9)
		{
			number2_tips.innerHTML="学号不合法";
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
		if(document.form.team_number1.value==document.form.team_number3.value)
		{
			number1_tips.innerHTML="学号不能重复";
			return false;
		}
		if(document.form.team_number2.value==document.form.team_number3.value)
		{
			number2_tips.innerHTML="学号不能重复";
			return false;
		}
		if(!patrn.exec(document.form.team_number3.value)||document.form.team_number3.value.length!=9)
		{
			number3_tips.innerHTML="学号不合法";
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
		team_tips.innerHTML="手机号不合法";
		if(document.form.hidden.value!="no")
		{
			number1_tips.innerHTML="";
			number2_tips.innerHTML="";
			number3_tips.innerHTML="";
		}
		form.team_telephone.focus();
		return false;	
	}
	//检验所报比赛是否符合标准
	if(document.form.team_number1.value!="")
	{
		var num1 = $('#num1').attr('value');
		
		num1 = num1.substring(0,2);
		num1 = parseInt(num1);
		if(num1<13&&($("input[name=freshman_contest]:radio:checked").val() == "1"))
		{
			alert("新生赛专为13级同学准备..各位学长学姐们选择'校赛'..");
			return false;	
		}
				
	}
	if(document.form.team_number2.value!="")
	{
		var num2 = $('#num2').attr('value');
		
		num2 = num2.substring(0,2);
		num2 = parseInt(num2);
		if(num2<13&&($("input[name=freshman_contest]:radio:checked").val() == "1"))
		{
			alert("新生赛专为13级同学准备..各位学长学姐们选择'校赛'..");
			return false;	
		}
				
	}
	if(document.form.team_number3.value!="")
	{
		var num3 = $('#num3').attr('value');
		
		num3 = num3.substring(0,2);
		num3 = parseInt(num3);
		if(num3<13&&($("input[name=freshman_contest]:radio:checked").val() == "1"))
		{
			alert("新生赛专为13级同学准备..各位学长学姐们选择'校赛'..");	
			return false;
		}
				
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
function show(name)
{
	$(name).slideDown('normal');
}
function hide(name)
{
	$(name).slideUp('normal');
}


