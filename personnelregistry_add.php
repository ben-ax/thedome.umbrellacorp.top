<?php include("_security.php") ?>
<?php include("_config.php") ?>
<?php include("_globals.php") ?>

<?php
// --- Locals: ----
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
        <?php 
            
            $htmlOutput = '<div style="color:white"><h1>Add New Employee</h1>

            <form name="newemployeeform" action="personnelregistry_add_doit.php" onSubmit="return formCheckNewEmployee()" method="post" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="50000000" />
            <input type="hidden" name="fsignaturedate" value="" />


            <!-- Mellan-tabell start -->
            <table id="infomiddle">
            <tr>
            <td width="166" valign="top">

            <!-- Inre-tabell Foto start -->
            <table id="photocol">
            <tr>
            <td id="photobox"><img src="images/default.jpg" alt="Default Photo" width="164" /><br /><label class="file-upload"><input type="file" name="ffile" id="ffile"  /></label></td>
            </tr>
            <tr><td class="tablespacer"></tr>
            <tr>
            <td id="employeecodeBox">EMPLOYEE CODE: </b><br /><input type="text" name="femployeecode" id="femployeecode" size="7" maxlength="7" /></td>
            </tr>
            <tr><td class="tablespacer"></tr>
            <tr>
            <td id="securitylevel">SECURITY CLEARANCE LEVEL: </b><br />
                <select class="select" name="fsecurityaccess" id="fsecurityaccess">
                <option value="C" selected="selected">C</option>
                <option value="B">B</option>
                <option value="A">A</option>
                </select>
            </td>
            </tr>
            </table>
            <!-- Inre-tabell Foto slut -->

            </td>
            <td width="135" valign="top">

            <!-- Inre-tabell Variabler start -->
            <table>
            <tr>
            <td class="variablecol">NAME: &nbsp;</td>
            </tr>
            <tr><td class="tablespacer"></tr>
            <tr>
            <td class="variablecol">DATE OF BIRTH: &nbsp;</td>
            </tr>
            <tr><td class="tablespacer"></tr>
            <tr>
            <td class="variablecol">SEX: &nbsp;</td>
            </tr>
            <tr><td class="tablespacer"></tr>
            <tr>
            <td class="variablecol">BLOOD TYPE: &nbsp;</td>
            </tr>
            <tr><td class="tablespacer"></tr>
            <tr>
            <td class="variablecol">HEIGHT: &nbsp;</td>
            </tr>
            <tr><td class="tablespacer"></tr>
            <tr>
            <td class="variablecol">WEIGHT: &nbsp;</td>
            </tr>
            <tr><td class="tablespacer"></tr>
            <tr>
            <td class="variablecol">DEPARTMENT: &nbsp;</td>
            </tr>
            <tr><td class="tablespacer"></tr>
            <tr>
            <td class="variablecol">RANK: &nbsp;</td>
            </tr>
            <tr><td class="tablespacer"></tr>
            </table>
            <!-- Inre-tabell Variabler slut -->

            </td>
            <td width="245" valign="top">

            <!-- Inre-tabell Värden slut -->
            <table>
            <tr>
            <td class="valuecol"><input type="text" name="fname" id="fname" size="20"  maxlength="255" /></td>
            </tr>
            <tr><td class="blackline"></td></tr>
            <tr><td class="tablespacer"></tr>
            <tr>
            <td class="valuecol"><input type="date" name="fdateofbirth" id="fdateofbirth" size="20" maxlength="11" /></td>
            </tr>
            <tr><td class="blackline"></td></tr>
            <tr><td class="tablespacer"></tr>
            <tr>
            <td class="valuecol">
                <select class="select" name="fsex" id="fsex">
                <option value="M" selected="selected">Male</option>
                <option value="F">Female</option>
                <option value="O">Other</option>
                </select>
            </td>
            </tr>
            <tr><td class="blackline"></td></tr>
            <tr><td class="tablespacer"></tr>
            <tr>
            <td class="valuecol"><input type="text" name="fbloodtype" id="fbloodtype" size="7" maxlength="4"  /></td>
            </tr>
            <tr><td class="blackline"></td></tr>
            <tr><td class="tablespacer"></tr>
            <tr>
            <td class="valuecol"><input type="text" name="fheight" id="fheight" size="7"  maxlength="7" /></td>
            </tr>
            <tr><td class="blackline"></td></tr>
            <tr><td class="tablespacer"></tr>
            <tr>
            <td class="valuecol"><input type="text" name="fweight" id="fweight" size="7"  maxlength="7" /></td>
            </tr>
            <tr><td class="blackline"></td></tr>
            <tr><td class="tablespacer"></tr>
            <tr>
            <td class="valuecol"><input type="text" name="fdepartment" id="fdepartment" size="20" value="Medical Data Department" maxlength="255"/></td>
            </tr>
            <tr><td class="blackline"></td></tr>
            <tr><td class="tablespacer"></tr>
            <tr>
            <td class="valuecol"><input type="text" name="frank" id="frank" size="20" value="Junior Data Analyst" maxlength="255" /></td>
            </tr>
            <tr><td class="blackline"></td></tr>
            <tr><td class="tablespacer"></tr>
            </table>
            <!-- Inre-tabell Värden slut -->

            <td width="182" valign="top">

            <!-- Inre-tabell Tom start -->
            <!-- Inre-tabell Tom slut -->

            </td>
            </tr>
            </table>
            <!-- Mellan-tabell slut -->


            <br /><p />
            <h1>Background:</h1>
            <textarea rows="5" cols="45" name="fbackground" id="fbackground" wrap="off"></textarea>
            <p />
            <h1>Strengths:</h1>
            <textarea rows="5" cols="45" name="fstrengths" id="fstrengths" wrap="off"></textarea>
            <p />
            <h1>Weaknesses:</h1>
            <textarea rows="5" cols="45" name="fweaknesses" id="fweaknesses" wrap="off"></textarea>
            <p />
            <input type="submit" class="button" value="Add New Employee" /><input class="button" type="reset" value="Reset Form" />
            <p />
            </form></div>';
            
            echo $htmlOutput;
            ?>

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
