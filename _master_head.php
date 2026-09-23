<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="sv">

<head>
<meta name="Publisher" content="Umbrella Corporation">
<meta name="Keywords" content="pharmaceutical, pharmaceuticals, medicine, cure, virus, bow, research, secret, top-secret">
<meta name="Generator" content="Notepad and brains">

<title>Umbrella Corporation</title>

<!--- CSS ------------------------------------------------------------------->
<?php
    if(isset($_SESSION["loggedin"]))
    {
        if($_SESSION["loggedin"]=="ok");
        { 
        ?>
        <link rel="stylesheet" href="css/grid_loggedin.css">
        <link rel="stylesheet" href="css/personnel_registry_loggedin.css">
        <link rel="stylesheet" href="css/personnel_registry_employee.css">
        <link rel="stylesheet" href="css/searchBar_loggedin.css">
        <?php }
        } 
    else 
    {
        ?>
            <link rel="stylesheet" href="css/grid.css">
            <link rel="stylesheet" href="css/personnel_registry.css">
            <link rel="stylesheet" href="css/personnel_registry_employee.css">
            <link rel="stylesheet" href="css/searchBar.css">
        <?php 
    } 


  
  

    $link = "$_SERVER[REQUEST_URI]";
    $link = ltrim($link, "/");
    if (!str_contains($link, "doit"))
    {
        $_SESSION["pagename"] = $link;
    }
    
    


    ?>
    <?php
?>
   


<style>
</style>

<!---- JavaScript ----------------------------------------------------------->
<script language="JavaScript" src="scripts/SHA256.js"></script>
<script language="JavaScript" src="scripts/loginformcheck.js"></script>
<script language="JavaScript" src="scripts/passwordformcheck.js"></script>
<script language="JavaScript" src="scripts/resetformcheck.js"></script>
<script language="JavaScript" src="scripts/usersEditFormCheck.js"></script>
<script language="JavaScript" src="scripts/usersAddFormCheck.js"></script>
<script language="JavaScript" src="scripts/getemployee.js"></script>
<script language="JavaScript" src="scripts/newemployeeformcheck.js"></script>
<script language="JavaScript" src="scripts/activitylogsorting.js"></script>
<script language="JavaScript" src="scripts/newvirus.js"></script>
<script language="JavaScript" src="scripts/entryformcheck.js"></script>
<script language="JavaScript" src="scripts/virusStatusToggle.js"></script>
<script language="JavaScript" src="scripts/searchBar.js"></script>


<script language="JavaScript">
</script>

</head>

<body>