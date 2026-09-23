<?php include("_security.php") ?>
<?php include("_config.php") ?>
<?php include("_globals.php") ?>

<?php
$objectId = $_POST["objectId"];



// --- Locals: ----
$allowedpage = "research_edit_object.php";
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

<?php
$uploadDir = "/var/www/thedome.umbrellacorp.top/ResearchObjects";
$idPrefix;

if (intval($objectId) < 10)
{
    $objectId = "0".$objectId;
}

if(!file_exists($uploadDir."/TCL".$objectId."/attachment"))
{
    mkdir($uploadDir."/TCL".$objectId);
    mkdir($uploadDir."/TCL".$objectId."/attachment");
}
$uploadDir .= "/TCL".$objectId."/attachment";


if (!is_dir($uploadDir)) {
    echo "Directory doesn't exist";
}

if (!is_writable($uploadDir)) {
    echo "Directory is not writable";
}

$oldName = $_FILES["fileadd"]["name"];
$tmp_name = $_FILES["fileadd"]["tmp_name"];
$ext = pathinfo($oldName, PATHINFO_EXTENSION);

echo "Trying to upload ".$oldName." at". $uploadDir."/";
if (move_uploaded_file($tmp_name, "$uploadDir/$oldName")) {
    echo "Upload successful";
    logactivity("Added attachment to virus", "TCL#".$objectId, "Added attachment to virus with code TCL#".$objectId."", "Virus Database", $_SESSION["employeecode"]);    
} else {
    echo "Upload failed";
}

?>
<meta http-equiv="refresh" content="1;url=<?= $returnpage ?>">
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
