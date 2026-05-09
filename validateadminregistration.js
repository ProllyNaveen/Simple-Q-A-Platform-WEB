function validateForm(){

    var firstname = document.forms["addadminForm"]["firstname"].value;
    var lastname = document.forms["addadminForm"]["lastname"].value;
    var username = document.forms["addadminForm"]["username"].value;
    var email = document.forms["addadminForm"]["email"].value;
    var password = document.forms["addadminForm"]["password"].value;
    var cpassword = document.forms["addadminForm"]["Cpassword"].value;

    // First Name check
    if(firstname == ""){
        alert("First Name is required");
        return false;
    }

    // Last Name check
    if(lastname == ""){
        alert("Last Name is required");
        return false;
    }

    // Username check
    if(username == ""){
        alert("Username is required");
        return false;
    }

    // Email check
    if(email == ""){
        alert("Email is required");
        return false;
    }
    
    // Password check
    if(password == ""){
        alert("Password is required");
        return false;
    }

    // Password length
    if(password.length < 6){
        alert("Password must be at least 6 characters");
        return false;
    }

    // Confirm Password check
    if(cpassword == ""){
        alert("Please confirm your password");
        return false;
    }

    // Password match check
    if(password != cpassword){
        alert("Passwords do not match");
        return false;
    }

    return true;
}