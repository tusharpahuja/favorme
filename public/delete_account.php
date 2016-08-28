<?php
include("../includes/database_connection.php");
include("../includes/functions.php");
include("../includes/session.php");
?>

<?php if(!logged_in())

{
	redirect_to("login.php");
} 
?>
<?php
global $error_in_deleting; 
if(isset($_POST['submit']))
{
	$current_user = $_SESSION["username"];
	echo "$current_user";
	$salt_string="@!";
	$current_user.=$salt_string;

	$error_in_deleting="";
	$query = "DELETE FROM user_details WHERE username = '$current_user' LIMIT 1";
	$result = mysqli_query($connection, $query);

	if ($result && mysqli_affected_rows($connection) == 1) 
	{
		session_start();
		redirect_to("login.php");
	} 
	else 
	{

		$error_in_deleting="User deletion failed";
		echo "$error_in_deleting";
	}
}
?>

<!doctype html>
<html>
<head>
	<title>Delete account</title>
	<link rel="stylesheet" type="text/css" href="css/one.css" />
	<link rel="stylesheet" type="text/css" href="css1/demo1.css" />
	<link rel="stylesheet" type="text/css" href="css1/style.css" />
	<style type="text/css">
	.myButton{
		background-color: #d9534f;
		padding: 30px;
		font-size: 20px;
		margin-left: -90px;
		font-weight: bold;
	}
	.myButton:hover{
		background-color: white;
		color: #d9534f;
		font-weight: bold;
	}
	</style>
</head>
<body>
	<form action="delete_account.php" method="POST" style="margin:250px 600px;">
		<input type="submit" name="submit" value="Confirm Delete your account ?" class="myButton" style="border:2px solid black;">
	</form>
</body>
</html>