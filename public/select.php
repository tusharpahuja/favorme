<?php
	include("../includes/functions.php");
	include("../includes/session.php");
	include("../includes/database_connection.php");
?>

<?php
	if(logged_in())
	{
		$current_user_id=$_SESSION['current_user_id'];
		$current_username=$_SESSION['current_username'];
		$current_name=$_SESSION['current_name'];
	}
	else
		redirect_to("LOGIN.php");
?>
<?php 
	$query="SELECT * FROM academics ORDER BY favor_id DESC";
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
			$output.='<time class="cbp_tmtime"><span>'.$date.'</span> <span>'.$time.'</span></time><div class="cbp_tmicon cbp_tmicon-phone"></div>
			<div class="cbp_tmlabel">
				<h2 class="wow">'.$favor.'<span id="by">posted by <em><a href="show_profile.php?user_id=<?php echo $user_id?>&username=<?php echo $username?>"><?php echo $username?></a></em></span></h2>
			</div>';
			echo "$output";
		}
	}
?>