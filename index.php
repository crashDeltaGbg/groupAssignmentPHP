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
    <?php include "./includes/dbh.php"; ?>
<form class="fullForm" action="index.php" method="POST">
    <label for="selCategory">Select Category</label>
    <select name="selCategory" id="category">
        <option value="category1"></option>
        <option value="category2"></option>
        <option value="category3"></option>
        <option value="category4"></option>
    </select>
</form>
<form class="search" action="index.php" method="POST">
    <label for="searchWord">Search For Name or Category</label>
    <input type="text" name="searchWord">
    <input class="btn" type="submit" name="search_button" value="Sök"/>
</form>

<div class="resultsContainer">
<!-- code for the search-function -->
<?php
    if (isset($_POST['search_button'])){
        $search = $_POST['searchWord'];}
    else {
        $search = null;
}
// testing what is in the variable $search, will delete when finished
var_dump($search);

//PDO + query for name and category-search
$query = "SELECT * FROM animals WHERE CONCAT(name, ' ', category) LIKE CONCAT('%', :search, '%')";
$statement = $pdo->prepare($query, array(PDO::FETCH_ASSOC));
$statement->execute(array(
    ':search' => $_POST['searchWord'],
));
$result = $statement->fetchAll();

// testing that query works
foreach ($result as $key => $animals) {
    echo "
        <p>" . $key . $animals['name'] . $animals['category'] . $animals['birthday'] . "</p>";
}
?>
</div>
</main>
<footer><?php include "./includes/footer.php" ?></footer>
</body>
</html>
