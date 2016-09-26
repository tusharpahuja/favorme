<?php 
include("../includes/database_connection.php");
include("../includes/functions.php");
?>
<?php
if(logged_in())
    redirect_to("home.php");
?> 
<?php
global $error_in_name,$error_in_email,$error_in_password,$error_in_username;
$salt_string="@!";
if (isset($_POST['submit'])) 
{
    $name = mysqli_real_escape_string($connection,(mysql_entities_fix_string($_POST['name'])));
    $email = mysqli_real_escape_string($connection,(mysql_entities_fix_string($_POST['email'])));
    $password = mysqli_real_escape_string($connection,(mysql_entities_fix_string($_POST['password'])));
    $confirm_password = mysqli_real_escape_string($connection,(mysql_entities_fix_string($_POST['confirm_password'])));
    $username = mysqli_real_escape_string($connection,(mysql_entities_fix_string($_POST['username'])));
    $hash_password = password_hashing($password);
    $validation_of_name=valid_name($name);
    $validation_of_email=valid_email($email,$connection);
    $validation_of_username=valid_username($username,$connection);
    $validation_of_password=valid_password($password,$confirm_password);
    if($validation_of_name==1 && $validation_of_email==1 && $validation_of_password==1 && $validation_of_username==1)
        $check=1;
    else
        $check=0;
    if ($check==1) 
    {
        $name.=$salt_string;
        $username.=$salt_string;
        $email.=$salt_string;
        $query = "INSERT INTO user_details(name,email,username,password) VALUES('$name','$email','$username','$hash_password')";
        $result = mysqli_query($connection,$query);
        if (!$result)
        {
            echo "INSERT failed: $query<br>" .  $connection->error . "<br><br>";
        }
        else
        {
            redirect_to("LOGIN.php");
        }
        ?>
        <script>
            var login_value = 1; 
        </script>
        <?php
    }
    else
    {

        ?>

        <script>
            var login_value = 0; 
        </script>

        <?php
    }

}  
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <title>Signup</title>
    <script src="js/jquery.min.js"></script>
    <link href="css/login.css" rel="stylesheet" type="text/css" media="all"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="../favicon.ico"> 
</head>
<body>
    <div class="header">
        <div class="header-main">
           <h1>Sign up !</h1>
           <div class="header-bottom">
            <div class="header-right w3agile">

                <div class="header-left-bottom agileinfo">

                 <form action="signup.php" method="post" autocomplete="on">
                    <input type="text" name="name" placeholder="myname" required />
                    <span style="color: red;"><?php echo "$error_in_name"?></span>
                    <input type="email" name="email" placeholder="myemail" required />
                    <input type="text" name="username" placeholder="myusername" required />
                    <span style="color: red;"><?php echo "$error_in_username"?></span>
                    <input type="password" name="password" placeholder="password" required />
                    <span style="color: red;"><?php echo "$error_in_password"?></span>
                    <input type="password" name="confirm_password" placeholder="confirm_password"  required />
                    <br/>
                    <span style="color: red;"><?php echo "$error_in_password"?></span>
                    <input type="submit" name="submit" value="Sign Up">
                </form> 
                <div class="header-left-top">
                <div class="sign-up"> <h2>or</h2> </div>
                </div>
                <div class="header-social wthree">
                    <a href="login.php" class="face" style="text-align: center;"><h5>LOGIN</h5></a>
                    <a href="about_us.html" class="twitt" style="text-align: center;"><h5>About Us</h5></a>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>