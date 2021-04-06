<?php

// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Project</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
<header><?php include "./includes/header.php" ?></header>

<main>
    <?php /*include "./includes/dbh.php";*/ ?>
<form class="fullForm" enctype="multipart/form-data" action="index.php" method="POST">
    <label for="selCategory">Select Category</label>
    <select name="selCategory" id="category">
        <option value="category1">Cat1</option>
        <option value="category2">Cat2</option>
        <option value="category3">Cat3</option>
        <option value="category4">Cat4</option>
    </select>

    <label for="searchWord">Search Database</label>
    <input type="text" name="searchWord">
    <input class="btn" type="submit" name="search_button" value="Sök">
</form>

<?php

echo "Hello, World!";
?>
</main>
<footer><?php include "./includes/footer.php" ?></footer>
</body>
</html>
