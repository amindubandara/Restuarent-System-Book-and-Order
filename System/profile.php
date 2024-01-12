<?php

include 'components/connect.php';


session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:foodmenu.php');
};

?>
<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="utf-8">
    <title>profile</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    
    <link href="img/favicon.ico" rel="icon">


    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/food-menu-style.css" rel="stylesheet">
</head>

<body>
  

<?php include 'components/user_header.php'; ?>
     
         

        <section class="user-details">

        <div class="user">
          
          <img src="img/user.png" alt="">
          <p><i class="fas fa-user"></i><span><span><?= $fetch_profile['name']; ?></span></span></p>
          <p><i class="fas fa-phone"></i><span><?= $fetch_profile['number']; ?></span></p>
          <p><i class="fas fa-envelope"></i><span><?= $fetch_profile['email']; ?></span></p>
          <a href="update_profile.php" class="btn">update info</a>
          <p class="address"><i class="fas fa-map-marker-alt"></i><span><?php if($fetch_profile['address'] == ''){echo 'please enter your address';}else{echo $fetch_profile['address'];} ?></span></p>
          <a href="update_address.php" class="btn">update address</a>

        </div>

        </section>



     

        <br>
        <br>
        <br>
        <br>

        
 <?php include 'components/footer.php'; ?>

 <script src="js/scripts.js"></script>     
 
 <script>

</script>
</body>
</html>