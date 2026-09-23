function getEmployee()
{
    var employeeCode = document.getElementById("employeeCodeDropdown").value

    if (employeeCode == "or other username")
    {
        document.getElementById("orOtherUsername").style.visibility = "visible";
    }
    else
    {
        document.getElementById("orOtherUsername").style.visibility = "hidden";
    }

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() 
    {
        document.getElementById("employeeNameBox").value = this.responseText;

    }
    xhttp.open("GET","scripts/_f_getemployee.php?employeeCode="+employeeCode+"",true);
    xhttp.send()
}