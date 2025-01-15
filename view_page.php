<?php 
   
   include 'components/connect.php';

   if (isset($_COOKIE['user_id'])) {
      $user_id = $_COOKIE['user_id'];
   }else{
      $user_id = '';
      
   }

   $pid = $_GET['pid'];

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
         <h1>service details</h1>
         <p>Explore detailed information about our services, including preventative care, restorative treatments, cosmetic dentistry, and more. Each service is designed to cater to your unique dental needs with precision and care.</p>
            <span><a href="home.php">home</a><i class="bx bx-right-arrow-alt"></i>service details</span>
      </div>
   </div>

   <div class="view_container">
      <?php 

         if (isset($_GET['pid'])) {
            $pid = $_GET['pid'];
            $select_service = $conn->prepare("SELECT * FROM `services` WHERE id = '$pid'");
            $select_service->execute();

            if ($select_service->rowCount() > 0) {
               while($fetch_service = $select_service->fetch(PDO::FETCH_ASSOC)){


      ?>
      <form action="" method="post" class="box">
         <div class="img-box">
            <div class="heading">
               <h1><img src="image/separator.png">service details<img src="image/separator.png"></h1>
            </div>
            <img src="uploaded_files/<?= $fetch_service['image']; ?>">
         </div>
         <div class="detail">
            <p class="price">$<?= $fetch_service['price']; ?>/-</p>
            <div class="name"><?= $fetch_service['name']; ?></div>
            <p class="sevice-dtail"><?= $fetch_service['service_detail']; ?></p>
            <input type="hidden" name="service_id" value="<?= $fetch_service['id']; ?>">
            <div class="flex-btn">
               <a href="appointment.php?get_id=<?= $fetch_service['id']; ?>" class="btn" style="width: 100%;">book appointment now</a>
            </div>
         </div>
      </form>
      <?php 
               }
            }
         }else{
               echo '
                  <div class="empty">
                     <p>no services added yet !</p>
                  </div>
               ';
         }
      ?>
   </div>   










   <?php include 'components/user_footer.php'; ?>
   <!-- sweetalert cdn link  -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

   <!-- custom js link  -->
   <script type="text/javascript" src="js/user_script.js"></script>

   <?php include 'components/alert.php'; ?>
   
</body>
</html>