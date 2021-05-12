<!DOCTYPE html>
<head>
	<title>Plan for Smart Service</title>

		<link rel="stylesheet" href="style.css">
			<link rel="stylesheet" href="contact.css">

</head>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>

<body>
	<div style="text-align:right;">
		<?php

		function brdetect( )
		{
			$res = $_SERVER['HTTP_USER_AGENT'];
			if ( strpos ($res, "Edg") == true)
				echo "Browser: Microsoft Edge";
			else if ( strpos ($res, "Firefox") == true)
						echo "Browser: Firefox";
					else if ( strpos ($res, "Chrome") == true)
					echo "Browser: Google Chrome";
						else  echo "Browser: unkown";
		}

		brdetect( );
		?>
	</div>

<div id="navbar">
		<a href="#/!">
		<img alt="Home" src="https://1.bp.blogspot.com/-LJJmwm602gY/YEU7eobTIoI/AAAAAAAAEhg/mfYMtSPDgngyCRcdZCVLUKH2EfYOertgQCLcBGAsYHQ/s200/21ea6db1-48d1-4ca9-850b-8e3ca24ee317_200x200.png" class="thumbnail" width="50" height="50"></a>
		<h1> Smart Service
      <?php
			session_start();
			if(isset($_SESSION['userid'])){
				$userid = $_SESSION['userid'];
				$conn = new mysqli("localhost", "root","","userdb");
				$sql = "SELECT fname FROM userdata WHERE userid='$userid'";
				$result= $conn->query($sql);
				$row= $result->fetch_assoc();

				$fname = $row['fname'];

				echo "Welcome Back, ".$fname;
			}
			 ?>
		</h1>

		<?php
		if(isset($_SESSION['userid'])){
			if($_SESSION['userid'] == 1){
				echo '<a href="admin.php" style="font-size: 15px;width:7%;  position: absolute;top:9% ;right: 2%; color: rgb(0,0,0) !important"> Admin</a>';
			}
			echo '<a href="logoff.php" style="font-size: 15px;width:7%;  position: absolute;top:9% ;right: -2%; color: rgb(0,0,0) !important"> Logout</a>';
		}else{
			echo'
			<a href="#!signup" style="font-size: 15px;width:7%;  position: absolute;top:9% ;right: 2%; color: rgb(0,0,0) !important"> Sign up</a>
			<a href="#!signin" style="font-size: 15px;width:7%;  position: absolute;top:9% ;right: -2%; color: rgb(0,0,0) !important"> Sign in</a>
			';
		}
		?>
	</div>

  	<!--Contact Us Popup Code -->
  	<div class="form-popup" id="contactus">
  				<div class="wrap-contact2">
  					<form class="contact2-form">
  						<span class="contact2-form-title">
  							Contact Us
  						</span>

  						<div class="wrap-input2">
  							<input class="input2" type="text" name="name">
  							<span class="focus-input2" data-placeholder="NAME"></span>
  						</div>

  						<div class="wrap-input2">
  							<input class="input2" type="text" name="email">
  							<span class="focus-input2" data-placeholder="EMAIL"></span>
  						</div>

  						<div class="wrap-input2">
  							<textarea class="input2" name="message"></textarea>
  							<span class="focus-input2" data-placeholder="MESSAGE"></span>
  						</div>

  						<div class="container-contact2-form-btn">
  							<div class="wrap-contact2-form-btn">
  								<div class="contact2-form-bgbtn"></div>
  								<button class="contact2-form-btn">
  									Send Your Message
  								</button>
  							</div>
  							<div class="wrap-contact2-form-btn">
  								<div class="contact2-form-bgbtn"></div>
  								<button class="contact2-form-btn" onclick="closeForm()">
  									Close
  								</button>
  							</div>
  						</div>
  					</form>
  				</div>
  	</div>
  		<script>

  		function openForm() {
  		  document.getElementById("contactus").style.display = "block";
  		}

  		function closeForm() {
  		  document.getElementById("contactus").style.display = "none";
  		}
  		</script>

      <div ng-view></div>
  		<script src="app.js"></script>
      <?php

			$dsn = 'mysql:dbname=userdb;host=localhost';
      $servername = "localhost";
      $username = "root";
      $password = "";
			$db = "userdb";

			//display items
			$conn = new mysqli($servername, $username, $password,$db);

			$sql = "CREATE TABLE invoice (
      userid INT(6) UNSIGNED ,
      fname VARCHAR(255) NOT NULL,
      lname VARCHAR(255) NOT NULL,
      price DECIMAL(18,2) NOT NULL
      )";

			echo "<br><br><br>";
			//Order Redisplay
			$coffeePrice = 0;
			$flowerPrice = 0;
			$carPrice = 0;
			$rentPrice = 0;
			$sub = 0;
			$totalPrice = 0;

			if($conn->query($sql) == TRUE){
				echo "invoice created";
			}
			$pdo = new PDO($dsn,$username,$password);
			$sql = "SELECT coffee_name, coffee_store, coffee_price FROM coffee_table";

			$result = $conn->query($sql);
			if($result-> num_rows > 0){
        while($row = $result-> fetch_assoc()){
          echo $row['coffee_store'] .", ". $row['coffee_name'] .", ". $row['coffee_price']. "<br>" ;
					$temp = str_replace("$","",$row['coffee_price']);
					$coffeePrice += (float)$temp;
        }
			}
			$sql = "SELECT flower_name, store, price FROM flower_table";

			$result = $conn->query($sql);
			if($result-> num_rows > 0){
        while($row = $result-> fetch_assoc()){
          echo $row['store'] .", ". $row['flower_name'] .", ". $row['price']. "<br>" ;
					$temp = str_replace("$","",$row['price']);
					$flowerPrice += (float)$temp;
        }
			}
			$sql = "SELECT car_name, startloc, endloc, price FROM ordertable";

			$result = $conn->query($sql);
			if($result-> num_rows > 0){
        while($row = $result-> fetch_assoc()){
          echo $row['car_name'] .", Starting Location : ". $row['startloc'] .", Ending Location : ". $row['endloc']. ", ".$row['price']. "<br>" ;
					$temp = str_replace("$","",$row['price']);
					$carPrice += (float)$temp;
        }
			}
			$sql = "SELECT car_name, duration, price FROM renttable";

			$result = $conn->query($sql);
			if($result-> num_rows > 0){
        while($row = $result-> fetch_assoc()){
          echo $row['car_name'] .",Duration you would like to rent the car for: ". $row['duration'] .", ". $row['price']. "<br>" ;
					$temp = str_replace("$","",$row['price']);
					$rentPrice += (float)$temp;
        }
			}


			echo "<br><br>";
			$sub = $flowerPrice + $coffeePrice + $carPrice + $rentPrice;
			echo "Subtotal : $". $sub .". <br>";
			echo "HST & GST : $" . round(($sub*0.13),2) .". <br>";
			$totalPrice = round(($sub*1.13),2);
			echo "Total : $". $totalPrice. ".";
			echo '<br>
				<form action=confirm.php method="post">
				<input type="submit" value="Place Order" name="placeorder">
				</form>
			';


      if(isset($_POST['placeorder'])){
				$dsn = 'mysql:dbname=userdb;host=localhost';
				$servername = "localhost";
				$username = "root";
				$password = "";
				$db = "userdb";

				$userid = $_SESSION['userid'];
				$sql = "SELECT fname, lname FROM userdata WHERE userid='$userid'";
				$result= $conn->query($sql);
				$row= $result->fetch_assoc();

				$fname = $row['fname'];
				$lname = $row['lname'];

	      $pdo = new PDO($dsn,$username,$password);
	      $sql = "INSERT INTO  invoice(userid,fname,lname,price)
	               VALUES(?,?,?,?)";
	      $smt = $pdo->prepare($sql);
				$smt->execute(array($userid,$fname,$lname,$totalPrice));

				$sql = "DELETE FROM coffee_table";
				$conn->query($sql);
				$sql = "DELETE FROM flower_table";
				$conn->query($sql);
				$sql = "DELETE FROM ordertable";
				$conn->query($sql);
				$sql = "DELETE FROM renttable";
				$conn->query($sql);


				mysqli_close($conn);

      	header("Location: testing.php");
			}
       ?>

      </body>
      </html>
