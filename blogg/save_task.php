<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $categoria = $_POST['categoria'];
  $image = $_FILES['image'];
  date_default_timezone_set("America/Santo_Domingo");
  $fecha=date("y-m-d- h:i:s");
  $autor = $_POST['autor'];

  
    $name =  $image["name"];
    $allows = array("jpg", "png", "webp", "jpeg");
    $ext = strtolower(end(explode(".",$name)));
    $rand_name = explode(".", $image["tmp_name"])[0];
    $target_file = "uploads/" . basename($rand_name . "." . $ext);

    if (in_array($ext, $allows)) {
        move_uploaded_file($image["tmp_name"], $target_file);
    }
    else{
        die("error en la imagen");
    }

  

  $query = "INSERT INTO `blog` ( `title`, `description`, `categoria`, `imagen`, `fecha`, `autor`) VALUES 
  ('$title', '$description','$categoria', '$target_file','$fecha','$autor')";

  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
