function validateChangepwInputs()
{
	
	var password = document.forms["updatepasswordForm"]["current_password"].value;
	var newpassword = document.forms["updatepasswordForm"]["new_password"].value;
	var confirmpassword = document.forms["updatepasswordForm"]["confirm_password"].value;
	
	
	if(password == ""){
		alert("Please enter your Current password");
		return false;
	}
	if(newpassword ==""){
		alert("Please enter your New password");
		return false;
	}
	if(newpassword.length <6){
		alert("Password must be atleast 6 characters!");
		return false;
	}
	if(confirmpassword == ""){
		alert("Please Confirm your password");
		return false;
	}
	if(newpassword != confirmpassword){
		alert("New password and Confirm password does not match");
		return false;
	}
	return true;
	
	
	
}