<?php

// 1. Database Connection
$host = "localhost";
$user = "root";
$pass = "";
$db   = "profile_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Handle the File Upload
if (isset($_POST['submit'])) {
    $target_dir = "/Applications/XAMPP/xamppfiles/htdocs/php_samples/uploads/";
    
    // Create directory if it doesn't exist
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $file_name = time() . "_" . basename($_FILES["profile_pic"]["name"]);
    $target_file = $target_dir . $file_name;

    if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
        // Save only the path to the database
        $sql = "INSERT INTO profile_pics (image_path) VALUES ('$file_name')";
        $conn->query($sql);
        echo "Image uploaded successfully!";
    } else {
        echo "Error uploading file.";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/luminous-lightbox/2.3.2/luminous-basic.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/luminous-lightbox/2.3.2/Luminous.min.js"></script>
    </head>
<body>

    <h2>Upload Profile Picture</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="profile_pic" required>
        <button type="submit" name="submit">Upload</button>
    </form>

    <hr>

    <h2>Gallery</h2>
    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
        <?php
        // 3. Display Images
        $result = $conn->query("SELECT image_path FROM profile_pics ORDER BY id DESC");
        while ($row = $result->fetch_assoc()) {
            $img_path = 'uploads/' . $row['image_path'];
            echo '<a href="' . $img_path . '" class="zoom">';
            echo '<img src="uploads/' . $row['image_path'] . '" width="150" style="border-radius: 50%; object-fit: cover; height: 150px;">';
            echo '</a>';
        }
        ?>
    </div>

    <script>
        // This activates the popup when the image is clicked
        new Luminous(document.querySelector('.zoom'));
    </script>

</body>
</html>