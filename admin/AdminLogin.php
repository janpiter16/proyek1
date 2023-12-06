<?php

require("koneksi.php");
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="login-form">
  <h2>Login Admin</h2> 
  <form method="POST">
    <div class="input-field">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="Admin Name" name="AdminName"> 
    </div>
  
    <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="text" placeholder="Password" name="AdminPassword">
    </div>

    <button type="submit" name="Signin">Sign In</button>

    <div class="extra">
        <a href="#">Forgot Password ?</a>
    </div>
  </form>
</div>


</body>
</html>