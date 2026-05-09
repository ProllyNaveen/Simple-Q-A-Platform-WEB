function validate() {
    var firstname = document.forms["regform"]["firstname"].value;
    var lastname = document.forms["regform"]["lastname"].value;
    var username = document.forms["regform"]["username"].value;
    var email = document.forms["regform"]["email"].value;
    var password = document.forms["regform"]["password"].value;
    var cpassword = document.forms["regform"]["Cpassword"].value;

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
    if(password == "") {
        alert("Please enter a password!");
        return false;
    }
    if(password.length < 6) {
        alert("Password must be at least 6 characters!");
        return false;
    }
    if(password != cpassword) {
        alert("Passwords do not match!");
        return false;
    }

    return true;
}