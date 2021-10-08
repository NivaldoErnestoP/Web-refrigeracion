<?php 

$server = "localhost";
$user= "root";
$password = "1234";
$dbname = "Web";

$conn = new mysqli($server, $user,$password,$dbname);

if ($conn->connect_error) {
    die("Error de connetion ".$conn->connect_error);
}

?>