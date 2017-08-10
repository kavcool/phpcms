<?php 
include("constants.php");

$query = "select * from blog_details where blog_status = 'Active' ";
$results_per_page = 3;

$result = mysqli_query($conn,$query);

$number_of_results = mysqli_num_rows($result);


$number_of_pages = ceil($number_of_results/$results_per_page);

if(!isset($_GET['page'])){
	$page = 1;
} else {
	$page = $_GET['page'];
}

$this_page_first_result = ($page-1)*3;

$sql = "SELECT * FROM blog_details WHERE blog_status = 'Active' LIMIT " . $this_page_first_result . ',' . $results_per_page;

$result = mysqli_query($conn,$sql);

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

<h2><a href = "single.php?id=<?php echo $id; ?>"><?php echo $title; ?></a></h2>
<p>Published on: &nbsp;&nbsp;<?php echo $date; ?>
<p align="right"> Posted By: &nbsp;&nbsp;<b align="right"><?php echo $author; ?></b></p>
<center><img width="600" height="250" src="/assignment7/images/<?php echo $image; ?>"></center>
<p align="justify">
	<?php echo $desc; ?>
</p>
<p align="right"><a href="single.php?id=<?php echo $id; ?> ">Read More</a></p>

</body>
</html>
<?php } ?>
<center>
<?php 
for($page=1; $page<=$number_of_pages; $page++){
	echo '<a href = "index.php?page=' . $page . '">' . $page . '</a> ';
} ?></center>