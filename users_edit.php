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
        <?php
        $employeeCode = htmlspecialchars($_GET["employeeCode"], ENT_QUOTES, 'UTF-8');

        ?>

        <form name="usereditform" id="usereditform" action="users_edit_doit.php" onSubmit="return usersEditFormCheck()" method="post">

        <div class="formFields">
          <div>
           <label for="employeeCodeDropdown" class="formLabel">Employee Code:</label>
                    <div class="formInput" style="width:400px;">
                    <?php 
                    echo '<select id="employeeCodeDropdown" name="employeeCodeDropdown"  onchange="javascript:getEmployee()">';
                    echo '<option value="'.$employeeCode.'">'.$employeeCode.'</option>';

                    if($result = mysqli_query($conn, "SELECT employeeCode FROM users WHERE employeeCode <> '$employeeCode'"))
                    {
                        while($row = mysqli_fetch_assoc($result)) 
                        {
                          $employeeCode = $row["employeeCode"];
                          echo '<option value="'.$employeeCode.'">'.$employeeCode.'</option>';
                        }
                    }
                    echo '<option value="or other username">or other username</option>';
                    echo '</select> <span id="orOtherUsername" style="visibility:hidden"> or other username: <input type="text" name="otherEmployeecode" id="otherEmployeecode" size="15" maxlength="7" /></span> '?>
                    </div>
          </div>
          <div>
            <?php
              echo '<label for="employeeNameBox" class="formLabel">Name:</label><div class="formInput"><input type="text" name="employeeNameBox" id="employeeNameBox" size="25" maxlength="25" value=""/></div>' 
            ?>
          </div>
          <div>
            <label for="editLockedOut" class="formLabel">Locked out:</label><div class="formInput"><input type="checkbox" name="editLockedOut" id="editLockedOut" /></div>
          </div>

          <div>
            <label for="editEmailAddress" class="formLabel">Email Address:</label><div class="formInput"><input type="text" name="editEmailAddress" id="editEmailAddress" size="25" maxlength="25" /></div>
          </div>

          <div> 
            <label for="editPassword" class="formLabel">Password:</label><div class="formInput"><input type="password" name="editPassword" id="editPassword" size="25" maxlength="25" /></div>
          </div>

          <div>
            <label for="editPasswordRetype" class="formLabel">Retype Password:</label><div class="formInput"><input type="password" name="editPasswordRetype" id="editPasswordRetype" size="25" maxlength="25" /></div>
          </div>
          
          
          
        </div>
          <div class="formButtons"><input type="submit" class="button" value="Edit" onClick="" /><input class="button" type="reset" value="Reset" /></div>
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
