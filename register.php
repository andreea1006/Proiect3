<?php 
   
   include 'components/connect.php';

   if (isset($_COOKIE['user_id'])) {
      $user_id = $_COOKIE['user_id'];
   }else{
      $user_id = '';
      
   }

   if (isset($_POST['register'])) {
      
      $id = unique_id();

      $name = $_POST['name'];
      $name = filter_var($name, FILTER_SANITIZE_STRING);

      $email = $_POST['email'];
      $email = filter_var($email, FILTER_SANITIZE_STRING);

      $pass = sha1($_POST['pass']);
      $pass = filter_var($pass, FILTER_SANITIZE_STRING);

      $cpass = sha1($_POST['cpass']);
      $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

      $image = $_FILES['image']['name'];
      $image = filter_var($image, FILTER_SANITIZE_STRING);
      $ext = pathinfo($image, PATHINFO_EXTENSION);
      $rename = unique_id().'.'.$ext;
      $image_size = $_FILES['image']['size'];
      $image_tmp_name = $_FILES['image']['tmp_name'];
      $image_folder = 'uploaded_files/'.$rename;

      $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
      $select_users->execute([$email]);

      if ($select_users->rowCount() > 0) {
         $warning_msg[] = 'email already taken!';
      }else{
         if ($pass != $cpass) {
            $warning_msg[] = 'confirm password not matched';
         }else{
            $insert_users = $conn->prepare("INSERT INTO `users`(id, name, email, password, image) VALUES(?,?,?,?,?)");
            $insert_users->execute([$id, $name, $email, $cpass, $rename]);

            move_uploaded_file($image_tmp_name, $image_folder);

            $success_msg[] = 'new admin registered! please login now';
         }
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
         <h1>register now</h1>
         <p>Join us today—register now to access expert dental care, book appointments with ease, and enjoy a healthier, brighter smile!</p>
            <span><a href="home.php">home</a><i class="bx bx-right-arrow-alt"></i>register now</span>
      </div>
   </div>

   
   <!-- register section starts  -->

   <div class="form-container form">
      <form action="" method="post" enctype="multipart/form-data" class="register">
         <h3>register now</h3>
         <div class="flex">
            <div class="col">
               <p>your name <span>*</span></p>
               <input type="text" name="name" placeholder="enter your name" maxlength="50" required class="box">
               <p>your email <span>*</span></p>
               <input type="email" name="email" placeholder="enter your email" maxlength="50" required class="box">
            </div>

            <div class="col">
               <p>your password <span>*</span></p>
               <input type="password" name="pass" placeholder="enter your password" maxlength="50" required class="box">
               <p>confirm password <span>*</span></p>
               <input type="password" name="cpass" placeholder="confirm your password" maxlength="50" required class="box">
            </div>
         </div>
         <div class="input-field">
            <p>select profile <span>*</span></p>
            <input type="file" name="image" accept="image/*" required class="box">
         </div>
         <p class="link">already have an account <a href="login.php">login now</a></p>
         <button type="submit" name="register" class="btn">register now</button>
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