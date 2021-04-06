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
<form class="fullForm" enctype="multipart/form-data" action="db.php" method="POST">
<label> Dropdownlist Animals:</label>
<select name="animalNamn" id="name">
<option value="">Choose an animal</option>
<option value="Älg">Älg</option>
<option value="Grå Jako">Grå Jako</option>
<option value="Gädda">Gädda</option>
<option value="Mört">Mört</option>
<option value="Tordyvel">Tordyvel</option>
</select><br>
<input type="submit" name="submit" value="select">
</form>
</main>
<footer><?php include "./includes/footer.php" ?></footer>
</body>
</html>