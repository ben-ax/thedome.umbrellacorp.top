function search() {
    var text = document.getElementById("searchBar").value;

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementById("answers").innerHTML = this.responseText;

    }
    xhttp.open("GET", "scripts/_f_searchBar.php?text=" + text + "", true);
    xhttp.send()

}

function hideSearch() {
    document.getElementById("answers").style.display = "none";
}
function showSearch() {
    document.getElementById("answers").style.display = "block";
    search();
}