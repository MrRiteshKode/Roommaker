<?php  

$err_name = "";
$err_email = "";
$err_subject = "";
$err_message = "";

// // Getting the value of post params
if($_SERVER['REQUEST_METHOD']== "POST"){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $name = str_replace("<", "&lt;", $name);
  $name = str_replace(">", "&gt;", $name);
  $email = str_replace("<", "&lt;", $email);
  $email = str_replace(">", "&gt;", $email);
  $subject = str_replace("<", "&lt;", $subject);
  $subject = str_replace(">", "&gt;", $subject);
  $message = str_replace("<", "&lt;", $message);
  $message = str_replace(">", "&gt;", $message);

  // validation

  if(empty($name)){
      $err_name = "* Please enter name";
  }
  else if(empty($email)){
      $err_email = "* Please enter email";
  }
  else if(empty($subject)){
      $err_subject = "* Please enter subject";
  }
  else if(empty($message)){
      $err_message = "* Please enter message";
  }
  else if (strlen($name)>30){
      $err_name = "* Please enter less than 30 characters";
  }
  else if (strlen($email)>40){
      $err_email = "* Please enter less than 40 characters";
  }
  else if (strlen($subject)>40){
      $err_email = "* Please enter less than 40 characters";
  }
  else if (strlen($message)>100){
      $err_email = "* Please enter less than 100 characters";
  }
  else{
   include 'db_connect.php';
   $sql = "INSERT INTO `contact` (`name`, `email`, `subject`, `msgs`) VALUES ('$name', '$email', '$subject', '$message');";
   $result = mysqli_query($conn, $sql);
   echo '<script>window.location="http://localhost/php/Room";</script>';
}

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
    a matter of hours to help you.">
    <meta name="author" content="Ritesh Kumar">
    <meta name="keywords" content="roomsmaker,contact us, contact page, room, chat, video chat, discuss, anonymous chatting, private chat room, public chat room">
    <link rel="icon" type="image/x-icon" href="media/home.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <title>Contact Us</title>
</head>
<link rel="stylesheet" type="text/css" href="css/index.css">
<style type="text/css">
   
  .bg-info{
     position: relative;
     top: -26px;
     height: 2.5rem;     
 }
 /*767*/
 @media only screen and (max-width: 767px){
     .email{
       
        padding-top: 1.5rem;
    }
}
.cont{
    margin-top: 4rem;
}

</style>
<body>
    <?php include 'partials/header.php'; ?>

    <center>

       <!--Section: Contact v.2-->
       <section class="mb-4 contact ">

        <!--Section heading-->
        <h2 class="cont h1-responsive font-weight-bold text-center bg-info">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="32" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
              <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
          </svg>
      Contact us</h2>
      <!--Section description-->
      <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
      a matter of hours to help you.</p>

      <div class="row">
       <center>
        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                        	<label for="name" class="name">Your name</label>
                            <input placeholder="Name" type="text" id="name" name="name" class="form-control">
                            <span style="color:red;"><?php echo $err_name;?></span>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6 e-mail">
                        <div class="md-form mb-0">
                          <label for="email" class="email">Your email</label>
                          <input placeholder="Email" type="text" id="email" name="email" class="form-control">
                          <span style="color:red;"><?php echo $err_email;?></span>
                      </div>
                  </div>
                  <!--Grid column-->

              </div>
              <!--Grid row-->

              <!--Grid row-->
              <div class="row my-4">
                <div class="col-md-12">
                    <div class="md-form mb-0">
                       <label for="subject" class="">Subject</label>
                       <input placeholder="Subject" type="text" id="subject" name="subject" class="form-control">
                       <span style="color:red;"><?php echo $err_subject;?></span>
                   </div>
               </div>
           </div>
           <!--Grid row-->

           <!--Grid row-->
           <div class="row my-4">

            <!--Grid column-->
            <div class="col-md-12">

                <div class="md-form">
                   <label for="message">Your message</label>
                   <textarea placeholder="message" type="text" id="message" name="message" rows="5" class="form-control md-textarea"></textarea>
                   <span style="color:red";><?php echo $err_message;?></span>
               </div>

           </div>
       </div>
       <!--Grid row-->
       <!-- <div class="btn btn-primary" type="submit" name="submit">Submit</div> -->

   </form>

   <div class="text-center text-md-left">
    <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
</div>

            <!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
            <script type="text/javascript">
            	$('#contact-form').submit(function(e){
            		e.preventDefault();
            	})
            </script> -->
            
            <div class="status"></div>
        </div>
    </center>
    <!--Grid column-->  
</div>
</section>
<!--Section: Contact v.2-->
</center>

<?php include 'partials/footer.php'; ?>
</body>
</html>

