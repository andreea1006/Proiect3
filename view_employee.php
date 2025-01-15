<?php 
   
   include '../components/connect.php';

   if (isset($_COOKIE['admin_id'])) {
      $admin_id = $_COOKIE['admin_id'];
   }else{
      $admin_id = '';
      header('location:login.php');
   }

   if (isset($_POST['delete'])) {
      $employee_id = $_POST['employee_id'];
      $employee_id = filter_var($employee_id, FILTER_SANITIZE_STRING);

      $delete_employee = $conn->prepare("DELETE FROM `employee` WHERE id = ?");
      $delete_employee->execute([$employee_id]);

      $success_msg[] = 'employee delete successfully';
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

      <section class="show-container">
         <div class="heading">
            <h1><img src="../image/separator.png">your services <img src="../image/separator.png"></h1>
         </div>
         <div class="box-container">
            <?php 
               $select_employee = $conn->prepare("SELECT * FROM `employee`");
               $select_employee->execute();

               if ($select_employee->rowCount() > 0) {
                  while ($fetch_employee = $select_employee->fetch(PDO::FETCH_ASSOC)) {
                     
                  
            ?>
            <div class="box">
               <form action="" method="post" class="box">
                  <input type="hidden" name="employee_id" value="<?= $fetch_employee['id']; ?>">
                  <?php if ($fetch_employee['profile'] != '') { ?>
                     <img src="../uploaded_files/<?= $fetch_employee['profile']; ?>" class="image">
                  <?php } ?>
                  <div class="status" style="color: <?php if($fetch_employee['status']=='active'){echo "limegreen";}else{echo "red";} ?>;"><?= $fetch_employee['status']; ?></div>
                  
                  <div class="content">
                     <div class="title"><?= $fetch_employee['name']; ?></div>
                     <h2>profession <span><?= $fetch_employee['profession']; ?></span></h2>
                     <div class="flex-btn">
                        <a href="edit_employee.php?id=<?= $fetch_employee['id']; ?>" class="btn">edit</a>
                        <button type="submit" name="delete" class="btn" onclick="confirm('delete this employee');">delete</button>
                        <a href="read_employee.php?post_id=<?= $fetch_employee['id']; ?>" class="btn">read</a>
                     </div>
                  </div>
               </form>
            </div>
            <?php 
                  }
               }else{
                  echo '
                     <div class="empty">
                        <p>no employee added yet ! <br> <a href="add_employee.php" class="btn" style="margin-top: 1rem;">add employee</a></p>
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