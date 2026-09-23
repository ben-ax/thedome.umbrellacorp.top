
function entryFormCheck()
{
	if(document.entryForm.entryHeadingInput.value=="")
	{
       		alert("You must give a heading!");
	        return false;
	}
	if(document.entryForm.newEntry.value=="")
	{
       		alert("You must give an entry text!");
	        return false;
	}
}