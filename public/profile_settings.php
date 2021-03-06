<?php
include("../includes/database_connection.php");
include("../includes/functions.php");
include("../includes/session.php");
?>

<?php 
if(!logged_in())
{
	redirect_to("LOGIN.php");
}
?>

<?php
$current_username=$_SESSION['current_username'];
$error_in_change="";
if(isset($_POST['save_changes']))
{
	$new_username=mysql_entities_fix_string($_POST['new_username']);
	$location=mysql_entities_fix_string($_POST['location']);
	$bio=mysql_entities_fix_string($_POST['bio']);
	$bday=$_POST['bday'];
	$new_username_available=valid_username($new_username,$connection);
	if($current_username==$new_username)
		$new_username_available=1;
	else
		$new_username_available=valid_username($new_username,$connection);
	if($new_username_available==1)
	{
		$updated_username=update_username($current_username,$new_username,$connection);
		$current_username=$new_username;
		$_SESSION['current_username']=$current_username;
		$updated_bio=update_bio($current_username,$bio,$connection);
		$updated_location=update_location($current_username,$location,$connection);
		$updated_birthday=update_birthday($current_username,$bday,$connection);
		if($updated_username && $updated_location && $updated_bio)
			echo "Updated";
		else
			echo "update failed";
	}
	else
	{
		$error_in_change="Username not available.";
		echo "$error_in_change";
	}
}
?>

<?php
global $url;
$current_user_id=$_SESSION['current_user_id'];
$pull="SELECT * FROM user_details WHERE user_id = $current_user_id";

$allowedExts = array("jpg", "jpeg", "gif", "png","JPG");
$extension = @end(explode(".", $_FILES["file"]["name"]));
if(isset($_POST['pupload']))
{
	echo "$current_user_id";
	if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/JPG") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/pjpeg"))
		&& ($_FILES["file"]["size"] < 2000000)
		&& in_array($extension, $allowedExts))
	{
		if ($_FILES["file"]["error"] > 0)
		{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		}
		else
		{
			echo '<div class="plus">';
			echo "Uploaded Successully";
			echo '</div>';

			echo"<br/><b><u>Image Details</u></b><br/>";

			echo "Name: " . $_FILES["file"]["name"] . "<br/>";
			echo "Type: " . $_FILES["file"]["type"] . "<br/>";
			echo "Size: " . ceil(($_FILES["file"]["size"] / 1024)) . " KB"; 

			if (file_exists("upload/" . $_FILES["file"]["name"]))
			{
				unlink("upload/" . $_FILES["file"]["name"]);
			}
			else
			{
				$pic=$_FILES["file"]["name"];
				$conv=explode(".",$pic);
				$ext=$conv['1'];

				move_uploaded_file($_FILES["file"]["tmp_name"],
					"upload/". $current_user_id.".".$ext);
				echo "Stored in as: " . "upload/" . $current_user_id.".".$ext;
				$url=$current_user_id.".".$ext;

				$query="UPDATE user_details SET url='$url' where user_id = $current_user_id";
				$result=mysqli_query($connection,$query);
				if($result)
				{
					echo "<br/>Saved to Database successfully";
				}
			}
		}
	}
	else
		echo "File Size Limit Crossed 2 MB Use Picture Size less than 2 MB";
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js favorsection">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Profile Settings</title>
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
		</div>
		<div id="container_demo" style="margin-top:90px; ">
			<div id="wrapper">
				<div id="login" class="animate form">
					<form  action="profile_settings.php" method='POST' enctype="multipart/form-data"> 
						<h1>PROFILE SETTINGS</h1> 
						<p> 
							<label for="username" class="uname" data-icon="u" > Username </label>
							<input id="name" name="new_username" type="text" placeholder="myusername" style="height: 10px;"/>
						</p>
						<p> 
							<label for="location" class="Location" data-icon="e" > Location</label>
							<input id="location" name="location" type="text" placeholder="mylocation" style="height: 10px;"/> 
						</p>
						<p> 
							<label for="Bio" class="Bio" data-icon="e" > Bio</label>
							<input id="bio" name="bio" type="text" placeholder="mybio" style="height: 10px;"/> 
						</p>
						<p> 
							<label for="Birthday" class="Birthday" data-icon="e" > Birthday</label>
							<input id="birthday" name="bday"  type="date" placeholder="mybirthday" style="height: 10px;"/> 
						</p>
						<p class="sign up button" align="center"> 
							<input type="submit" name="save_changes" value="Save Changes" style="height: 1em; width: 5em;font-size: 17px;">
						</p>
						<p>
							<input type="file" name="file"  />
						</p>
						<p class="sign up button" align="center"> 
							<input type="submit" name="pupload" class="button" value="Upload" style="height: 1em; width: 4em;font-size: 17px;"/>
						</p>
					</form>
				</div>
			</div>
		</div>
	</body>
	</html>


