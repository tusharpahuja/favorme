<?php
  $pull="SELECT * FROM user_details WHERE user_id = $user_id";

  $allowedExts = array("jpg", "jpeg", "gif", "png","JPG");
  $extension = @end(explode(".", $_FILES["file"]["name"]));
  if(isset($_POST['pupload'])){
  if ((($_FILES["file"]["type"] == "image/gif")
  || ($_FILES["file"]["type"] == "image/jpeg")
  || ($_FILES["file"]["type"] == "image/JPG")
  || ($_FILES["file"]["type"] == "image/png")
  || ($_FILES["file"]["type"] == "image/pjpeg"))
  && ($_FILES["file"]["size"] < 200000)
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
              "upload/". $user_id.".".$ext);
              echo "Stored in as: " . "upload/" . $user_id.".".$ext;
              $url=$user_id.".".$ext;
          
              $query="UPDATE user_details SET url='$url',lastUpload=now() where user_id = $user_id";
              $result=mysqli_query($connection,$query);
              if($result)
              {
                echo "<br/>Saved to Database successfully";
              }
            }
        }
    }
  else
    echo "File Size Limit Crossed 200 KB Use Picture Size less than 200 KB";
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
<form action="upload.php" method="post" enctype="multipart/form-data">    
  <?php 
    $result=mysqli_query($connection,$pull);
    $pics=mysqli_fetch_assoc($result);
    echo '<div class="imgLow">';
    echo "<img src='upload/<?php echo '$url';?>.jpg' alt='profile picture' width='80' height='64'   class='doubleborder'/></div>";
    
    ?>
    
    <input type="file" name="file" />
    <input type="submit" name="pupload" class="button" value="Upload"/>
   
</form>
</body>
</html>
