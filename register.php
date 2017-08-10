<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>This is a main php project</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src = "js/jquery.js"></script>
    <script type="text/javascript" src = "js/bootstrap.min.js"></script>
</head>
  <body>

  <?php
      //Declare all variables
      $email = $pass = $name = $mobile = "";
      $emailErr = $passErr = $nameErr = $mobileErr = $result = "";

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
       }
      
      //fetch details from html form
       if(isset($_POST['submit'])){
        $pass  = test_input($_POST['password']);
        $name = test_input($_POST['name']);
        $mobile = test_input($_POST['mobile']);

          //validations for various input fields
        if (empty($_POST["email"])) {
           $emailErr = "Email is required";
        } else {
            $email = $_POST["email"];
          // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr = "Invalid email format";
           }
        }

         if(empty($pass)||!(preg_match('/^[A-Z][a-z 0-9 @$%#~?><>]/', $pass))) {
           $passErr = "Incorrect Password";
          }

         if(empty($name)||!(preg_match('/^[a-zA-Z]/i', $name))) {
           $nameErr = "Incorrect name format";
          }

         if(empty($mobile)||!(preg_match('/^\d{10}$/', $mobile))) {
          $mobileErr = "Incorrect Mobile No";
          }

         if(!$nameErr && !$emailErr && !$passErr && !$mobileErr) {

          //Database connection
           include("constants.php");
           $result = mysqli_query($conn,"INSERT INTO user_details(user_email,user_pass,user_name,user_mobile)
                   VALUES('$email','$pass','$name',$mobile)");
         } 
   }

?>

   <div class = "container">
     <div class = "col-md-4 col-centered">
       <h3 class = "text-center text-danger">Sign Up Here</h3>
       <h3 class = "text-center">or</h3>
       <h3 class = "text-center"><a href = "index.php">Visit Blog Page</a></h3><br><br>
       <form class = "form-group" method = "post" action ="" onsubmit = >

         <h4>
           Email <span class = "error">*</span>
         </h4>
         <input type="text" name="email" id = "email" class = "form-control" placeholder = "Enter Email"><span class = "error"><?php echo $emailErr ; ?></span>

         <h4>
           Password <span class = "error">*</span>
         </h4>
         <input type="password" name="password" id = "password" class = "form-control" placeholder = "Enter Password"><span class = "error"><?php echo $passErr ; ?></span>

         <h4>
           Name <span class = "error">*</span>
         </h4>
         <input type="text" name="name" class = "form-control" id = "name" placeholder = "Enter Name"> <span class = "error"><?php echo $nameErr; ?></span>

         <h4>
           Mobile <span class = "error">*</span>
         </h4>
         <input type="text" name="mobile" id = "mobile" class = "form-control" placeholder = "Enter Mobile Number">
         <span class = "error"><?php echo $mobileErr; ?></span><br>

         <button name = "submit" id = "submitBtn" class = "btn btn-primary center-block">Submit</button>
       </form>
    </div>
</div>
  <script type="text/javascript" src = "js/register.js"></script>

</body>
</html>

<?php 

 if($result) {
            echo "<center><h3>Your Details Submitted Successfully Now Login <a href='login.php'>here</a></h3><center>";
             } else {
                       echo "<center><h3>Check your details properly</h3><center>" ;
                     }
?>

