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

        $employeeid = $_GET["id"];
        if ($employeeid == "")
        {
            ?>
            <meta http-equiv="refresh" content="1;url=<?= $returnpage ?>" / <?php
        }

        if($result = mysqli_query($conn, "SELECT * FROM employees WHERE 
                                 id='$employeeid'"))
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                $str_employeeCode = $row["employeeCode"];
                $str_name =$row["name"];
                $str_bloodType =$row["bloodType"];
                $str_sex = $row["sex"];
                $str_height = $row["height"];
                $str_weight = $row["weight"];
                $str_dateOfBirth = $row["dateOfBirth"];
                $str_department = $row["department"];
                $str_securityAccessLevel = $row["securityAccessLevel"];
                $str_rank = $row["rank"];
                $str_background = $row["background"];
                $str_strengths = $row["strengths"];
                $str_weaknesses = $row["weaknesses"];
    
            }
        

            $htmlOutput ="".
        "<link rel=\"stylesheet\" href=\"css/personnel_registry_employee.css\" \/>\n".
        "<h1 style=\"color:white;\">Personnel Registry - ". $str_employeeCode."</h1>\n".
        "<table id=\"infomiddle\">\n".
        "<tr><td width=\"166\" valign=\"top\">\n".
             "<table id=\"photocol\"><tr><td id=\"photobox\"><img src=\"photos/" . $str_employeeCode . ".jpg\" alt=\"" .$str_employeeCode . "\" width=\"164\" /></td></tr><tr><td class=\"tablespacer\"></tr>\n".
            "<tr><td id=\"employeecode\">EMPLOYEE CODE: </b><br /><b>" .$str_employeeCode. "</b></td></tr><tr><td class=\"tablespacer\"></tr>\n".
            "<tr> <td id=\"securitylevel\">SECURITY CLEARANCE LEVEL: </b><br /><big><big><big>" .$str_securityAccessLevel. "</big></big></big></td></tr></table>\n".
        "</td><td width=\"135\" valign=\"top\">\n".
             "<table><tr><td class=\"variablecol\">NAME: &nbsp;</td></tr><tr><td class=\"tablespacer\"></tr>\n".
            "<tr><td class=\"variablecol\">DATE OF BIRTH: &nbsp;</td></tr><tr><td class=\"tablespacer\"></tr>\n".
            "<tr><td class=\"variablecol\">SEX: &nbsp;</td></tr><tr><td class=\"tablespacer\"></tr>\n".
            "<tr><td class=\"variablecol\">BLOOD TYPE: &nbsp;</td></tr><tr><td class=\"tablespacer\"></tr>\n".
            "<tr><td class=\"variablecol\">HEIGHT: &nbsp;</td></tr><tr><td class=\"tablespacer\"></tr>\n".
            "<tr><td class=\"variablecol\">WEIGHT: &nbsp;</td></tr><tr><td class=\"tablespacer\"></tr>\n".
            "<tr><td class=\"variablecol\">DEPARTMENT: &nbsp;</td></tr><tr><td class=\"tablespacer\"></tr>\n".
            "<tr><td class=\"variablecol\">RANK: &nbsp;</td></tr><tr><td class=\"tablespacer\"></tr></table>\n".
        "</td><td width=\"245\" valign=\"top\">\n".
             "<table><tr><td class=\"valuecol\">" .$str_name. "</td></tr><tr><td class=\"blackline\"></td></tr><tr><td class=\"tablespacer\"></tr>\n".
            "<tr><td class=\"valuecol\">" .$str_dateOfBirth. "</div></td></tr><tr><td class=\"blackline\"></td></tr><tr><td class=\"tablespacer\"></tr>\n".
            "<tr><td class=\"valuecol\">" .$str_sex. "</td></tr><tr><td class=\"blackline\"></td></tr><tr><td class=\"tablespacer\"></tr>\n".
            "<tr><td class=\"valuecol\">" .$str_bloodType. "</td></tr><tr><td class=\"blackline\"></td></tr><tr><td class=\"tablespacer\"></tr>\n".
            "<tr><td class=\"valuecol\">" .$str_height. "</td></tr><tr><td class=\"blackline\"></td></tr><tr><td class=\"tablespacer\"></tr>\n".
            "<tr><td class=\"valuecol\">" .$str_weight. "</td></tr><tr><td class=\"blackline\"></td></tr><tr><td class=\"tablespacer\"></tr>\n".
            "<tr><td class=\"valuecol\">" .$str_department. "</td></tr><tr><td class=\"blackline\"></td></tr><tr><td class=\"tablespacer\"></tr>\n".
            "<tr><td class=\"valuecol\">" .$str_rank. "</td></tr><tr><td class=\"blackline\"></td></tr><tr><td class=\"tablespacer\"></tr></table>\n".
            "<td width=\"182\" valign=\"top\">\n".
            "</td>\n".
        "</td></tr></table>\n";  

        $htmlOutput =$htmlOutput .
        "<div style=\"color:white;\"><h1>Background</h1>\n". $str_background .
        "<p />".
        "<h1>Strengths</h1>\n". $str_strengths .
        "<p />".
        "<h1>Weaknesses</h1>\n". $str_weaknesses.
        "</div><p />";

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
