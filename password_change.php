<?php include("_security.php") ?>
<?php include("_config.php") ?>
<?php include("_globals.php") ?>

<?php
// --- Locals: ----
$_SESSION["pagename"] = "password_change.php";
?>
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
            <form name="password_change" action="password_change_doit.php" onSubmit="return passwordformCheck()" method="post" style="color:white">
            Old Password: <input type="password" name="oldPassword" id="oldPassword" size="20" maxlength="50" />
            <p />
            New Password: <input type="password" name="newPassword" id="newPassword" size="20" maxlength="50" />
            <p />
            New Password AGAIN: <input type="password" name="againPassword" id="againPassword" size="20" maxlength="50" />
            <input type="submit" class="button" value="Change" onClick="" />
            <input class="button" type="reset" value="Reset" />
            <p />
            </form>
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
