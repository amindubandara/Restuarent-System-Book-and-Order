
<?php

include 'components/connect.php';


session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:foodmenu.php');
};

// include 'components/add_cart.php';

?>



<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="utf-8">
    <title>orders</title>
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


<section class="orders">

<h1 class="title">your orders</h1>

<div class="box-container">

<?php

   if($user_id == ''){
      echo '<p class="empty">please login to see your orders</p>';
   }else{
      $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
      $select_orders->execute([$user_id]);
      if($select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
?>
<div class="box">
   <p>placed on : <span><?= $fetch_orders['placed_on']; ?></span></p>
   <p>name : <span><?= $fetch_orders['name']; ?></span></p>
   <p>email : <span><?= $fetch_orders['email']; ?></span></p>
   <p>number : <span><?= $fetch_orders['number']; ?></span></p>
   <p>address : <span><?= $fetch_orders['address']; ?></span></p>
   <p>payment method : <span><?= $fetch_orders['method']; ?></span></p>
   <p>your orders : <span><?= $fetch_orders['total_products']; ?></span></p>
   <p>total price : <span>RS:<?= $fetch_orders['total_price']; ?>.00/-</span></p>
   <p> payment status : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p>
</div>
<?php
   }
   }else{
      echo '<p class="empty">no orders placed yet!</p>';
   }
   }
?>

</div>

</section>


















    
            

<?php include 'components/footer.php'; ?>

  






 <script src="js/scripts.js"></script>     
 
 <script>

</script>
</body>
</html>