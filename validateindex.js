function validate()
 {
    var username = document.forms["loginForm"]["emailUsername"].value;
    var password = document.forms["loginForm"]["password"].value;
	var loginBtn = document.forms["loginForm"]["login"];
    
    if (username==""||password=="") 
	{
        alert("Please fill all fields!");
        return false;
    }

   
	return true;
}