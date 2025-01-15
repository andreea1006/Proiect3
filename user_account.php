<?php 
   
   include '../components/connect.php';

   if (isset($_COOKIE['admin_id'])) {
      $admin_id = $_COOKIE['admin_id'];
   }else{
      $admin_id = '';
      header('location:login.php');
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
   <link rel="stylesheet" type="text/css" href="../css/admin_style.css?v=<?php echo "time"; ?>">

</head>
<body style="padding-left: 0;">

   <div class="main-container">
      <?php include '../components/admin_header.php'; ?>

      <section class="accounts">
         <div class="heading">
            <h1><img src="../image/separator.png">registered user's <img src="../image/separator.png"></h1>
         </div>
         <div class="box-container">
            <?php 
               $select_users = $conn->prepare("SELECT * FROM `users`");
               $select_users->execute();

               if ($select_users->rowCount() > 0) {
                  while($fetch_users = $select_users->fetch(PDO::FETCH_ASSOC)){
                     $user_id = $fetch_users['id'];


            ?>
            <div class="box">
               <img src="../uploaded_files/<?= $fetch_users['image']; ?>">
               <p>user id : <span><?= $user_id; ?></span></p>
               <p>user name : <span><?= $fetch_users['name']; ?></span></p>
               <p>user email : <span><?= $fetch_users['email']; ?></span></p>
               
            </div>
            <?php 
                  }
               }else{
                  echo '
                     <div class="empty">
                        <p>no user registered yet !</p>
                     </div>
                  ';
               }
            ?>
         </div>
      </section>
   </div>


   <!-- sweetalert cdn link  -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

   <!-- custom js link  -->
   <script type="text/javascript" src="../js/admin_script.js"></script>

   <?php include '../components/alert.php'; ?>
   
</body>
</html>