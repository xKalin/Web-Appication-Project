<?php
  session_start();

  session_unset();



  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "userdb";

  try {
      $conn = new mysqli($servername, $username, $password, $dbname);}
  catch(PDOException $e){}
$sql = "DROP TABLE current";
if ($conn->multi_query($sql) === TRUE) {}

  header("Location: testing.php");

 ?>
