<!DOCTYPE html>
<html>
	<head>
		<title>Posts</title>
	</head>
	<body>
		<form action="post.php" method="GET">
			<div id="<?php echo $_GET['favor_id']; ?>">
				<?php
					$category=$_GET['category'];
					echo "$category";
					echo $_GET['favor_id'];
				?>
			</div>
		</form>
	</body>