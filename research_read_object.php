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
            
            $htmlOutput = "";

            $htmlOutput .=
            "<link rel=\"stylesheet\" href=\"css/virusdatabase.css\" \/>\n" .
            "<link rel=\"stylesheet\" href=\"css/research_entries.css\" \/>\n" .
            "<table id = \"texttable\">\n" .
            "<tr><td rowspan=\"2\" id=\"objectCode\">".$objectNumber."</td>\n" .
            "<td rowspan=\"2\" id=\"objectName\">".$objectName."</td>\n" .
            "<td id=\"objectCreateTime\">Created: ".$objectCreatedTime."|".$objectCreatedDate."</td></tr>\n" .
            "<tr><td id=\"objectCreator\">By: ".$objectCreator."(".$objectCreatorName.")</td></tr>\n" .
            "</table>\n" .
            "<div id=\"objectText\">".$objectText."</div>\n";

            $htmlOutput .= '<div style="display:flex; align-items: center; justify-content: space-between; width: 80%;">
            <a href="/research_edit.php?id='.$id.'" style="color:#336699;text-decoration:none;"> 
                <button style="height: 35px; margin-top:10px; margin-bottom:10px; padding:6px 14px; background:#4682B4;
                 color:#000;
                               border:1px solid #000; border-radius:0;
                               font-size:12px; font-weight:bold; cursor:pointer;">
                    Edit info
                </button></a>
            
                <button id="statusToggleButton" onClick="JavaScript:virusStatusToggle('.$id.')" style="height: 35px; margin-top:10px; margin-bottom:10px; padding:6px 14px; background:#4682B4;
                 color:#000;
                               border:1px solid #000; border-radius:0;
                               font-size:12px; font-weight:bold; cursor:pointer;">
                    '.ucfirst($objectStatus).'
                </button>
            
                <a href="http://localhost:3000/api/virusdatabase/backup/${str_id}" style="color:#336699;text-decoration:none;"> 
                <button style="height: 35px; margin-top:10px; margin-bottom:10px; padding:6px 14px; background:#4682B4;
                 color:#000; border:1px solid #000; border-radius:0; font-size:12px; font-weight:bold; cursor:pointer;">
                    Backup virus
                </button></a>
            </div>';

            $file = ""; $filesize = "";
            $formattedDate = "";
            //Kollar om viruset har ett ett pdf dokument
            $path = "./data/safetydatasheets/".$objectNumber.".pdf";
            if(file_exists($path))
            {
                $file = $objectNumber . ".pdf";
                $filesize = filesize($path);
                $formattedDate = date("d.m.Y", filemtime($path));
                //creationdate = stats.birthtime;
                //formattedDate = creationdate.toLocaleDateString('de-DE', {
                //day: '2-digit',
                //month: '2-digit',
                //year: 'numeric'});
                
            }
        


            //Maybe add href to file? check with kim
            $htmlOutput .= "<table id=\"securityTable\">\n" .
            "<tr><td class=\"securityCell\"><b>Security Data Sheet: </b></td><td class=\"securityCell\">".$objectNumber."</td>\n" .
            "<td class=\"securityCell\">".$file."</td><td class=\"securityCell\">".$filesize."</td><td class=\"securityCell\">"."$formattedDate"."</td></tr>\n" .
            "<tr><td class=\"securityCell\"><b>Security Presentation Video: </b></td><td colspan=\"4\" class=\"securityCell\"><a href=".$presentationVideoLink." style=\"color:#336699;text-decoration:none;\">".$presentationVideoLink."</a></td></tr>\n" .
            "<tr><td class=\"securityCell\"><b>Security Handling Video: </b></td><td colspan=\"4\" class=\"securityCell\"><a href=".$securityVideoLink." style=\"color:#336699;text-decoration:none;\">".$securityVideoLink."</a></td></tr>\n" .
            "</table>";


            //Entries
            $htmlOutput .= '<h1 style="margin-top: 20px;">Research Entries: </h1>
                            <form id="entryForm" name="entryForm" action="research_entry_add_doit.php" onSubmit="return entryFormCheck()" method="post">
                                <b>Heading:</b> <input type="text" name="entryHeadingInput" id="entryHeadingInput" />
                                <textarea name="newEntry" id="newEntry"></textarea>
                                <input type="hidden" name="objectId" value="'.$id.'" />
                                <input type="submit" value="Submit entry" id="submitButton"/>
                                
                            </form>
                            <div id="pastEntryBox"></div>';
            $htmlOutput .= getEntries($id);
            


            //htmlOutput .= readHTML('./masterframe/researchentries_css.html');
            //htmlOutput .= readHTML('./masterframe/researchentries_js.html');
            //htmlOutput .= readHTML('./masterframe/researchentries.html');
            
            //htmlOutput .= htmlVirusimagesCSS;
            //htmlOutput .= getVirusImagesHTML(virusid);

            $htmlOutput .=  '<div class="addNewFile">
                <div id="newDatacontainer">
                    <strong>Upload research image</strong>
                    <form name="addData" action="/research_image_upload_doit.php" method="POST" enctype="multipart/form-data">
                        <p>
                            Välj fil: <input type="file" name="fileadd" id="fileadd" /><br />
                            Ladda up: <input type="submit" value="Upload file" />
                            <input type="hidden" name="objectId" value="'.$id.'" />
                        </p>
                    </form>
                </div>
                </div>';
            $idPrefix = "";
            if (intval($id) < 10)
            {
                $idPrefix = "0";
            }

            $htmlOutput .= writeOutImages($id,"ResearchObjects/TCL".$idPrefix.$id."/images");


            $htmlOutput .=  '<div class="addNewAttachments">
                <div id="newDatacontainer">
                    <strong>Upload research attachments</strong>
                    <form name="addData" action="/research_attachment_upload_doit.php" method="POST" enctype="multipart/form-data">
                        <p>
                            Välj fil: <input type="file" name="fileadd" id="fileadd" /><br />
                            Ladda up: <input type="submit" value="Upload file" />
                            <input type="hidden" name="objectId" value="'.$id.'" />
                        </p>
                    </form>
                </div>
            </div>';

                $htmlOutput .= readAttachment($id, "ResearchObjects/TCL".$idPrefix.$id."/attachment/");
              }
                
                
                
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
