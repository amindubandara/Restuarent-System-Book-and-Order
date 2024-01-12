<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

if(isset($_POST['submit'])){

   $address = $_POST['flat'] .', '.$_POST['building'].', '.$_POST['area'].', '.$_POST['town'] .', '. $_POST['city'] .', '. $_POST['state'] .', '. $_POST['country'] .' - '. $_POST['pin_code'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);

   $update_address = $conn->prepare("UPDATE `users` set address = ? WHERE id = ?");
   $update_address->execute([$address, $user_id]);

   $message[] = 'address saved!';

}

?>




<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="utf-8">
    <title>update_address</title>
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

     
<section class="form-container">

<form action="" method="post">
   <h3>your address</h3>
   <input type="text" class="box" placeholder="flat/house no." required maxlength="50" name="flat">
   <input type="text" class="box" placeholder="building no." required maxlength="50" name="building">
   <input type="text" class="box" placeholder="area name" required maxlength="50" name="area">
   <input type="text" class="box" placeholder="town name" required maxlength="50" name="town">
   <input type="text" class="box" placeholder="city name" required maxlength="50" name="city">
   <input type="text" class="box" placeholder="state name" required maxlength="50" name="state">
   <input type="text" class="box" placeholder="country name" required maxlength="50" name="country">
   <input type="number" class="box" placeholder="pin code" required max="999999" min="0" maxlength="6" name="pin_code">
   <input type="submit" value="save address" name="submit" class="btn" href="checkout.php">
</form>

</section>




        

      

        <footer class="footer">


              <div class="credit">&copy; copyright @ 2023 by <span>DSE 221F </span> | all rights reserved!</div>

       </footer>



 <script src="js/scripts.js"></script>     
 
 <script>

</script>
</body>
</html>