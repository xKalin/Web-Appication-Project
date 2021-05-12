<!DOCTYPE html>
<html>
<head>
	<title>Plan for Smart Service : Cart</title>
	 <link rel="stylesheet" type="text/css" href="style.css">
   <link rel="stylesheet" type="text/css" href="service.css">
   <link rel="stylesheet" href="flower.css">
</head>

<div style="position:absolute; top:13%; right:97%">
<p>Option 1 <br> Option 2 </p>
</div>
<div style="position:absolute; top:22%; right:97%">
<p>Option 1 <br> Option 2 </p>
</div>

<div style="position:absolute; top:8%;left:5%">
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

		$sql = "CREATE TABLE Flower_table (
		flower_id INT(6) UNSIGNED AUTO_INCREMENT UNIQUE,
		flower_name VARCHAR(255) NOT NULL,
		store VARCHAR(255) NOT NULL,
		price VARCHAR(255) NOT NULL,
		startloc VARCHAR(255) NOT NULL,
		endloc VARCHAR(255) NOT NULL,
		date_ VARCHAR(255),
		time_ VARCHAR(255),
		email VARCHAR(255)
		)";
    if (mysqli_query($conn, $sql)) {}

			$sql = "CREATE TABLE Coffee_table (
			coffee_id INT(6) UNSIGNED AUTO_INCREMENT UNIQUE,
			coffee_name VARCHAR(255) NOT NULL,
			coffee_store VARCHAR(255) NOT NULL,
			coffee_price VARCHAR(255) NOT NULL,
			startloc VARCHAR(255) NOT NULL,
			endloc VARCHAR(255) NOT NULL,
			date_ VARCHAR(255),
			time_ VARCHAR(255),
			email VARCHAR(255)
			)";
    if (mysqli_query($conn, $sql)) {}


    echo "<br>";
    echo "<br>";
    $sql = "SELECT * FROM compareFlower_table";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<table>";
                echo "<tr>";
                    echo "<th>Flower</th>";
                    echo "<th>Price</th>";
                    echo "<th>Store</th>";

                echo "</tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                    echo "<td>" . $row['flower_name'] . "</td>"."</td>";
                    echo "<td>" . $row['price'] . "</td>"."</td>";
                    echo "<td>" . $row['store'] . "</td>"."</td>"."</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
          }
        }
echo "<br>";


        $sql = "SELECT * FROM compareCoffee_table";
        if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0){
                echo "<table>";
                    echo "<tr>";
                        echo "<th>Coffee</th>";
                        echo "<th>Price</th>";
                        echo "<th>Store</th>";

                    echo "</tr>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>" . $row['coffee_name'] . "</td>"."</td>";
                        echo "<td>" . $row['coffee_price'] . "</td>"."</td>";
                        echo "<td>" . $row['coffee_store'] . "</td>"."</td>"."</td>";
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
$sql = "INSERT INTO Flower_table(flower_name, store, price, startloc, endloc, date_, time_,email)
SELECT flower_name, store, price, startloc, endloc, date_, time_,email
FROM CompareFlower_table
WHERE flower_id = 1";
if ($conn->multi_query($sql) === TRUE) {}

$sql = "INSERT INTO Coffee_table(coffee_name, coffee_store, coffee_price, startloc, endloc, date_, time_,email)
SELECT coffee_name, coffee_store, coffee_price, startloc, endloc, date_, time_,email
FROM compareCoffee_table
WHERE coffee_id = 1";
if ($conn->multi_query($sql) === TRUE) {}
}
elseif ($save ==="2"){
  $sql = "INSERT INTO Flower_table(flower_name, store, price, startloc, endloc, date_, time_,email)
  SELECT flower_name, store, price, startloc, endloc, date_, time_,email
  FROM compareFlower_table
  WHERE flower_id =2";
  if ($conn->multi_query($sql) === TRUE) {}

 $sql = "INSERT INTO Coffee_table(coffee_name, coffee_store, coffee_price, startloc, endloc, date_, time_,email)
 SELECT coffee_name, coffee_store, coffee_price, startloc, endloc, date_, time_,email
 FROM CompareCoffee_table
 WHERE coffee_id = 2";
 if ($conn->multi_query($sql) === TRUE) {}
}

		mysqli_close($conn);
		header("Location: testing.php#!/database");
}
		?>
</div>

