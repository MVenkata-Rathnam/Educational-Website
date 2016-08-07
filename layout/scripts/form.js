function validateemail()
{
	var emailid=document.srform.email.value;
	atpos = emailid.indexOf("@");
 	dotpos = emailid.lastIndexOf(".");
 	if (atpos < 1|| dotpos<atpos+2)
 	{
	 	alert("Please enter correct email id");
                  	 document.srform.email.focus();
 	 	return false;
 	}
	return true;

}
function validatepwd()
{
	var p1=document.srform.password.value;
	var p2=document.srform.cpassword.value;
	if(p1=="")
	{
		alert("Please enter your password");
		document.srform.password.focus();
		return false;
	}
	if(p2=="")
	{
		alert("Please re-enter your password");
	        document.srform.cpassword.focus();
		return false;
	}		
	if(document.srform.rno.value==p1)
	{
		alert("Your register number and password is same.Please enter another password");
		document.srform.password.focus();
		return false;
	}
	re=/[0-9]/;
	if(!re.test(p1))
	{
		alert("Please enter a password which contain atleast one number character");
		document.srform.password.focus();	
		return false;
	}
	re=/[A-Z]/;
	if(!re.test(p1))
	{
		alert("Please enter a password which contain atleast one uppercase character");
		document.srform.password.focus();	
		return false;
	}
	if(p1<6)
	{
		alert("Please enter a password which contain minimum 6 character");
		document.srform.password.focus();
		return false;
	}
	if(p1!=p2)
	{
		alert("Your password and confirm password didn't match.Please re-enter you confirm password");
		document.srform.cpassword.focus();
		return false;
	}
	return true;
}
function validate()
{
	if(document.srform.name.value=="")
	{
		alert("Please enter your name!");
		document.srform.name.focus();
		return false;
	}
	if(document.srform.dob.value=="")
	{
		alert("Please enter your date of birth!");
		document.srform.dob.focus();
		return false;
	}
	if(document.srform.age.value=="")
	{
		alert("Please enter your age!");
		document.srform.age.focus();
		return false;
	}	
	if(document.srform.dep.value=="-1")
	{
		alert("Please select your department!");
		document.srform.dep.focus();
		return false;
	}	
	if(document.srform.address.value=="")
	{
		alert("Please enter your address!");
		document.srform.address.focus();
		return false;
	}
	if(document.srform.email.value=="")
	{
		alert("Please enter your email id!");
		document.srform.email.focus();
		return false;
	}
	else
	{
		var result=validateemail();
		if(result==false)
		{
			return false;
		}
	}	
	if(document.srform.pnum.value==""||document.srform.pnum.value.length!=10)
	{
		alert("Please enter a valid phone number!");
		document.srform.pnum.focus();
		return false;
	}	
	if(document.srform.rno.value=="")
	{
		alert("Please enter your username!");
		document.srform.rno.focus();
		return false;
	}
	else
	{
		var result=validatepwd();
		if(result==false)
		{
			return false;
		}
	}
	return(true);
	alert("Values are successfully filled");
}