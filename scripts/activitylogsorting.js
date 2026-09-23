function sorting()
{
    number = document.getElementById("maxSelect").value;
    type = document.getElementById("sortSelect").value;
  
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST","scripts/_f_activitylog_sort.php",true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("sortAmount=" + number + "&sortType=" + type);
    
    xhttp.onload = function() {
        if (this.status === 200) {
            window.location.href = "activitylog_read.php";
            
        }
    };
    xhttp.send("sortAmount=" + encodeURIComponent(number) + "&sortType=" + encodeURIComponent(type));
}