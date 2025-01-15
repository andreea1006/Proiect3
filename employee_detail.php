<?php 
   
   include 'components/connect.php';

   if (isset($_COOKIE['user_id'])) {
      $user_id = $_COOKIE['user_id'];
   }else{
      $user_id = '';
      
   }

   $get_id = $_GET['get_id'];
   
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
         <h1>employee details</h1>
         <p>Our skilled and compassionate staff is here to provide the highest quality care and make your visit as comfortable as possible.</p>
            <span><a href="home.php">home</a><i class="bx bx-right-arrow-alt"></i>employee details</span>

      </div>
   </div>

   <div class="view_container">
      <div class="heading">
         <h1>our best dental team</h1>
         <p>Bringing Confidence Through Exceptional Dentistry</p>
      </div>

      <?php 
         if (isset($_GET['get_id'])) {
            $get_id = $_GET['get_id'];
            $select_employee = $conn->prepare("SELECT * FROM `employee` WHERE id = '$get_id'");
            $select_employee->execute();

            if ($select_employee->rowCount() > 0) {
               while($fetch_employee = $select_employee->fetch(PDO::FETCH_ASSOC)){


      ?>
      <form action="" method="post" class="box">
         <div class="img-box">
            <img src="uploaded_files/<?= $fetch_employee['profile']; ?>">
            <img src="image/employee/signature-v.svg" class="sign">
         </div>
         <div class="detail">
            <div class="name"><?= $fetch_employee['name']; ?></div>
            <p class="info">profession : <span><?= $fetch_employee['profession']; ?></span></p>
            <p class="info">phone number : <span><?= $fetch_employee['number']; ?></span></p>
            <p class="info">email address : <span><?= $fetch_employee['email']; ?></span></p>
            <p class="employee_detail"><?= $fetch_employee['profile_dec']; ?></p>

            <input type="hidden" name="employee_id" value="<?= $fetch_employee['id']; ?>">
            <div class="flex-btn">
               <a href="team.php?get_id=<?= $fetch_employee['id']; ?>" class="btn" style="width: 100%;">go back</a>
            </div>
         </div>
      </form>
      <?php 
               }
            }
         }else{
               echo '
                  <div class="empty">
                     <p>no employee added yet !</p>
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