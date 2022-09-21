

function validateform() {  

	const emailRe =
  /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
	const passwordRe= 
  /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
  var docallowedExtensions =  /(\.pdf|\.doc|\.docx|\.zip|\.rar)$/i;
try {
	var lname=document.getElementsByName('lname')[0].value;
} catch (error) {
	var lname="h";
}
try {
	var member1=document.getElementsByName('member1')[0].value;
} catch (error) {
	var member1="h";
}
try {
	var member2=document.getElementsByName('member2')[0].value;
} catch (error) {
	var member2="h";
}
try {
	var member3=document.getElementsByName('member3')[0].value;
} catch (error) {
	var member3="h";
}
try {
	var member4=document.getElementsByName('member4')[0].value;
} catch (error) {
	var member4="h";
}
try {
	var member5=document.getElementsByName('member5')[0].value;
} catch (error) {
	var member5="h";
}
try {
	var num=document.getElementsByClassName('num');
} catch (error) {
	num=["22"];
}
try {
	var allname=document.getElementsByClassName('allname');
} catch (error) {
	allname=["hello"];
}

try {
	var name=document.getElementsByName('name')[0].value;
} catch (error) {
	var name="h";
}
try {
	var gfname=document.getElementsByName('gfname')[0].value;
} catch (error) {
	var gfname="h";
}
try {
var fname=document.getElementsByName('fname')[0].value; 
} catch (error) {
	var fname="h";
}
try {
var email=document.getElementsByName('email')[0].value;
} catch (error) {
	var email="hello@gmail.com";
}
try {
var phone=document.getElementsByName('phone')[0].value;
} catch (error) {
	var phone="0912345678";
}
try {
var password=document.getElementsByName('password')[0].value??"A123456789a";
} catch (error) {
	var password="A123456789a";
}
try {
var newpassword=document.getElementsByName('newPassword')[0].value??"A123456789a";
} catch (error) {
	var newpassword="A123456789a";
}
try {
var confirmpassword=document.getElementsByName('re_password')[0].value??"A123456789a";
} catch (error) {
	var confirmpassword=password;
}
try {
	var file=document.getElementsByName('file_name')[0].value;
} catch (error) {
	var file="file.pdf";
}
if ((name.search(/^[^0-9]+$/) === -1)){  
  alert("Name can't contain number");  
  return false;
 }else if ((member1.search(/^[^0-9]+$/) === -1)){  
	alert("Name can't contain number");  
	return false;
   }
   else if ((member2.search(/^[^0-9]+$/) === -1)){  
	alert("Name can't contain number");  
	return false;
   }  
   else if ((member3.search(/^[^0-9]+$/) === -1)){  
	alert("Name can't contain number");  
	return false;
   }  
   else if ((member4.search(/^[^0-9]+$/) === -1)){  
	alert("Name can't contain number");  
	return false;
   }  
   else if ((member5.search(/^[^0-9]+$/) === -1)){  
	alert("Name can't contain number");  
	return false;
   }  
 
   else if (!email.match(emailRe)) {
	alert ("Invalid email")
	return false;

 }else if((!phone.startsWith("09"))||phone.length!=10){

	alert("phone should start with '09' and 10 numbers")
	return false;
 }

 else if(!password.match(passwordRe)){  
  alert("Password must be minimum eight characters, at least one letter or at least one number");  
  return false;  
  }  
 else if(!newpassword.match(passwordRe)){  
  alert("Password must be minimum eight characters, at least one letter or at least one number");  
  return false;  
  }  
 else if(confirmpassword!=password){  
  alert("password and confirm password didnot match");  
  return false;  
  }  
  else if(!docallowedExtensions.exec(file))
	{
		alert ("invalid document file type")
		return false;
	}
	for(i=0;i<num.length;i++) {
		x=num[i].value;
		if(x<0||x>100)
		{
			alert("invalid number")
			return false;
		}
	}
	for(i=0;i<allname.length;i++) {
		x=allname[i].value;
		if((X.search(/^[^0-9]+$/) === -1))
		{
			alert("invalid name")
			return false;
		}
	}
	
}

  
