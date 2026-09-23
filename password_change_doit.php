<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php include("_security.php") ?>
<?php include("_config.php") ?>
<?php include("_globals.php") ?>

<?php
// --- Locals: ----
$allowedpage = "password_change.php";
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
if($_SESSION["pagename"] != $allowedpage)
{
    die("Error: Not allowed to post from this page.");
}

$newPassword = $_POST["newPassword"];
$oldPassword = $_POST["oldPassword"];
$employeecode = $_SESSION["employeecode"];



if($result = mysqli_query($conn, "SELECT id, passwd FROM users WHERE 
                                 employeecode='$employeecode'"))
{
    while($row = mysqli_fetch_assoc($result)) 
    {
        $id = $row["id"];
        $savedPassword =$row["passwd"];
    }

    if ($savedPassword == $oldPassword)
    {
      mysqli_query($conn,"UPDATE users SET passwd='$newPassword' WHERE id='".$id."'");
      
      echo "Success";
      // --- Return on success ---
      ?>
      <meta http-equiv="refresh" content="1;url=<?= $returnpage ?>" /
      <?php
    }
    else
    {
      echo "Unsuccessful changing password, incorrect password entered";
    }
        
    
}


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