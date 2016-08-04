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
if(isset($_POST['update']))
{
	$ask_favor=mysql_entities_fix_string($_POST['askfavor']);
	$category=mysql_entities_fix_string($_POST['categories']);
	$time=date("h:i");
	$date=date("Y-m-d");
	if(!empty($category) && !empty($ask_favor))
	{
		if($category=="academics")
		{	
			$query="INSERT INTO academics(user_id,favor,time,date) VALUES($current_user_id,'$ask_favor','$time','$date')";
			$result=mysqli_query($connection,$query);
			if($result)
				header("location: timeline-academics.php");
			else
				echo "Favor Updation failed!";
		}
	}
}
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
	<script src="js/modernizr.custom.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/timeline.css" />
	<link rel="stylesheet" type="text/css" href="css/one.css" />
	<link rel="stylesheet" type="text/css" href="css/new.css" />
	<link rel="stylesheet" type="text/css" href="css/button.css" />
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
	<form action="timeline-academics.php" method="POST">
		<div id="container" class="container">
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
						<li style="margin-top: -20px;">
							<input type="text" height="200" width="500" placeholder="Ask a favor" name="askfavor" class="button">
						</li>
						<li style="margin-left: -30px;">
							<input type="submit" name="update" value="Ask" class="btn btn-danger">
						</li>
					</ul>
				</nav>
			</header>
			<hr id="header-line">
			<div class="main">
				<div>
					&nbsp&nbsp&nbsp&nbsp
					<select type="text" name="categories" style="float: right;">
						<option value="academics">Academics</option>
					</select>
					<br>
					<br>
				</div>
				<ul class="cbp_tmtimeline">
					<li>
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
								?>
								<time class="cbp_tmtime"><span><?php echo "$date";?></span> <span><?php echo "$time";?></span></time>				<div class="cbp_tmicon cbp_tmicon-phone"></div>
								<div class="cbp_tmlabel">
									<h2 class="wow"><?php echo "$favor";?><span id="by">posted by <em><a href="show_profile.php?user_id=<?php echo $user_id?>&username=<?php echo $username?>"><?php echo $username?></a></em></span></h2>
									<p>
										<div class="baseline">
											<?php 
											$query_comments="SELECT * FROM academics_comments WHERE favor_id=$favor_id ORDER BY comment_id ASC";
											$result_comments=mysqli_query($connection,$query_comments);
											if($result_comments)
											{
												while ($row_comments=mysqli_fetch_assoc($result_comments)) 
												{
													$commenting_user_id=$row_comments['user_id'];
													$commenting_username=find_username_by_id($commenting_user_id,$connection);
													$comment=$row_comments['comment'];
													echo "$comment";
													echo "&nbsp;&nbsp;&nbsp;&nbsp;";

													echo "commented by &nbsp;";
													echo "<a href=\"show_profile.php?user_id=<?php echo $user_id?>&username=<?php echo $username?>\"";
													echo ">";
													echo "<i>";
													echo $username;
													echo "</i>";
													echo "</a>";
													echo "<br>";
												}
											}
											?>
											<input type="text" name="<?php echo $favor_id?>" id="<?php echo $favor_id;?>" style="color: black;">
											<input type="submit" name="comment" id="<?php echo $favor_id;?>" value="Comment" class="btn btn-danger" onClick="createField(<?php echo $favor_id?>);return true;">
											<div id="hide"></div>
											<br>
										</div>
									</p>
								</div>
								<?php
							}
						}
						?>
					</li>			
				</ul>
			</div>
		</div>
		<!-- /container -->
		<div class="morph-button morph-button-sidebar morph-button-fixed" style="z-index: 999;">
			<button type="button"><i class="fa fa-tags"></i></span></button>
			<div class="morph-content">
				<div>
					<div class="content-style-sidebar">
						<span class="icon icon-close" id="close"><i class="fa fa-close"></i></span>
						<br>
						<h2 id="categories" class="noshow">Categories<i class="fa fa-arrow-circle-down"></i></h2>
						<div id="cat" style="display: none;">
							<ul>
								<div class="sidebar-li">
									<a href="timeline-academics.php"><li>Academics</li></a>
								</div>
								<div class="sidebar-li">
									<a href="timeline-books.php"><li>Books</li></a>
								</div>
								<div class="sidebar-li">
									<a href="timeline-cosmetics.php"><li>Personal care</li></a>
								</div>	
								<div class="sidebar-li">
									<a href="timeline-electronics.php"><li>Electronics</li></a>
								</div>							
								<div class="sidebar-li">
									<a href="timeline-foods.php"><li>Food</li></a>
								</div>
								<div class="sidebar-li">
									<a href="timeline-footwear.php"><li>Clothing & Footwear</li></a>
								</div>
								<div class="sidebar-li">
									<a href="timeline-games.php"><li>Games</li></a>
								</div>
								<div class="sidebar-li">
									<a href="timeline-movies.php"><li>Movies</li></a>
								</div>
								<div class="sidebar-li">
									<a href="timeline-sports.php"><li>Sports</li></a>
								</div>
								<div class="sidebar-li">
									<a href="timeline-otheraccessories.php"><li>Other Accessories</li></a>
								</div>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>		<script src="js/classie.js"></script>
		<script src="js/uiMorphingButton_fixed.js"></script>
		<script>
			(function() {
				var docElem = window.document.documentElement, didScroll, scrollPosition,
				container = document.getElementById( 'container' );

				// trick to prevent scrolling when opening/closing button
				function noScrollFn() {
					window.scrollTo( scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0 );
				}

				function noScroll() {
					window.removeEventListener( 'scroll', scrollHandler );
					window.addEventListener( 'scroll', noScrollFn );
				}

				function scrollFn() {
					window.addEventListener( 'scroll', scrollHandler );
				}

				function canScroll() {
					window.removeEventListener( 'scroll', noScrollFn );
					scrollFn();
				}

				function scrollHandler() {
					if( !didScroll ) {
						didScroll = true;
						setTimeout( function() { scrollPage(); }, 60 );
					}
				};

				function scrollPage() {
					scrollPosition = { x : window.pageXOffset || docElem.scrollLeft, y : window.pageYOffset || docElem.scrollTop };
					didScroll = false;
				};

				scrollFn();
				
				var el = document.querySelector( '.morph-button' );
				
				new UIMorphingButton( el, {
					closeEl : '.icon-close',
					onBeforeOpen : function() {
						// don't allow to scroll
						noScroll();
						// push main container
						classie.addClass( container, 'pushed' );
					},
					onAfterOpen : function() {
						// can scroll again
						canScroll();
						// add scroll class to main el
						classie.addClass( el, 'scroll' );
					},
					onBeforeClose : function() {
						// remove scroll class from main el
						classie.removeClass( el, 'scroll' );
						// don't allow to scroll
						noScroll();
						// push back main container
						classie.removeClass( container, 'pushed' );
					},
					onAfterClose : function() {
						// can scroll again
						canScroll();
					}
				} );
			})();
		</script>
		<script type="text/javascript">
			$("#categories").click(function(){
				$("#cat").slideDown();
				$("#categories").removeClass('noshow');
			});
			$("#close").click(function(){
				$("#cat").slideUp();
				$("#categories").addClass('noshow');
			});
		</script>
		
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</form>
</body>
</html>

<?php
$time=date("h:i");
$date=date("Y-m-d");
if(isset($_POST['comment']))
{
	$idButton = isset($_POST['iddetector'])?$_POST['iddetector']:NULL;
	echo "$idButton";
	$comments=mysql_entities_fix_string($_POST[$idButton]);
	echo "$comments";
	$query_insert_comment="INSERT INTO academics_comments(user_id,favor_id,comment,date,time) VALUES($current_user_id,$idButton,'$comments','$date','$time')";
	$result_insert_comment=mysqli_query($connection,$query_insert_comment);
	if($result_insert_comment)
	{
		echo "commented";
		?>
		<script type="text/javascript">
			window.open ('timeline-academics.php','_self',false);
		</script>
		<?php
	}
	else
		echo "Comment failed";
	?>
	<script type="text/javascript">
		window.open ('timeline-academics.php','_self',false);
	</script>
	<?php
}
?>
<script type="text/javascript">
	function createField(id)
	{
		var x = document.getElementById("hide");
		var y = "<input type='hidden' name='iddetector' value='"+id+"'/>";
		x.innerHTML = y;
		return;
	}
</script>