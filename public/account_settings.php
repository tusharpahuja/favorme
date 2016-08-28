<?php
	include("../includes/database_connection.php");
	include("../includes/functions.php");
	include("../includes/session.php");
?>

<?php 
	$username="Tushar Pahuja@ !";
	$username1=mysqli_real_escape_string($connection,$username);
	if(!logged_in())
		{
			redirect_to("LOGIN.php");
		}
?>


<!DOCTYPE html>
<html lang="en" class="no-js favorsection">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Account Settings</title>
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
	<link rel="stylesheet" type="text/css" href="css/new.css" />
	<link rel="stylesheet" type="text/css" href="css1/demo1.css" />
	<link rel="stylesheet" type="text/css" href="css1/style.css" />
	<style type="text/css">
	.abcd a:hover{
		font-size: 20px;
		color: red;
	}
	</style>
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
	<script type="text/javascript">
			$('.button').onclick(function(){
				window.open= 'profile_settings.php';
			})
	</script>
</head>
<body>
	<div>
		<div id="container" class="container" style="margin-top: -100px;">
			<header>
				<nav class="fixed-nav-bar" >
					<div align="right" style="margin-top: 0px;">
						<ul>
							<li><a href="home.php" class="a1" style="color: white;"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
							<li><a href="profile.php" class="b1" style="color: white;"><i class="fa fa-user"></i> My profile</a></li>
							<li>
								<div class="dropdown" style="margin-right: 60px; margin-left: -20px;">
									<button class="dropbtn"><i class="fa fa-cog" aria-hidden="true" ></i>&nbsp;Settings</button>
									<div class="dropdown-content">
										<a href="profile_settings.php">Profile Settings</a>
										<a href="account_settings.php">Account Settings</a>
										<a href="logout.php">Logout</a>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<ul style="font-size: 30px;float: left;margin-top: -50px;">
						<li style="color: white;">
							favor.me
						</li>
					</ul>
				</nav>
			</header>
			<hr id="header-line">
		</div>
		<div id="container_demo" style="margin-top:90px;">
			<div id="wrapper">
				<div id="login" class="animate form">
					<form  action="profile_settings.php" method='POST' enctype="multipart/form-data"> 
                                <h1>ACCOUNT SETTINGS</h1> 
                                <p class="abcd"> 
                                    <label for="username" class="uname"> <a href="change_password.php" style="text-decoration: none;">Change Password </a></label>
                                </p>
                                <p class="abcd"> 
                                    <label for="location" class="Location"  ><a href="delete_account.php" style="text-decoration: none;"> Delete Account</a></label> 
                                </p>
                                <p class="sign up button" > 
									<a href="logout.php"><input type="button" name="pupload" class="button" value="Logout"/><a>
                                </p>
                            </form>
				</div>
			</div>
		</div>
	</body>
	</html>
