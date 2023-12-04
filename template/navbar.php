<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>

<link rel="stylesheet" href="../css/navbar.css">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="../index.php">CineVault</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto mx-auto">
        <li class="nav-item">
          <a class="nav-link" href="filmadd.php">Add Film</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="filmdelete.php">Delete Film</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="filmupdate.php">Update Film</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="filmdisplay.php">Display Film</a>
        </li>
        <li class="nav-item">
        <a class="nav-link btn btn-danger" href="logout.php">Logout</a>
      </ul>
    </div>
  </div>
</nav>
