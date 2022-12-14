<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home page</title>
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
            <a href="logout.php" id="logout">Logout</a>
          </form>
        </div>
   </nav>
   <div class="container">
   <div class="content">
      <h3>Hi</h3>
      <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>This is the home page</p>
   </div>
</div>
</body>
</html>