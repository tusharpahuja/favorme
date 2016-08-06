<?php
include("../includes/functions.php");
include("../includes/session.php");
include("../includes/database_connection.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Posts</title>
	</head>
	<body>
		<form action="post.php" method="GET">
			<div id="<?php echo $_GET['favor_id'];?>">
				<?php
					$favor_id=$_GET['favor_id'];
					$category=$_GET['category'];
					echo "$category";
					echo $favor_id;
					$query="SELECT * FROM academics WHERE favor_id= $favor_id LIMIT 1";
					$result=mysqli_query($connection,$query);
					if($result){
						$row=mysqli_fetch_assoc($result);
						echo $row['favor'];
					}
				?>
			</div>
		</form>
	</body>