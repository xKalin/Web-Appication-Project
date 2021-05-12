<!DOCTYPE html>
<html>
  <head>
    <title>Plan for Smart Service : Sign In</title>
    <link rel="stylesheet" href="style.css">

  </head>
  <body>
    <?php
      session_start();
      $servername = "localhost";
      $username = "root";
      $password = "";

        if(isset($_POST['signin'])){
          // Create connection
          $conn = mysqli_connect($servername, $username, $password);

          $sql ="USE userdb";
          mysqli_query($conn,$sql);

          $email = $_POST['email'] ??"";
          $passw = $_POST['pass'] ??"";

          $dsn = 'mysql:dbname=userdb;host=localhost';
          $user = 'root';
          $pass = '';

          $pdo = new PDO($dsn,$user,$pass);
          $sql = "SELECT  UserID FROM Userdata WHERE  email=? AND
                pass=?";
          $smt = $pdo->prepare($sql);
          $smt->execute(array($email,md5($passw))); //execute the query
          if($smt->rowCount()){
        	   echo " login successful ";
             $md5 = md5($passw);
             $sql = "SELECT userid FROM Userdata WHERE email='$email' and pass='$md5' ";

             $result = $conn->query($sql);
             $row = $result->fetch_assoc();

             $_SESSION["userid"] = $row['userid'];
             header("Location: testing.php");

          }

          $sql = "CREATE TABLE current (
          userid INT(6) UNSIGNED AUTO_INCREMENT UNIQUE,
          user VARCHAR(255) NOT NULL
          )";

          if (mysqli_query($conn, $sql)) {}
            $sql = "INSERT INTO current (user)
            VALUES ('$email')";
            if ($conn->multi_query($sql) === TRUE) {}



          echo " login unsuccessful ";

        }
        ?>
    <div>
      <form action=signin.php method="post">
      <h2> Sign In</h2>
      <p>
        <label for="Email" class="floatLabel">Email</label>
        <input id="Email" name="email" type="text">
      </p>
      <p>
        <label for="password" class="floatLabel">Password</label>
        <input name="pass" type="text" id="pass">
      </p>
      <p>
        <input type="submit" value="Log In" name="signin">
       <a href="#!signup">
         <input type="button" value="Sign Up" />
       </a>
       <a href="#/!">
         <input type="button" value="Back" />
       </a>
      </p>
      </form>
      </div>
  </body>
</html>
