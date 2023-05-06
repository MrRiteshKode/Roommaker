    <?php 

    if(empty($_GET['roomname'])){
        header("Location: http://localhost/php/Room/");
    }
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
        <title>Video Room - <?php echo $row["room_text"];?></title>
    </head>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <style type="text/css">

    </style>
    <body>
        <?php include 'partials/header.php'; ?> 

        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Please wait loading!</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      <div>
        <center>
            <button class="btn btn-primary" title="Copy Url" id="url" onclick="copyBoard(this)" class="btn">Copy&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
              <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
              <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
          </svg></button>

          <button class="btn btn-outline-dark" title="Exit Room" onclick="Exit()" class="btn">Exit&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="25" height="26" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
              <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
          </svg></button>
      </center>
  </div>

  <center><iframe allow="camera;microphone" height="700" width="100%" allowfullscreen style="border:3px solid black" class="my-3 iframe" id="meet"
    src="https://meet.jit.si/<?php echo $roomname;?>">WAIT A MOMENT!!!!</iframe></center>

    <script>
        function copyBoard(elem){
            var link = document.location.href;
            navigator.clipboard.writeText(link); 
            elem.innerHTML = "Copied";
            setTimeout(function(){
                elem.innerHTML = `Copy&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                </svg>`;
            },1500);
        }

        // let myIframe = document.getElementById("meet");
        // // let iframeWindow = myIframe.contentWindow;
        // let iframeDocument = myIframe.contentDocumnet;
        // console.log("HELO "iframeDocument)
        // setInterval(clickLaunch, 500);  
        // clickLaunch()
        function clickLaunch(){
            let a = document.getElementsByClassName("deep-linking-mobile__button_primary").click();
            // console.log(a)
            // let myIframe = document.getElementById("meet");
            // let myIdframe= myIframe.contentDocument;
            // console.log(myIdframe);
            // let iframeId = myIdframe.querySelector(".deep-linking-mobile__button");
            // console.log(iframeId);

        }
        // deep-linking-mobile__button
    </script>


    <!-- <script src='https://meet.jit.si/external_api.js'></script>
    <script>
    const domain = 'meet.jit.si';
    const options = {
        roomName: '',
        width: 700,
        height: 700,
        parentNode: document.querySelector('#meet')
    };
    const api = new JitsiMeetExternalAPI(domain, options);
</script> -->


<?php include 'partials/footer.php'; ?>
</body>
</html>


