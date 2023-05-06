<?php

include 'db_connect.php';

$msg = $_POST['text'];
$room = $_POST['room'];
$ip = $_POST['ip'];
$msg = str_replace("<", "&lt;", $msg);
$msg = str_replace(">", "&gt;", $msg);
$msg = str_replace("'", "&lsquo;", $msg);
$msg = substr($msg, 0, 5000);

$sql = "INSERT INTO `msgs` (`msg`, `room`, `ip`, `stime`) VALUES ('$msg', '$room ', '$ip ', now());";

mysqli_query($conn, $sql);
mysqli_close($conn);


?>