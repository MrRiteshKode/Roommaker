<?php 

include 'del_rooms.php';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Make rooms (chat,video) and make it private or public to do chat, discuss or etc with strangers or relatives through sharing room link.">
  <meta name="author" content="Ritesh Kumar">
  <meta name="keywords" content="roomsmaker,room, chat, video chat, discuss, anonymous chatting, private chat room, public chat room">
  <title>Welcome To Roomsmaker </title>
  <link rel="icon" type="image/x-icon" href="media/home.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  
  <style type="text/css">
      /**{
        padding: 0px;
        margin: 0px;  
      }
      a{
        text-decoration: none;
        color: grey;
      }
      a:hover{
        color: aliceblue;
      }
      */

    /*991*/
    @media only screen and (max-width: 991px){
      .Room{
        position: relative;
        top: 1rem;
      }
    }
    .rooms{
     /* margin: auto;*/
   }
   
 </style>
 
</head>
<body>
  
  <?php include 'partials/header.php'; ?>

  <div class="position-relative overflow-hidden main p-20 text-center bg-light">
   <div class="col-md-6 p-lg-5 mx-auto  Room">
    <h2  id="welcome" class="display-4 fw-normal">Weclome !</h2>
    <p class="lead fw-normal">Here you can can create room where you can do chat, discuss or etc with strangers or relatives through sharing room link.</p>
    <script type="text/javascript">
      check = JSON.parse(localStorage.getItem('Name'));
      
      if (check.length >0) {
        document.getElementById('welcome').innerHTML = "<span class='bg-secondary text-white rounded-pill'>Welcome</span>&nbsp;"+check+"!";
      }
      
      else{
        document.getElementById('welcome').innerHTML = "<span class='bg-secondary text-white rounded-pill'>Welcome</span> !";
      }

    </script>
    <img src="media/meet_room.svg" height="230rem" width="400rem">
    <form action="claim.php" method="post">
      <div class="type">
        <input checked type="radio" value="CHAT" name="con_type"> Chat &nbsp; &nbsp; 
        <input type="radio" value="VIDEO" name="con_type"> Video
      </div>  
      <div class="input-group mb-3 my-2">
        <input type="text" name="room" id="room" class="form-control" maxlength="20" placeholder="Create Room" aria-label="Recipient's username" aria-describedby="button-addon2">

        <select style="background-color: floralwhite; border:2px solid blanchedalmond;" name="state">
          <option selected value="PUBLIC">PUBLIC</option>
          <option value="PRIVATE">PRIVATE</option>         
        </select>
        <!-- <button class="btn btn-primary">Create</button> -->
        <button class="btn btn-primary">Create</button>
        <br>
      </div>    

      
    </form>
  </div>   
  <div class="product-device shadow-sm d-none d-md-block"></div>
  <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>
</div>


<h1 class="text-center my-3">Your Rooms <button title="Delete your all rooms from only you localstorage" onclick="DeleteAll()" class="btn btn-light">Delete All</button></h1>

<hr>
<h6 class="text-center"><button onclick="reload()" class="btn btn-outline-dark"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
</svg></button>&nbsp; PAGE TO SHOW YOUR CREATED ROOM</h6>
<div id="rooms"   class="row container-fluid"> </div>
</div>


<script type="text/javascript">

</script>

<?php include 'partials/footer.php'; ?>
<script src="js/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
