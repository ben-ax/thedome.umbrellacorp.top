<?php 
include("../_config.php");

#thedome.umbrellacorp.top/users_edit.php?employeeCode=IT25-11
$url = $_GET["employeeCode"];

$name = "";
if($result = mysqli_query($conn, "SELECT name FROM employees WHERE employeeCode='$url'"))
{
    while($row = mysqli_fetch_assoc($result)) 
    {
        $name = $row["name"];
    }
}
echo $name; 
?>