function addUserPasswordHashing()
{
    document.useraddform.addPassword.value = sha256(document.useraddform.addPassword.value);
    document.useraddform.addPasswordRetype.value = sha256(document.useraddform.addPasswordRetype.value);
}

function usersAddFormCheck()
{
    // Passwords
    if(document.useraddform.addPassword.value.length < 8)
    {
            alert("Your password has to be at least 8 characters.");
            return false;
    }

    if(document.useraddform.addPassword.value=="")
    {
            alert("You must give a password!");
            return false;
    }
    if(document.useraddform.addPasswordRetype.value=="")
    {
            alert("You need to re-type your password");
            return false;
    }
    if(document.useraddform.addPassword.value != document.useraddform.addPasswordRetype.value)
    {
            alert("The passwords do not match, try again.");
            return false;
    }
    const passwordRegex = /^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[?!:;@#$%^&+=]).*$/;
    if (!passwordRegex.test(document.useraddform.addPassword.value))
    {
        alert("The password must contain uppercase and lowercase characters and a special character.")
        return false;
    }

    //Email address
    if(document.useraddform.addEmailAddress.value=="")
    {
        alert("You must give a email!");
        return false;
    }

    if (document.useraddform.addEmailAddress.value.indexOf("@") == -1)
    {
        alert("Your email must contain a @");
        return false;
    }

    //Name and employeeCode
    if(document.useraddform.otherEmployeecode.value == "")
    {
        alert("You must provide an employee code");
        return false;
    }

    if(document.useraddform.employeeNameBox.value == "")
    {
        alert("You must give a name");
        return false;
    }

    addUserPasswordHashing();

    return true;

}