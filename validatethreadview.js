function validate()
{
	var reply = document.forms["postReplyForm"]["replybody"].value;
	
	if(reply=="")
	{
		alert("Your reply cant be empty!");
		return false;
	}
	if(reply.trim().length() > 500)
	{
		alert("Your reply is too long");
		return false;
	}
	return true;
	
}