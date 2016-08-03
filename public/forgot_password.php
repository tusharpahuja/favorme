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


<!doctype html> 
<html lang="en" class="no-js"> 
<head> 
	<meta charset="UTF-8" /> 
	<title>Forgot Password</title>
	<link rel="stylesheet" type="text/css" href="css/one.css" />
	<link rel="stylesheet" type="text/css" href="css1/demo1.css" />
	<link rel="stylesheet" type="text/css" href="css1/style.css" />
</head>

<body>
	<div id="forgot-password">
		<div class="forgot-password">
			
			<h2 id="brand-heading">favor.me</h2>
			<section class="content">
				<form action="forgot_password.php" method='POST'>
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" type="text" name="name" style="color: #4d4dff" required autocomplete="off" />
						<label class="input__label input__label--kaede" for="input-37">
							<span class="input__label-content input__label-content--kaede" style="color:#000066;">Name</span>
						</label>
					</span>
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" type="text" name="email" style="color: #4d4dff" required autocomplete="off" />
						<label class="input__label input__label--kaede" for="input-37">
							<span class="input__label-content input__label-content--kaede" style="color:#000066;">E-mail</span>
						</label>
					</span>
					<button type="submit" name="submit" class="btn-submit">Submit</button><br>
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" type="text" name="next" style="color: #4d4dff" autocomplete="off" />
						<label class="input__label input__label--kaede" for="input-37">
							<span class="input__label-content input__label-content--kaede" style="color:#000066;">Enter code:</span>
						</label>
					</span>
					<button type="submit" name="submit" class="btn-submit">Next</button><br>
					<span><?php echo $error_in_finding_user?></span>
				</form>
				<div class="Login">
					<br />
					<a href="login.php"><h3>Log In <i class="fa fa-question-circle"></i></h3></a>
				</div>
			</section>
			<footer>
				<div class="bottom">
					<ul class="footer-info">
						<li><a href="about_us.php">About Us</a></li>
					</ul>
				</div>
			</footer>
		</div>
	</div>
 