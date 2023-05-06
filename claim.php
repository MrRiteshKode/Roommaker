<?php

// Getting the value of post params
$room = $_POST['room'];
$room_val = $_POST['room'];
$state = $_POST['state'];
$con_type = $_POST['con_type'];
$room = str_replace("<", "&lt;", $room);
$room = str_replace(">", "&gt;", $room);
$room = str_replace("'", "&lsquo;", $room);

// checking for string size
if(strlen($room)>20 or strlen($room)<2)
{
	$message = "Please choose a name between 2 to 20 characters";
	echo '<script language="javascript">';
	echo 'alert("'.$message.'");';
	echo 'window.location="http://localhost/php/Room";';
	echo '</script>';
}

// checkinh whether room name is aplanumeric
else if(!ctype_alnum($room))
{
	$message = "Please choose alphanumeric characters";
	echo '<script language="javascript">';
	echo 'alert("'.$message.'");';
	echo 'window.location="http://localhost/php/Room";';
	echo '</script>';
}

// else if(strval($state)!= "PUBLIC" or strval($state)!= "PRIVATE"){
// 	echo '<script language="javascript">';
// 	echo 'window.location="http://localhost/php/Room";';
// 	echo '</script>';
// }

// else if(strval($con_type)!= "CHAT" or strval($con_type)!= "VIDEO"){
// 	echo '<script language="javascript">';
// 	echo 'window.location="http://localhost/php/Room";';
// 	echo '</script>';
// }


else
{
	// Connecting to db
	include 'db_connect.php';
}


// check if room already exists

$sql = "SELECT * FROM `rooms` WHERE room_text='$room_val'";
$result = mysqli_query($conn, $sql);
if($result)
{
	if(mysqli_num_rows($result)>0){
		$message = "Please choose other name , this room is already in use";
		echo '<script language="javascript">';
		echo 'alert("'.$message.'");';
		echo 'window.location="http://localhost/php/Room";';
		echo '</script>';
	}

	if(strval($state)== "PRIVATE"){
		$room = sha1($room);
	}
	if(strval($con_type)=="CHAT"){
		$chat = "http://localhost/php/Room/rooms.php?roomname=$room";
	}
	else{
		$chat = "http://localhost/php/Room/video_room.php?roomname=$room"; 
	}
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		
		<script type="text/javascript">
			let state = localStorage.getItem("state");
			if (state == null) {
				stateObj = [];
			} else {
				stateObj = JSON.parse(state);
			}
			
			let myState = {
				name: '<?php echo "$room_val"  ?>',
				my_state: '<?php echo "$state"  ?>',
				con_type: '<?php echo "$con_type"  ?>',
				url: '<?php echo $chat ?>',
				date: '<?php echo date("Y-m-d") ?>'
			}
			stateObj.push(myState);
			localStorage.setItem("state", JSON.stringify(stateObj));
			
		</script>

	</body>
	</html>
	<?php
	
	$sql = "INSERT INTO `rooms` (`roomname`,`state`, `contype`,`url`,`room_text`,`stime`) VALUES ('$room', '$state', '$con_type','$chat','$room_val',now());";
	if(mysqli_query($conn, $sql)){
		$message = "Room is ready and you can do now!";
		if(strval($con_type)== "CHAT"){
			echo '<script language="javascript">';
			echo 'alert("'.$message.'");';
			echo 'window.location="http://localhost/php/Room/rooms.php?roomname=' .$room. '";';
			echo '</script>';
		}
		else{
			echo '<script language="javascript">';
			echo 'alert("'.$message.'");';
			echo 'window.location="http://localhost/php/Room/video_room.php?roomname=' .$room. '";';
			echo '</script>';
		}

	}
}
else{
	echo "error: ".mysqli_error($conn);
}
?>

