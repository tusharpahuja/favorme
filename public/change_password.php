<?php 
include("../includes/database_connection.php");
include("../includes/session.php");
include("../includes/functions.php");

?>

<!DOCTYPE html>
<html lang="en" class="no-js favorsection">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Profile</title>
	<meta name="theme-color" content="#46a4da">
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/settings.css" />
	<link rel="stylesheet" type="text/css" href="css/component.css" />
	<link rel="stylesheet" type="text/css" href="css/content.css" />
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/profile.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/timeline.css" />
	<link rel="shortcut icon" href="../favicon.ico"> 
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/one.css" />
	<link rel="stylesheet" type="text/css" href="css1/demo1.css" />
	<link rel="stylesheet" type="text/css" href="css1/style.css" />
</head>
<body>
	<div>
		<div id="container" class="container">
			<header>
				<div align="right">
					<ul>
						<li><a href="home.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
						<li><a href="profile.php"><i class="fa fa-user"></i> My profile</a></li>
						<li><a href="logout.php"></span>Logout</a></li>
					</ul>
				</div>
			</header>
			<hr id="header-line">
		</div>
		<div id="container_demo">
			<div id="wrapper">
				<div id="login" class="animate form">
					<form  action="change_password.php" method='POST' enctype="multipart/form-data"> 
						<h1>CHANGE PASSWORD</h1> 
						<p> 
							<label for="old_password" class="uname" data-icon="p" > Old Password </label>
							<input id="old_password" name="old_password" required="required" type="password" placeholder="myoldpassword"/>
						</p>
						<p> 
							<label for="new_password" class="uname" data-icon="p" > New Password </label>
							<input id="new_password" name="new_password" required="required" type="password" placeholder="mynewpassword"/>
						</p>
						<p> 
							<label for="confirm_password" class="uname" data-icon="p" > Confirm Password </label>
							<input id="confirm_password" name="confirm_password" required="required" type="password" placeholder="mynewpassword"/>
						</p>
						<p class="sign up button"> 
							<input type="submit" name="save_changes" value="Save Changes">
						</p>
						<?php
						$username=$_SESSION['username'];
						if(isset($_POST['save_changes']))
						{
							$old_password=mysql_entities_fix_string($_POST['old_password']);
							$new_password=mysql_entities_fix_string($_POST['new_password']);
							$confirm_password=mysql_entities_fix_string($_POST['confirm_password']);
							if($new_password==$confirm_password)
							{
								$validation_of_old_password=attempt_login($username,password_hashing($old_password),$connection);
								if($validation_of_old_password)
								{
									$updated_password=update_password($username,$confirm_password,$connection);
									if($updated_password)
										echo "Password changed";
									else
										echo "Password change failed";
								}
								else
									echo "Incorrect Password";
							}
							else
								echo "Passwords do not match";
						}
						?>
					</form>
				</div>
			</div>
		</div>
	</body>
	</html>
