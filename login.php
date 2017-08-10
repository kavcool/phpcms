<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script type="text/javascript" src = "js/jquery.js"></script>
  <script type="text/javascript" src = "js/bootstrap.min.js"></script>
</head>
  <body>
    <div class = "container">
      <div class = "col-md-4 col-centered">
        <h3 class = "text-center text-danger">Login Here</h3><br><br><br>
        <form class = "form-group" method = "post" action ="">
          <h4>
            Name
          </h4>
          <input type="email" name="email" class = "form-control" placeholder = "Enter Email">

          <h4>
            Password
          </h4>
          <input type="password" name="password" class = "form-control" placeholder = "Enter Password"><br>

          <button name = "submit" class = "btn btn-primary center-block">Submit</button>
        </form>
      </div>
    </div>

  <script type="text/javascript" src = "register.js"></script>

  </body>
</html>
<?php
include("constants.php");

function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }

if(isset($_POST['submit'])){
   $email = test_input($_POST['email']);
   $password = test_input($_POST['password']);

   $login_query = "SELECT * FROM user_details WHERE user_email = '$email' AND user_pass = '$password'";

   $result = mysqli_query($conn,$login_query);

   if(mysqli_num_rows($result)>0){
    $_SESSION['user_email'] = $email;
    
    echo "<script>window.open('blog_index.php','_self')</script>";
   } else {
            echo "<script>alert('Either email or password is incorrect')</script>";
      }
  
}
?>