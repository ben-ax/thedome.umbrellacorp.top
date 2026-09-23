<?php 
include("../_config.php");


$id = $_GET["id"];

$status = "";
if($result = mysqli_query($conn, "SELECT objectStatus FROM ResearchObjects WHERE ID='$id'"))
{
    while($row = mysqli_fetch_assoc($result)) 
    {
        $status = $row["objectStatus"];
    }

    if ($status != "")
    {
        if($status == "open")
        {
            $status = "archived";
        }
        elseif ($status == "archived")
        {
            $status = "open";
        }

        mysqli_query($conn,"UPDATE ResearchObjects SET objectStatus = '$status' WHERE ID = '$id'");
    }
}
else
{
    $status = "First query failed";
}
echo ucfirst($status); 
?>