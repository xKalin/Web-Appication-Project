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
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdb";

if(isset($_POST['addtocart'])){
try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    }
catch(PDOException $e)
    {
    }

$sql = "CREATE TABLE Flower_table (
flower_id INT(6) UNSIGNED AUTO_INCREMENT UNIQUE,
flower_name VARCHAR(255) NOT NULL,
store VARCHAR(255) NOT NULL,
price VARCHAR(255) NOT NULL,
startloc VARCHAR(255) NOT NULL,
endloc VARCHAR(255) NOT NULL,
date_ VARCHAR(255),
email VARCHAR(255) NOT NULL,
time_ VARCHAR(255)
)";

if (mysqli_query($conn, $sql)) {}


$flower =  $_POST['flower'] ?? "";
$store = $_POST['store'] ?? "";
$price = substr($flower,8);
$flower_name = substr($flower,0,8);

$start =  $_POST['startloc'] ?? "";
$end = $_POST['endloc'] ?? "";
$date = $_POST['date'] ?? "";
$time = $_POST['time'] ?? "";
$email = $_POST['email'] ?? "";

$sql = "INSERT INTO Flower_table (flower_name, store, price, startloc, endloc, date_, email, time_)
VALUES ('$flower_name', '$store','$price', '$start','$end','$date', '$email','$time')";

if ($conn->multi_query($sql) === TRUE) {}

$sql = "CREATE TABLE Coffee_table (
coffee_id INT(6) UNSIGNED AUTO_INCREMENT UNIQUE,
coffee_name VARCHAR(255) NOT NULL,
coffee_store VARCHAR(255) NOT NULL,
coffee_price VARCHAR(255) NOT NULL,
startloc VARCHAR(255) NOT NULL,
endloc VARCHAR(255) NOT NULL,
date_ VARCHAR(255),
email VARCHAR(255) NOT NULL.
time_ VARCHAR(255)
)";

if (mysqli_query($conn, $sql)) {}

$coffee =  $_POST['coffee'] ?? "";
$coffee_store = $_POST['coffee_store'] ?? "";
$coffee_price = substr($coffee,17);
$coffee_name = substr($coffee,0,17);

$sql = "INSERT INTO Coffee_table (coffee_name, coffee_store, coffee_price, startloc, endloc, date_, email, time_)
VALUES ('$coffee_name', '$coffee_store','$coffee_price', '$start','$end','$date','$email','$time')";

if ($conn->multi_query($sql) === TRUE) {


} else {

}
mysqli_close($conn);
header("Location: testing.php#!/database");
}
?>
	<form action="ride&deliver.php" method="post">
		<p> Which Flower do you want? </p>
	  <label for="flower">Choose your flowers</label>
	  <select name="flower" id="flower">
	    <option value="Roses    $3">Roses : $3.00 per flower</option>
	    <option value="Peony    $4">Peony : $4.00 per flower</option>
	    <option value="Anemone  $5">Anemone : $5.00 per flower</option>
	    <option value="Lilac    $3.50">Lilac : $3.50 per flower</option>
	  </select>


    <br><br>

	  <label for="store"> Choose your store </label>
        <select name="store" id="store">
            <option value="May Flowers"> May Flowers </option>
            <option value="Happy Petals"> Happy Petals </option>
            <option value="Toronto Flowers"> Toronto Flowers </option>
            <option value="All in Bloom"> All in Bloom </option>
	    </select>
	  <br><br>

	  <label for="fname">Starting location(City, Province(in Acronyms)):</label>
    	<input type="text" id="start" name="startloc"><br><br>
    	<label for="fname">Destination(City, Province(in Acronyms)):</label>
    	<input type="text" id="end" name="endloc"><br><br>

    	<label for="fname">Date:</label>
    	<input type="text" id="Date" name="date"><br><br>
    	<label for="fname">Time:</label>
    	<input type="text" id="Time" name="time"><br><br>


	<div style="position:absolute; right:45%; top:9%">
    <p> Which Coffee do you want? </p>
	  <label for="coffee">Choose your Coffee</label>
	  <select name="coffee" id="coffee">
	    <option value="Americano        $3"> Americano: $3 </option>
	    <option value="Caffe Latte      $4"> Caffe Latte: $4 </option>
	    <option value="Espresso         $2"> Espresso: $2 </option>
	    <option value="Ice Tea          $5"> Iced Tea: $5 </option>
	  </select>

    <br><br>

	  <label for="coffee_store"> Choose your store </label>
        <select name="coffee_store" id="store">
            <option value="The Grind"> The Grind </option>
            <option value="The Roasted Bean"> The Roasted Bean </option>
            <option value="Club Coffee"> Club Coffee </option>
            <option value="Coffee Time"> Coffee Time </option>
	    </select>
	  <br><br>

	  <label for="fname">Starting location(City, Province(in Acronyms)):</label>
    	<input type="text" id="start" name="startloc"><br><br>
    	<label for="fname">Destination(City, Province(in Acronyms)):</label>
    	<input type="text" id="end" name="endloc"><br><br>

    	<label for="fname">Date:</label>
    	<input type="text" id="Date" name="date"><br><br>
    	<label for="fname">Time:</label>
    	<input type="text" id="Time" name="time"><br><br>
</div>
<div style="position:absolute; left:10%; top:40%">
			<label for="fname">Email:</label>
			<input type="text" id="Time" name="email" required><br><br>
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
