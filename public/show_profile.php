<?php
	include("../includes/functions.php");
	include("../includes/session.php");
	if(logged_in())
	{
		$current_username= $_SESSION['current_username'];
		$current_name=$_SESSION['current_name'];
		$current_user_id=$_SESSION['current_user_id'];
		 echo "<br ><ul class='menu'>" .         
		 				"<li><a href='home.php'>Home</a></li>".         
		 				"<li><a href='logout.php'>Log out</a></li></ul><br>";
	}
	else
		redirect_to("login.php");
?>
<?php 
	$user_id=$_GET['user_id'];
	echo "$user_id";
	echo "<br>";
?>
<?php
	echo "ELECTRONICS";
	echo "<br>"; 
	$query="SELECT * FROM electronics WHERE user_id=$user_id";
	$result=mysqli_query($connection,$query);
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$favor_id=$row['favor_id'];
			$user_id=$row['user_id'];
			$username=find_username_by_id($user_id,$connection);
			$favor=$row['favor'];
			$date=$row['date'];
			$time=$row['time'];
			echo "$favor";
			echo "<br>";
		}
	}
?>
<?php
	echo "BOOKS";
	echo "<br>"; 
	$query="SELECT * FROM books WHERE user_id=$user_id";
	$result=mysqli_query($connection,$query);
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$favor_id=$row['favor_id'];
			$user_id=$row['user_id'];
			$username=find_username_by_id($user_id,$connection);
			$favor=$row['favor'];
			$date=$row['date'];
			$time=$row['time'];
			echo "$favor";
			echo "<br>";
		}
	}
?>
<?php 
	echo "MOVIES";
	echo "<br>";
	$query="SELECT * FROM movies WHERE user_id=$user_id";
	$result=mysqli_query($connection,$query);
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$favor_id=$row['favor_id'];
			$user_id=$row['user_id'];
			$username=find_username_by_id($user_id,$connection);
			$favor=$row['favor'];
			$date=$row['date'];
			$time=$row['time'];
			echo "$favor";
			echo "<br>";
		}
	}
?>
<?php 
	echo "GAMES";
	echo "<br>";
	$query="SELECT * FROM games WHERE user_id=$user_id";
	$result=mysqli_query($connection,$query);
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$favor_id=$row['favor_id'];
			$user_id=$row['user_id'];
			$username=find_username_by_id($user_id,$connection);
			$favor=$row['favor'];
			$date=$row['date'];
			$time=$row['time'];
			echo "$favor";
			echo "<br>";
		}
	}
?>
<?php
	echo "SPORTS";
	echo "<br>"; 
	$query="SELECT * FROM sports WHERE user_id=$user_id";
	$result=mysqli_query($connection,$query);
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$favor_id=$row['favor_id'];
			$user_id=$row['user_id'];
			$username=find_username_by_id($user_id,$connection);
			$favor=$row['favor'];
			$date=$row['date'];
			$time=$row['time'];
			echo "$favor";
			echo "<br>";
		}
	}
?>
<?php 
	echo "COSMETICS";
	echo "<br>";
	$query="SELECT * FROM cosmetics WHERE user_id=$user_id";
	$result=mysqli_query($connection,$query);
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$favor_id=$row['favor_id'];
			$user_id=$row['user_id'];
			$username=find_username_by_id($user_id,$connection);
			$favor=$row['favor'];
			$date=$row['date'];
			$time=$row['time'];
			echo "$favor";
			echo "<br>";
		}
	}
?>
<?php 
	echo "FOOTWEAR";
	echo "<br>";
	$query="SELECT * FROM footwear WHERE user_id=$user_id";
	$result=mysqli_query($connection,$query);
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$favor_id=$row['favor_id'];
			$user_id=$row['user_id'];
			$username=find_username_by_id($user_id,$connection);
			$favor=$row['favor'];
			$date=$row['date'];
			$time=$row['time'];
			echo "$favor";
			echo "<br>";
		}
	}
?>
<?php
	echo "FOODS"; 
	echo "<br>";
	$query="SELECT * FROM foods WHERE user_id=$user_id";
	$result=mysqli_query($connection,$query);
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$favor_id=$row['favor_id'];
			$user_id=$row['user_id'];
			$username=find_username_by_id($user_id,$connection);
			$favor=$row['favor'];
			$date=$row['date'];
			$time=$row['time'];
			echo "$favor";
			echo "<br>";
		}
	}
?>
<?php
	echo "ACADEMICS";
	echo "<br>"; 
	$query="SELECT * FROM academics WHERE user_id=$user_id";
	$result=mysqli_query($connection,$query);
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$favor_id=$row['favor_id'];
			$user_id=$row['user_id'];
			$username=find_username_by_id($user_id,$connection);
			$favor=$row['favor'];
			$date=$row['date'];
			$time=$row['time'];
			echo "$favor";
			echo "<br>";
		}
	}
?>
<?php
	echo "OTHER ACCESSORIES";
	echo "<br>"; 
	$query="SELECT * FROM otheraccessories WHERE user_id=$user_id";
	$result=mysqli_query($connection,$query);
	if($result)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$favor_id=$row['favor_id'];
			$user_id=$row['user_id'];
			$username=find_username_by_id($user_id,$connection);
			$favor=$row['favor'];
			$date=$row['date'];
			$time=$row['time'];
			echo "$favor";
			echo "<br>";
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
		<form action="show_profile.php" method="GET">
		</form>
	</body>
</html>
