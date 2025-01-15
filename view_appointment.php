<?php 
   
   include 'components/connect.php';

   if (isset($_COOKIE['user_id'])) {
      $user_id = $_COOKIE['user_id'];
   }else{
      $user_id = '';
      header('location:login.php');
      
   }

   if (isset($_GET['get_id'])) {
      $get_id = $_GET['get_id'];
   }else{
      $get_id = '';
      header('location:book_appointment.php');
   }

   if (isset($_POST['canceled'])) {
      $update_appointment = $conn->prepare("UPDATE `appointments` SET status = ? WHERE id = ? LIMIT 1");
      $update_appointment->execute(['canceled', $get_id]);
      header('location:book_appointment.php');
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
         <h1>appointment details</h1>
         <p>Review your appointment details to stay informed about your upcoming visits, including the date, time, and services scheduled. We're here to make your experience smooth and convenient!</p>
            <span><a href="home.php">home</a><i class="bx bx-right-arrow-alt"></i>appointment details</span>
      </div>
   </div>

   
   <!-- booked appointments section starts  -->
   <div class="appointment-detail">
      <div class="heading">
         <h1>appointment details</h1>
      </div>
      <div class="container">
         <?php 
            $grand_total = 0;

            $select_appointment = $conn->prepare("SELECT * FROM `appointments` WHERE id = ? LIMIT 1");
            $select_appointment->execute([$get_id]);

            if ($select_appointment->rowCount() > 0) {
               while($fetch_appointment = $select_appointment->fetch(PDO::FETCH_ASSOC)){
                  $select_service = $conn->prepare("SELECT * FROM `services` WHERE id = ? LIMIT 1");
                  $select_service->execute([$fetch_appointment['service_id']]);

                  if ($select_service->rowCount() > 0) {
                     while($fetch_service = $select_service->fetch(PDO::FETCH_ASSOC)){
                        $sub_total = $fetch_appointment['price'];
                        $grand_total+= $sub_total;
                   
         ?>
         <div class="box">
            <div class="col">
               <img src="uploaded_files/<?= $fetch_service['image']; ?>" class="image">

               <p class="date"><i class="bx bxs-calendar-alt"></i><span><?= $fetch_appointment['date']; ?></span></p>
               <div class="detail">
                  <h3 class="name"><?= $fetch_service['name']; ?></h3>
                  <p class="grand-total">total amount paid : <span>$<?= $grand_total; ?></span>/-</p>
               </div>
            </div>
            <div class="col">
               <?php 
                  $select_employee = $conn->prepare("SELECT * FROM `employee` WHERE id = ? LIMIT 1");
                  $select_employee->execute([$fetch_appointment['employee_id']]);

                  if ($select_employee->rowCount() > 0) {
                     while($fetch_employee = $select_employee->fetch(PDO::FETCH_ASSOC)){


               ?>
               <p class="title">employee name</p>
               <div class="employee_detail">
                  <img src="uploaded_files/<?= $fetch_employee['profile']; ?>" class="employee">
                  <div>
                     <p><?= $fetch_employee['name']; ?></p>
                     <p><?= $fetch_employee['profession']; ?></p>
                  </div>
               </div>
               <?php 
                     }
                  }
               ?>
               <p class="title">customer details</p>
               <p class="user"><i class="bx bxs-user-rectangle"></i><?= $fetch_appointment['name']; ?></p>
               <p class="user"><i class="bx bxs-phone-outgoing"></i><?= $fetch_appointment['number']; ?></p>
               <p class="user"><i class="bx bxs-envelope"></i><?= $fetch_appointment['email']; ?></p>
               <p class="user"><i class="bx bxs-calendar-alt"></i><?= $fetch_appointment['date']; ?></p>
               <p class="user"><i class="bx bxs-user-rectangle"></i><?= $fetch_appointment['time']; ?></p>
               <p class="title">appointment status</p>
               <p class="status" style="color:<?php if($fetch_appointment['status'] == 'booked'){echo "green";}elseif($fetch_appointment['status'] == 'canceled'){echo "red";}else{echo "orange";} ?>"><?= $fetch_appointment['status']; ?></p>

               <?php if($fetch_appointment['status'] == 'canceled'){ ?>
                  <a href="appointment.php?get_id=<?= $fetch_service['id']; ?>" class="btn">book appointment again</a>
               <?php }else{ ?>
                  <form action="" method="post">
                     <button type="submit" name="canceled" class="btn" onclick="return confirm('do you want to canceled this appointment');">canceled this appointment</button>
                  </form>
               <?php } ?>
            </div>
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