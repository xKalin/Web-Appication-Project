<html>
<head>
  <title>Plan for Smart Service : Ride to Destination</title>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdb";

if(isset($_POST['addtocart'])){
  try {
      $conn = new mysqli($servername, $username, $password,$dbname);
      }
  catch(PDOException $e)
      {}

$sql = "CREATE TABLE renttable (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
car_name VARCHAR(10) NOT NULL,
duration VARCHAR(255) NOT NULL,
license VARCHAR(255) NOT NULL,
date_ VARCHAR(255) NOT NULL,
time_ VARCHAR(255) NOT NULL,
price VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL,
reg_date TIMESTAMP
)";
if (mysqli_query($conn, $sql)) {}

$car = $_POST['car'] ?? "";
$price = substr($car,7);
$car_name = substr($car,0,7);
$duration =  $_POST['duration'] ?? "";
$license = $_POST['license'] ?? "";
$date = $_POST['date'] ?? "";
$time = $_POST['time'] ?? "";
$email = $_POST['email'] ?? "";

$sql = "INSERT INTO renttable (car_name,duration, license, date_, time_,price,email)
VALUES ('$car_name','$duration','$license','$date','$time','$price','$email')";
if ($conn->multi_query($sql) === TRUE) {}

mysqli_close($conn);
      header("Location: testing.php#!/database");
}
?>

    <br>
    <img src="https://smartcdn.prod.postmedia.digital/driving/wp-content/uploads/2020/03/chrome-image-410909.png" alt="2020 wrx" width="500">
    <img src="https://images.honda.ca/models/H/Models/2021/civic_sedan/touring_10666_241modern_steel_metallic_front.png?width=1000" alt="2019 civic" width="500">
    <img src="https://cars.usnews.com/static/images/Auto/izmo/i94428619/2019_toyota_camry_angularfront.jpg" alt="2019 camry" width="500">

    <br>
<form action="rentacar.php" method="post" style="position:absolute;left:1%">
      <input type="radio" id="Wrx" name="car" value="wrx      $30">
      <label for="male">2020 Subaru Wrx ($30)</label>
      <input type="radio" id="Civic" name="car" value="civic   $10">
      <label for="female">2019 Honda Civic ($10)</label>
      <input type="radio" id="Camry" name="car" value="camry   $20">
      <label for="other">2019 Toyota Camry ($20)</label><br><br>

    	<label for="fname">Duration you would like to rent the car for:</label>
    	<input type="text" id="duration" name="duration"><br><br>
    	<label for="fname">License:</label>
    	<input type="text" id="license" name="license"><br><br>

    	<label for="fname">Date:</label>
    	<input type="text" id="Date" name="date"><br><br>
    	<label for="fname">Time:</label>
    	<input type="text" id="Time" name="time"><br><br>
      <label for="fname">Email:</label>
    	<input type="text" id="Time" name="email"><br><br>
      <input type="submit" name="addtocart" value="Add To Cart">
</form>

    </body>
    </html>
