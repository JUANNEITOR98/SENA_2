<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "db_project";
$connect = new mysqli($server, $user, $pass, $database);

//var_dump($connect);
if ($connect->connect_errno) {
  echo "Failed to connect to MySQL: " . $connect->connect_error;
  exit();
} else {
   echo "To connect Ok";
}


