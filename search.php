<!DOCTYPE html>
<html>
<head>
	<title>Blog about latest tech updates.</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src = "js/jquery.js"></script>
    <script type="text/javascript" src = "js/bootstrap.min.js"></script>
</head>
  <body>
<!-- this is our navbar-->
  <div><?php include("navbar.php"); ?></div>

  <?php 
  include("constants.php");

  $search = $_POST['search'];

  $query = "SELECT * FROM blog_details WHERE blog_title like '%$search%'";

  $result = mysqli_query($conn,$query);

  if($row = mysqli_fetch_array($result)){
	$title = $row['blog_title'];
	$image = $row['blog_imagename'];
	$desc = $row['blog_desc'];
	$id = $row['blog_id'];
  ?>
 <h2><a href = "single.php?id=<?php echo $id; ?>"><?php echo $title; ?></a></h2>

 <center><img width="600" height="250" src="/assignment7/images/<?php echo $image; ?>"></center>

 <p align="justify">
	<?php echo $desc; ?>
 </p>
<?php } else {
	echo "not found";
 }
?>
  </body>
</html>