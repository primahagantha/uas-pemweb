<?php
include 'connect.php';
cek_login();

// Fetch data films from database
$query = "SELECT * FROM films";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Film Display</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script></head>
<body>
  <?php include '../template/navbar.php'; ?>

  <div class="container mt-4">
    <h1>Film Display</h1>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Poster</th>
          <th>Title</th>
          <th>Genre</th>
          <th>Director</th>
          <th>Synopsis</th>
          <th>Rating</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><img src="<?php echo $row['poster']; ?>" alt="Poster" style="width: 100px;"></td>
            <td><?php echo $row['judul']; ?></td>
            <td><?php echo $row['genre']; ?></td>
            <td><?php echo $row['sutradara']; ?></td>
            <td><?php echo $row['sinopsis']; ?></td>
            <td><?php echo $row['rating'] ; ?> / 10</td>
            <td>
              <a href="filmupdate.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Update</a>
              <a href="filmdelete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <?php include '../template/footer.php'; ?>
</body>
</html>
