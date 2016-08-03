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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <title>FAVOR.ME</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta name="description" content="Login and Registration" />
    <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" href="../favicon.ico"> 
    <link rel="stylesheet" type="text/css" href="css1/demo1.css" />
    <link rel="stylesheet" type="text/css" href="css1/style.css" />
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome to <span>FAVOR.ME !</span></h1>
            <div class="info">
                <p>  
                    <a href="about_us.html" class="About_us">About us</a>
                </p>
            </div>
        </header>
        <section>               
            <div id="container_demo" >
                <a class="hiddenanchor" id="toregister"></a>
                <a class="hiddenanchor" id="tologin"></a>
                <div id="wrapper">
                    <div id="login" class="animate form">
                    <form  action="LOGIN.php" method='POST' autocomplete="on"> 
                            <h1>Log in</h1> 
                            <p> 
                                <label for="username" class="uname" data-icon="u" > Your username </label>
                                <input id="username" name="username" required="required" type="text" placeholder="myusername"/>
                            </p>
                            <p> 
                                <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                            </p>
                            <span style="color: red;"><?php echo $error?></span>
                            <p id="forgot" >
                                <a href="forgot_password.php" style="font-weight: bold; text-decoration: none; 
                                color: #4169E1;">Forgot Password ?</a>
                            </p>
                            <p class="login button"> 
                                <input type="submit" name="submit" value="Login" /> 
                            </p>
                            <p class="change_link">
                                Not a member yet ?
                                <a href="signup.php" class="to_register">Join us</a>
                            </p>
                        </form>
                    </div>

                </div>
            </div>  
        </section>
    </div>
</body>
</html>
















