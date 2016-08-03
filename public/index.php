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
<!doctype html> 
<html lang="en" class="no-js" style="overflow: visible;overflow-x: auto;"> 
<head> 
    <meta charset="UTF-8" /> 
    <title>Login</title> 
    <meta name="theme-color" content="#000000">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <script type='text/javascript' src='js/jquery-1.11.1.min.js'></script>
    <script type='text/javascript' src='js/jquery.particleground.js'></script>
    <script type='text/javascript' src='js/init.js'></script>
    <link href='https://fonts.googleapis.com/css?family=Josefin+Slab:600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/init.css" />
    <link rel="stylesheet" type="text/css" href="css/set1.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
<body>
    <div id="particles">
        <div class="intro">
            <header>
                <div class="top">
                    <ul class="footer-info">
                        <li><a href="about_us.html">About Us</a></li>
                        <li><a href="signup.php">Sign Up</a></li>
                    </ul>
                </div>
            </header>
            <br><br><br>
            <h2 id="brand-heading">favor.me</h2>
            <section class="content">
                <form action="index.php" method='POST'>
                    <span class="input input--kaede">
                        <input class="input__field input__field--kaede" id="input-37" type="text" name="username" style="color: #4d4dff" required autocomplete="off" />
                        <label class="input__label input__label--kaede" for="input-37">
                            <span class="input__label-content input__label-content--kaede" style="color:#000066;">Username</span>
                        </label>
                    </span>
                    <span class="input input--kaede">
                        <input class="input__field input__field--kaede" id="input-36" type="password" name="password" style="color: #4d4dff;" required />
                        <label class="input__label input__label--kaede" for="input-36">
                            <span class="input__label-content input__label-content--kaede" style="color:#000066;" >
                                Password
                            </span>
                        </label>
                    </span>
                    <button type="submit" name="submit" class="btn-submit">Log In</button><br>
                    <span><?php echo $error?></span>
                </form>
                <span id="pwd-wrong">You entered the wrong password</span>
                <div class="forgot-pwd">
                    <br />
                    <a href="forgot_password.php"><h3>Forgot Password <i class="fa fa-question-circle"></i></h3></a>
                </div>
            </section>
        </div>
    </div>

    <script src="js/classie.js"></script>
    <script>
        (function() {
            if (!String.prototype.trim) {
                (function() {
                        // Make sure we trim BOM and NBSP
                        var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                        String.prototype.trim = function() {
                            return this.replace(rtrim, '');
                        };
                    })();
                }
                [].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
                    // in case the input is already filled..
                    if( inputEl.value.trim() !== '' ) {
                        classie.add( inputEl.parentNode, 'input--filled' );
                    }
                    // events:
                    inputEl.addEventListener( 'focus', onInputFocus );
                    inputEl.addEventListener( 'blur', onInputBlur );
                } );
                function onInputFocus( ev ) {
                    classie.add( ev.target.parentNode, 'input--filled' );
                }
                function onInputBlur( ev ) {
                    if( ev.target.value.trim() === '' ) {
                        classie.remove( ev.target.parentNode, 'input--filled' );
                    }
                }
            })();
        </script>
    </body> 
    </html> 
