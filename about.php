<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>about us</h3>
   <p> <a href="home.php">Home</a> / About </p>
</div>
<section class="about">
<h1 class="title">why choose us?</h1>
</section>

<section class="reviews">
<div class="box-container">

      <div class="box">
         <img src="./images/Shipping-logo.png" alt="">
         <p>When you order from Manga MangaUniVerse Store, you can expect fast and reliable shipping services. We understand the excitement of receiving your manga books promptly, so we work with trusted shipping partners to ensure timely delivery. We take great care in packaging your orders to protect them during transit.</p>
      </div>

      <div class="box">
         <img src="./images/Books-logo.jpg" alt="">
         <p>At Manga MangaUniVerse, we take pride in offering an extensive collection of manga from various genres. Whether you're a fan of action, romance, fantasy, or mystery, we have something to cater to every taste. Our diverse selection ensures that you'll find your favorite manga series and discover new ones to explore.</p>
      </div>

      <div class="box">
         <img src="./images/Money-logo.png" alt="">
         <p>We believe that everyone should have access to their favorite manga series at affordable prices. At Manga MangaUniVerse, we offer competitive pricing without compromising on quality. We strive to provide great value for your money, ensuring that you can indulge in your manga passion without breaking the bank.</p>
      </div>

   </div>

</section>


<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>