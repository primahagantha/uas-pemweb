<?php
include 'connect.php';
cek_login();


if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data film berdasarkan ID
    $query = "SELECT * FROM films WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Form untuk memperbarui data film
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST['title'];
            $genre = $_POST['genre'];
            $director = $_POST['director'];
            $synopsis = $_POST['synopsis'];
            $rating = $_POST['rating'];

            // Query untuk memperbarui data film
            $update_query = "UPDATE films SET judul='$title', genre='$genre', sutradara='$director', sinopsis='$synopsis', rating='$rating' WHERE id = $id";
            $update_result = mysqli_query($conn, $update_query);

            if ($update_result) {
                header("Location: filmdisplay.php");
                exit();
            } else {
                echo "Error updating film: " . mysqli_error($conn);
            }
        }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Film</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    </head>
    <body>
        <?php include '../template/navbar.php'; ?>
        
        <div class="container mt-4">
            <h1>Update Film</h1>
            <form method="post">
                <!-- Form untuk memperbarui data film -->
                <!-- Isi dengan nilai awal dari data film -->
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['judul']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="genre">Genre</label>
                    <input type="text" class="form-control" id="genre" name="genre" value="<?php echo $row['genre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="director">Director</label>
                    <input type="text" class="form-control" id="director" name="director" value="<?php echo $row['sutradara']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="synopsis">Synopsis</label>
                    <textarea class="form-control" id="synopsis" name="synopsis" rows="3"><?php echo $row['sinopsis']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <input type="number" class="form-control" id="rating" name="rating" min="0" max="10" step="0.1" value="<?php echo $row['rating']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>

        <?php include '../template/footer.php'; ?>
        
    </body>
    </html>
    <?php
    } else {
        echo "Film not found";
    }
} else {
    echo "Invalid request";
}
?>
