<?php 
    include('dbconnection.php'); // Ensure this file connects to the database successfully

    if (isset($_POST['submit'])) {
        $file_name = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $folder = 'Images/'.$file_name;

        // Correct SQL query
        $query = mysqli_query($con, "INSERT INTO images (file) VALUES ('$file_name')");

        // Move the uploaded file to the target folder
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h2>File Uploaded Successfully</h2>";
        } else {
            echo "<h2>File Not Uploaded</h2>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image" />
        <br /><br/>
        <button type="submit" name="submit">Submit</button>
    </form>
    <div>
        <?php
            // Display images
            $res = mysqli_query($con, "SELECT * FROM images");
            while ($row = mysqli_fetch_assoc($res)) {
                echo '<img src="Images/' . $row['file'] . '" style="width:200px; height:auto; margin:10px;">';
            }
        ?>
    </div>
</body>
</html>
