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
            if (!isset($_SESSION['sortType']))
            {
                echo "";
                $_SESSION["sortType"] = "date DESC, time DESC";
            }
            if (!isset($_SESSION['sortAmount']))
            {
                $_SESSION["sortAmount"] = 150;
            }
            
            if($result = mysqli_query($conn, "SELECT id, date, time, activity, user, category, info
                FROM activitylog ORDER BY ".$_SESSION["sortType"].", id DESC LIMIT ".$_SESSION["sortAmount"]." "))
            {

                $htmlOutput ="".
                "<link rel=\"stylesheet\" href=\"css/personnel_registry_loggedin.css\" />\n".
                "<script src=\"./scripts/activitylogsorting.js\"></script>\n";

                $htmlOutput .="<table border=\"0\">";
                $htmlOutput .="<tr><td width=\"100px\" align=\"left\">";
                $htmlOutput .="<h2>Activity Log</h2></td>\n";
                // Sort options
                
                $htmlOutput .="<td width=\"80\" align=\"center\">";
                $htmlOutput .= "<td width=\"156\">";
                $htmlOutput .= '<form name="maxLogsForm" id="maxLogsForm">

                <label for="maxSelect">Show Max:</label>
                            <select id="maxSelect" name="maxSelect"  onchange="javascript:sorting()">';
                
                if ($_SESSION["sortAmount"] == 20)
                {
                    $htmlOutput .= '<option value="20" selected="selected">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="150">150</option>';
                }
                elseif ($_SESSION["sortAmount"] == 50)
                {
                    $htmlOutput .= '<option value="20">20</option>
                            <option value="50" selected="selected">50</option>
                            <option value="100">100</option>
                            <option value="150">150</option>';
                }
                elseif ($_SESSION["sortAmount"] == 100)
                {
                    $htmlOutput .= '<option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100" selected="selected">100</option>
                            <option value="150">150</option>';
                }
                else
                {
                    $htmlOutput .= '<option value="20">20</option>
                            <option value="50" >50</option>
                            <option value="100">100</option>
                            <option value="150" selected="selected">150</option>';
                }
                            
                            
                $htmlOutput .= "</select></td>";

                 $htmlOutput .= "<td width=\"156\">";
                $htmlOutput .= '
                <label for="sortSelect">Sort By:</label>
                            <select id="sortSelect" name="sortSelect"  onchange="javascript:sorting()">';
                
                if ($_SESSION["sortType"] == "category DESC")
                {
                    $htmlOutput .= '<option value="category DESC" selected="selected">Category</option>
                            <option value="user DESC">User</option>
                            <option value="date DESC, time DESC">Date</option>';
                }
                elseif ($_SESSION["sortType"] == "user DESC")
                {
                    $htmlOutput .= '<option value="category DESC">Category</option>
                            <option value="user DESC" selected="selected">User</option>
                            <option value="date DESC, time DESC">Date</option>';
                }
                else
                {
                    $htmlOutput .= '<option value="category DESC">Category</option>
                            <option value="user DESC">User</option>
                            <option value="date DESC, time DESC" selected="selected">Date</option>';
                }
                

                            
                         
                $htmlOutput .= "</select></form></td>";

                
                $htmlOutput .="</tr></table>\n"; 

                $htmlOutput .="<div id=\"table-resp\">".
                "<div id=\"table-header\">\n".
                "<div class=\"table-header-cell-light\">Date</div>\n".
                "<div class=\"table-header-cell-light\">Time</div>\n".
                "<div class=\"table-header-cell-light\">Activity</div>\n".
                "<div class=\"table-header-cell-light\">Employee</div>\n".
                "<div class=\"table-header-cell-light\">Category</div>\n";
            
                $htmlOutput .= "<div class=\"table-header-cell-light\">Delete</div>\n";
    
                $htmlOutput .="</div>\n\n".
                "<div id=\"table-body\">\n";
                "";

                while($row = mysqli_fetch_assoc($result)) 
                {
                    $id = $row["id"];
                    $date = $row["date"];
                    $time = $row["time"];
                    $activity = $row["activity"];
                    $user = $row["user"];
                    $category = $row["category"];

                    $info = $row["info"];

                    // Get name
                    $name = "Name not found";
                    if($result2 = mysqli_query($conn, "SELECT name FROM employees WHERE employeeCode='$user'"))
                    {
                        while($row = mysqli_fetch_assoc($result2)) 
                        {
                            $name = $row["name"];
                        }
                    }
        
                    // Lägg till respektive employee till utskrift-variabeln
                    $htmlOutput .= "<div class=\"resp-table-row\">\n";
                    $htmlOutput .= "<div class=\"table-body-cell\">" . $date . "</div>\n";
                    $htmlOutput .= "<div class=\"table-body-cell-bigger\">" . $time . "</div>\n";
                    $htmlOutput .= "<div class=\"table-body-cell extraInfoHover\">" . $activity . "<div class=\"extraInfoText\">".$info."</div></div>\n";
                    $htmlOutput .= "<div class=\"table-body-cell extraInfoHover\">" . $user . "<div class=\"extraInfoText\">".$name."</div></div>\n";
                    $htmlOutput .= "<div class=\"table-body-cell\"> " . $category . "</div>\n";
            
                    $htmlOutput .= "<div class=\"table-body-cell\"><a href=\"activitylog_delete_doit.php?id=" . $id . "\" style=\"color:red;text-decoration:none;\">D</a></div>\n"; // Gör till knapp
            
                    $htmlOutput .= "</div>\n";
                }

            }
            $htmlOutput .= "</div></div>\n\n";
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
