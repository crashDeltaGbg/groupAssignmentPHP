<?php
// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "./includes/dbc.php";

// code for the drop-down
//$animals = $dbh->query($query);
$categoryQuery = "SELECT category FROM animals GROUP BY category";

$categories = $dbh->query($categoryQuery);
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
   
<form class="search" action="index.php" method="POST" id="search">
    <label for="searchWord">Search For Name or Category:</label>
    <input type="text" name="searchWord"><br>
    <label for="category">Drop-down list Animals:</label>
    <select name="category">
        <option value="">All</option>
        <?php
          foreach ($categories as $category) {
              echo "<option value='" . $category['category'] . "'>" . $category['category'] . "</option>";
          }
          ?>       
    </select><br>
    <input class="btn" type="submit" name="search_button" value="Sök">
</form>

<div class="resultsContainer">
<!-- code for the search-function -->
<?php
if (!isset($_POST['searchWord'])) {
    $search = null;
echo "You haven't searched anything yet";
} elseif (isset($_POST['searchWord'])) {
    $search = $_POST['searchWord'];
}
$searchCategory = "";
if (isset($_POST['category'])) {
    $searchCategory = $_POST['category'];
}

//PDO + query for name and category-search
$query = "SELECT * FROM animals WHERE CONCAT(name, ' ', category) LIKE CONCAT('%', :search, '%')";
if ($searchCategory !== "") {
    $query .= " AND category='$searchCategory'";
}

$statement = $dbh->prepare($query, array(PDO::FETCH_ASSOC));
$statement->execute(array(':search' => $search));
$result = $statement->fetchAll();
var_dump($result);
// rendering query into table
if ($result) {
    echo "<table class='styledTable'><thead><tr><th scope='col'>#</th><th scope='col'>Name</th><th scope='col'>Category</th><th scope='col'>Birthday</th></tr></thead><tbody>";
    foreach ($result as $key => $animals) {
        echo "<tr>
            <td data-label='#'>" . $key . "</td>
            <td data-label='Name'>" . $animals['name'] . "</td>
            <td data-label='Category'>" . $animals['category'] . "</td>
            <td data-label='Birthday'>" . $animals['birthday'] . "</td>

        </tr>";
    }
    echo "</tbody></table>";
}

if ($result) {
    echo '<div id="animalImgs">';
    foreach ($result as $animal) {
        echo '<img class="animal-photo" src="./img/' . $animal['name'] . '.jpg">';
    }
    echo "</div>";
}

?>
</div>
</main>
<footer><?php include "./includes/footer.php" ?></footer>
</body>

</html>