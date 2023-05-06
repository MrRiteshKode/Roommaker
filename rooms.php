<?php
// Get parameters
$roomname = $_GET['roomname'];

// connecting to db
include 'db_connect.php';

// excute sql to check room exits
$sql = "SELECT * FROM `rooms` WHERE roomname='$roomname'";
$result = mysqli_query($conn, $sql);
if($result)
{
	// Check if room exits
	if(mysqli_num_rows($result)==0)
	{
		$message = "This room does not exist. Try creating a new one";
		echo '<script language="javascript">';
		echo 'alert("'.$message.'");';
		echo 'window.location="http://localhost/php/Room";';
		echo '</script>';
	}
}
else
{
	echo "Error : ". mysqli_error($conn);
}

$sql = "SELECT * FROM `rooms` WHERE roomname='$roomname'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Ritesh Kumar">
	<meta name="keywords" content="roomsmaker,room, chat, video chat, discuss, anonymous chatting, private chat room, public chat room">
	<link rel="icon" type="image/x-icon" href="media/home.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<title>Room - <?php echo $row["room_text"]; ?></title>
</head>
<link rel="stylesheet" type="text/css" href="css/index.css">
<style type="text/css">
	a{
		text-decoration: none;
		color: grey;
	}
	*{
		padding: 0px;
		margin: 0px;
	}
	.anyClass{
		height: 28rem;
		overflow-y: auto;


	}
	a:hover{
		color: aliceblue;
	}
</style>
<body>
	<?php include 'partials/header.php'; ?>


	<section  class="position-sticky" style="background-color: #eee;">

		<div class="position-sticky container py-4">


			<div class="row d-flex justify-content-center">
				<div class="col-md-10 col-lg-6 col-xl-8">

					<div class="card" id="chat1" style="border-radius: 15px;">
						<div
						class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0"
						style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
						<i class="fas fa-angle-left"></i>
						<p class="mb-0 fw-bold">Room -  <?php echo $row["room_text"]; ?></p>
						<i class="fas fa-times"></i>

						<div>
							<button title="Copy link and share the link" onclick="clipboard(this)" id="clipboard" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
								<path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
								<path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
							</svg></button>

<!-- <button onclick="share()" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
  <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
</svg></button> -->
</div>


</div>
<div id="scroll" class="card-body anyClass">

	<!-- fill through post req -->
	
	
</div>
<div class="input-group mb-6">
	<input type="text" name="usermsg" id="usermsg" class="form-control" maxlength="5000" placeholder="Type your text" aria-label="Recipient's username" aria-describedby="button-addon2">
	<button class="btn btn-primary" type="button" name="sendmsg" id="sendmsg">
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-plus-fill" viewBox="0 0 16 16">
			<path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47L15.964.686Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
			<path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z"/>
		</svg>
	</button>
	<button class="btn btn-primary" type="button" id="down">
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16">
			<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
		</svg>
	</button>
</div>
</div>

</div>
</div>

</div>
</section>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script type="text/javascript">

	$("#down").click(function(){
		var a = document.getElementById("scroll");
		a.scrollTop=a.scrollHeight; 
	});

	window.onload = function(){
		setTimeout(function(){
			document.getElementById("down").click();
			
		},600);
	}

	// check for new messages every 1 seconds
	setInterval(runFunction, 500);
	function runFunction()
	{
		$.post("htcont.php", {room:'<?php echo $roomname?>'},
			function(data, status)
			{
				document.getElementsByClassName('anyClass')[0].innerHTML = data;
				// console.log("data: ", data);
				var entry = document.getElementById('usermsg');
				if(entry.value.length == 0){
					document.getElementById('sendmsg').disabled = true;
				}
				else{
					document.getElementById('sendmsg').disabled = false;
					
				}
			}

			)
	}


</script>

<script type="text/javascript">

// Get the input field
	var input = document.getElementById("usermsg");

// Execute a function when the user presses a key on the keyboard
	input.addEventListener("keypress", function(event) {
  // If the user presses the "Enter" key on the keyboard
		if (event.key === "Enter") {
    // Cancel the default action, if needed
			event.preventDefault();
    // Trigger the button element with a click
			document.getElementById("sendmsg").click();
		}
	});


	// if user submit the form
	$("#sendmsg").click(function(){
		
		setTimeout(function(){
			document.getElementById("down").click();

		},1050);

		name = JSON.parse(localStorage.getItem('Name'));
		if (name.length > 0){
			check = JSON.parse(localStorage.getItem('Name'));
		}
		else{
			check = "";
		}


		
		var clientmsg = $("#usermsg").val()
		$.post("postmsg.php", {text: clientmsg, room:'<?php echo $roomname ?>', ip: check+' <?php echo $_SERVER['REMOTE_ADDR'] ?>' },
			function(data, status){
				document.getElementsByClassName('anyClass')[0].innerHTML = data;
			});
		$("#usermsg").val("")
		return false;		
	});
	
</script>
<script type="text/javascript" src="js/index.js"></script>
<?php include 'partials/footer.php'; ?>
</body>
</html>

