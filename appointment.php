<?php 
   
   include 'components/connect.php';

   if (isset($_COOKIE['user_id'])) {
      $user_id = $_COOKIE['user_id'];
   }else{
      $user_id = '';
      
   }

   if (isset($_POST['book_appointment'])) {
      if ($user_id != '') {
         $id = unique_id();

         $name = $_POST['first_name'].' '.$_POST['last_name'];
         $name = filter_var($name, FILTER_SANITIZE_STRING);

         $email = $_POST['email'];
         $email = filter_var($email, FILTER_SANITIZE_STRING);

         $number = $_POST['number'];
         $number = filter_var($number, FILTER_SANITIZE_STRING);

         $payment = $_POST['payment'];
         $payment = filter_var($payment, FILTER_SANITIZE_STRING);

         $employee = $_POST['employee'];
         $employee = filter_var($employee, FILTER_SANITIZE_STRING);

         $date = $_POST['date'];
         $date = filter_var($date, FILTER_SANITIZE_STRING);

         $time = $_POST['time'];
         $time = filter_var($time, FILTER_SANITIZE_STRING);

         if (isset($_GET['get_id'])) {
            $get_service = $conn->prepare("SELECT * FROM `services` WHERE id = ? LIMIT 1");
            $get_service->execute([$_GET['get_id']]);

            if ($get_service->rowCount() > 0) {
               while($fetch_s = $get_service->fetch(PDO::FETCH_ASSOC)){
                  $insert_appointment = $conn->prepare("INSERT INTO `appointments`(id, user_id, name, number, email, service_id, employee_id, date, time, price, payment_status) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
                  $insert_appointment->execute([$id, $user_id, $name, $number, $email, $fetch_s['id'], $employee, $date, $time, $fetch_s['price'], $payment]);

                  $success_msg[] = 'your appointment booked';
                  header('location:book_appointment.php');
               }
            }
         }
      }else{
         $warning_msg[] = 'please login first';
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
         <h1>book your appointment</h1>
         <p>Don't wait to prioritize your oral health—book your appointment today and take the first step toward a healthier, brighter smile!</p>
            <span><a href="home.php">home</a><i class="bx bx-right-arrow-alt"></i>book your appointment</span>
      </div>
   </div>

   <div class="summary">
      <h3>book your appointment</h3>
      <div class="container">
         <?php 
            $grand_total = 0;

            if (isset($_GET['get_id'])) {
               $select_get = $conn->prepare("SELECT * FROM `services` WHERE id = ?");
               $select_get->execute([$_GET['get_id']]);

               while($fetch_get = $select_get->fetch(PDO::FETCH_ASSOC)){
                  $sub_total = $fetch_get['price'];
                  $grand_total+= $sub_total;
              
         ?>
         <div class="flex">
            <img src="uploaded_files/<?= $fetch_get['image']; ?>" class="image">
            <div>
               <h3 class="name"><?= $fetch_get['name']; ?></h3>
               <p class="price">$<?= $fetch_get['price']; ?>/-</p>
            </div>
         </div>
         <?php 
               }
            }else{
               echo '
                  <div class="empty">
                     <p>no services added yet !</p>
                  </div>
               ';
            }
         ?>
         <div class="grand-total"><span>total amount payable : </span><p> $<?= $grand_total; ?>/-</p></div>
      </div>
      <h3>fill all input for appointment</h3>
   </div>   


   <div class="form-container appointment">
      <form action="" method="post" enctype="multipart/form-data" class="register">
         <div class="flex">
            <div class="col">
               <div class="input-field">
                  <p>first name <span>*</span></p>
                  <input type="text" name="first_name" placeholder="enter your first name" class="box" required>
               </div>
               <div class="input-field">
                  <p>last name <span>*</span></p>
                  <input type="text" name="last_name" placeholder="enter your last name" class="box" required>
               </div>
               <div class="input-field">
                  <p>your number <span>*</span></p>
                  <input type="number" name="number" placeholder="enter your number" class="box" required>
               </div>
               <div class="input-field">
                  <p>your email <span>*</span></p>
                  <input type="email" name="email" placeholder="enter your email" class="box" required>
               </div>
            </div>
            <div class="col">
               <div class="input-field">
                  <p>payment method <span>*</span></p>
                  <select name="payment" class="box select">
                     <option selected disabled>select payment method</option>
                     <option value="paytm">paytm</option>
                     <option value="credit card">credit card</option>
                     <option value="phone pay">phone pay</option>
                     <option value="G-pay">G-pay</option>
                  </select>
               </div>

               <div class="input-field">
                  <p>select employee <span>*</span></p>
                  <select name="employee" class="box select">

                     <?php 
                        $select_employee = $conn->prepare("SELECT * FROM `employee` WHERE status =?");
                        $select_employee->execute(['active']);

                        if ($select_employee->rowCount() > 0) {
                           while($fetch_employee = $select_employee->fetch(PDO::FETCH_ASSOC)){


                     ?>
                     <option value="<?= $fetch_employee['id'] ?>"><?= $fetch_employee['name'] ?></option>
                     <?php 
                           }
                        }
                     ?>
                  </select>
               </div>
               <div class="input-field">
                  <p>select date <span>*</span></p>
                  <input type="date" name="date" placeholder="select date" class="box" required>
               </div>
               <div class="input-field">
                  <p>select time <span>*</span></p>
                  <select name="time" class="box select">
                     <option selected disabled>select time</option>
                     <option value="9:00 AM - 10:00 AM">9:00 AM - 10:00 AM</option>
                     <option value="9:30 AM - 10:30 AM">9:30 AM - 10:30 AM</option>
                     <option value="11:30 AM - 12:30 PM">11:30 AM - 12:30 PM</option>
                     <option value="12:00 AM - 1:00 AM">12:00 AM - 1:00 PM</option>
                     <option value="1:30 PM - 2:30 PM">1:30 PM - 2:30 PM</option>
                     <option value="3:00 PM - 4:00 PM">3:00 PM - 4:00 PM</option>
                     <option value="3:30 PM - 4:30 PM">3:30 PM - 4:40 PM</option>
                     <option value="5:00 PM - 6:00 PM">5:00 PM - 6:00 PM</option>
                  </select>
               </div>
            </div>
         </div>
         <button type="submit" name="book_appointment" class="btn">book appointment</button>
      </form>
   </div>







   <?php include 'components/user_footer.php'; ?>
   <!-- sweetalert cdn link  -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

   <!-- custom js link  -->
   <script type="text/javascript" src="js/user_script.js"></script>

   <?php include 'components/alert.php'; ?>
   
</body>
</html>