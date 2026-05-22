function validate()
{
	var title = document.forms["createPostForm"]["title"].value;
	var desc = document.forms["createPostForm"]["question"].value;
	
	if(title=="")
	{
		alert("Please enter a title for your thread");
		return false;
	}
	if(desc=="")
	{
		alert("Please give a description for your thread");
		return false;
	}
	if(title.trim().length > 30)
	{
		alert("Thread title is too long");
		return false;
	}
	if(desc.trim().length > 450)
	{
		alert("Thread description is too long");
		return false;
	}
	return true;
}
