<?php
// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File Upload - Rickard</title>
  <link rel="stylesheet" type="text/css" href="/css/index.css">
</head>
<body>
<header><?php include "./includes/header.php" ?></header>

<main>
  <h1 class="upload">File Upload</h1>
  <form class="upload" action="uploads/upload.php" method="post" enctype="multipart/form-data">
    <label for="file">Upload an image file:</label>
    <input type="file" name="file" id="file">
    <input type="submit" value="Upload">
  </form>
</main>

<footer><?php include "./includes/footer.php" ?></footer>
</body>
</html>