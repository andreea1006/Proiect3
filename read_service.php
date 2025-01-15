<?php 
   
   include '../components/connect.php';

   if (isset($_COOKIE['admin_id'])) {
      $admin_id = $_COOKIE['admin_id'];
   }else{
      $admin_id = '';
      header('location:login.php');
   }

   $get_id = $_GET['post_id'];

   if (isset($_POST['delete'])) {
      $service_id = $_POST['service_id'];
      $service_id = filter_var($service_id, FILTER_SANITIZE_STRING);

      $delete_image = $conn->prepare("SELECT * FROM `services` WHERE id = ?");
      $delete_image->execute([$service_id]);
      $fetch_delete_image = $delete_image->fetch(PDO::FETCH_ASSOC);

      if ($fetch_delete_image[''] != '') {
         unlink('../uploaded_files/'.$fetch_delete_image['image']);
      }

      $delete_service = $conn->prepare("DELETE FROM `services` WHERE id = ?");
      $delete_service->execute([$service_id]);

      header('location:view_service.php');
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

      <section class="read-container">
         <div class="heading">
            <h1><img src="../image/separator.png">service detail <img src="../image/separator.png"></h1>
         </div>
         <div class="container">
            <?php 
               $select_service = $conn->prepare("SELECT * FROM `services` WHERE id = ?");
               $select_service->execute([$get_id]);

               if ($select_service->rowCount() > 0) {
                  while($fetch_service = $select_service->fetch(PDO::FETCH_ASSOC)){

            ?>
            <form action="" method="post" class="box">
               <input type="hidden" name="service_id" value="<?= $fetch_service['id']; ?>">
               <div class="status" style="color: <?php if($fetch_service['status']=='active'){echo "limegreen";}else{echo "red";} ?>;"><?= $fetch_service['status']; ?></div>
               <?php if ($fetch_service['image'] != '') { ?>
                  <img src="../uploaded_files/<?= $fetch_service['image']; ?>" class="image">
               <?php } ?>
               <p class="price">$<?= $fetch_service['price']; ?>/-</p>
               <div class="name"><?= $fetch_service['name']; ?></div>
               <div class="content"><?= $fetch_service['service_detail']; ?></div>
               <div class="flex-btn">
                  <a href="edit_service.php?id=<?= $fetch_service['id']; ?>" class="btn">edit</a>
                  <button type="submit" name="delete" class="btn" onclick="confirm('delete this service');">delete</button>
                  <a href="view_service.php?post_id=<?= $fetch_service['id']; ?>" class="btn">go back</a>
               </div>
            </form>
            <?php 
                  }
               }else{
                  echo '
                     <div class="empty">
                        <p>no services added yet ! <br> <a href="add_service.php" class="btn" style="margin-top: 1rem;">add service</a></p>
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