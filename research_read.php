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
        if(!isset($_SESSION['securityAccessLevel']) || ($_SESSION['securityAccessLevel'] != "A" && $_SESSION['securityAccessLevel'] != "B"))
        {
            echo "Error: Not high enough security clearance.";
        }
        elseif (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != "ok")
        {
            echo "Not logged in";
        }
        else
        {
            
            
            if($result = mysqli_query($conn, "SELECT ro.id, ro.objectNumber, ro.objectName, ro.objectCreatedDate, ro.objectStatus, ro.objectCreator,(SELECT COUNT(*) FROM ResearchEntries re 
                                            WHERE re.researchObjectId = ro.id) AS entryCount, 
                                            (SELECT MAX(re.entryDate) FROM ResearchEntries re WHERE re.researchObjectId = ro.id) AS lastEntryDate FROM ResearchObjects ro"))
            {

                $htmlOutput ="<link rel=\"stylesheet\" href=\"css/personnel_registry_loggedin.css\" />\n";
                

                $htmlOutput .= '<table border="0" width="100%">
                <tr>
                    <td align="left"><h2>Virus Database</h2></td>
                    <td align="right"><a href="/research_add.php" style="color:green; text-decoration:none; font-weight:bold; border:1px solid green; padding:5px; border-radius:4px;">[+] Add New Virus</a></td>
                </tr>
                </table>';

                $htmlOutput .="<div id=\"table-resp\">".
                "<div id=\"table-header\">\n".
                "<div class=\"table-header-cell-light\">Number</div>\n".
                "<div class=\"table-header-cell-light\">Name</div>\n".
                "<div class=\"table-header-cell-light\">Created</div>\n".
                "<div class=\"table-header-cell-light\">By</div>\n".
                "<div class=\"table-header-cell-light\">Entries</div>\n".
                "<div class=\"table-header-cell-light\">Last Entry</div>\n";
            
                $htmlOutput .= "<div class=\"table-header-cell-light\">Edit</div>\n";
                $htmlOutput .= "<div class=\"table-header-cell-light\">Delete</div>\n";

                 $htmlOutput .="</div>\n\n".
                "<div id=\"table-body\">\n";

                while($row = mysqli_fetch_assoc($result)) 
                {
                    $id = $row["id"];
                    $objectNumber = $row["objectNumber"];
                    $objectName = $row["objectName"];
                    $objectCreatedDate = $row["objectCreatedDate"];
                    $objectCreator = $row["objectCreator"];
                    $objectNumber = $row["objectNumber"];
                    $entryCount = $row["entryCount"];
                    $lastEntryDate = $row["lastEntryDate"];
                    $objectStatus = $row["objectStatus"];

                    
                    if ($objectStatus == "open" || ($objectStatus == "archived" && $_SESSION["securityAccessLevel"] == "A"))
                    {
                        $htmlOutput .= '<div class="resp-table-row ">
                                        <div class="table-body-cell">'.$objectNumber.'</div>
                                        <div class="table-body-cell-bigger"><a href="research_read_object.php?id='.$id.'">'.$objectName.'</a></div>
                                        <div class="table-body-cell">'.$objectCreatedDate.'</div>
                                        <div class="table-body-cell">'.$objectCreator.'</div>
                                        <div class="table-body-cell">'.$entryCount.'</div>
                                        <div class="table-body-cell">'.$lastEntryDate.'</div>';

                         $htmlOutput .= '<div class="table-body-cell"><a href="/research_edit.php?id='.$id.'" style="color:#336699;text-decoration:none;">E</a></div>
                                    <div class="table-body-cell"><a href="/research_delete_doit.php?id='.$id.'" style="color:#336699;text-decoration:none;" onClick="return confirm(\'Are you sure you want to delete virus '.$objectNumber.'?\');">D</a></div>';
                    
                    $htmlOutput .= '</div>\n';
                    }

                    

                   

                }
                //$htmlOutput .="</div>\n\n";
                
                $htmlOutput .= "</div></div>\n\n";
                echo $htmlOutput;
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
