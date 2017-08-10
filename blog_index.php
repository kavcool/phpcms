<?php
session_start();

  if(!isset($_SESSION['user_email'])){
	header("location:login.php");
   } else {
?>

<!DOCTYPE html>
<html>
<head>
	<title>This is our admin panel</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src = "js/jquery.js"></script>
    <script type="text/javascript" src = "js/bootstrap.min.js"></script>
</head>
<body>
  <div class = "container">
     <h2 class = "text-center text-primary">This is our Admin Panel</h2>
  </div>
  <div class = "container-fluid">
    
      <div class = "col-md-3 bg-info">
        <h3><center>Welcome  <br> <?php echo $_SESSION['user_email']; ?></center></h3>
        <h3><center>Manage Content</center></h3>
        <h3><a href="blog_index.php?view=view"><center>View Posts</center></a></h3>
        <h3><a href="blog_index.php?insert=insert"><center>Insert Posts</center></a></h3>
        <h3><a href="index.php"><center>Blog Page</center></a></h3>
        <h3><center><a href="logout.php">Logout</a></center></h3>
	  </div>
   

      <div class = "col-md-9">

<?php
  // if insert is clicked run this code
  if(isset($_GET['insert'])){
	include("blog_insert.php");
  }
?>
<!-- if view is clicked run this code -->
<?php if(isset($_GET['view'])){ ?>
<h3 class = "text-center text-primary">All blogs</h3>
  <table class = "table">
	<tr>
	    <th>S.No.</th>
		<th>Title</th>
		<th>Author</th>
		<th>Date</th>
		<th>Description</th>
		<th>Image</th>
		<th>Active/Inactive</th>
		<th>Delete</th>
	</tr>

	<?php 
   include("constants.php");
   $i = 1;
  
  if(isset($_GET['view'])){
  	$query = "select * from blog_details";

    $results_per_page = 4;

    $result = mysqli_query($conn,$query);

    $number_of_results = mysqli_num_rows($result);

    $number_of_pages = ceil($number_of_results/$results_per_page);

    if(!isset($_GET['page'])){
	  $page = 1;
     } else {
	   $page = $_GET['page'];
        }

    $this_page_first_result = ($page-1)*4;

    $sql = "SELECT * FROM blog_details LIMIT " . $this_page_first_result . ',' . $results_per_page;

    $result = mysqli_query($conn,$sql);

  	$id = $title = $image = $date = $status = $author = $desc = "";

  	while($row = mysqli_fetch_assoc($result)){
  		$id = $row['blog_id'];
  		$title = $row['blog_title'];
  		$image = $row['blog_imagename'];
  		$date = $row['blog_date'];
  		$status = $row['blog_status'];
  		$author = $row['blog_author'];
  		$desc = substr($row['blog_desc'],0,50);
  	
	?>
    <tr>
	    <td><?php echo $i++; ?></td>
		<td><a href="single.php?id=<?php echo $id; ?>"><?php echo $title; ?></a></td>
		<td><?php echo $author; ?></td>
		<td><?php echo $date; ?> </td>
		<td><?= $desc; ?></td>
		<td><img src="/assignment7/images/<?php echo $image;?>" width = "50" height = "50"></td>
		<td><?php echo $status; ?></td>
		<td><a href="delete.php?del=<?php echo $id; ?>"><button>Delete</button></a></td>
	</tr>
<?php  } } } } ?>



</table>
</div>
</div>
<center>
  <?php 
   for($page=1; $page<=$number_of_pages; $page++){
	echo '<a href = "blog_index.php?view=view&page=' . $page . '">' . $page . '</a>';
   } ?>
   </center>
</body>
</html>
