<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "book";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function db_connect(){
  $connn = mysqli_connect("localhost", "root", "", "book");
  if(!$connn){
    echo "Can't connect database " . mysqli_connect_error($connn);
    exit;
  }
  return $connn;
}
// echo "Connected successfully";