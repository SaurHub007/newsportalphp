<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="./admin/styles.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
      <h1>User Login</h1>
      <div class="input-box">
        <input type="email" placeholder="Email" name="email"required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Password" name="password" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <div class="remember-forgot">
        <label><input type="checkbox">Remember Me</label>
        <a href="#">Forgot Password</a>
      </div>
      <button type="submit" class="btn" name="login">Login</button>
    </form>

    <?php
     if (isset($_POST['login'])) {
       session_start();
       include("config.php");

       $email = mysqli_real_escape_string($conn, $_POST['email']);
       $password = mysqli_real_escape_string($conn, $_POST['password']);

       $sql = "SELECT id, fname, lname, email FROM users WHERE email='$email' AND password='$password'";
       $result = mysqli_query($conn, $sql) or die("Query failed");

       if (mysqli_num_rows($result) > 0) {
         $row = mysqli_fetch_assoc($result);
         $_SESSION["fname"] = $row['fname'];
         $_SESSION["lname"] = $row['lname'];
         $_SESSION["email"] = $row['email'];
         $_SESSION["id"] = $row['id'];

         header("Location: index.php"); // Make sure $hostname is correctly set
        exit;
       } else {
       echo "<div class='alert alert-danger'>Email and Password do not match</div>";
       }
     }
    ?>
  </div>
</body>
</html>
