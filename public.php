<?php 
include 'db_connect.php';
$sql = "SELECT * FROM `rooms` WHERE state='PUBLIC'";
$result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="You can join public rooms (video or chat) and start chatting or discussion with other peoples.">
    <meta name="author" content="Ritesh Kumar">
    <meta name="keywords" content="roomsmaker,room, chat, video chat, discuss, anonymous chatting, private chat room, public chat room">
    <link rel="icon" type="image/x-icon" href="media/home.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <title>Public rooms - join now</title>
</head>
<link rel="stylesheet" type="text/css" href="css/index.css">
<style type="text/css">
   
  .public{
    /*height: 26rem;*/
    /*overflow: auto;*/
    /*border: 2px solid black;*/
    position: relative;
    left: 0.7rem;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}


</style>
<body>
    <?php include 'partials/header.php'; ?>

    <h1></h1>
    <div class='row container-fluid public my-5' >
        <?php 
        if(mysqli_num_rows($result) == 0){
            echo '
            <svg xmlns="http://www.w3.org/2000/svg" width="350" height="340" fill="currentColor" class="bi bi-handbag" viewBox="0 0 16 16">
            <path d="M8 1a2 2 0 0 1 2 2v2H6V3a2 2 0 0 1 2-2zm3 4V3a3 3 0 1 0-6 0v2H3.36a1.5 1.5 0 0 0-1.483 1.277L.85 13.13A2.5 2.5 0 0 0 3.322 16h9.355a2.5 2.5 0 0 0 2.473-2.87l-1.028-6.853A1.5 1.5 0 0 0 12.64 5H11zm-1 1v1.5a.5.5 0 0 0 1 0V6h1.639a.5.5 0 0 1 .494.426l1.028 6.851A1.5 1.5 0 0 1 12.678 15H3.322a1.5 1.5 0 0 1-1.483-1.723l1.028-6.851A.5.5 0 0 1 3.36 6H5v1.5a.5.5 0 1 0 1 0V6h4z"/>
            </svg>
            <div class="text-center my-3"><h1>Nothing to show ! Use "Create room" button to add rooms.</h1>
            
            </div>

            ';
        }
        else{
            while($row = mysqli_fetch_assoc($result)){
                echo '
                <div  class="stateCard mx-2 my-3 my-3 card" style="width: 18rem;">
                <div  class="card-body">
                <h5 class="card-title my-2"><span id="roomname">'.$row["roomname"].'</span>&nbsp; &nbsp; <span id="contype" class="bg-secondary text-white rounded-pill"> '.$row["contype"].'</span></h5>
                <p class="card-text my-2"> Date created: '.substr($row["stime"], 0,11).'</p>
                
                <a id="join" href="'.$row["url"].'" class="btn btn-primary mr-3">&nbsp;&nbsp;Join&nbsp;&nbsp; </a>
                <button title="'.$row["url"].'" id="url" onclick="clipboard_pub(this)" class="btn">Copy&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                </svg></button>
                </div>
                </div>
                ';
            }
        }

        ?>

        <script type="text/javascript">

            function clipboard_pub(elem){
                let url = elem.title;
                navigator.clipboard.writeText(url);
                elem.innerHTML = "Copied";
                setTimeout(function(){
                    elem.innerHTML = `Copy&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                    </svg>`;
                },1500);

            }

        </script>




    </div>

    <?php include 'partials/footer.php'; ?>
</body>
</html>
