<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

if(!$conn){
    die("sorry failed to connect to the database". mysqli_error($conn));
}
?>