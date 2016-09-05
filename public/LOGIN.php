<?php 
include("../includes/database_connection.php");
include("../includes/session.php");
include("../includes/functions.php");
?>
<?php
if(logged_in())
    header("Location : home.php");
?>
<?php
global $error;
if (isset($_POST['submit'])) 
{
    $password = mysqli_real_escape_string($connection,(mysql_entities_fix_string($_POST['password'])));
    $username = mysqli_real_escape_string($connection,(mysql_entities_fix_string($_POST['username'])));
    $hash_password = password_hashing($password);
    $found_user=attempt_login($username,$hash_password,$connection);
    if($found_user)
    {
        $user_id=find_user_by_id($username,$connection);
        $name=find_user_by_name($username,$connection);
        $_SESSION['current_user_id']=$user_id;
        $_SESSION['current_name']=$name;
        $_SESSION['current_username']=$username;
        redirect_to("home.php");
    }
    else
    {
        $error="Incorrect user details";
        destroySession();
    }
} 
?> 

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <script src="js/jquery.min.js"></script>
    <link href="css/login.css" rel="stylesheet" type="text/css" media="all"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="header">
        <div class="header-main">
           <h1>Welcome to FAVOR.ME !</h1>
           <div class="header-bottom">
            <div class="header-right w3agile">

                <div class="header-left-bottom agileinfo">

                 <form action="LOGIN.php" method="post" autocomplete="on">
                    <input type="text" name="username" placeholder="username" required />
                    <input type="password" name="password" placeholder="password" required />
                    <span style="color: red;"><?php echo $error?></span>
                    <div class="forgot">
                        <h6><a href="forgot_password.php">Forgot Password?</a></h6>
                    </div>
                    <div class="clear"> </div>
                    <input type="submit" name="submit" value="Login">
                </form> 
                <div class="header-left-top">
                <div class="sign-up"> <h2>or</h2> </div>
                </div>
                <div class="header-social wthree">
                    <a href="signup.php" class="face" style="text-align: center;"><h5>Sign up</h5></a>
                    <a href="about_us.html" class="twitt" style="text-align: center;"><h5>About Us</h5></a>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</body>
</html>
















