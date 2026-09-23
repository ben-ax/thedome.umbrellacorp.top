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
        if(!isset($_SESSION['securityAccessLevel']) || $_SESSION['securityAccessLevel'] != "A")
        {
            echo "Error: Not high enough security clearance.";
        }
        else
        {
            
            $htmlOutput ='
            <h1>New Virus:</h1>

            <!----------------- FORM START ----------------->
            <form name="editForm" action="research_add_doit.php" onSubmit="return editFormCheck()" method="post" enctype="multipart/form-data">


                <table id="inputTable">
                    <tr class="table-row">
                        <td class="title">Number: </td><td><input type="text" name="objectCode" id="objectCode" size="10" maxlength="7"/></td>
                    </tr>
                    <tr class="table-row">
                        <td class="title">Name</td><td><input type="text" name="objectName" id="objectName" size="20" maxlength="20"/></td>
                    </tr>
                    <tr class="table-row">
                        <td class="title">Text: </td><td><textarea name="objectText" id="objectText"></textarea><br /></td>
                    </tr>
                </table>

                

            
                

                Security Datasheet: <br />
                <input type="file" id="objectSource" name="objectDatasheet" /> <br />
                Security Presentation Video: <br />
                <input type="text" id="objectSource" name="objectPresentation" /> <br />
                Security Handling Video: <br />
                <input type="text" id="objectSource" name="objectHandling" /> <br />
                <input type="submit" value="Add new virus" id="editButton" onClick=""/>

            </form>';
            echo $htmlOutput;

        }
        
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
