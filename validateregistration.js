function validate() {
    var firstname = document.forms["regform"]["firstname"].value;
    var lastname = document.forms["regform"]["lastname"].value;
    var username = document.forms["regform"]["username"].value;
    var email = document.forms["regform"]["email"].value;
    var password = document.forms["regform"]["password"].value;
    var cpassword = document.forms["regform"]["Cpassword"].value;

    // First Name check
    if(firstname.trim() == ""){
        alert("First Name is required");
        return false;
    }

    // First Name letters only
    if(!/^[A-Za-z]+$/.test(firstname)){
        alert("First Name should contain letters only");
        return false;
    }

    // Last Name check
    if(lastname.trim() == ""){
        alert("Last Name is required");
        return false;
    }

    // Last Name letters only
    if(!/^[A-Za-z]+$/.test(lastname)){
        alert("Last Name should contain letters only");
        return false;
    }

    // Username check
    if(username == ""){
        alert("Username is required");
        return false;
    }
    
    // Username length
    if(username.length < 4){
        alert("Username must be at least 4 characters");
        return false;
    }

    // Email check
    if(email == ""){
        alert("Email is required");
        return false;
    }
    
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(!emailPattern.test(email)){
        alert("Please enter a valid email address");
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