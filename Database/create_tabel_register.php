<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "calorie";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE register (
  username VARCHAR(50) NOT NULL PRIMARY KEY,
  img BLOB NOT NULL,
  fristname VARCHAR(50) NOT NULL,
  lastname VARCHAR(50) NOT NULL,
  tell CHAR(10) NOT NULL,
  email VARCHAR(50) NOT NULL,
  password VARCHAR(50)NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET=utf8";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>