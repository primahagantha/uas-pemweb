<?php
 include 'connect.php';

if (isset($_SESSION["login"]) ? $_SESSION["login"] : false) {
  header("Location: index.php");
  exit;
}

// deklarasi variable error
$errorUser = false;
if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' and password = '$password'");


  // periksa apakah query mendapatkan hasil
  if (mysqli_num_rows($result) === 1) {
    $_SESSION['login'] = true;
    header("Location: index.php");
    exit;
    // jika tidak ada hasil maka set error
  } else {
    $errorUser = true;
  }
}
?>

<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/login.css">
</head>

<body>
  <div class="login-form">
    <?php if ($errorUser) : ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Gagal</strong> Password atau username salah
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>
    <form action="" method="post">
      <h6 class="text-center">CineVault Login</h6></h6>
      <h3 class="text-center mt-4">Log in</h3>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" name="username" value="<?= @$_POST['username'] ?>" required="required">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" value="<?= @$_POST['password'] ?>" required="required">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="login">Log in</button>

      </div>
      <a href="register.php">Are you new?, Register here</a>
    </form>
  </div>
</body>

</html>