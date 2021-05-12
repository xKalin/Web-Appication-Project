<!DOCTYPE html>
<html>
<head>
	<title>Plan for Smart Service : Cart</title>
	 <link rel="stylesheet" type="text/css" href="style.css">
   <link rel="stylesheet" type="text/css" href="service.css">
	 <link rel="stylesheet" href="flower.css">
</head>

<div style="position:absolute; top:13.5%; right:97%">
<p>Option 1 <br> Option 2</p>
</div>

<div style="position:absolute; top:12%; right:74%">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdb";
try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    }
catch(PDOException $e)
    {

    }

		$sql = "CREATE TABLE Ordertable (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    car_name VARCHAR(10) NOT NULL,
    startloc VARCHAR(255) NOT NULL,
    endloc VARCHAR(255) NOT NULL,
    date_ VARCHAR(255),
    time_ VARCHAR(255),
    price VARCHAR(255),
		email VARCHAR(255) IS NULL
    )";
    if (mysqli_query($conn, $sql)) {}

		$sql = "SELECT * FROM comparetablea";
		if($result = mysqli_query($conn, $sql)){
		    if(mysqli_num_rows($result) > 0){
		        echo "<table>";
		            echo "<tr>";
		                echo "<th>Car</th>";
		                echo "<th>Starting Location</th>";
		                echo "<th>Destinnation</th>";
		                echo "<th>Date</th>";
										echo "<th>Time</th>";
		            echo "</tr>";
		        while($row = mysqli_fetch_array($result)){
		            echo "<tr>";
		                echo "<td>" . $row['car_name'] . "</td>"."</td>";
		                echo "<td>" . $row['startloc'] . "</td>"."</td>"."</td>";
		                echo "<td>" . $row['endloc'] . "</td>"."</td>"."</td>";
		                echo "<td>" . $row['date_'] . "</td>"."</td>"."</td>";
										echo "<td>" . $row['time_'] . "</td>"."</td>"."</td>";
                    echo "<td>" . $row['price'] . "</td>"."</td>"."</td>";
		            echo "</tr>";
		        }
		        echo "</table>";
		        mysqli_free_result($result);
          }
        }
echo "<br>";
echo "<br>";
mysqli_close($conn);

if(isset($_POST['addtocart'])){
try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    }
catch(PDOException $e)
    {

    }

$save = $_POST['option'] ?? "";


if ($save === "1"){

$sql = "INSERT INTO Ordertable(car_name,startloc, endloc, date_, time_,price,email)
SELECT car_name,startloc, endloc, date_, time_,price,email
FROM Comparetablea
WHERE id = 1";
if ($conn->multi_query($sql) === TRUE) {}
}
elseif ($save ==="2"){
  $sql = "INSERT INTO Ordertable(car_name,startloc, endloc, date_, time_,price,email)
  SELECT car_name,startloc, endloc, date_, time_,price,email
  FROM Comparetablea
  WHERE id =2";
	if ($conn->multi_query($sql) === TRUE) {}
}

		mysqli_close($conn);
		header("Location: testing.php#!/database");
	}
 ?>

</div>
<div style="position:absolute; top:25%">
<form action="comparea.php" method="post">
  <input type="radio" id="1" name="option" value="1">
  <label for="male">Option 1</label>
  <input type="radio" id="1" name="option" value="2">
  <label for="female">Option 2</label>
	<br>
  <input type="submit" name="addtocart" value="Add To Cart">
  </form>
</div>



<!-- Review -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdb";
try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    }
catch(PDOException $e)
    {

    }
$result = mysqli_query($conn,"SELECT car_name FROM comparetablea WHERE id =1");
$row = mysqli_fetch_assoc($result);
$car1 = $row['car_name'];
$result = mysqli_query($conn,"SELECT car_name FROM comparetablea WHERE id = 2");
$row = mysqli_fetch_assoc($result);
$car2 = $row['car_name'];

mysqli_close($conn);
 ?>


<div <?php if ($car1 != "wrx    " && $car2 != "wrx    "){echo " style='display: none';";} ?> style="position:absolute; top:35%">
<p id="product"> Car: 2020 Subaru Wrx </p>

<table id="customers">
    <tr>
        <th>Customer</th>
        <th>Rating</th>
        <th>Comment on Product</th>
    </tr>
    <tr>
        <td >Allen</td>
        <td >4.5/5</td>
        <td >Pros are Eager Boxer engine, practical form factor, fun in the snow. However, cons are Confusing & gimmicky info screens, aging platform, still looks boy racer-ish</td>
    </tr>
    <tr>
        <td>Juno</td>
        <td>3.0/5</td>
        <td>Pros are the car has agile, surefooted handling and powerful engines but for cons, the car has poor fuel economy, firm ride and noisy and cheap interior</td>
    </tr>
</table>
</div>



<br>
<br>

<div <?php if ($car1 != "civic  " && $car2 != "civic  " ){ echo " style='display: none';";} ?> style="position:absolute; top:55%">
<p id="product" name ="civic"> Car: 2019 Honda Civic </p>

<table id="customers">
    <tr>
        <th>Customer</th>
        <th>Rating</th>
        <th>Comment on Product</th>
    </tr>
    <tr>
        <td>Kelvin</td>
        <td>4.0/5</td>
        <td>The Good The 2019 Honda Civic is attractive, comfortable, fuel-efficient and an entertaining drive. The Bad The infotainment system lags when switching between menus and the car lacks device charging ports. The Bottom Line The 2019 Honda Civic is an even stronger compact sedan than before.</td>
    </tr>
    <tr>
        <td>Jason</td>
        <td>4.2/5</td>
        <td>Pros are the car has excellent fuel economy and performance from turbocharged engine and great ride quality. It also has roomy cabin with high-quality materials. For cons, its overly vigilant forward collision warining system is frustrating</td>
    </tr>
</table>
</div>


<br>
<br>



<div <?php if ($car1 != "camry  " && $car2 != "camry  "){echo " style='display: none';";} ?> style="position:absolute; top:80%">
<p id="producta" name ="camry"> Car: 2019 Toyota Camry </p>

<table id="customers">
    <tr>
        <th>Customer</th>
        <th>Rating</th>
        <th>Comment on Product</th>
    </tr>
    <tr>
        <td>Eunice</td>
        <td>4.7/5</td>
        <td>has fostered an enviable reputation for quality and reliability in the three and a half decades since its launch. A facelifted eighth-generation mid-size sedan is upon us now, and with seven models to choose from and an extensive list of options available, it's an almost guaranteed fit for any driver.</td>
    </tr>
    <tr>
        <td>Irene</td>
        <td>4.0/5</td>
        <td>The 2019 is the fifth Camry I have leased. The previous four were all reliable and great performers. I love the new styling of the 2019 Camry. The ride is also awesome. The problem with the car is very sluggish and delayed acceleration. My other four Camry's were very responsive and had quick acceleration, so much better than the 2019. I can't believe that the folks at Toyota aren't aware of this. I am very disappointed with the car's performance. Too bad, because it really is a nice car. Won't get a sixth one unless they fix this. Hoping for a software update or a recall to fix this very noticeable acceleration problem.</td>
    </tr>
</table>
<div>

</body>
</html>
