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
		if($category=="electronics")
		{	
			$query="INSERT INTO electronics(user_id,favor,time,date) VALUES($current_user_id,'$ask_favor','$time','$date')";
			$result=mysqli_query($connection,$query);
			if($result)
				header("location: timeline-electronics.php");
			else
				echo "Favor Updation failed!";
		}

		elseif($category=="movies")
		{	
			$query="INSERT INTO movies(user_id,favor,time,date) VALUES($current_user_id,'$ask_favor','$time','$date')";
			$result=mysqli_query($connection,$query);
			if($result)
				header("location: timeline-electronics.php");
			else
				echo "Favor Updation failed!";
		}

		elseif($category=="games")
		{	
			$query="INSERT INTO games(user_id,favor,time,date) VALUES($current_user_id,'$ask_favor','$time','$date')";
			$result=mysqli_query($connection,$query);
			if($result)
				header("location: timeline-electronics.php");
			else
				echo "Favor Updation failed!";
		}

		elseif($category=="books")
		{	
			$query="INSERT INTO books(user_id,favor,time,date) VALUES($current_user_id,'$ask_favor','$time','$date')";
			$result=mysqli_query($connection,$query);
			if($result)
				header("location: timeline-electronics.php");
			else
				echo "Favor Updation failed!";
		}

		elseif($category=="sports")
		{	
			$query="INSERT INTO sports(user_id,favor,time,date) VALUES($current_user_id,'$ask_favor','$time','$date')";
			$result=mysqli_query($connection,$query);
			if($result)
				header("location: timeline-electronics.php");
			else
				echo "Favor Updation failed!";
		}

		elseif($category=="cosmetics")
		{	
			$query="INSERT INTO cosmetics(user_id,favor,time,date) VALUES($current_user_id,'$ask_favor','$time','$date')";
			$result=mysqli_query($connection,$query);
			if($result)
				header("location: timeline-electronics.php");
			else
				echo "Favor Updation failed!";
		}

		elseif($category=="footwear")
		{	
			$query="INSERT INTO footwear(user_id,favor,time,date) VALUES($current_user_id,'$ask_favor','$time','$date')";
			$result=mysqli_query($connection,$query);
			if($result)
				header("location: timeline-electronics.php");
			else
				echo "Favor Updation failed!";
		}
		
		elseif($category=="food")
		{	
			$query="INSERT INTO food(user_id,favor,time,date) VALUES($current_user_id,'$ask_favor','$time','$date')";
			$result=mysqli_query($connection,$query);
			if($result)
				header("location: timeline-electronics.php");
			else
				echo "Favor Updation failed!";
		}
		
		elseif($category=="academics")
		{	
			$query="INSERT INTO academics(user_id,favor,time,date) VALUES($current_user_id,'$ask_favor','$time','$date')";
			$result=mysqli_query($connection,$query);
			if($result)
				header("location: timeline-electronics.php");
			else
				echo "Favor Updation failed!";
		}
		
		elseif($category=="otheraccessories")
		{	
			$query="INSERT INTO otheraccessories(user_id,favor,time,date) VALUES($current_user_id,'$ask_favor','$time','$date')";
			$result=mysqli_query($connection,$query);
			if($result)
				header("location: timeline-electronics.php");
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
	<script src="myscript.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/timeline.css" />
	<link rel="stylesheet" type="text/css" href="css/one.css" />
	<link rel="stylesheet" type="text/css" href="css1/demo1.css" />
	<link rel="stylesheet" type="text/css" href="css1/style.css" />
</head>
<body>
	<form action="timeline-prac.php" method="POST">
		<div id="container" class="container">
			<header>
				<div align="right">
					<ul>
						<li><a href="home.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
						<li><a href="profile.php"><i class="fa fa-user"></i> My profile</a></li>
						<li><a href="logout.php"></span>Logout</a></li>
					</ul>
				</div>
				<h1 style="font-size: 50px;">ELECTRONICS</h1>
			</header>
			<hr id="header-line">
			<div class="main">
				<div>
					<input type="text" height="200" width="500" placeholder="Ask a favor" name="askfavor">&nbsp&nbsp&nbsp&nbsp
					<select type="text" name="categories">
						<option value="electronics">Electronics</option>
						<option value="books">Books</option>
						<option value="movies">Movies & TV Shows</option>
						<option value="games">Games</option>
						<option value="sports">Sports</option>
						<option value="cosmetics">Beauty & Personal Care</option>
						<option value="footwear">Footwear</option>
						<option value="food">Food & Snacks</option>
						<option value="academics">Academics</option>
						<option value="otheraccessories">Other Accessories</option>
					</select>
					<input type="submit" name="update" value="Ask">
					<br>
					<br>
				</div>

				<div class="cbp_tmtimeline">
					<ul></u
						l>			
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
											<a href="timeline-footwear.php"><li>Footwear</li></a>
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
								<h2 id="categories" class="noshow"><a href="settings.php" style="text-decoration: none;color: black;">Settings</a></h2>
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
	$query_insert_comment="INSERT INTO electronics_comments(user_id,favor_id,comment,date,time) VALUES($current_user_id,$idButton,'$comments','$date','$time')";
	$result_insert_comment=mysqli_query($connection,$query_insert_comment);
	if($result_insert_comment)
	{
		echo "commented";
		?>
		<script type="text/javascript">
			window.open ('timeline-electronics.php','_self',false);
		</script>
		<?php
	}
	else
		echo "Comment failed";
	?>
	<script type="text/javascript">
		window.open ('timeline-electronics.php','_self',false);
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