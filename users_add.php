<?php include("_security.php") ?>
<?php include("_config.php") ?>
<?php include("_globals.php") ?>

<?php
// --- Locals: ----

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
      
        <form name="useraddform" id="useraddform" action="users_add_doit.php" onSubmit="return usersAddFormCheck()" method="post">

        <div class="formFields">
          <div>
            <label for="otherEmployeecode" class="formLabel">Employee Code:</label><div class="formInput"><input type="text" name="otherEmployeecode" id="otherEmployeecode" size="15" maxlength="7" /></div>
            
          </div>

          <div>
            <label for="employeeNameBox" class="formLabel">Name:</label><div class="formInput"><input type="text" name="employeeNameBox" id="employeeNameBox" size="25" maxlength="25" value=""/></div>
          </div>
          
          <div>
            <label for="addLockedOut" class="formLabel">Locked out:</label><div class="formInput"><input type="checkbox" name="addLockedOut" id="addLockedOut"></div>
          </div>
          
          <div>
            <label for="addEmailAddress" class="formLabel">Email Address:</label><div class="formInput"><input type="text" name="addEmailAddress" id="addEmailAddress" size="25" maxlength="25" /></div>
          </div>
            
          <div>
            <label for="addPassword" class="formLabel">Password:</label><div class="formInput"><input type="password" name="addPassword" id="addPassword" size="25" maxlength="25" /></div>
          </div>

          <div>
            <label for="addPasswordRetype" class="formLabel">Retype Password:</label><div class="formInput"><input type="password" name="addPasswordRetype" id="addPasswordRetype" size="25" maxlength="25" /></div>
          </div>
        
        
        
        </div>
        <div class="formButtons"><input type="submit" class="button" value="Add User" onClick="" /><input class="button" type="reset" value="Reset" /></div>
        
      
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
