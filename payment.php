<html>
<head>
	<title>Plan for Smart Service : Payment</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>

	<?php
	session_start();

	$userid = $_SESSION['userid'];
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "userdb";




	if(isset($_POST['checkout'])){
	$conn = new mysqli($servername, $username, $password,$db);

	$sql = "CREATE TABLE paymentinfo (
	userid INT(6) UNSIGNED,
	cardname VARCHAR(255) NOT NULL,
	cardnum VARCHAR(255) NOT NULL,
	expmonth VARCHAR(255) NOT NULL,
	expyear VARCHAR(255) NOT NULL,
	ccv VARCHAR(255) NOT NULL
	)";
	if (mysqli_query($conn, $sql)) {
		echo "Users created successfully";
	}

	$cardname = $_POST['cardname'] ?? "";
	$cardnum =  $_POST['cardnumber'] ?? "";
	$expmonth = $_POST['expmonth'] ?? "";
	$expyear = $_POST['expyear'] ?? "";
	$ccv = $_POST['ccv'] ?? "";

	$dsn = 'mysql:dbname=userdb;host=localhost';
	$user = 'root';
	$pass = '';

	$pdo = new PDO($dsn,$user,$pass);
	$sql = "INSERT INTO  paymentinfo(userid,cardname,cardnum,expmonth,expyear,ccv)
					 VALUES(?,?,?,?,?,?)";
	$smt = $pdo->prepare($sql);
	$smt->execute(array($userid,$cardname,$cardnum,$expmonth,$expyear,$ccv)); //execute the query

	mysqli_close($conn);

	header("Location: confirm.php");
	}
	?>



	<div class="row">
	  <div class="col-75">
	    <div class="container">
	      <form action="payment.php" method="post">

	        <div class="row">
	          <div class="col-50">
	            <h3>Payment</h3>
	            <label for="fname">Accepted Cards</label>
	            <div class="icon-container">
	              <i class="fa fa-cc-visa" style="color:navy;"></i>
	              <i class="fa fa-cc-amex" style="color:blue;"></i>
	              <i class="fa fa-cc-mastercard" style="color:red;"></i>
	              <i class="fa fa-cc-discover" style="color:orange;"></i>
	            </div>
	            <label for="cname">Name on Card</label>
	            <input type="text" id="cname" name="cardname" >
	            <label for="ccnum">Credit card number</label>
	            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
	            <label for="expmonth">Exp Month</label>
	            <input type="text" id="expmonth" name="expmonth" >
	            <div class="row">
	              <div class="col-50">
	                <label for="expyear">Exp Year</label>
	                <input type="text" id="expyear" name="expyear" >
	              </div>
	              <div class="col-50">
	                <label for="cvv">CVV</label>
	                <input type="text" id="cvv" name="cvv" >
	              </div>
	            </div>
	          </div>

	        </div>
	        <input type="submit" name="checkout" value="Continue to checkout" class="btn">
	      </form>
	    </div>
	  </div>

	  </div>
	</div>

</body>
</html>
