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

   <!-- home slider start  -->
   <div class="slider-container">
      <div class="slide">
         <!-- slide start -->
         <div class="slideBox active">
            <div class="textBox">
               <span>committed to excellence</span>
               <h1>personalizes and <br> comfertable</h1>
               <div class="card">
                  <div class="box">
                     <div><img src="image/icon (11).png"></div>
                     <div>
                        <h2>full protection</h2>
                        <p>Achieve full protection for your oral health with comprehensive care—combining regular check-ups, professional cleanings, and advanced treatments to keep your smile healthy and protected for life.</p>
                     </div>
                  </div>
                  <div class="box">
                     <div><img src="image/icon (12).png"></div>
                     <div>
                        <h2>complete service</h2>
                        <p>Experience complete dental care with our wide range of services, including preventative, restorative, and cosmetic treatments, tailored to meet all your oral health needs in one place.</p>
                     </div>
                  </div>
               </div>
               <div class="flex-btn">
                  <a href="service.php" class="btn">view our service</a>
                  <a href="service.php" class="btn">book appointment</a>
               </div>
            </div>
         </div>
         <!-- slide end  -->
         <!-- slide start -->
         <div class="slideBox">
            <div class="textBox">
               <span>committed to excellence</span>
               <h1>personalizes and <br> comfertable</h1>
               <div class="card">
                  <div class="box">
                     <div><img src="image/icon (4).png"></div>
                     <div>
                        <h2>full protection</h2>
                        <p>Achieve full protection for your oral health with comprehensive care—combining regular check-ups, professional cleanings, and advanced treatments to keep your smile healthy and protected for life.</p>
                     </div>
                  </div>
                  <div class="box">
                     <div><img src="image/icon (5).png"></div>
                     <div>
                        <h2>complete service</h2>
                        <p>Experience complete dental care with our wide range of services, including preventative, restorative, and cosmetic treatments, tailored to meet all your oral health needs in one place.</p>
                     </div>
                  </div>
               </div>
               <div class="flex-btn">
                  <a href="service.php" class="btn">view our service</a>
                  <a href="service.php" class="btn">book appointment</a>
               </div>
            </div>
         </div>
         <!-- slide end  -->
         <!-- slide start -->
         <div class="slideBox">
            <div class="textBox">
               <span>committed to excellence</span>
               <h1>personalizes and <br> comfertable</h1>
               <div class="card">
                  <div class="box">
                     <div><img src="image/icon (1).png"></div>
                     <div>
                        <h2>full protection</h2>
                        <p>Achieve full protection for your oral health with comprehensive care—combining regular check-ups, professional cleanings, and advanced treatments to keep your smile healthy and protected for life.</p>
                     </div>
                  </div>
                  <div class="box">
                     <div><img src="image/icon (2).png"></div>
                     <div>
                        <h2>complete service</h2>
                        <p>Experience complete dental care with our wide range of services, including preventative, restorative, and cosmetic treatments, tailored to meet all your oral health needs in one place.</p>
                     </div>
                  </div>
               </div>
               <div class="flex-btn">
                  <a href="service.php" class="btn">view our service</a>
                  <a href="service.php" class="btn">book appointment</a>
               </div>
            </div>
         </div>
         <!-- slide end  -->
      </div>
      <ul class="controls">
         <li onclick="nextSlide();" class="next"> <i class="bx bx-right-arrow-alt"></i> </li>
         <li onclick="prevSlide();" class="prev"> <i class="bx bx-left-arrow-alt"></i> </li>
      </ul>
   </div>
   <!-- home slider end  -->

   <div class="about-us">
      <div class="box-container">
         <div class="box">
            <div class="container">
               <div class="card">
                  <img src="image/ab-icon.png">
                  <h2>easy booking</h2>
                  <p>Get an appointment in a few clicks</p>
               </div>
               <div class="card">
                  <img src="image/ab-icon0.png">
                  <h2>easy booking</h2>
                  <p>Get an appointment in a few clicks</p>
               </div>
               <div class="card">
                  <img src="image/ab-icon1.png">
                  <h2>easy booking</h2>
                  <p>Get an appointment in a few clicks</p>
               </div>
               <div class="card">
                  <img src="image/ab-icon2.png">
                  <h2>easy booking</h2>
                  <p>Get an appointment in a few clicks</p>
               </div>
            </div>
         </div>
         <div class="box">
            <h1>about our clinic</h1>
            <p>Our main long-term goal is always achieving complex results for your dental health. But in the process, we also keep the focus on giving you the best customer service. We're always making our dental office as safe place as possible!</p>
            <div class="box-card">
               <img src="image/about-us.jpg">
               <div class="detail">
                  
                  <h2>Dr. Richard Smith</h2>
                  <span>Head Doctor, Orthodontist</span>
                  <p>I am a dedicated dental specialist with 20 years of experience trained in diagnosing and treating orthodontal and periodontal issues.</p>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="relax-container">
      <div class="detail">
         <h1>Relax…your Dentist Knows Best</h1>
         <div class="box">
            <div class="img-box">
               <img src="image/icon (8).png">
            </div>
            <div>
               <h2>dental hygine never forget!</h2>
               <p>Never forget the importance of dental hygiene! A consistent routine of brushing, flossing, and regular check-ups is the key to a healthy, confident smile.</p>
            </div>
         </div>
         <div class="box">
            <div class="img-box">
               <img src="image/icon (9).png">
            </div>
            <div>
               <h2>Don't rush when you brush</h2>
               <p>Take your time when you brush! A thorough and gentle brushing routine ensures better oral health and a brighter smile.</p>
            </div>
         </div>
         <div class="box">
            <div class="img-box">
               <img src="image/icon (10).png">
            </div>
            <div>
               <h2>visit your dentist once in 6 months</h2>
               <p>Keep your smile healthy—visit your dentist every six months for a professional check-up and cleaning!</p>
            </div>
         </div>

      </div>
   </div>

   <div class="kids">
      <div class="box-container">
         <div class="box">
            <div class="heading">
               <h1>kids oral care</h1>
               <p>Efficiently enable enabled sources and cost effective products. Completely synthesize principle-centered information.</p>
            </div>
            <div class="box-card">
               <div class="card">
                  <img src="image/dental.png">
                  <h2>brushing</h2>
                  <p>Dynamically target high payoff capital for technologies.</p>
               </div>
               <div class="card">
                  <img src="image/nutrition.png">
                  <h2>nutrition</h2>
                  <p>Dynamically target high payoff capital for technologies.</p>
               </div>
               <div class="card">
                  <img src="image/ab-icon2.png">
                  <h2>checkup</h2>
                  <p>Dynamically target high payoff capital for technologies.</p>
               </div>
            </div>
         </div>
         <div class="box">
            <img src="image/kid.png" class="img">
         </div>
      </div>
   </div>

   <div class="service">
      <div class="box-container">
         <div class="box">
            <div><img src="image/contact-icon (4).png"></div>
            <div class="detail">
               <h1>general Dentistry</h1>
               <p>General dentistry focuses on maintaining your overall oral health through routine check-ups, cleanings, cavity prevention, and early detection of dental issues to ensure a healthy, lasting smile.</p>
            </div>
         </div>
         <div class="box">
            <div><img src="image/service-icon2.png"></div>
            <div class="detail">
               <h1>dental filling</h1>
               <p>Dental fillings restore the function and integrity of decayed or damaged teeth. They prevent further decay, enhance durability, and help maintain a natural, healthy smile.</p>
            </div>
         </div>
         <div class="box">
            <div><img src="image/service-icon6.png"></div>
            <div class="detail">
               <h1>dental implants</h1>
               <p>Dental implants are a long-lasting solution for missing teeth, offering unmatched stability and a natural appearance. They improve oral function, preserve jawbone health, and restore confidence in your smile.</p>
            </div>
         </div>
         <div class="box">
            <div><img src="image/service-icon.png"></div>
            <div class="detail">
               <h1>dental surgery</h1>
               <p>Dental surgery addresses a variety of oral health needs, from wisdom tooth extractions to advanced procedures like gum reshaping and implant placement. It’s designed to restore function, improve aesthetics, and ensure long-term oral health.</p>
            </div>
         </div>
         <div class="box">
            <div><img src="image/service-icon0.png"></div>
            <div class="detail">
               <h1>dental alignment</h1>
               <p>Dental alignment focuses on correcting the positioning of teeth and jaws for a healthier, more balanced smile. Using braces, aligners, or other orthodontic treatments, it improves functionality, aesthetics, and overall oral health.</p>
            </div>
         </div>
         <div class="box">
            <div><img src="image/service-icon5.png"></div>
            <div class="detail">
               <h1>dental whitening</h1>
               <p>Dental whitening is a cosmetic procedure that brightens your smile by removing stains and discoloration. It’s a safe and effective way to enhance your confidence and achieve a radiant, healthy-looking smile.</p>
            </div>
         </div>
         <div class="box">
            <div><img src="image/service-icon1.png"></div>
            <div class="detail">
               <h1>teeth braces</h1>
               <p>Teeth braces are orthodontic devices used to straighten misaligned teeth, correct bite issues, and improve overall dental health. They provide a path to a healthier, more confident smile for patients of all ages.</p>
            </div>
         </div>
         <div class="box">
            <div><img src="image/service-icon4.png"></div>
            <div class="detail">
               <h1>teeth protection</h1>
               <p>Teeth protection is essential for maintaining oral health and preventing damage. From mouthguards for sports to night guards for grinding, these protective measures safeguard your teeth and ensure a lasting smile.</p>
            </div>
         </div>
         <div class="box">
            <div><img src="image/service-icon3.png"></div>
            <div class="detail">
               <h1>prothesis</h1>
               <p>Dental prostheses are custom-made devices designed to replace missing teeth and restore functionality and aesthetics. Options like dentures, bridges, and crowns help improve chewing, speech, and confidence in your smile.</p>
            </div>
         </div>
      </div>
   </div>

   <div class="care-container">
      <div class="detail">
         <h1>take care of your teeth & gums</h1>
         <p>Researchers have found that people with gum disease are almost twice as likely to suffer from coronary heart disease./p>
         <p><i class="bx bx-circle"></i>Use a fluoride toothpaste and brush for at least two minutes, covering all tooth surfaces.</p>
         <p><i class='bx bx-circle'></i>Remove plaque and food particles from between your teeth where your toothbrush can’t reach.</p>
         <p><i class='bx bx-circle'></i>Use an antibacterial mouthwash to reduce bacteria and freshen breath.</p>
         <p><i class='bx bx-circle'></i>Limit sugary snacks and beverages; include foods rich in calcium and vitamins..</p>
         <p><i class='bx bx-circle'></i>Drink plenty of water to wash away food particles and maintain saliva production.</p>
         <p><i class='bx bx-circle'></i> Smoking or chewing tobacco increases the risk of gum disease and oral cancer.</p>
      </div>
   </div>



   <?php include 'components/user_footer.php'; ?>
   <!-- sweetalert cdn link  -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

   <!-- custom js link  -->
   <script type="text/javascript" src="js/user_script.js"></script>

   <?php include 'components/alert.php'; ?>
   
</body>
</html>