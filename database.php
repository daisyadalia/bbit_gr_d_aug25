<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "emailapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error); 
}

$sql = "INSERT INTO users (id,f_name, l_name, email)
VALUES ('U004','Daisy', 'Adalia', 'daisy.amolloh@strathmore.edu')";

if ($conn->query($sql) === TRUE) {
  echo "<div style='padding:15px; background-color:#e6ffe6; color:#2d662d; border:1px solid #b2d8b2; border-radius:5px; font-family:Arial,sans-serif;'>
          <strong>Success!</strong> New record created successfully.
        </div>";
} else {
  echo "<div style='padding:15px; background-color:#ffe6e6; color:#662d2d; border:1px solid #d8b2b2; border-radius:5px; font-family:Arial,sans-serif;'>
          <strong>Error:</strong> " . htmlspecialchars($sql) . "<br>" . htmlspecialchars($conn->error) . "
        </div>";
}

$conn->close();
?>