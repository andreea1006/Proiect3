<?php 
   
   include 'components/connect.php';

   if (isset($_COOKIE['user_id'])) {
      $user_id = $_COOKIE['user_id'];
   }else{
      $user_id = '';
      
   }

   if (isset($_POST['login'])) {
      
      $email = $_POST['email'];
      $email = filter_var($email, FILTER_SANITIZE_STRING);

      $pass = sha1($_POST['pass']);
      $pass = filter_var($pass, FILTER_SANITIZE_STRING);

      $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
      $select_users->execute([$email, $pass]);
      $row = $select_users->fetch(PdO::FETCH_ASSOC);

      if ($select_users->rowCount() > 0) {
         setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
         header('location:home.php');
      }else{
         $warning_msg[] = 'incorrect email or password';
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
         <h1>login now</h1>
         <p>Access your account securely—log in now to manage your appointments, view your dental records, and stay updated on your oral health journey.</p>
            <span><a href="home.php">home</a><i class="bx bx-right-arrow-alt"></i>login now</span>
      </div>
   </div>

   
   <!-- register section starts  -->

   <div class="form-container form">
      <form action="" method="post" enctype="multipart/form-data" class="login">
         <h3>login now</h3>
         
         <div class="input-field">
            <p>your email <span>*</span></p>
               <input type="email" name="email" placeholder="enter your email" maxlength="50" required class="box">
         </div>
         
         <div class="input-field">
            <p>your password <span>*</span></p>
               <input type="password" name="pass" placeholder="enter your password" maxlength="50" required class="box">
         </div> 

         <p class="link">do not have an account <a href="register.php">register now</a></p>
         <button type="submit" name="login" class="btn">login now</button>
      </form>
   </div>


   <!-- registe section ends -->


   <?php include 'components/user_footer.php'; ?>
   <!-- sweetalert cdn link  -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

   <!-- custom js link  -->
   <script type="text/javascript" src="js/user_script.js"></script>

   <?php include 'components/alert.php'; ?>
   
</body>
</html>