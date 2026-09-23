<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php include("_security.php") ?>
<?php include("_config.php") ?>
<?php include("_globals.php") ?>

<?php
// --- Locals: ----
$allowedpage = "personnelregistry_edit.php";
$returnpage = "personnelregistry_read.php";
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

$employeeid = $_GET["id"];
$employeecode = $_POST["femployeecode"];
$name = $_POST["fname"];
$dateofbirth = $_POST["fdateofbirth"];
$height = $_POST["fheight"];
$weight = $_POST["fweight"];
$bloodtype = $_POST["fbloodtype"];
$sex = $_POST["fsex"];
$rank = $_POST["frank"];
$department = $_POST["fdepartment"];
$securityaccesslevel = $_POST["fsecurityaccess"];
$background = $_POST["fbackground"];
$strengths = $_POST["fstrengths"];
$weaknesses = $_POST["fweaknesses"];

$employeecode = mysqli_real_escape_string($conn, $employeecode);
$name = mysqli_real_escape_string($conn, $name);
$dateofbirth = mysqli_real_escape_string($conn, $dateofbirth);
$height = mysqli_real_escape_string($conn, $height);
$weight = mysqli_real_escape_string($conn, $weight);
$bloodtype = mysqli_real_escape_string($conn, $bloodtype);
$sex = mysqli_real_escape_string($conn, $sex);
$rank = mysqli_real_escape_string($conn, $rank);
$department = mysqli_real_escape_string($conn, $department);
$securityaccesslevel = mysqli_real_escape_string($conn, $securityaccesslevel);
$background = mysqli_real_escape_string($conn, $background);
$strengths = mysqli_real_escape_string($conn, $strengths);
$weaknesses = mysqli_real_escape_string($conn, $weaknesses);

mysqli_query($conn,"UPDATE employees SET employeeCode='".$employeecode."',name='".$name."',dateOfBirth='".$dateofbirth."',height='".$height."',weight='".$weight."',bloodType='".$bloodtype."',sex='".$sex."',rank='".$rank."',department='".$department."',securityAccessLevel='".$securityaccesslevel."',background='".$background."',strengths='".$strengths."',weaknesses='".$weaknesses."' WHERE id=".$employeeid."");

        
    


?>
    <div style="color:white">Successfully edited employee</div>
    <meta http-equiv="refresh" content="1;url=<?= $returnpage ?>" /
    </div>
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