<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php include("_security.php") ?>
<?php include("_config.php") ?>
<?php include("_globals.php") ?>

<?php
// --- Locals: ----
$allowedpage = "research_add.php";
$returnpage = "research_read.php";
?>

<?php include("_master_head.php") ?>

<div class="grid-container">

    <!---- GRID ROW 1 START ------------------------------------------>
    <div class="grid-emptyblack" ></div>
    
    <div class="grid-header">  
      <?php include("_master_header.php") ?>
    </div>

    <div class="grid-emptyblack"></div>
    <!---- GRID ROW 1 END --------------------------------------------->
    <!---- GRID ROW 2 START ------------------------------------------->

      <?php include("_master_breadcrum.php") ?>
  
    <!---- GRID ROW 2 END --------------------------------------------->
    <!---- GRID ROW 3 START ------------------------------------------->

    <div class="grid-topmenu">
      <?php include("_master_menu.php") ?>
       
    </div>

    <!---- GRID ROW 3 END -------------------------------------------->
    <!---- GRID ROW 4 START ------------------------------------------>
    
    <div class="grid-empty"></div>

    <div class="grid-main"> 

    <div class="main">

<?php
// --- Verify source page ---
//if($_SESSION["pagename"] != $allowedpage)
//{
    //die("Error: Not allowed to post from this page.");
//}

$target_dir = "research_add_doit/";
$target_file = $target_dir . basename($_FILES["objectDatasheet"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
echo basename($_FILES["objectDatasheet"]["name"]);



$objectCode = $_POST["objectCode"];
$objectName = $_POST["objectName"];
$objectText = $_POST["objectText"];
$objectPresentation = $_POST["objectPresentation"];
$objectHandling = $_POST["objectHandling"];

$objectCreator = $_SESSION["employeecode"];
$objectCreatedDate = date("d.m.Y");
$objectCreatedTime = date("H:i");

echo $objectCode;
echo $objectName;
echo $objectText;
//echo $objectDatasheet;
echo $objectPresentation;
echo $objectHandling;
mysqli_query($conn,"INSERT INTO ResearchObjects (objectNumber, objectName, objectCreator, objectCreatedDate, objectCreatedTime, objectText, objectStatus, presentationVideoLink, securityVideoLink) values 
('$objectCode', '$objectName', '$objectCreator', '$objectCreatedDate', '$objectCreatedTime','$objectText','open','$objectPresentation','$objectHandling')");

logactivity("Added new virus", $objectCode, "Added virus with code ".$objectCode."", "Virus Database", $_SESSION["employeecode"]);        
    


?>
    <meta http-equiv="refresh" content="1;url=<?= $returnpage ?>" /
    </div>

    </div>
    <div class="grid-rightmenu">
            <?php include("_master_info-menu.php") ?>
    </div>

    <div class="grid-empty"></div>

    <!---- GRID ROW 4 END --------------------------------------------->

    <div class="grid-emptyblack" ></div>
    
    <div class="grid-footer">
      <?php include("_master_footer.php") ?>
        
    </div>

    <div class="grid-emptyblack"></div>

</div>

<?php include("_master_bottom.php") ?>