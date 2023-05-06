<?php
$room = $_POST['room'];
include 'db_connect.php';
$sql = "SELECT msg, stime, ip FROM msgs WHERE room='$room'";

$res = "";
$html_content = "";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
	while ($row = mysqli_fetch_assoc($result)) {
		$res = $res. '<div class="d-flex flex-row justify-content-start mb-4">';
        $res = $res. '<img src="media/user.png" alt="avatar 1" style="width: 45px; height: 100%;">';            
        $res = $res. ' <div class="p-3 ms-3" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">';
        $res = $res. ' <span>IP : '.$row["ip"].' </span>';
        $res = $res. ' <b><p class="small mb-0">'.$row["msg"].'</p></b>';      
        $res = $res. ' <span class="text-end">Date : '.$row["stime"].' </span></div>
        </div>';
    }
}
echo $res;

?>


