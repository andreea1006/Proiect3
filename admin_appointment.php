<?php 
   
   include '../components/connect.php';

   if (isset($_COOKIE['admin_id'])) {
      $admin_id = $_COOKIE['admin_id'];
   }else{
      $admin_id = '';
      header('location:login.php');
   }

    if (isset($_POST['delete'])) {
         $delete_id = $_POST['delete_id'];
         $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

         $verify_delete = $conn->prepare("SELECT * FROM `appointments` WHERE id = ?");
         $verify_delete->execute([$delete_id]);

         if ($verify_delete->rowCount() > 0) {
            $delete_appointment = $conn->prepare("DELETE FROM `appointments` WHERE id = ?");
            $delete_appointment->execute([$delete_id]);

            $success_msg[] = 'appointment_id deleted successfully';
         }else{
            $warning_msg[] = 'appointment_id already deleted';
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
   <link rel="stylesheet" type="text/css" href="../css/admin_style.css?v=<?php echo "time"; ?>">

</head>
<body style="padding-left: 0;">

   <div class="main-container">
      <?php include '../components/admin_header.php'; ?>

      <section class="appointment-container">
         <div class="heading">
            <h1><img src="../image/separator.png">total booked appointment <img src="../image/separator.png"></h1>
         </div>
         <div class="box-container">
            <?php 
               $select_appointment = $conn->prepare("SELECT * FROM `appointments`");
               $select_appointment->execute();

               if ($select_appointment->rowCount() > 0) {
                  while($fetch_appointment = $select_appointment->fetch(PDO::FETCH_ASSOC)){


            ?>
            <div class="box">
               <div class="status" style="color:<?php if($fetch_appointment['status']=='in progress'){echo "limegreen";}else{echo "red";} ?>"><?= $fetch_appointment['status']; ?></div>
               <div class="detail">
                  <p>user name : <span><?= $fetch_appointment['name']; ?></span></p>
                  <p>user id : <span><?= $fetch_appointment['user_id']; ?></span></p>
                  <p>placed on : <span><?= $fetch_appointment['date']; ?></span></p>
                  <p>number : <span><?= $fetch_appointment['number']; ?></span></p>
                  <p>email : <span><?= $fetch_appointment['email']; ?></span></p>
                  <p>time : <span><?= $fetch_appointment['time']; ?></span></p>
                  <p>total price : <span><?= $fetch_appointment['price']; ?></span></p>
                  <p>appointment status: <span><?= $fetch_appointment['status']; ?></span></p>

                  <?php 
                     $select_employee = $conn->prepare("SELECT * FROM `employee` WHERE id = ? LIMIT 1");
                     $select_employee->execute([$fetch_appointment['employee_id']]);
                     if ($select_appointment->rowCount() > 0) {
                        while($fetch_employee = $select_employee->fetch(PDO::FETCH_ASSOC)){


                  ?>
                  <div class="employee">
                     <p class="title">selected employee : <span><?= $fetch_employee['name']; ?></span></p>
                     <img src="../uploaded_files/<?= $fetch_employee['profile']; ?>">
                  </div>
                  <?php 
                        }
                     }
                  ?>
                  <?php 
                     $select_service = $conn->prepare("SELECT * FROM `services` WHERE id = ? LIMIT 1");
                     $select_service->execute([$fetch_appointment['service_id']]);

                     if ($select_service->rowCount() > 0) {
                        while($fetch_service = $select_service->fetch(PDO::FETCH_ASSOC)){


                  ?>
                  <div class="employee">
                     <p class="title">selected service : <span><?= $fetch_service['name']; ?></span></p>
                     
                  </div>
                  <?php 
                        }
                     }
                  ?>

               </div>
               <form action="" method="post">
                  <input type="hidden" name="delete_id" value="<?= $fetch_appointment['id']; ?>">
                  <button type="submit" name="delete" class="btn" onclick="return confirm('delete this appointment');">delete appointment</button>
               </form>
            </div>
            <?php 
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
      </section>
   </div>


   <!-- sweetalert cdn link  -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

   <!-- custom js link  -->
   <script type="text/javascript" src="../js/admin_script.js"></script>

   <?php include '../components/alert.php'; ?>
   
</body>
</html>