<form action="compareb.php" method="post" style="position:absolute; top:31%">
  <input type="radio" id="1" name="option" value="1">
  <label for="male">Option 1</label>
  <input type="radio" id="1" name="option" value="2">
  <label for="female">Option 2</label>
	<br>
    <input type="submit" name="addtocart" value="Add To Cart">
  </form>



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
	$result = mysqli_query($conn,"SELECT store FROM compareflower_table WHERE flower_id =1");
	$row = mysqli_fetch_assoc($result);
	$flower1 = $row['store'];
	$sql = mysqli_query($conn,"SELECT store FROM compareFlower_table WHERE flower_id = 2");
	$row = mysqli_fetch_assoc($sql);
	$flower2 = $row['store'];

	$sql = mysqli_query($conn,"SELECT coffee_store FROM compareCoffee_table WHERE coffee_id =1");
	$row = mysqli_fetch_assoc($sql);
	$coffee1 = $row['coffee_store'];
	$sql = mysqli_query($conn,"SELECT coffee_store FROM compareCoffee_table WHERE coffee_id = 2");
	$row = mysqli_fetch_assoc($sql);
	$coffee2 = $row['coffee_store'];

	 ?>

<div <?php if ($flower1 != "May Flowers" && $flower2 != "May Flowers"){echo " style='display: none';";} ?> style="position:absolute; top:35%">
	<p id="flower"> Flower Shop: May Flowers </p>

	<table id="customers">
	    <tr>
	        <th>Customer</th>
	        <th>Rating</th>
	        <th>Comment on Store</th>
	    </tr>
	    <tr>
	        <td>Austin</td>
	        <td>5/5</td>
	        <td>Chose this service to send my friend a contact-less gift for her quarantine birthday! So excited to see the final product and her reactions. Amazing service with great bundles. :)</td>
	    </tr>
	    <tr>
	        <td>Manny</td>
	        <td>5/5</td>
	        <td>The site was very easy to navigate and they even sent me a discount code halfway through my order!
	Great option for last minute flower delivery.</td>
	    </tr>
	</table>
</div>

	<br><br>

<div <?php if ($flower1 != "Happy Petals" && $flower2 != "Happy Petals"){echo " style='display: none';";} ?> style="position:absolute; top:55%">
	<p id="flower"> Flower Shop: Happy Petals </p>

	<table id="customers">
	    <tr>
	        <th>Customer</th>
	        <th>Rating</th>
	        <th>Comment on Store</th>
	    </tr>
	    <tr>
	        <td>Charlie</td>
	        <td>5/5</td>
	        <td>I ordered flowers on Saturday and I just missed the deadline of 1 pm for the same-day delivery. But it's nice to know that it is possible! The ordering was quick. I received a confirmation email, another one to let me know that it is being processed, and another one to let me know it is being delivered. I appreciate the great communication. The price was right and the flowers look beautiful! My friend loved it! I have already recommended Happy Petals to many other friends.</td>
	    </tr>
	    <tr>
	        <td>Justin</td>
	        <td>5/5</td>
	        <td>Ordering an arrangement was super easy. Everything went smoothly and you had lots of great selections to choose from.</td>
	    </tr>
	</table>
</div>

	<br><br>

<div <?php if ($flower1 != "Toronto Flowers" && $flower2 != "Toronto Flowers"){echo " style='display: none';";} ?> style="position:absolute; top:80%">
	<p id="flower"> Flower Shop: Toronto Flowers </p>

	<table id="customers">
	    <tr>
	        <th>Customer</th>
	        <th>Rating</th>
	        <th>Comment on Store</th>
	    </tr>
	    <tr>
	        <td>Jiwon</td>
	        <td>5/5</td>
	        <td>Absolutely fantastic customer service. Their deals are absolutely great considering its a pandemic and people still want to send gifts to someone. Website is very clean and easy to use and from start to finish the process was very easy. Keep it up Toronto Flowers!</td>
	    </tr>
	    <tr>
	        <td>Yeri</td>
	        <td>2/5</td>
	        <td>Extremely disappointed. Ordered some flowers to be shipped to my loved one and they received a totally different item without notifying me. The received item is not even close in any shape or color to what I have ordered as shown in the pictures. Strongly do not recommend this business since customer service did not accept this as their fault.</td>
	    </tr>
	</table>
</div>
	<br><br>

