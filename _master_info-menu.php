<div class="rightloginform <?php echo (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == "ok") ? 'success' : ''; ?>">

    <?php
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == "ok") { 
        $id = isset($_SESSION["id"]) ? $_SESSION["id"] : "";
    ?>
        <?php echo "Employee code: ", $_SESSION["employeecode"]; ?>
        <p />
        <p />
        <?php echo "Last login: ", $_SESSION["lastlogin"]; ?>
        <br/>
        <?php echo "Login time: ", $_SESSION["logintime"]; ?>
        <br/>
        <?php echo "Login times: ", $_SESSION["logintimes"]; ?>
        <br/>
        <?php echo "From host: ", $_SESSION["ipaddress"]; ?>
        <br/>
        <form>
        <input class="button2" type="button" value="Logout" onClick="window.location.href='logout_doit.php';" />
        <p />
        <?php echo '<input class="button2" type="button" value="My Profile" onClick="window.location.href=\'personnelregistry_edit.php?id='.$_SESSION["employeeId"].'\';" />'; ?>
        <input class="button2" type="button" value="Change password" onClick="window.location.href='password_change.php';" />
        </form>
    <?php 
    } else { 
    ?>
        <form name="loginform" action="login_doit.php" onSubmit="return loginFormCheck()" method="post">
            Employee Code: <input type="text" name="employeecode" id="employeecode" size="15" maxlength="7" />
            <p />
            Password: <input type="password" name="password" id="password" size="15" maxlength="10" />
            <p />
            <input type="submit" class="button" value="Login" onClick="javascript:hashing()" />
            <input class="button" type="reset" value="Reset" />
            <p />
        </form>
    <?php } ?>
    
</div>

<?php
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == "ok") { 
?>
    <?php
    if ($_SESSION['securityAccessLevel'] == "A")
    {
        echo  '<div class="rightmenuitem"><a href="activitylog_read.php">Activity Log</a></div>';
        echo  '<div class="rightmenuitem"><a href="research_read.php">Virus Database</a></div>';
    }   
    if ($_SESSION['securityAccessLevel'] == "B")
    {
        echo  '<div class="rightmenuitem"><a href="research_read.php">Virus Database</a></div>';
    }   
    ?>

    <div class="rightmenuitem"><a href="personnelregistry_read.php">Personnel Registry</a></div>
    
    <div class="rightmenuitem"><a href="users_read.php">Users</a></div>

    
        
<?php 
} 
?>

<form name="searchBarForm" id="searchBarForm">
                <input type="text" id="searchBar" name="searchBar" placeholder="Type to search" oninput="JavaScript:search()" onfocus="JavaScript:showSearch()" onblur="setTimeout(() => hideSearch(), 100)"/>
                <div id="answers"></div>
            </form>
