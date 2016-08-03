<?php
	include("../includes/functions.php");
	include("../includes/session.php");
	include("../includes/database_connection.php");
?>
<?php 
	$query="SELECT * FROM movies ORDER BY favor_id DESC";
	$result=mysqli_query($connection,$query);
	$result_data=array();
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
?>
<?php 
			$number_of_comments=0;
			$query_comments="SELECT * FROM electronics_comments WHERE favor_id=$favor_id ORDER BY comment_id ASC";
			$result_comments=mysqli_query($connection,$query_comments);
			if($result_comments)
			{
				while ($row_comments=mysqli_fetch_assoc($result_comments)) 
				{
					$number_of_comments++;
				}
			}
		?>
		<?php
			array_push($result_data,array('favor_id' =>$favor_id,'favor'=>$favor,'username'=>$username,'date'=>$date,'time'=>$time));
		}
	}
	echo json_encode(array('result_data'=>$result_data));
?>