<?php

// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$dbh = new PDO('mysql:host=localhost;dbname=zoo; port=8022,charset =UTF8',"zooAdmin", "jesus7");
$animalsQuery ="
SELECT 
animals.id,
animals.name,
animals.category,
animals.birthday
FROM animals
";
$animals=$db->query($animalsQuery);
if(issey($_GET['animal'])){
    $animalQuery = "
    {$animalsQuery}
    WHERE animals.id = :animal_id
    ";
    $animal = $db->prepare($animalQuery);
    $animal->execute(['animal_id' => $_GET['animal']]);
    $selectedAnimal = $animal->fetch(PDO::FETCH_ASSOC);
    //var_dump($selectedUser);
}
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
<form action="db.php" method="get">
<select name="animal">
<option value="">Choose a animal</option>

<?php foreach($animals->fetchAll() as $animal):?>
<option value="<$php echo $animal['id']; ?>"<?php echo isset($selectedAnimal) && $selectedAnimal['id'] == $animal['id'] ? 'selected' : '' ?>>
<?php echo $animal['name']; ?>
   <? endforeach; ?> 
   </select>
   <input type="submit" value="showdetails">
   </form>
   <?php if(isset($selectedAnimal)): ?>
   <pre><?php echo $selectedAnimal['category'];?></pre>
   <?php endif; ?>
</body>
</html>