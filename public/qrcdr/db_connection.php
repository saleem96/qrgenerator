<?php
$servername = "localhost";
$username = "jimitech_qr_generator";
$password = "qr_generator";

try {
    $conn = new PDO("mysql:host=$servername;dbname=jimitech_qr_generator", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $sql = "INSERT INTO codes (code, user_id, status)
    // VALUES ('111111', 1, 1)";
    // use exec() because no results are returned
    // $conn->exec($sql);
    // echo "New record created successfully";
  } catch(PDOException $e) {
    echo  "<br>" . $e->getMessage();
  }

  $conn = null;

// try {
//   $conn = new PDO("mysql:host=$servername;dbname=qr_code", $username, $password);
//   // set the PDO error mode to exception
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//   echo "Connected successfully";

// } catch(PDOException $e) {
//   echo "Connection failed: " . $e->getMessage();
// }
?>


