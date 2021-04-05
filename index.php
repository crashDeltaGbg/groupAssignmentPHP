<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Group Assignment PHP</title>
</head>
<body>
  <header>
  </header>

  <main>
  <form action="" method="get">
  <label for="user">What's your name?</label>
    <input type="text" name="user" id="user" placeholder="Your name">
    <input type="submit" value="Submit">
  </form>
  <?php
    $name = $_GET['user'];

    echo "<p>Hello, " . $name . ", and welcome to our little PHP project!</p>";
  ?>
  </main>

  <footer></footer>
</body>
</html>