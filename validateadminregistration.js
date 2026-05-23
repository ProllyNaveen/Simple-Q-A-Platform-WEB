

function validateForm(){

    var firstname = document.forms["addadminForm"]["firstname"].value;
    var lastname = document.forms["addadminForm"]["lastname"].value;
    var username = document.forms["addadminForm"]["username"].value;
    var email = document.forms["addadminForm"]["email"].value;
    var password = document.forms["addadminForm"]["password"].value;
    var cpassword = document.forms["addadminForm"]["Cpassword"].value;

    
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

    
    if(password == ""){
        alert("Password is required");
        return false;
    }

    
    if(password.length < 6){
        alert("Password must be at least 6 characters");
        return false;
    }

    
    if(cpassword == ""){
        alert("Please confirm your password");
        return false;
    }

    
    if(password != cpassword){
        alert("Passwords do not match");
        return false;
    }

    return true;
}