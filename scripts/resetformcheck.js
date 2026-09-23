function resetformcheck() {
   if(document.password_forgot.employeecode.value=="" || document.password_forgot.employeecode.value.indexOf("-") == -1)
   { 
      alert("You must give employee code.");
      return false;
   }
   if(document.password_forgot.emailaddress.value=="")
   { 
      alert("You must give an email address.");
      return false;
   }
   if(document.password_forgot.notarobot.checked == false)
   { 
      alert("You must not be a robot");
      return false;
   }
}
