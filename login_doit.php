<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php include("_security.php") ?>
<?php include("_config.php") ?>
<?php include("_globals.php") ?>

<?php
// --- Locals: ----
$returnpage = "index.php";
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

    <div class="main">

<?php
$employeecode = $_POST["employeecode"];
$password = $_POST["password"];
$loggedin="no";
$lockout="";

if($result = mysqli_query($conn, "SELECT * FROM users WHERE 
                                 employeecode='$employeecode' AND passwd='$password'"))
{
    while($row = mysqli_fetch_assoc($result)) 
    {
        $id = $row["id"];
        $logintimes =$row["logintimes"];
        $lastlogin =$row["lastlogin"];
        $lockout = $row["lockout"];
        $loggedin="ok";
        $email= $row["emailaddress"];
    }
}

// INLOGGNINGEN LYCKADES
$date = new DateTime("now", new DateTimeZone("Europe/Helsinki"));
if($loggedin=="ok" && $lockout!="x")
{
    //Fetch employee id, name and security access level
    if($result = mysqli_query($conn, "SELECT id, name, securityAccessLevel FROM employees WHERE 
                                 employeecode='$employeecode'"))
    {
        while($row = mysqli_fetch_assoc($result)) 
        {
            $employeeId = $row["id"];
            $name = $row["name"];
            $securityAccessLevel = $row["securityAccessLevel"];

        }
    }

    $time = $date->format('H:i');
    $lastlogin = date("d.m.Y");
    $logintimes = $logintimes+1;

    // SKAPA SESSIONERNA
    $_SESSION["id"] = $id;
    $_SESSION["employeeId"] = $employeeId;
    $_SESSION["loggedin"] = "ok";
    $_SESSION["employeecode"] = $employeecode;
    $_SESSION["lastlogin"] = $lastlogin;
    $_SESSION["logintime"] = $time;
    $_SESSION["logintimes"] = $logintimes;
    $_SESSION["ipaddress"] = $_SERVER['REMOTE_ADDR'];
    $_SESSION["name"] = $name;
    $_SESSION["securityAccessLevel"] = $securityAccessLevel;
    
    
  

    #Push new variables to database
    mysqli_query($conn,"UPDATE users SET logintimes='$logintimes', lastlogin='$lastlogin', lastlogintime='$time' WHERE id='".$id."'");
    echo "SUCCESS";

    logactivity("Login", $_SESSION["employeecode"], "".$name." logged in", "Login/Logout", $_SESSION["employeecode"]);

    
    ?>
    </div>
    <meta http-equiv="refresh" content="1;url=<?= $returnpage ?>" /
    <?php
}
else 
{
    echo "UNSUCCESS";
    ?>
    <p/>
    <input class="button" type="button" value="Forgot password?" onClick="window.location.href='password_forgot.php';" />
    <?php
}
?>

    </div>
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