<?php 
   
   include 'components/connect.php';

   if (isset($_COOKIE['user_id'])) {
      $user_id = $_COOKIE['user_id'];
   }else{
      $user_id = '';
      
   }

    if (isset($_POST['send_msg'])) {
       
       if ($user_id != '') {
          
          $id = unique_id();

          $name = $_POST['name'];
          $name = filter_var($name, FILTER_SANITIZE_STRING);

          $email = $_POST['email'];
          $email = filter_var($email, FILTER_SANITIZE_STRING);

          $subject = $_POST['subject'];
          $subject = filter_var($subject, FILTER_SANITIZE_STRING);

          $message = $_POST['message'];
          $message = filter_var($message, FILTER_SANITIZE_STRING);

          $verify_message = $conn->prepare("SELECT * FROM `message` WHERE user_id = ? AND name = ? AND email = ? AND subject = ? AND message = ?");
          $verify_message->execute([$user_id, $name, $email, $subject, $message]);

          if ($verify_message->rowCount() > 0) {
             $warning_msg[] = 'message already send';
          }else{
            $insert_message = $conn->prepare("INSERT INTO `message`(id, user_id, name, email, subject, message) VALUES(?,?,?,?,?,?)");
            $insert_message->execute([$id, $user_id, $name, $email, $subject, $message]);
            $success_msg[] = 'message send';
          }
       }else{
         $warning_msg[] = 'please login first';
       }
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>DentiCare -  dental clinic website template</title>

   <!-- box icon cdn link  -->
   <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" type="text/css" href="css/user_style.css?v=<?php echo "time"; ?>">

</head>
<body>

   <?php include 'components/user_header.php'; ?>

   <div class="banner">
      <div class="detail">
         <h1>contact us</h1>
         <p>Have questions or need assistance? Contact us today—we’re here to help you achieve the best in dental care!</p>
            <span><a href="home.php">home</a><i class="bx bx-right-arrow-alt"></i>contact us</span>
      </div>
   </div>

   <div class="contact">
      <div class="heading">

         <h1>contact DentiCare</h1>
         <p>Get in touch with DentiCare for expert dental care and personalized solutions. We’re here to help you smile brighter!</p>
      </div>      
         <div class="box-container">
            <div class="box">
               <form action="" method="post" enctype="multipart/form-data">
                  <div class="input-field">
                     <p>Your name <span>*</span></p>
                     <input type="text" name="name" placeholder="enter your name" maxlength="50" required class="box">
                  </div>
                  <div class="input-field">
                     <p>Your email <span>*</span></p>
                     <input type="email" name="email" placeholder="enter your email" maxlength="50" required class="box">
                  </div>
                  <div class="input-field">
                     <p>subject <span>*</span></p>
                     <input type="text" name="subject" placeholder="enter your reason" maxlength="50" required class="box">
                  </div>
                  <div class="input-field">
                     <p>Your message <span>*</span></p>
                     <textarea name="message"class="box"></textarea>
                  </div>
                  <button type="submit" name="send_msg" class="btn">send message</button>
               </form>
            </div>
            <div class="box">
               <img src="image/doctor.png">
            </div>
         </div>
   </div>

   <div class="services">
      <div class="heading">
         <h1>our contact details</h1>
         <p>Reach out to us!</p>
      </div>
      <div class="box-container">
         <div class="box">
            <img src="image/contact-icon (3).png">
            <div>
               <h4>emergency call</h4>
               <p>1234567890</p>
               <p>1234567890</p>
            </div>
         </div>
         <div class="box">
            <img src="image/contact-icon (1).png">
            <div>
               <h4>address</h4>
                  <p>Coral Street <br>Bucharest, Romania, 33169</p>
            </div>
         </div>
         <div class="box">
            <img src="image/contact-icon (2).png">
            <div>
               <h4>email</h4>
               <p>cernatescuandreea40@gmail.com</p>
               <p>cernatescuandreea40@gmail.com</p>
            </div>
         </div>
      </div>
   </div>











   <?php include 'components/user_footer.php'; ?>
   <!-- sweetalert cdn link  -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

   <!-- custom js link  -->
   <script type="text/javascript" src="js/user_script.js"></script>

   <?php include 'components/alert.php'; ?>
   
</body>
</html>