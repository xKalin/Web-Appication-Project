<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdb";

if(isset($_POST['addtocart'])){
try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    //echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

$sql = "CREATE TABLE compareFlower_table (
flower_id INT(6) UNSIGNED AUTO_INCREMENT UNIQUE,
flower_name VARCHAR(255) NOT NULL,
store VARCHAR(255) NOT NULL,
price VARCHAR(255) NOT NULL,
startloc VARCHAR(255) NOT NULL,
endloc VARCHAR(255) NOT NULL,
date_ VARCHAR(255),
time_ VARCHAR(255),
email VARCHAR (255)
)";

if (mysqli_query($conn, $sql)) {}

$sql = "CREATE TABLE compareCoffee_table (
coffee_id INT(6) UNSIGNED AUTO_INCREMENT UNIQUE,
coffee_name VARCHAR(255) NOT NULL,
coffee_store VARCHAR(255) NOT NULL,
coffee_price VARCHAR(255) NOT NULL,
startloc VARCHAR(255) NOT NULL,
endloc VARCHAR(255) NOT NULL,
date_ VARCHAR(255),
time_ VARCHAR(255),
email VARCHAR (255)
)";

if (mysqli_query($conn, $sql)) {}


$flower1 =  $_POST['flower1'] ?? "";
$store1 = $_POST['fstore1'] ?? "";
$price1 = substr($flower1,8);
$flower_name1 = substr($flower1,0,8);
$start1 =  $_POST['fstartloc1'] ?? "";
$end1 = $_POST['fendloc1'] ?? "";
$date1 = $_POST['fdate1'] ?? "";
$time1 = $_POST['ftime1'] ?? "";
$email = $_POST['email'] ?? "";

$sql = "INSERT INTO compareFlower_table (flower_name, store, price, startloc, endloc, date_, time_,email)
VALUES ('$flower_name1', '$store1','$price1', '$start1','$end1','$date1','$time1','$email')";

if ($conn->multi_query($sql) === TRUE) {


} else {

}

$coffee1 = $_POST['coffee1'] ?? "";
$coffee_store1 = $_POST['coffee_store1'] ?? "";
$coffee_price1 = substr($coffee1,17);
$coffee_name1 = substr($coffee1,0,17);
$coffee_start1 = $_POST['cstartloc1'] ?? "";
$coffee_end1 = $_POST['cendloc1'] ?? "";
$coffee_date1 = $_POST['cdate1'] ?? "";
$coffee_time1 = $_POST['ctime1'] ?? "";


$sql = "INSERT INTO compareCoffee_table (coffee_name, coffee_store, coffee_price, startloc, endloc, date_, time_,email)
VALUES ('$coffee_name1', '$coffee_store1','$coffee_price1', '$start1','$end1','$date1','$time1','$email')";

if ($conn->multi_query($sql) === TRUE) {


} else {

}

$flower2 =  $_POST['flower2'] ?? "";
$store2 = $_POST['fstore2'] ?? "";
$price2 = substr($flower2,8);
$flower_name2 = substr($flower2,0,8);
$start2 =  $_POST['fstartloc2'] ?? "";
$end2 = $_POST['fendloc2'] ?? "";
$date2 = $_POST['fdate2'] ?? "";
$time2 = $_POST['ftime2'] ?? "";

$sql = "INSERT INTO compareFlower_table (flower_name, store, price, startloc, endloc, date_, time_,email)
VALUES ('$flower_name2', '$store2','$price2', '$start2','$end2','$date2','$time2','$email')";

if ($conn->multi_query($sql) === TRUE) {


} else {

}

$coffee2 = $_POST['coffee2'] ?? "";
$coffee_store2 = $_POST['coffee_store2'] ?? "";
$coffee_price2 = substr($coffee2,17);
$coffee_name2 = substr($coffee2,0,17);
$coffee_start2 = $_POST['cstartloc2'] ?? "";
$coffee_end2 = $_POST['cendloc2'] ?? "";
$coffee_date2 = $_POST['cdate2'] ?? "";
$coffee_time2 = $_POST['ctime2'] ?? "";


