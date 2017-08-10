<?php
$id = $_GET['id'];

include("constants.php");

$query = "SELECT * from blog_details WHERE blog_id = $id";

$result = mysqli_query($conn,$query);

if($row = mysqli_fetch_array($result)){
	$title = $row['blog_title'];
	$author = $row['blog_author'];
	$image = $row['blog_imagename'];
	$desc = $row['blog_desc'];
	$date = $row['blog_date'];

?>

<!DOCTYPE html>
  <html>
    <head>
	  <title>This is our blog post.</title>
	  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="style.css">
      <script type="text/javascript" src = "js/jquery.js"></script>
      <script type="text/javascript" src = "js/bootstrap.min.js"></script>
    </head>
      <body>
<!-- This is out navbar -->
        <?php include("navbar.php");?>

        <h2><a href = "single.php?id=<?php echo $id; ?>"><?php echo $title; ?></a></h2>
        <p>Published on: &nbsp;&nbsp;<?php echo $date; ?></p>
        <p align="right"> Posted By: &nbsp;&nbsp;<b align="right"><?php echo $author; ?></b></p>
        <center><img width="600" height="250" src="/assignment7/images/<?php echo $image; ?>"></center>

        <p align="justify">
	      <?php echo $desc; ?>
        </p>
<!-- this is our footer -->
        <div class = "foot"></div>
      </body>
    </html>
 <?php } ?>