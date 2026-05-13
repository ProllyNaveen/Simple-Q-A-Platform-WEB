function validateUpdateInputs()
{
	var firstname = document.forms["editprofileForm"]["firstname"].value;
	var lastname = document.forms["editprofileForm"]["lastname"].value;
	var username = document.forms["editprofileForm"]["username"].value;
	var email = document.forms["editprofileForm"]["email"].value;
	
	if(firstname == "") {
        alert("Please enter your first name!");
        return false;
    }
    if(lastname == "") {
        alert("Please enter your last name!");
        return false;
    }
    if(username == "") {
        alert("Please enter a username!");
        return false;
    }
    if(email == "") {
        alert("Please enter your email!");
        return false;
    }
	
	return true;
}