$sql = "INSERT INTO compareCoffee_table (coffee_name, coffee_store, coffee_price, startloc, endloc, date_, time_,email)
VALUES ('$coffee_name2', '$coffee_store2','$coffee_price2', '$start2','$end2','$date2','$time2','$email')";

if ($conn->multi_query($sql) === TRUE) {}
mysqli_close($conn);

header("Location: testing.php#!/compareb");
}
?>

<br>

<html>
<head>
	<title>Plan for Smart Service : Ride to Deliver</title>

   <link rel="stylesheet" type="text/css" href="style.css">

	<style>

	<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
	<style type="text/css">

		#div1 {
		  width: 50px;
		  height: 50px;
		  padding: 10px;
		  border: 1px solid #aaaaaa;
		}
		#map {
    	        height: 100%;
    	      }
    		html,
    		body {
    			height: 100%;
    			margin: 0;
    			padding: 0;
    		}

    		#map {
    			height: 100%;
    			float: left;
    			width: 70%;
    			height: 50%;
    		}

	</style>
</head>
<body>

	<form action="ridegreenb.php" method="post">
    <div>
		<p> Which Flower do you want? </p>
	  <label for="flower">Choose your flowers</label>
	  <select name="flower1" id="flower">
	    <option value="Roses    $3">Roses : $3.00 per flower</option>
	    <option value="Peony    $4">Peony : $4.00 per flower</option>
	    <option value="Anemone  $5">Anemone : $5.00 per flower</option>
	    <option value="Lilac    $3.50">Lilac : $3.50 per flower</option>
	  </select>

    <br><br>

	  <label for="store"> Choose your store </label>
        <select name="fstore1" id="store">
            <option value="May Flowers"> May Flowers </option>
            <option value="Happy Petals"> Happy Petals </option>
            <option value="Toronto Flowers"> Toronto Flowers </option>
            <option value="All in Bloom"> All in Bloom </option>
	    </select>
	  <br><br>

	  <label for="fname">Starting location(City, Province(in Acronyms)):</label>
    	<input type="text" id="start" name="fstartloc1"><br><br>
    	<label for="fname">Destination(City, Province(in Acronyms)):</label>
    	<input type="text" id="end" name="fendloc1"><br><br>

    	<label for="fname">Date:</label>
    	<input type="text" id="Date" name="fdate1"><br><br>
    	<label for="fname">Time:</label>
    	<input type="text" id="Time" name="ftime1"><br><br>

    <p> Which Coffee do you want? </p>
	  <label for="coffee">Choose your Coffee</label>
	  <select name="coffee1" id="coffee">
	    <option value="Americano        $3"> Americano: $3 </option>
	    <option value="Caffe Latte      $4"> Caffe Latte: $4 </option>
	    <option value="Espresso         $2"> Espresso: $2 </option>
	    <option value="Ice Tea          $5"> Iced Tea: $5 </option>
	  </select>

    <br><br>

	  <label for="coffee_store"> Choose your store </label>
        <select name="coffee_store1" id="store">
            <option value="The Grind"> The Grind </option>
            <option value="The Roasted Bean"> The Roasted Bean </option>
            <option value="Club Coffee"> Club Coffee </option>
            <option value="Coffee Time"> Coffee Time </option>
	    </select>
	  <br><br>

	  <label for="fname">Starting location(City, Province(in Acronyms)):</label>
    	<input type="text" id="start" name="cstartloc1"><br><br>
    	<label for="fname">Destination(City, Province(in Acronyms)):</label>
    	<input type="text" id="end" name="cendloc1"><br><br>

    	<label for="fname">Date:</label>
    	<input type="text" id="Date" name="cdate1"><br><br>
    	<label for="fname">Time:</label>
    	<input type="text" id="Time" name="ctime1"><br><br>
