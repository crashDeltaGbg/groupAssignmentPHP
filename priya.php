<?php
// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dbh = new PDO('mysql:host=localhost;dbname=zoo;charset=UTF8;port=3307', "user1", "1234");
// Execute query
//$animals = $dbh->query($query);

$categoryQuery = "SELECT * FROM animals WHERE CONCAT(name, ' ', category) LIKE CONCAT('%', :category, '%')";
$statement = $dbh->prepare($categoryQuery, array(PDO::FETCH_ASSOC));
$categories = $dbh->categoryQuery($categoryQuery);
 //$statement->execute(array(':category' => $category));
//$categories = $statement->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dropdown</title>
  <link rel="stylesheet" href="./css/index.css">
</head>
<body>
<header><?php include "./includes/header.php" ?></header>
<main> <h1>Dropdown</h1>
<form class="fullForm" enctype="multipart/form-data" action="priya.php" method="POST">
<label> Dropdownlist Animals:</label>

 <select name="category">
        <option value="">All</option>
        <?php
        foreach ($categories as $category) {
          echo "<option value='" . $category['category'] . "'>" . $category['category'] . "</option>";
        }
        ?>
      

</select><br>
<input type="submit" name="submit" vlaue="Choose options">

</form>
<!--code for the dropdown-->
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
</main>
<footer><?php include "./includes/footer.php" ?></footer>
</body>
</html>