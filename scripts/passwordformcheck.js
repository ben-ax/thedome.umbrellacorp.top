function changePasswordHashing()
{
    document.password_change.oldPassword.value = sha256(document.password_change.oldPassword.value);
    document.password_change.newPassword.value = sha256(document.password_change.newPassword.value);
    document.password_change.againPassword.value = sha256(document.password_change.againPassword.value);
}

function passwordformCheck()
{
	if(document.password_change.oldPassword.value=="")
	{
       		alert("You must give old password!");
	        return false;
	}
    if(document.password_change.oldPassword.value.length < 8 || document.password_change.newPassword.value.length<8)
	{
       		alert("Your password has to be at least 8 characters.");
	        return false;
	}

	if(document.password_change.newPassword.value=="")
	{
       		alert("You must give a password!");
	        return false;
	}
    if(document.password_change.againPassword.value=="")
	{
       		alert("You need to re-type your password");
	        return false;
	}
    if(document.password_change.newPassword.value != document.password_change.againPassword.value)
    {
       		alert("The passwords do not match, try again.");
	        return false;
	}
    const passwordRegex = /^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[?!:;@#$%^&+=]).*$/;
    if (!passwordRegex.test(document.password_change.newPassword.value))
	{
		alert("The password must contain uppercase and lowercase characters and a special character.")
        return false;
	}

	changePasswordHashing();

    return true;

}