</div>
<div style="position:absolute; right:45%; top:9%">
      <p> Which Flower do you want? </p>
  	  <label for="flower">Choose your flowers</label>
  	  <select name="flower2" id="flower">
  	    <option value="Roses    $3">Roses : $3.00 per flower</option>
  	    <option value="Peony    $4">Peony : $4.00 per flower</option>
  	    <option value="Anemone  $5">Anemone : $5.00 per flower</option>
  	    <option value="Lilac    $3.50">Lilac : $3.50 per flower</option>
  	  </select>

      <br><br>

  	  <label for="store"> Choose your store </label>
          <select name="fstore2" id="store">
              <option value="May Flowers"> May Flowers </option>
              <option value="Happy Petals"> Happy Petals </option>
              <option value="Toronto Flowers"> Toronto Flowers </option>
              <option value="All in Bloom"> All in Bloom </option>
  	    </select>
  	  <br><br>

  	  <label for="fname">Starting location(City, Province(in Acronyms)):</label>
      	<input type="text" id="start" name="fstartloc2"><br><br>
      	<label for="fname">Destination(City, Province(in Acronyms)):</label>
      	<input type="text" id="end" name="fendloc2"><br><br>

      	<label for="fname">Date:</label>
      	<input type="text" id="Date" name="fdate2"><br><br>
      	<label for="fname">Time:</label>
      	<input type="text" id="Time" name="ftime2"><br><br>

      <p> Which Coffee do you want? </p>
  	  <label for="coffee">Choose your Coffee</label>
  	  <select name="coffee2" id="coffee">
  	    <option value="Americano        $3"> Americano: $3 </option>
  	    <option value="Caffe Latte      $4"> Caffe Latte: $4 </option>
  	    <option value="Espresso         $2"> Espresso: $2 </option>
  	    <option value="Ice Tea          $5"> Iced Tea: $5 </option>
  	  </select>

      <br><br>

  	  <label for="coffee_store"> Choose your store </label>
          <select name="coffee_store2" id="store">
              <option value="The Grind"> The Grind </option>
              <option value="The Roasted Bean"> The Roasted Bean </option>
              <option value="Club Coffee"> Club Coffee </option>
              <option value="Coffee Time"> Coffee Time </option>
  	    </select>
  	  <br><br>

  	  <label for="fname">Starting location(City, Province(in Acronyms)):</label>
      	<input type="text" id="start" name="cstartloc2"><br><br>
      	<label for="fname">Destination(City, Province(in Acronyms)):</label>
      	<input type="text" id="end" name="cendloc2"><br><br>

      	<label for="fname">Date:</label>
      	<input type="text" id="Date" name="cdate2"><br><br>
      	<label for="fname">Time:</label>
      	<input type="text" id="Time" name="ctime2"><br><br>
</div>
<div style="position:absolute; left:12%; top:75%">
        <label for="fname">Email:</label>
        <input type="text" id="email" name="email" required><br><br>
        <input type="submit" name="addtocart" value="Add To Cart">
</div>
	</form>


	<script>
    	    function initMap() {
    	      const directionsService = new google.maps.DirectionsService();
    	      const directionsRenderer = new google.maps.DirectionsRenderer();
    	      const map = new google.maps.Map(document.getElementById("map"), {
    	        zoom: 7,
    	        center: { lat: 43.6532, lng: -79.3832 },
    	      });
    	      directionsRenderer.setMap(map);

    	      const onChangeHandler = function () {
    	        calculateAndDisplayRoute(directionsService, directionsRenderer);
    	      };
    				document
    	          .getElementById("start")
    	          .addEventListener("change", onChangeHandler);
    	        document
    	          .getElementById("end")
    	          .addEventListener("change", onChangeHandler);
    	    }

    	    function calculateAndDisplayRoute(directionsService, directionsRenderer) {
    	      directionsService.route(
    	        {
    	          origin: {
    	            query: document.getElementById("start").value,
    	          },
    	          destination: {
    	            query: document.getElementById("end").value,
    	          },
    	          travelMode: google.maps.TravelMode.DRIVING,
    	        },
    	        (response, status) => {
    	          if (status === "OK") {
    	            directionsRenderer.setDirections(response);
    	          }
    	        }
    	      );
    	    }
    	  </script>


	<br><br><br><br>

	<div id="map"></div>

<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGCD8Bk6r07WnOxrz5AYEbMPdOA1NOGPE&callback=initMap&libraries=&v=weekly"
	async
></script>

</body>
</html>
