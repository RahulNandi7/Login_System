<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
   $email = $_POST['email'];
   $pass = $_POST['password'];
   
   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);
      
      $_SESSION['user_name'] = $row['name'];
      header('location:home_page.php');
   }
   else{
      $error[] = 'incorrect email or password!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="css/nav.css">
</head>
<body>
<nav class="navbar navbar-light bg-dark">
        <div class="container-fluid">
          <h2 class="navbar-brand" href="#" id="rlf">Registration Login Form</h2>
          <form class="d-flex">
            <a href="login_form.php" id="login">Login</a>
            <a href="register_form.php" id="register">Register</a>
            <a href="login_form.php" id="contact">Contact us</a>
          </form>
        </div>
   </nav>   
<div class="form-container">
   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         }
      }
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>
</div>
</body>
</html>