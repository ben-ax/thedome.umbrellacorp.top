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
        if($result = mysqli_query($conn, "SELECT id, employeeCode, name, signatureDate, rank, securityAccessLevel FROM employees"))
        {
                    
                    $htmlOutput = 
            '<table border="0" width="100%">
                <tr>
                    <td align="left"><h2>Personnel Registry</h2></td>
                    <td align="right"><a href="/personnelregistry_add.php" style="color:green; text-decoration:none; font-weight:bold; border:1px solid green; padding:5px; border-radius:4px;">[+] Add New Employee</a></td>
                </tr>
            </table>
            <div id="table-resp">
                <div id="table-header">
                    <div class="table-header-cell-light">Employee Code</div>
                    <div class="table-header-cell-dark">Name</div>
                    <div class="table-header-cell-light">Signature Date</div>
                    <div class="table-header-cell-light">Rank</div>
                    <div class="table-header-cell-light">Access Level</div>
                    <div class="table-header-cell-light" style="text-align:center;">Edit</div>
                    <div class="table-header-cell-light" style="text-align:center;">Del</div>
                </div>
                <div id="table-body">';
                while($row = mysqli_fetch_assoc($result)) 
                {
                        $id = $row["id"];
                        $employeeCode = $row["employeeCode"];
                        $signatureDate = $row["signatureDate"];
                        $rank= $row["rank"];
                        $name = $row["name"];
                        $securityAccessLevel = $row["securityAccessLevel"];
                        if($name == "")
                        {
                            $name = "Name not found";
                        }

                        $htmlOutput .= '
         
            <div class="resp-table-row">
                <div class="table-body-cell">'.$employeeCode.'</div>
                <div class="table-body-cell-bigger"><a href="/personnelregistry_read_employee.php?id='.$id.'">'.$name.'</a></div>
                <div class="table-body-cell">'.$signatureDate. '</div>
                <div class="table-body-cell">'.$rank.'</div>
                <div class="table-body-cell">'.$securityAccessLevel.'</div>
                <div class="table-body-cell" style="text-align:center;">
                    <a href="/personnelregistry_edit.php?id='.$id.'" style="color:#0056b3; font-weight:bold; text-decoration:none;">[E]</a>
                    
                </div>
                <div class="table-body-cell" style="text-align:center;">
                    <a href="/personnelregistry_delete_doit.php?id='.$id.'" onClick="return confirm(\'Are you sure you want to delete user '.$employeeCode.'?\');" style="color:red; font-weight:bold; text-decoration:none;">[D]</a>
                </div>
                <div class="table-body-cell" style="text-align:center;">
                </div>
            </div>';
                    }
                    
        }

            
         $htmlOutput .= '</div></div>';
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
