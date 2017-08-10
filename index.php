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

<!--main content area starts here -->
      <div class = "container">
         <div class = "row">
         <div class = "col-md-8">
	     <?php
	        include("post_body.php");
	     ?>
	     </div>
	  <div class = "col-md-4">
	    <?php include("sidebar.php"); ?>
	  </div>
  </div>
</div>
<!-- this is our footer -->
    <div class = "foot"></div>

  </body>
</html>