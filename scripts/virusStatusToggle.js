function virusStatusToggle(id)
{
    
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() 
    {
        document.getElementById("statusToggleButton").innerText = this.responseText;
        alert("Function done");
    }
    xhttp.open("GET","scripts/_f_virusstatustoggle.php?id="+id+"",true);
    xhttp.send()
}

