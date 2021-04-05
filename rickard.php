<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/index.css">
</head>
<body>
<header><?php include "./includes/header.php" ?></header>

<main>
  <h1>File Upload</h1>
  <form action="./uploads/upload.php" method="post" enctype="multipart/form-data">
    <label for="file">Upload a file:</label>
    <input type="file" name="fiel" id="file">
    <input type="submit" value="Upload">
  </form>
</main>

<footer><?php include "./includes/footer.php" ?></footer>
</body>
</html>