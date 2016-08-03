<?php 
include("../includes/database_connection.php");
include("../includes/session.php");
include("../includes/functions.php");
?>
<?php
global $error_in_finding_user;
if(isset($_POST['submit']))
{
	$name=mysqli_real_escape_string($connection,(mysql_entities_fix_string($_POST['name'])));
	$email=mysqli_real_escape_string($connection,(mysql_entities_fix_string($_POST['email'])));
	$found_user=find_user_by_email_and_name($email,$name,$connection);
	if($found_user)
	{
		$generated_random_number=mt_rand();
		send_recovery_mail($email,$generated_random_number);
		if(isset($_POST['next']))
		{
			$user_posted_number=$_POST['next'];
			if($user_posted_number==$generated_random_number)
			{
				$_SESSION['name']=$name;
				$_SESSION['email']=$email;
				redirect_to("confirm_recovery.php");
			}
		}
	}
	else
	{
		$error_in_finding_user="Name and E-mail do not match";
	}
}

?>
<?php
	if(isset($_POST["login"])){
		redirect_to("LOGIN.php");
	}	

?>


<!doctype html> 
<html lang="en" class="no-js"> 
<head> 
	<meta charset="UTF-8" /> 
	<title>Forgot Password</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/settings.css" />
	<link rel="stylesheet" type="text/css" href="css/component.css" />
	<link rel="stylesheet" type="text/css" href="css/content.css" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/profile.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<script src="js/modernizr.custom.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/timeline.css" />
	<link rel="stylesheet" type="text/css" href="css/one.css" />
	<link rel="stylesheet" type="text/css" href="css/new.css" />
	<link rel="stylesheet" type="text/css" href="css1/demo1.css" />
	<link rel="stylesheet" type="text/css" href="css1/style.css" />
	<style type="text/css">
		.fixed-nav-bar {
			position: fixed;
			top: 0;
			left: 0;
			z-index: 9999;
			width: 100%;
			height: 55px;
			background-color: #e85657;
		}
	</style>
</head>

<body>
	<header>
		<div class="info" style="margin-top: 20px; margin-right: 40px;">
			<p>  
				<a href="about_us.html" class="About_us">About us</a>
			</p>
		</div>
	</header>
	<hr id="header-line">
	<div id="container_demo" style="margin-top:10px; ">
		<div id="wrapper">
			<div id="login" class="animate form">
				<form  action="forgot_password.php" method='POST' enctype="multipart/form-data"> 
					<h1>FORGOT PASSWORD ??</h1> 
					<p> 
						<label for="name" class="uname" data-icon="u" > Name </label>
						<input id="name" name="name" type="text" placeholder="myname" style="height: 10px;"/>
					</p>
					<p> 
						<label for="email" class="email" data-icon="e" > E-mail</label>
						<input id="email" name="email" type="text" placeholder="myemail" style="height: 10px;" /> 
					</p>
					<p class="sign up button" align="center"> 
						<input type="submit" name="submit" value="Submit" style="height: 1em; width: 4em;font-size: 17px;">
					</p>
					<p> 
						<label for="next" class="next" data-icon="e" > Enter code:</label>
						<input id="next" name="next" type="text" placeholder="Enter the code" style="height: 10px;"/> 
					</p>
					<span><?php echo $error_in_finding_user?></span>
					<p class="sign up button" align="center"> 
						<input type="submit" name="submit" value="Next" style="height: 1em; width: 4em;font-size: 17px;">
					</p>
					<p class="sign up button" align="right" style="margin-bottom: -40px;"> 
						<input type="submit" value="Go and Log In" name="login">
					</p>
				</form>
			</div>
		</div>
	</div>