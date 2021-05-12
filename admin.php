<!--The Admin should be able to maintain the system for all major components including client,
server and databases. TheAdmin can maintain the database to add /delete/search/edit the data.
The Admin can maintain the database to cover alltypes of data: user accounts, login ids, passwords
, titles, images, addresses, descriptions, orders, prices, invoices, userreviews, user rankings,
 latitudes, longitudes, addresses, ...
-->

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Plan for Smart Service : Admin Page</title>
 </head>
 <body>
   <?php
   session_start();
   $servername = "localhost";
   $username = "root";
   $password = "";
   $database = "userdb";
   $conn = new mysqli($servername, $username, $password,$database);
   if($conn->connect_error){
     die("Connection failed:". $conn->connect_error);
   }
    if(isset($_POST['back'])){
      unset($_SESSION['currid']);
      header("Location: admin.php");
    }
    if(isset($_POST['delete'])){
      delete();
      unset($_SESSION['currid']);
      header("Location: admin.php");
    }
    if(isset($_POST['select']) || isset($_POST['edit'])){
      if(isset($_POST['edit'])){
        edit();
      }
      if(isset($_POST['userid'])){
        $userid = $_POST['userid'];
        $_SESSION['currid'] = $userid;
      }else{
        $userid = $_SESSION['currid'];
      }
      $sql = "SELECT fname,lname,email,pass,pnum,addy FROM userdata WHERE userid='$userid'";
      $result= $conn->query($sql);
      $row= $result->fetch_assoc();

      $fname = $row['fname'];
      $lname = $row['lname'];
      $email = $row['email'];
      $pnum = $row['pnum'];
      $addy = $row['addy'];

      echo '<form action=admin.php method="post">
      <label for="userid">Current User ID : '.$userid.'</label> <br>
      <label for="fname">First Name</label>
      <input type="text" name="fname" value="'.$fname.'"> <br>
      <label for="lname">Last Name</label>
      <input type="text" name="lname" value="'.$lname.'"> <br>
      <label for="addy">Email Address</label>
      <input type="text" name="email" value="'.$email.'"> <br>
      <label for="passw">Password</label>
      <input type="text" name="pass"> <br>
      <label for="pnum">Phone Number</label>
      <input type="text" name="pnum" value="'.$pnum.'"> <br>
      <label for="addy">Home Address</label>
      <input type="text" name="addy" value="'.$addy.'"> <br>

      <br><br>
      <input type="submit" name="back" value="Back">
      <input type="submit" name="edit" value="Edit">

      <br><br>
      <input type="submit" name="delete" value="Delete User">
      </form>
      <br><br><br>
      <button onclick="rideToDestination()">Ride to Destination</button>
      <button onclick="rideAndDeliver()">Ride to Destination</button>
      ';

    }else{
     $sql = "SELECT userid, fname, lname FROM userdata";
     $result = $conn->query($sql);

     echo "<table><tr>
     <th>User ID</th>
     <th>First Name</th>
     <th>Last Name</th>
     </tr>
     ";

     if($result-> num_rows > 0){
       while($row = $result-> fetch_assoc()){
         echo "<tr><td>" . $row['userid']. "</td><td>".$row['fname']. "</td><td>" .$row['lname']. "</td></tr>" ;
       }
       echo "</table>";
     }else {
       echo "no users found";
     }
     // Select button
     echo '<br><br>
     <form action=admin.php method="post">
     <label for="userid">Enter UserID</label>
     <input type="text" name="userid">
     <input type="submit" name="select" value="Select User">
     </form>';
   }

   $conn-> close();
    ?>
<!--client shows users-->

 </body>
 </html>
<?php
function edit(){
  $userid = $_SESSION['currid'];
  $fname = $_POST['fname'] ?? "";
  $lname =  $_POST['lname'] ?? "";
  $email = $_POST['email'] ?? "";
  $passw = $_POST['pass'] ?? "";
  $pnum = $_POST['pnum'] ?? "";
  $addy = $_POST['addy'] ?? "";

  $dsn = 'mysql:dbname=userdb;host=localhost';
  $user = 'root';
  $pass = '';
  $pdo = new PDO($dsn,$user,$pass);

  $sql = "UPDATE userdata SET fname=?, lname=?,email=?,pnum=?,addy=? WHERE userid=?";
  $smt = $pdo->prepare($sql);
  $smt->execute(array($fname,$lname,$email,$pnum,$addy,$userid));

  if($passw != ""){
    $passw = md5($passw);
    $sql = "UPDATE userdata SET pass=? WHERE userid=?";
    $smt = $pdo->prepare($sql);
    $smt->execute(array($passw,$userid));
  }
}
function delete(){
  $userid = $_SESSION['currid'];

  $dsn = 'mysql:dbname=userdb;host=localhost';
  $user = 'root';
  $pass = '';
  $pdo = new PDO($dsn,$user,$pass);

  $sql = "DELETE FROM userdata WHERE userid=?";
  $smt = $pdo->prepare($sql);
  $smt->execute(array($userid));

  echo "yeeh";
}
?>

<script>
function rideToDestination() {
  location.replace("admin_rideToDestination.php")
}
function rideAndDeliver() {
  location.replace("admin_rideAndDeliver.php")
}
</script>
