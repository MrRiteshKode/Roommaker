<?php 
include 'db_connect.php';
$sql = "DELETE FROM `msgs` WHERE stime < now() - INTERVAL 1 DAY";
$result = mysqli_query($conn, $sql);
$sql2 = "DELETE FROM `rooms` WHERE stime < now() - INTERVAL 1 DAY";
$result2 = mysqli_query($conn, $sql2);
?>
<!-- https://roomsmaker.000webhostapp.com/rooms.php?roomname=helo22riteshh -->