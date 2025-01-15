<?php 
   
   include 'components/connect.php';

   if (isset($_COOKIE['user_id'])) {
      $user_id = $_COOKIE['user_id'];
   }else{
      $user_id = '';
      
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
         <h1>about us</h1>
         <p>We are committed to providing exceptional dental care in a welcoming and professional environment. Our team of experienced dentists and specialists uses state-of-the-art technology to ensure your smile stays healthy and beautiful. Whether you need routine check-ups, advanced treatments, or cosmetic dentistry, we are here to support your dental health journey with personalized care and attention..</p>
            <span><a href="home.php">home</a><i class="bx bx-right-arrow-alt"></i>about us</span>
      </div>
   </div>

   <div class="about">
      <div class="box-container">
         <div class="box">
            <span>about denticare</span>
            <h2>Where Expertise Meets Compassion Your Journey to Optimal Oral Health</h2>
            <p>Where Expertise Meets Compassion – Your trusted partner in achieving optimal oral health through advanced treatments and personalized dental care in a welcoming environment.</p>
         </div>
         <div class="box">
            <img src="image/about.avif">
         </div>
      </div>
   </div>

   <div class="event">
      <div class="heading">
         <h1>the <span>dental & oral health</span>summit</h1>
         <p>innovative ideas in dentistry</p>
      </div>
      <div class="box-container">
         <div class="box">
            <img src="image/about.png">
         </div>
         <div class="box">
            <h2>Dental health current research</h2>
            <p>Stay informed with the latest in dental health research – from advancements in preventative care and innovative treatments to cutting-edge technology improving oral health outcomes for patients worldwide.</p>
         </div>
      </div>
      <div class="box-container">
         
         <div class="box">
            <h2>oral hygine - the role of mouthwash</h2>
            <p>Mouthwash plays a crucial role in oral hygiene by reducing bacteria, freshening breath, and reaching areas brushing may miss. It complements daily brushing and flossing, promoting a healthier mouth and preventing gum disease and cavities.</p>
         </div>
         <div class="box">
            <img src="image/about0.png">
         </div>
      </div>
   </div>
   <div class="role">
      <div class="box-container">
         <div class="box">
            <h1>The Role of Dental Implants</h1>
            <p>Dental implants play a vital role in modern dentistry, offering a permanent solution for missing teeth. They restore functionality, improve aesthetics, and help maintain jawbone health by preventing bone loss, ensuring a natural and confident smile.</p>
         </div>
         <div class="box">
            <img src="image/about1.jpg">
         </div>
      </div>
      <div class="box-container">
         <div class="box">
            <img src="image/about2.jpg">
         </div>
         <div class="box">
            <h1>Dental Implant in Dentistry</h1>
            <p>Dental implants have revolutionized dentistry by providing a durable and effective solution for tooth replacement. They mimic natural teeth in function and appearance, improve oral health by preventing bone loss, and enhance quality of life through improved speech, chewing, and confidence.</p>
         </div>
         
      </div>
   </div>

   <div class="skill-container">
      <div class="heading">
         <span>out dental services</span>
         <h1>in numbers</h1>
         <p>Distinctively exploit optimal alignments for intuitive bandwidth. Quickly coordinate e-business applications through <br> revolutionary catalysts for change. Seamlessly underwhelm optimal testing processes.</p>
      </div>
      <div class="container">
         <!-- progress bar start  -->
         <div class="progress-bar">
            <div class="progress">
               <span class="title timer" data-form="0" data-to="99" data-speed="1800"><img src="image/counter (1).png"></span>
               <div class="overlay"></div>
               <div class="left"></div>
               <div class="right"></div>
            </div>
            <h1>99%</h1>
            <h4>client satisfaction</h4>
         </div>
         <!-- progress bar start  -->
         <div class="progress-bar">
            <div class="progress">
               <span class="title timer" data-form="0" data-to="70" data-speed="1500"><img src="image/icon (7).png"></span>
               <div class="overlay"></div>
               <div class="left"></div>
               <div class="right"></div>
            </div>
            <h1>97%</h1>
            <h4>intervention success</h4>
         </div>
         <!-- progress bar start  -->
         <div class="progress-bar">
            <div class="progress">
               <span class="title timer" data-form="0" data-to="100" data-speed="1500"><img src="image/counter (3).png"></span>
               <div class="overlay"></div>
               <div class="left"></div>
               <div class="right"></div>
            </div>
            <h1>100%</h1>
            <h4>happy with staff</h4>
         </div>
         <!-- progress bar start  -->
         <div class="progress-bar">
            <div class="progress">
               <span class="title timer" data-form="0" data-to="85" data-speed="1800"><img src="image/counter (2).png"></span>
               <div class="overlay"></div>
               <div class="left"></div>
               <div class="right"></div>
            </div>
            <h1>97%</h1>
            <h4>quick recovery</h4>
         </div>
         <!-- progress bar start  -->
      </div>
   </div>

   <div class="testimonial-container">
      <div class="heading">
         <span>clients with</span>
         <h1>reason to smile</h1>
      </div>
      <div class="container">
         <div class="testimonial-item active">
            <i class="bx bxs-quote-right" id="quote"></i>
            <img src="image/ourteam0.webp">
            <h1>john smith</h1>
            A smile is more than just an expression—it's a reflection of confidence, joy, and well-being. With healthy teeth and proper care, you have every reason to smile, sharing positivity and making lasting impressions every day.
         </div>
         <div class="testimonial-item">
            <i class="bx bxs-quote-right" id="quote"></i>
            <img src="image/ourteam.webp">
            <h1>aiyman doe</h1>
            A smile is a powerful tool—it brightens your day, boosts your confidence, and connects you with others. Keep it healthy and vibrant, and you'll always have a reason to smile.
         </div>
         <div class="testimonial-item">
            <i class="bx bxs-quote-right" id="quote"></i>
            <img src="image/ourteam1.webp">
            <h1>selena ansari</h1>
            A smile is a symbol of happiness and self-assurance. With a healthy, radiant smile, you can face the world with confidence and spread positivity wherever you go.
         </div>
         <div class="testimonial-item">
            <i class="bx bxs-quote-right" id="quote"></i>
            <img src="image/ourteam2.webp">
            <h1>alweena smith</h1>
            A smile is a universal language of kindness and confidence. Take care of yours, and let it be your reason to shine every day.
         </div>
         <div class="left-arrow" onclick="rightSlide()"><i class="bx bx-left-arrow-alt"></i></div>
         <div class="right-arrow" onclick="leftSlide()"><i class="bx bx-right-arrow-alt"></i></div>
      </div>
   </div>















   <?php include 'components/user_footer.php'; ?>
   <!-- sweetalert cdn link  -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

   <!-- custom js link  -->
   <script type="text/javascript">
      let slide = document.querySelectorAll('.testimonial-item');
let index = 0;

function rightSlide(){
   slide[index].classList.remove('active');
   index = (index + 1) % slide.length;
   slide[index].classList.add('active');
}

function leftSlide(){
   slide[index].classList.remove('active');
   index = (index - 1 + slide.length) % slide.length;
   slide[index].classList.add('active');
}
   </script>

   <?php include 'components/alert.php'; ?>
   
</body>
</html>