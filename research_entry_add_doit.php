<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php include("_security.php") ?>
<?php include("_config.php") ?>
<?php include("_globals.php") ?>

<?php
$objectId = $_POST["objectId"];



// --- Locals: ----
$allowedpage = "research_read_object.php";
$returnpage = "research_read_object.php?id=".$objectId."";
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
if($_SESSION["pagename"] != $allowedpage)
{
  echo "Error: Not allowed to post from this page.";
  $returnpage = "research_read.php";
}
else
{



  $objectId = $_POST["objectId"];
  $entryHeadingInput = $_POST["entryHeadingInput"];
  $entryText = $_POST["newEntry"];
  $entryWriter = $_SESSION["employeecode"];

  $entryDate = date("d.m.Y");
  $entryTime = date("H:i");



  mysqli_query($conn,"INSERT INTO ResearchEntries (researchObjectId, entryHeading, entryText, entryWriter, entryDate, entryTime) values ('$objectId', '$entryHeadingInput', '$entryText', '$entryWriter', '$entryDate', '$entryTime')");

  echo "Successfully added entry";  
    
}

?>
    
</div>
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