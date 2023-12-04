<?php
include "connect.php";
cek_login();

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];


    // Periksa jika password dan konfirmasi password sama
    if ($password !== $confirmPassword) {
        echo "<script>alert('Password dan Confirm Password tidak sesuai');</script>";
    } else {

        $query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
        $result = mysqli_query($conn, $query);
        if($result){
            header("location:login.php");
          } else {
            die(mysqli_error($con));
          }
        }
    }

?>



    <html lang="id">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register - CineVault</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/login.css">
    </head>

    <body>
  <div class="login-form">
    <form action="" method="post">
      <h6 class="text-center">CineVault Register</h6>
      <h3 class="text-center mt-4">Register</h3>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" name="username" required="required">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" required="required">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" required="required">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
      </div>
      <a href="login.php">Already have an account? Login here</a>
    </form>
  </div>
</body>
</html>