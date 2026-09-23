<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php include("_security.php") ?>
<?php include("_config.php") ?>
<?php include("_globals.php") ?>

<?php
// --- Locals: ----
$allowedpage = "password_forgot.php";
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
// --- Verify source page ---
if($_SESSION["pagename"] != $allowedpage)
{
    die("Error: Not allowed to post from this page.");
}



function sendmail($recipient,$subject,$message)
{
    $user = "The Dome";
    $namn = "The Dome";
    $datum = date("d.m.Y");
    $mail_to = $recipient;
    $mail_subject ="Mail from Umbrella Corp : ".$subject;
    $mail_body ="This is your temporary password: \n\n";
    $mail_body .="".$message."\n\n";
    $mail_body .="Message sent ".$datum." by ".$namn."\n\n";

    $headers = "From: thedome@umbrellacorp.top\r\n";
    $headers .= "Reply-To: thedome@umbrellacorp.top\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    mail($mail_to, $mail_subject, $mail_body, $headers);
}

function generatePassword()
{
  $validChars = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","Å","Ä","Ö","a", "b", "c", "d", "e", "f", "g", "h", "i", "j",
    "k", "l", "m", "n", "o", "p", "q", "r", "s", "t",
    "u", "v", "w", "x", "y", "z", "å", "ä", "ö", "0", "1","2","3","4","5","6","7","8","9"];
  $specialChars = ["!","?","$","@","&","-","_","+"];
  $password = "";
  $specialCharSpot = random_int(0, 9);
  for ($x = 0; $x < 10; $x++) 
  {
    if ($x != $specialCharSpot)
    {
      $randomkey = array_rand($validChars);
      $randomLetter = $validChars[$randomkey];
      
    }
    else
    {
      $randomkey = array_rand($specialChars);
      $randomLetter = $specialChars[$randomkey];
    }
    $password = $password . $randomLetter;
  }

 
  return $password;
}
$employeecode = $_POST["employeecode"];
$emailaddress = $_POST["emailaddress"];

if($result = mysqli_query($conn, "SELECT id, emailaddress FROM users WHERE 
                                 employeecode='$employeecode'"))
{
    while($row = mysqli_fetch_assoc($result)) 
    {
        $id = $row["id"];
        $savedEmailaddress =$row["emailaddress"];
    }
    if ($emailaddress == $savedEmailaddress)
    {
      $newPassword = generatePassword();
      $hashedPassword = hash("sha256", $newPassword);
      mysqli_query($conn,"UPDATE users SET passwd='$hashedPassword' WHERE id='".$id."'");
      sendmail($emailaddress, "Password Reset", $newPassword);
      
      echo "Successfully reset your password. Check your email for your new password";
      // --- Return on success ---
      ?>
      <meta http-equiv="refresh" content="1;url=<?= $returnpage ?>" />
      <?php
    }
    else
    {
      echo "Unsuccessful resetting password, incorrect email address entered";
    }
    
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