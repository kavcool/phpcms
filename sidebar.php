<?php 
include("constants.php");

  $query = "select * from blog_details order by rand() limit 0,4";
  $result = mysqli_query($conn,$query);
echo "<h3><center>Recent Posts<center></h3>";
  while($row = mysqli_fetch_array($result)){
	$id = $row['blog_id'];
	$title = $row['blog_title'];
	$author = $row['blog_author'];
	$date = $row['blog_date'];
	$image = $row['blog_imagename'];
	$desc = substr($row['blog_desc'],0,100);
	$status = $row['blog_status'];

?>

<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
	  <title>This page shows all blogposts.</title>
	  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="style.css">
      <script type="text/javascript" src = "js/jquery.js"></script>
      <script type="text/javascript" src = "js/bootstrap.min.js"></script>
    </head>
      <body>

         <div class = "panel panel-default">
           <div class = "panel-heading"><h4><a href = "single.php?id=<?php echo $id; ?>"><?php echo $title; ?></a></h4></div>
           <div class = "panel-content"><center><img src="/assignment7/images/<?php echo $image; ?>" class = "img-responsive"></center></div>

           <p align="justify">
	         <?php echo $desc; ?>
           </p>
           <p align="right"><a href="single.php?id=<?php echo $id; ?> ">Read More</a></p>
         </div>

      </body>
    </html>

<?php } ?>