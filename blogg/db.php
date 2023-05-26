<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'piniors'
) or die('Error al conectar la base de datos');

?>