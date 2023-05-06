<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "rooms";

// creating chatroom connection

$conn = mysqli_connect($servername, $username, $password, $database);
mysqli_set_charset($conn, 'utf8mb4');

// check connection
if(!$conn)
{
	die("Failed to connect". mysqli_connect_error());
}

?>