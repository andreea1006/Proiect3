<?php 
   
   include 'components/connect.php';

   if (isset($_COOKIE['user_id'])) {
      $user_id = $_COOKIE['user_id'];
   }else{
      $user_id = '';
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
   <link rel="stylesheet" type="text/css" href="css/user_style.css?v=<?php echo "time"; ?>">

</head>
<body>

   <?php include 'components/user_header.php'; ?>

   <div class="banner">
      <div class="detail">
         <h1>booked appointments</h1>
         <p>Your appointments are booked! We look forward to providing you with exceptional care and ensuring your smile stays healthy and radiant.</p>
            <span><a href="home.php">home</a><i class="bx bx-right-arrow-alt"></i>booked appointments</span>
      </div>
   </div>

   
   <!-- booked appointments section starts  -->
   <div class="appointments">
      <div class="heading">
         <h1>booked appointments</h1>
      </div>
      <div class="box-container">
         <?php 
            $select_appointments = $conn->prepare("SELECT * FROM `appointments` WHERE user_id = ?");
            $select_appointments->execute([$user_id]);

            if ($select_appointments->rowCount() > 0) {
               while($fetch_appointments = $select_appointments->fetch(PDO::FETCH_ASSOC)){
                  $service_id = $fetch_appointments['service_id'];
                  $select_service = $conn->prepare("SELECT * FROM `services` WHERE id = ?");
                  $select_service->execute([$fetch_appointments['service_id']]);

                  if ($select_service->rowCount() > 0) {
                     while($fetch_service = $select_service->fetch(PDO::FETCH_ASSOC)){


         ?>
         <div class="box">
            <a href="view_appointment.php?get_id=<?= $fetch_appointments['id']; ?>">
               <img src="uploaded_files/<?= $fetch_service['image']; ?>" class="image">
               <div class="content">
                  <p class="date"><i class="bx bxs-calendar-alt"></i><span><?= $fetch_appointments['date']; ?></span></p>
                  <div class="row">
                     <h3 class="name"><?= $fetch_service['name']; ?></h3>
                     <p class="price">$<?= $fetch_service['price']; ?>/-</p>
                     <p class="status" style="color:<?php if($fetch_appointments['status']=='booked'){echo "green";}else{echo "red";} ?>"><?= $fetch_appointments['status']; ?></p>
                  </div>
               </div>
            </a>
         </div>
         <?php 
                     }
                  }
               }
            }else{
               echo '
                  <div class="empty">
                     <p>no appointment booked yet !</p>
                  </div>
            ';
            }
         ?>
      </div>
   </div>
   


   <!-- booked appointments section ends -->


   <?php include 'components/user_footer.php'; ?>
   <!-- sweetalert cdn link  -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

   <!-- custom js link  -->
   <script type="text/javascript" src="js/user_script.js"></script>

   <?php include 'components/alert.php'; ?>
   
</body>
</html>