<?php
include("constants.php");

$delete_id = $_GET['del'];

$delete_query = "delete from blog_details where blog_id ='$delete_id'";

if(mysqli_query($conn,$delete_query)){

     echo "<script>alert('A post has been deleted')</script>";
	echo "<script>window.open('blog_index.php?view=view','_self')</script>";

}







?>