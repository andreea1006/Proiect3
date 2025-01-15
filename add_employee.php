<?php 
   
   include '../components/connect.php';

   if (isset($_COOKIE['admin_id'])) {
      $admin_id = $_COOKIE['admin_id'];
   }else{
      $admin_id = '';
      header('location:login.php');
   }

   if (isset($_POST['publish'])) {
      $id = unique_id();

      $name = $_POST['name'];
      $name = filter_var($name, FILTER_SANITIZE_STRING);

      $email = $_POST['email'];
      $email = filter_var($email, FILTER_SANITIZE_STRING);

      $profession = $_POST['profession'];
      $profession = filter_var($profession, FILTER_SANITIZE_STRING);

      $number = $_POST['number'];
      $number = filter_var($number, FILTER_SANITIZE_STRING);

      $content = $_POST['content'];
      $content = filter_var($content, FILTER_SANITIZE_STRING);

      $image = $_FILES['image']['name'];
      $image = filter_var($image, FILTER_SANITIZE_STRING);
      $image_size = $_FILES['image']['size'];
      $image_tmp_name = $_FILES['image']['tmp_name'];
      $image_folder = '../uploaded_files/'.$image;

      $status = 'active';

      $select_image = $conn->prepare("SELECT * FROM `employee` WHERE profile = ?");
      $select_image->execute([$image]);

      if (isset($image)) {
         if ($select_image->rowCount() > 0) {
            $warning_msg[] = 'image name is repeated';
         }elseif ($image_size > 2000000) {
            $warning_msg[] = 'image size is too large';
         }else{
            move_uploaded_file($image_tmp_name, $image_folder);
         }
      }else{
         $image = '';
      }
      if ($select_image->rowCount() > 0 AND $image != '') {
         $warning_msg[] = 'please rename your image';
      }else{
         $insert_employee = $conn->prepare("INSERT INTO `employee`(id, name, profession, email,number, profile_dec ,profile, status) VALUES(?,?,?,?,?,?,?,?)");
         $insert_employee->execute([$id, $name, $profession, $email, $number, $content, $image, $status]);
         $success_msg[] = 'employee added successfully';
      }
   }
      

   if (isset($_POST['draft'])) {
      $id = unique_id();

      $name = $_POST['name'];
      $name = filter_var($name, FILTER_SANITIZE_STRING);

      $email = $_POST['email'];
      $email = filter_var($email, FILTER_SANITIZE_STRING);

      $profession = $_POST['profession'];
      $profession = filter_var($profession, FILTER_SANITIZE_STRING);

      $number = $_POST['number'];
      $number = filter_var($number, FILTER_SANITIZE_STRING);

      $content = $_POST['content'];
      $content = filter_var($content, FILTER_SANITIZE_STRING);

      $image = $_FILES['image']['name'];
      $image = filter_var($image, FILTER_SANITIZE_STRING);
      $image_size = $_FILES['image']['size'];
      $image_tmp_name = $_FILES['image']['tmp_name'];
      $image_folder = '../uploaded_files/'.$image;

      $status = 'deactive';

      $select_image = $conn->prepare("SELECT * FROM `employee` WHERE profile = ?");
      $select_image->execute([$image]);

      if (isset($image)) {
         if ($select_image->rowCount() > 0) {
            $warning_msg[] = 'image name is repeated';
         }elseif ($image_size > 2000000) {
            $warning_msg[] = 'image size is too large';
         }else{
            move_uploaded_file($image_tmp_name, $image_folder);
         }
      }else{
         $image = '';
      }
      if ($select_image->rowCount() > 0 AND $image != '') {
         $warning_msg[] = 'please rename your image';
      }else{
         $insert_employee = $conn->prepare("INSERT INTO `employee`(id, name, profession, email,number, profile_dec ,profile, status) VALUES(?,?,?,?,?,?,?,?)");
         $insert_employee->execute([$id, $name, $profession, $email, $number, $content, $image, $status]);
         $success_msg[] = 'employee save as draft successfully';
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

      <section class="dashboard">
         <div class="heading">
            <h1><img src="../image/separator.png">add employee <img src="../image/separator.png"></h1>
         </div>
         <div class="form-container">
            <form action="" method="post" enctype="multipart/form-data" class="register">
               <div class="flex">
                  <div class="col">
                     <div class="input-field">
                        <p>employee name <span>*</span></p>
                        <input type="text" name="name" placeholder="add employee name" class="box" required>
                     </div>
                     <div class="input-field">
                        <p>employee email <span>*</span></p>
                        <input type="email" name="email" placeholder="add employee email" class="box" required>
                     </div>
                  </div>
                  <div class="col">
                     <div class="input-field">
                        <p>employee profession <span>*</span></p>
                        <input type="text" name="profession" placeholder="add employee profession" class="box" required>
                     </div>
                     <div class="input-field">
                        <p>employee number <span>*</span></p>
                        <input type="number" name="number" placeholder="add employee number" class="box" required>
                     </div>
                  </div>
               </div>
               <div class="input-field">
                  <p>profile description <span>*</span></p>
                  <textarea name="content" placeholder="employee profile description" class="box"></textarea>
               </div>
               <div class="input-field">
                  <p>select profile<span>*</span></p>
                  <input type="file" name="image" accept="image/*" class="box" required>
               </div>
               <div class="flex-btn">
                  <button type="submit" name="publish" class="btn">add employee</button>
                  <button type="submit" name="draft" class="btn">save draft</button>
               </div>
            </form>
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