<div <?php if ($flower1 != "All in Bloom" && $flower2 != "All in Bloom"){echo " style='display: none';";} ?> style="position:absolute; top:100%">
	<p id="flower"> Flower Shop: All in Bloom </p>

	<table id="customers">
	    <tr>
	        <th>Customer</th>
	        <th>Rating</th>
	        <th>Comment on Store</th>
	    </tr>
	    <tr>
	        <td>James</td>
	        <td>5/5</td>
	        <td>Loved the service! Great flowers and choices. Pricing was affordable especially for a university student like myself. Highly recommend buying your lover flowers from here! Would purchase again</td>
	    </tr>
	    <tr>
	        <td>Tony</td>
	        <td>5/5</td>
	        <td>Great! Ordered the roses and wine bundle for valentines day, great prices with excellent delivery options and cost. The website was easy to navigate and offered me an amazing deal I couldn't pass it up. I will be using this service for further flower deliveries !</td>
	    </tr>
	</table>
</div>

	<br><br><br><br><br><br>

<div <?php if ($coffee1 != "The Grind" && $coffee2 != "The Grind"){echo " style='display: none';";} ?> style="position:absolute; top:120%">
	<p id="coffee"> Coffee Shop: The Grind </p>

	<table id="customers">
	    <tr>
	        <th>Customer</th>
	        <th>Rating</th>
	        <th>Comment on Store</th>
	    </tr>
	    <tr>
	        <td>Leo</td>
	        <td>5/5</td>
	        <td>Great spot had an ice mocha. They get beans directly from nicruaga and also the chocolate they use is from there. Goes well with a beef empanada. Pretty sure its baked and it was delicious. For sure coming back here</td>
	    </tr>
	    <tr>
	        <td>Chris</td>
	        <td>5/5</td>
	        <td>Great customer service! There is a great variety of drinks and pastries. There is also the cutest merchandise there as well.</td>
	    </tr>
	</table>
</div>

	<br><br>

<div <?php if ($coffee1 != "The Roasted Bean" && $coffee2 != "The Roasted Bean"){echo " style='display: none';";} ?> style="position:absolute; top:140%">
	<p id="coffee"> Coffee Shop: The Roasted Bean </p>

	<table id="customers">
	    <tr>
	        <th>Customer</th>
	        <th>Rating</th>
	        <th>Comment on Store</th>
	    </tr>
	    <tr>
	        <td>Kent</td>
	        <td>5/5</td>
	        <td>Top tier coffee directly from the farms of Latin America and a real passion for community. I'm glad they have an e-commerce presence during the pandemic. These guys rock!</td>
	    </tr>
	    <tr>
	        <td>Ray</td>
	        <td>3/5</td>
	        <td>Great coffee. Slow service.</td>
	    </tr>
	</table>
</div>

	<br><br>

<div <?php if ($coffee1 != "Club Coffee" && $coffee2 != "Club Coffee"){echo " style='display: none';";} ?> style="position:absolute; top:160%">
	<p id="coffee"> Coffee Shop: Club coffee </p>

	<table id="customers">
	    <tr>
	        <th>Customer</th>
	        <th>Rating</th>
	        <th>Comment on Store</th>
	    </tr>
	    <tr>
	        <td>Matt</td>
	        <td>5/5</td>
	        <td>Great atmosphere in this place, everyone was friendly and welcoming.  I ordered a churro late, and it was great!  Lots of cinnamon, but not over powering.  The caramel and chocolate flavors were delicious as well.</td>
	    </tr>
	    <tr>
	        <td>Peter</td>
	        <td>5/5</td>
	        <td>Very good coffee and teas. Food is delicious.  I especially liked the apple and bacon empanadas, so so good.  The owners and staff are always polite and knowledgeable.  Great people and service.</td>
	    </tr>
	</table>
</div>

	<br><br>

<div <?php if ($coffee1 != "Coffee Time" && $coffee2 != "Coffee Time"){echo " style='display: none';";} ?> style="position:absolute; top:180%">
	<p id="coffee"> Coffee Shop: Coffee Time </p>

	<table id="customers">
	    <tr>
	        <th>Customer</th>
	        <th>Rating</th>
	        <th>Comment on Store</th>
	    </tr>
	    <tr>
	        <td>Michelle</td>
	        <td>4/5</td>
	        <td>Great coffee. However the developmentally challenged have difficulty entering the establishment from Rose Square. However the space\building structure is approximately 70+ years old. The quality of coffee is to higher standard then Starbucks.</td>
	    </tr>
	    <tr>
	        <td>Edward</td>
	        <td>4/5</td>
	        <td>Excellent coffee and the empanadas are awesome. The seating area is a bit limited.</td>
	    </tr>
	</table>
</div>
</body>
</html>
