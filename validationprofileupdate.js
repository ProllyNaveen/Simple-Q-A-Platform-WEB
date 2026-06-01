function validateUpdateInputs()
{
	var firstname = document.forms["editprofileForm"]["firstname"].value;
	var lastname = document.forms["editprofileForm"]["lastname"].value;
	var username = document.forms["editprofileForm"]["username"].value;
	var email = document.forms["editprofileForm"]["email"].value;
	
    if(firstname.trim() == ""){
        alert("First Name is required");
        return false;
    }

    
    if(!/^[A-Za-z]+$/.test(firstname)){
        alert("First Name should contain letters only");
        return false;
    }

    
    if(lastname.trim() == ""){
        alert("Last Name is required");
        return false;
    }

    
    if(!/^[A-Za-z]+$/.test(lastname)){
        alert("Last Name should contain letters only");
        return false;
    }

    
    if(username == ""){
        alert("Username is required");
        return false;
    }
    
    
    if(username.length < 4){
        alert("Username must be at least 4 characters");
        return false;
    }

    
    if(email == ""){
        alert("Email is required");
        return false;
    }
    
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(!emailPattern.test(email)){
        alert("Please enter a valid email address");
        return false;
    }
	
	return true;
}