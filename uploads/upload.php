<?php
  $target_dir = "./";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ". ";
        $uploadOk = 1;
      } else {
        echo "File is not an image. ";
        $uploadOk = 0;
      }
  }

  if (file_exists($target_file)) {
    echo "The file already exists on the server. ";
    $uploadOk = 0;
  }

  if ($_FILES["file"]["size"] > 500000) {
    echo "This file weighs too heavily. ";
    $uploadOk = 0;
  }

  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "svg" && $imageFileType != "gif") {
    echo "You must only upload image type files, i.e. .jpg/.jpeg, .png, .svg or .gif. ";
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    echo "Your file was not uploaded.";
    echo '<br><a href="../file-upload.php"><button class="btn">OK</button></a><br>';
  } else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
      echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " was uploaded.";
      echo '<br><a href="../file-upload.php"><button class="btn">OK</button></a><br>';
    } else {
      echo "There was an error uploading your file.";
      echo '<br><a href="../file-upload.php"><button class="btn">OK</button></a><br>';
    }
  }