<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="styles.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
      <h1>Admin Login</h1>
      <div class="input-box">
        <input type="text" placeholder="Username" name="username"required>
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
                        if(isset($_POST['login'])){
                            include("config.php");
                           
                            $username=mysqli_real_escape_string($conn,$_POST['username']);
                            $password=mysqli_real_escape_string($conn,md5($_POST['password']));
                            $sql="SELECT user_id, username, role FROM user WHERE username='$username' AND password='$password'";
                            $result=mysqli_query($conn,$sql) or die("Query failed");
                            if(mysqli_num_rows($result)>0){
                            while($row=mysqli_fetch_assoc($result)){
                               session_start();
                               $_SESSION["username"]=$row['username'];
                               $_SESSION["user_id"]=$row['user_id'];
                               $_SESSION["user_role"]=$row['role'];
                               header("Location:{$hostname}/admin/users.php");
                            }

                        }
                        else{
                            echo "<div class='alert alert-danger'>Username and Password doest not matched</div>";
                        }
                    }
                    
                        ?>
  </div>
</body>
</html>

