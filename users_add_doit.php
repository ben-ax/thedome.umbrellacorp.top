<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php include("_security.php") ?>
<?php include("_config.php") ?>
<?php include("_globals.php") ?>

<?php
// --- Locals: ----
$allowedpage = "users_add.php";
$returnpage = "index.php";
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

$newPassword = $_POST["addPassword"];
$customEmployeeCode = $_POST["otherEmployeecode"];
$emailAddress = $_POST["addEmailAddress"];
$name = $_POST["employeeNameBox"];
$lockedOut = $_POST["addLockedOut"];


mysqli_query($conn,"INSERT INTO users (employeeCode, passwd, emailaddress, lockout) values ('$customEmployeeCode', '$newPassword', '$emailAddress', '$lockedOut')");

        
    


?>
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