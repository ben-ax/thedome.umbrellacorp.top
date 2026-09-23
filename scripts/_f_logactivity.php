<?php
function logactivity($activity, $object = "", $info = "", $category = "General", $user = null, $date = null, $time = null)
{
    include("_config.php");

    if ($user == null)
    {
        $user = $_SESSION["username"];
    }
    if ($date == null)
    {
        $date = date("d.m.Y");
    }
    if ($time == null)
    {
        $time = date("H:i");
    }

    $sql = "INSERT INTO activitylog (date, time, activity, object, info, category, user) VALUES ('$date', '$time', '$activity', '$object', '$info', '$category', '$user')";

    if (mysqli_query($conn, $sql)) 
    {
        // Log entry created successfully
    } 
    else 
    {
        // Error creating log entry
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}