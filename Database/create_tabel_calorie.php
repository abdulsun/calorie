<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "calorie";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE history (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  time TIME NOT NULL,
  date DATE NOT NULL,
  activity VARCHAR(20) NOT NULL,
  calorie INT(10) NOT NULL,
  period INT(10) NOT NULL,
  FOREIGN KEY (username) REFERENCES register(username)
  ) ENGINE = InnoDB DEFAULT CHARSET=utf8";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>