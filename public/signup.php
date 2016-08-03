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
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>FAVOR.ME</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
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
                            <form  action="signup.php" method='POST' id="signup" autocomplete="on"> 
                                <h1>Sign Up</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your name </label>
                                    <input id="name" name="name" required="required" type="text" placeholder="myname"/>
                                </p>
                                <span style="color: red;"><?php echo "$error_in_name"?></span>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="email" name="email" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                </p>
                                 <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                    <input id="username" name="username" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <span style="color: red;"><?php echo "$error_in_username"?></span>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="confirm_password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <span style="color: red;"><?php echo "$error_in_password"?></span>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="password" name="confirm_password" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <span style="color: red;"><?php echo "$error_in_password"?></span>
                                <p class="sign up button"> 
                                    <input type="submit" name="submit" value="Sign Up" /> 
                                </p>
                                <p class="change_link">  
                                    Already a member ?
                                    <a href="LOGIN.php" class="to_register"> Go and log in </a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>