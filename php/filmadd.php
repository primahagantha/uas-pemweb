<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connect.php';
      cek_login();
    $title = $_POST['title'] ?? '';
    $genre = $_POST['genre'] ?? '';
    $director = $_POST['director'] ?? '';
    $synopsis = $_POST['synopsis'] ?? '';
    $rating = $_POST['rating'] ?? '';

    $poster = $_FILES['poster'] ?? '';
    $poster_name = $poster['name'] ?? '';
    $poster_tmp = $poster['tmp_name'] ?? '';
    $poster_size = $poster['size'] ?? '';
    $poster_ext = strtolower(pathinfo($poster_name, PATHINFO_EXTENSION));

    if (($poster_ext == 'jpg' || $poster_ext == 'png' || $poster_ext == "jpeg") && $poster_size < 10000000) {
        $poster_path = "../assets/img/poster/" . uniqid('', true) . ".$poster_ext";
        move_uploaded_file($poster_tmp, $poster_path);

        $query = "INSERT INTO `films` (judul, genre, sutradara, sinopsis, rating, poster) VALUES ('$title', '$genre', '$director', '$synopsis', '$rating', '$poster_path')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header("Location: filmdisplay.php"); 
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "File harus berformat jpg atau png dan ukuran file maksimal 10MB";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Film</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script></head>
<body>
  <?php include '../template/navbar.php'; ?>
  
  <div class="container mt-4">
    <h1>Add Film</h1>
    <!-- Form untuk menambah film -->
    <form method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
      </div>
      <div class="form-group">
        <label for="genre">Genre</label>
        <input type="text" class="form-control" id="genre" name="genre" required>
      </div>
      <div class="form-group">
        <label for="director">Director</label>
        <input type="text" class="form-control" id="director" name="director" required>
      </div>
      <div class="form-group">
        <label for="synopsis">Synopsis</label>
        <textarea class="form-control" id="synopsis" name="synopsis" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="rating">Rating</label>
        <input type="number" class="form-control" id="rating" name="rating" min="0" max="10" step="0.1" required>
      </div>
      <div class="form-group">
        <label for="poster">Poster</label>
        <input type="file" class="form-control-file" id="poster" name="poster" accept="image/jpeg, image/png" required>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>

  <?php include '../template/footer.php'; ?>
  
</body>
</html>
