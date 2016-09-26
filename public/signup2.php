<?php
//validation of name
        function valid_name($name)                 
        {
            global $error_in_name;
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
            {
                $error_in_name = "Only letters and white space allowed";
                 return 0; 
            }
               
            else
                return 1;
        }

        //validation of e-mail
        function valid_email($email)                
        {
            global $error_in_email;
                if (filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    return 1;
                }
                else
                {
                    $error_in_email="E-mail format error";
                    return 0;
                }
        }

        //------------------------------------------------------------------------------------------------------------------------------------------------//

        //preventing HTML and SQL Injection
        function mysql_entities_fix_string($data)
        {
            // Fix &entity\n;
            $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
            $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
            $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
            $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

            // Remove any attribute starting with "on" or xmlns
            $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

            // Remove javascript: and vbscript: protocols
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

            // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

            // Remove namespaced elements (we do not need them)
            $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

            do
            {
                // Remove really unwanted tags
                $old_data = $data;
                $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
            }
            while ($old_data !== $data);
            $data = trim($data);
            $data = stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }
    function valid_website($website)
    {
        global $error_in_website;
        if (!filter_var($website, FILTER_VALIDATE_URL) === false) {
            return 1;
        } else {
            $error_in_website = "wrong url";
            return 0;
        }
    }
    function valid_g_c()
    {
        global $error_in_gender;
        if (empty($_POST["comment"])) {
            $comment = "";
          } else {
            $comment = mysql_entities_fix_string($_POST["comment"]);
          }
          if (empty($_POST["gender"])) {
            $error_in_gender = "Gender is required";
          } else {
            $gender = mysql_entities_fix_string($_POST["gender"]);
          }
        }

        //------------------------------------------------------------------------------------------------------------------------------------------------//
        ?>
<?php
global $error_in_name,$error_in_email,$error_in_username,$error_in_website,$error_in_gender;
if (isset($_POST['submit'])) 
{
    $name = mysql_entities_fix_string($_POST['name']);
    $email = mysql_entities_fix_string($_POST['email']);
    $website = mysql_entities_fix_string($_POST['website']);
    $validation_of_name=valid_name($name);
    $validation_of_email=valid_email($email);
    $validation_of_website=valid_website($website);
    valid_g_c();
    $check = 0;
    if($validation_of_name==1 && $validation_of_email==1 && $validation_of_website==1)
        $check=1;
    else
        $check=0;
    
    if($check == 1)
    {
        echo "$name";
        echo "<br/>";
        echo "$email";
        echo "<br/>";
        echo "$website";
        echo "<br/>";
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

                 <form action="signup2.php" method="post" autocomplete="on">
                    <input type="text" name="name" placeholder="myname" required />
                    <span style="color: red;"><?php echo "$error_in_name"?></span>
                    <input type="email" name="email" placeholder="myemail" required />
                    <input type="text" name="website" placeholder="website" required />
                    <span style="color: red;"><?php echo "$error_in_website"?></span>
                    Comment: <textarea name="comment" rows="5" cols="40"><?php
                    echo $comment;?></textarea>
                      <br><br>
                      Gender:
                      <input type="radio" name="gender" <?php ?> value="female">Female
                      <input type="radio" name="gender" <?php if (isset($gender) 

                    && $gender=="male") echo "checked";?> value="male">Male
                      <span class="error">* <?php echo $error_in_gender;?></span>
                      <br><br>
                    
                    <input type="submit" name="submit" value="Sign Up">
                </form> 
            </div>
        </div>

    </div>
</div>
</body>
</html>