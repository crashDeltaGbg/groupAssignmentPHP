<?php
// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// code for the drop-down

$dbh = new PDO('mysql:host=localhost;dbname=zoo;charset=UTF8;port=3307', "user1", "1234");

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
    <input type="submit" name="submit" vlaue="Choose options">
    <input class="btn" type="submit" name="search_button" value="Sök">
</form>
<!-- code for the dropdown -->

<?php
      if(isset($_POST['submit'])){
       if(!empty($_POST['category'])) {
          $selected = $_POST['category'];
          echo 'You have chosen: ' . $selected;
        } else {
          echo 'Please select the value.';
        }
      }
      ?>

<div class="resultsContainer">
<!-- code for the search-function -->
<?php
    if (isset($_POST['search_button'])){
        $search = $_POST['searchWord'];}
    else {
        $search = null;
}
// testing what is in the variable $search, will delete when finished
// var_dump($search);

// $dbh = new PDO('mysql:host=localhost;dbname=zoo;port=3307', "user1", "1234");

//PDO + query for name and category-search
$query = "SELECT * FROM animals WHERE CONCAT(name, ' ', category) LIKE CONCAT('%', :search, '%')";
// echo "<table class='styledTable'><thead><tr><th>#</th><th>Name</th><th>Category</th><th>Birthday</th></tr></thead><tbody>";
$statement = $dbh->prepare($query, array(PDO::FETCH_ASSOC));
$statement->execute(array(
    ':search' => $_POST['searchWord'],
));
$result = $statement->fetchAll();

// testing that query works
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
} elseif ($search == null) {
    echo "Searchfield is empty!";
} else {
    echo "Animal not found, try again";
}
?>
</div>
</main>
<footer><?php include "./includes/footer.php" ?></footer>
</body>
</html>
