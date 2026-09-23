function editUserPasswordHashing()
{
    document.usereditform.editPassword.value = sha256(document.usereditform.editPassword.value);
    document.usereditform.editPasswordRetype.value = sha256(document.usereditform.editPasswordRetype.value);
}

function usersEditFormCheck()
{
    // Passwords
    if(document.usereditform.editPassword.value.length < 8)
    {
            alert("Your password has to be at least 8 characters.");
            return false;
    }

    if(document.usereditform.editPassword.value=="")
    {
            alert("You must give a password!");
            return false;
    }
    if(document.usereditform.editPasswordRetype.value=="")
    {
            alert("You need to re-type your password");
            return false;
    }
    if(document.usereditform.editPassword.value != document.usereditform.editPasswordRetype.value)
    {
            alert("The passwords do not match, try again.");
            return false;
    }
    const passwordRegex = /^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[?!:;@#$%^&+=]).*$/;
    if (!passwordRegex.test(document.usereditform.editPassword.value))
    {
        alert("The password must contain uppercase and lowercase characters and a special character.")
        return false;
    }

    //Email address
    if(document.usereditform.editEmailAddress.value=="")
    {
        alert("You must give a email!");
        return false;
    }

    if (document.usereditform.editEmailAddress.value.indexOf("@") == -1)
    {
        alert("Your email must contain a @");
        return false;
    }

    //Name and employeeCode
    if(document.usereditform.employeeCodeDropdown.value == "or other username" && document.usereditform.otherEmployeecode.value == "")
    {
        alert("You must provide an employee code");
        return false;
    }

    if(document.usereditform.employeeNameBox.value == "")
    {
        alert("You must give a name");
        return false;
    }

    editUserPasswordHashing();

    return true;

}