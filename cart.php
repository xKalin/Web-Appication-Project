<!DOCTYPE html>
<html>
<head>
	<title>Plan for Smart Service : Cart</title>
	 <link rel="stylesheet" type="text/css" href="style.css">
	 <link rel="stylesheet" type="text/css" href="contact.css">
</head>
</body>
</html>

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
$sql = "DROP TABLE Comparetablea";
if ($conn->multi_query($sql) === TRUE) {}
	$sql = "DROP TABLE compareFlower_table";
	if ($conn->multi_query($sql) === TRUE) {}
		$sql = "DROP TABLE compareCoffee_table";
		if ($conn->multi_query($sql) === TRUE) {}


			$sql = "SELECT user FROM current";
			if($result = mysqli_query($conn, $sql)){
					if(mysqli_num_rows($result) > 0){
							while($row = mysqli_fetch_array($result)){
								$current_email = $row['user'];

							}
							mysqli_free_result($result);
						}
					}

    echo "<br>";
    echo "<br>";
		$button = False;
		$sql = "SELECT * FROM Ordertable WHERE email =('$current_email')";
		if($result = mysqli_query($conn, $sql)){
		    if(mysqli_num_rows($result) > 0){
					$button = True;
		        echo "<table>";
		            echo "<tr>";
		                echo "<th>Car</th>";
		                echo "<th>Starting Location</th>";
		                echo "<th>Destinnation</th>";
		                echo "<th>Date</th>";
										echo "<th>Time</th>";
										echo "<th>Price</th>";
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
$sql = "SELECT * FROM renttable WHERE email =('$current_email')";
if($result = mysqli_query($conn, $sql)){
		if(mysqli_num_rows($result) > 0){
				$button = True;
				echo "<table>";
						echo "<tr>";
								echo "<th>Car</th>";
								echo "<th>Duration</th>";
								echo "<th>License</th>";
								echo "<th>Date</th>";
								echo "<th>Time</th>";
								echo "<th>Price</th>";
						echo "</tr>";
				while($row = mysqli_fetch_array($result)){
						echo "<tr>";
								echo "<td>" . $row['car_name'] . "</td>"."</td>";
								echo "<td>" . $row['duration'] . "</td>"."</td>"."</td>";
								echo "<td>" . $row['license'] . "</td>"."</td>"."</td>";
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
						$sql = "SELECT * FROM Flower_table WHERE email =('$current_email')";
						if($result = mysqli_query($conn, $sql)){
						    if(mysqli_num_rows($result) > 0){
										$button = True;
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

                $sql = "SELECT * FROM Coffee_table WHERE email =('$current_email')";
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
										if($button){

											echo '<br><br><a href="payment.php"> Check Out<a>';
										}else{
											echo '<h2> No items in Cart. </h2>';
										}

		mysqli_close($conn);
		?>
