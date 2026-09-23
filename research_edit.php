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
            
            $id = $_GET["id"];
            
            if($result = mysqli_query($conn, "SELECT objectNumber, objectName, objectCreator, objectCreatedDate, objectCreatedTime, objectText, objectStatus, presentationVideoLink, securityVideoLink FROM ResearchObjects WHERE ID = ".$id.""))
            {
              if($row = mysqli_fetch_assoc($result))
              {
                $objectNumber = $row["objectNumber"];
                $objectName = $row["objectName"];
                $objectCreator = $row["objectCreator"];
                $objectCreatedDate = $row["objectCreatedDate"];
                $objectCreatedTime = $row["objectCreatedTime"];
                $objectText = $row["objectText"];
                $objectStatus = $row["objectStatus"];
                $presentationVideoLink = $row["presentationVideoLink"];
                $securityVideoLink = $row["securityVideoLink"];

                // Få fram namnet av användaren som skapade 
    
                $objectCreatorName = "No name found";
                //Fetch employee id, name and security access level
                if($result = mysqli_query($conn, "SELECT name  FROM employees WHERE 
                                            employeecode='$objectCreator'"))
                {
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                       
                        $objectCreatorName = $row["name"];
                    

                    }
                }
            

                $htmlOutput ='
                <h1>Edit Virus:</h1>

                <!----------------- FORM START ----------------->
                <form name="editForm" action="research_edit_doit.php" onSubmit="return editFormCheck()" method="post" enctype="multipart/form-data">


                    <table id="inputTable">
                        <tr class="table-row">
                            <td class="title">Number: </td><td><input type="text" name="objectCode" id="objectCode" size="10" maxlength="7" value="'.$objectNumber.'"/></td>
                        </tr>
                        <tr class="table-row">
                            <td class="title">Name</td><td><input type="text" name="objectName" id="objectName" size="20" maxlength="20" value="'.$objectName.'"/></td>
                        </tr>
                        <tr class="table-row">
                            <td class="title">Text: </td><td><textarea name="objectText" id="objectText">'.$objectText.'</textarea><br /></td>
                        </tr>
                        <input type="hidden" name="id" value="'.$id.'" />
                    </table>

                    

                
                    

                    Security Datasheet: <br />
                    <input type="file" id="objectSource" name="objectDatasheet" value=""/> <br />
                    Security Presentation Video: <br />
                    <input type="text" id="objectSource" name="objectPresentation" value="'.$presentationVideoLink.'"/> <br />
                    Security Handling Video: <br />
                    <input type="text" id="objectSource" name="objectHandling" value="'.$securityVideoLink.'"/> <br />
                    <input type="submit" value="Edit virus" id="editButton" onClick=""/>

                </form>';
                echo $htmlOutput;
                }
            }
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
