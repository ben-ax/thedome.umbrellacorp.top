<?php
function randomBreadcrumImage()
{
    $breadcrumimages = array();
    $imagename = "test";

    // KOLLAR OM ANVÄNDAREN ÄR INLOGGAD
    if(isset($_SESSION["loggedin"]))
    {
        if($_SESSION["loggedin"]=="ok");
        {
            $imagename="bcrum_loggedin";
        }
    }
    else
    {
        $imagename="breadcrum";
    }

    // LÄS IN ALLA BILDER I EN ARRAY
    $images = scandir('images');

    // LOOPA GENOM ARRAYEN
    $j = 0;
    foreach($images as $i)
    {
        // KOLLAR OM FILNAMNET INNEHÅLLER "breadcrum"
        if(strstr($i, $imagename))
        {
            // LÄS IN BILDEN I EN BREADCRUM-ARRAYEN
            $breadcrumimages[$j] = $i;
            $j++;
        }
    }

    // SKAPA RANDOM NUMMBER MELLAN ANTAL O OCH ANTAL BILDER I ARRAYEN
    $randomnr = rand(0,$j-1);
    
    //RETURNERA RANDOM-BILDEN
    return $breadcrumimages[$randomnr];
}
?>