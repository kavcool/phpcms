<?php 
include("constants.php");
session_start();



  if(!isset($_SESSION['user_email'])){
	header("location:login.php");
   } else {


   	$title = $author = $date = $status = $image_name = $image_tmp = "";
   	$titleErr = $authorErr = $descriptionErr = $imageErr = "";

     //function to remove whitespace,slashes and html special characte
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
       }

//Fetching data from html form
if(isset($_POST['submit'])){
   $title = test_input($_POST['title']);
   $author = test_input($_POST['author']);
   $date = date('y-m-d');
   $description = test_input($_POST['desc']);

   if(isset($_POST['status'])){
   	$status = 'Active';
   } else {
          $status = 'Inactive';
      }




   $image_name = $_FILES['image']['name'];
   //$image_type = $_FILES['image']['type'];
   //$image_size = $_FILES['image']['size'];
   $image_tmp = $_FILES['image']['tmp_name'];

   //form validations
   if(empty($title)){
   	$titleErr = "Post Title is required";
   }

   if(empty($author)){
   	$authorErr = "Author name is required";
   }

   if(empty($description) ){
   	$descriptionErr = "Post description is required";
   }

   if(empty($image_name)){
   	$imageErr = "Post image is required";
   }
     
     //uploading image file to local directory
    if(!$titleErr && !$authorErr && !$descriptionErr && !$imageErr) {
	move_uploaded_file($image_tmp,"/var/www/html/assignment7/images/$image_name");
    

    //Query to insert data into database
    $query = "INSERT INTO blog_details(blog_title,blog_author,blog_desc,blog_imagename,blog_status,blog_date)
             VALUES('$title','$author','$description','$image_name','$status','$date')";

    $result = mysqli_query($conn,$query);

     }        
  }

    

?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert New Blog Here</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src = "js/jquery.js"></script>
	<script type="text/javascript" src = "js/bootstrap.js"></script>
</head>
  <body>
    <h2 class = "text-danger text-center">Insert New Blog Here</h2>
   
      <div class = "col-md-6 col-centered">
 	     <form class = "form-group" enctype = "multipart/form-data" method = "post" action = "">
 	       <h4>
 	         Title:<span class = "error">*</span>
 	       </h4>	
 	       <input type="text" name="title" class = "form-control" placeholder = "Enter Blog Title Here"><span class = "error"><?php echo $titleErr ; ?></span>

 	       <h4>
 	         Author:<span class = "error">*</span>
 	       </h4>
 	       <input type="text" name="author" class = "form-control" placeholder = "Enter Author Name"><span class = "error"><?php echo $authorErr ; ?></span>


 	       <h4>
 	         Upload Image:<span class = "error">*</span>
 	       </h4>
 	       <input type="file" name="image" ><span class = "error"><?php echo $imageErr ; ?></span>


 	       <h4>
 	         Description:<span class = "error">*</span>
 	       </h4>
 	       <textarea rows = "4" cols = "5" name = "desc" class = "form-control"> </textarea><span class = "error"><?php echo $descriptionErr ; ?></span>

           <h4>
             is Active
           </h4>
 	       <input type="checkbox" name="status">

 	       <input type="submit" name="submit" class = "btn btn-danger center-block" value = "Submit">

         </form>
       </div>
	
     
  </body>
</html>


<?php

if($result){
	             echo "<center><h3>Blog details submitted successfully<h3><center>";
              }  
              else{
                 echo  "<center><h3>Please fill all the details<h3><center> " . mysqli_error($conn);
               }

 } ?>