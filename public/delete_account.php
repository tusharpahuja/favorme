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
	<link rel="stylesheet" type="text/css" href="css/one.css" />
	<link rel="stylesheet" type="text/css" href="css1/demo1.css" />
	<link rel="stylesheet" type="text/css" href="css1/style.css" />
</head>
<body>
	<form action="delete_account.php" method="POST">
<input type="submit" name="submit" value="Confirm Delete your account">
</form>
</body>
</html>