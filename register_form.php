<?php

@include 'config.php';

if (isset($_POST['submit'])) {

   $name = $_POST['name'];
   $email = $_POST['email'];
   $mobno = $_POST['mobnum'];
   $pass = $_POST['password'];
   $cpass =$_POST['cpassword'];

   $select = " SELECT * FROM user_form WHERE email = '$email' ";
   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {
      $error[] = 'user already exist!';
   } 
   else {
      if ($pass != $cpass) {
         $error[] = 'password not matched!';
      } 
      else {
         $insert = "INSERT INTO user_form(name, email, mobile_no, password) VALUES('$name','$email','$mobno','$pass')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="css/nav.css">
</head>
<nav class="navbar navbar-light bg-dark">
        <div class="container-fluid">
          <h2 class="navbar-brand" href="#" id="rlf">Registration Login Form</h2>
          <form class="d-flex">
            <a href="login_form.php" id="login">Login</a>
            <a href="register_form.php" id="register">Register</a>
            <a href="register_form.php" id="about">About us</a>
          </form>
        </div>
   </nav>
<body>
   <div class="form-container">
      <form action="" method="post">
         <h3>register now</h3>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            }
         }
         ?>
         <input type="text" name="name" required placeholder="enter your name">
         <input type="email" name="email" required placeholder="enter your email">
         <input type="text" name="mobnum" required placeholder="enter your mobile no">
         <input type="password" name="password" required placeholder="enter your password">
         <input type="password" name="cpassword" required placeholder="confirm your password">
         <input type="submit" name="submit" value="register now" class="form-btn">
         <p>already have an account? <a href="login_form.php">login now</a></p>
      </form>
   </div>
</body>

</html>