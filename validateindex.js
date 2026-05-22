function validate()
 {
    var username = document.forms["loginForm"]["emailUsername"].value;
    var password = document.forms["loginForm"]["password"].value;
	var loginBtn = document.forms["loginForm"]["login"];
    // 2. Form Validation
    if (username==""||password=="") 
	{
        alert("Please fill all fields!");
        return false;
    }

    // 3. Loading State
	return true;
}