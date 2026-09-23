<?php
// GLOBALA VARIABLER
$siteaddress = "thedome.umbrellacorp.top";
$loggedIn = FALSE;
$employeeCode = "";
date_default_timezone_set('Europe/Helsinki');

// LÄS IN GLOBALA FUNKTIONER
include("scripts/_f_readtextfile.php");
include("scripts/_f_breadcrumimage.php");
include("scripts/_f_logactivity.php");
include("scripts/_f_getEntries.php");
include("scripts/_f_imageUtils.php");
include("scripts/_f_readAttachment.php");


    // KOLLAR OM ANVÄNDAREN ÄR INLOGGAD
    if(isset($_SESSION["loggedin"]))
    {
        if($_SESSION["loggedin"]=="ok");
        {
            $loggedIn = TRUE;
            $employeeCode = $employeeCode;
        }
    }
    else
    {
        $loggedIn = FALSE;
        $employeeCode = "";
    }

?>
