<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['update_table'])){

   $user_id = $_POST['user_id'];
   $status = $_POST['status'];
   $update_status = $conn->prepare("UPDATE `tables` SET status = ? WHERE id = ?");
   $update_status->execute([$status, $user_id]);
   $message[] = 'table status updated!';

}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_order = $conn->prepare("DELETE FROM `tables` WHERE id = ?");
   $delete_order->execute([$delete_id]);
   header('location:booked_tables.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Booked Tables</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- placed orders section starts  -->

<section class="placed-orders">

   <h1 class="heading">Booked tables</h1>

   <div class="box-container">

   <?php
      $select_orders = $conn->prepare("SELECT * FROM `tables`");
      $select_orders->execute();
      if($select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p> User id : <span><?= $fetch_orders['user_id']; ?></span> </p>
      <p> Name : <span><?= $fetch_orders['name']; ?></span> </p>
      <p> Phone : <span><?= $fetch_orders['phone']; ?></span> </p>
      <p> email : <span><?= $fetch_orders['email']; ?></span> </p>
      <p> Date : <span><?= $fetch_orders['date']; ?></span> </p>
      <p> Time : <span><?= $fetch_orders['time']; ?></span> </p>
      <p> People count : <span><?= $fetch_orders['peoples']; ?></span> </p>
      <p> Special requests: : <span><?= $fetch_orders['requests']; ?></span> </p>
      <form action="" method="POST">
      <input type="hidden" name="user_id" value="<?= $fetch_orders['id']; ?>">
         <select name="status" class="drop-down">
            <option value="" selected disabled> <?= $fetch_orders['status']; ?></option>
            <option value="pending">pending</option>
            <option value="Booked">confirm</option>
         </select>
         <div class="flex-btn">
            <input type="submit" value="update" class="btn" name="update_table">
            <a href="booked_tables.php?delete=<?= $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('delete this order?');">delete</a>
         </div>
      </form>
   </div>
   <?php
      }
   }else{
      echo '<p class="empty">no orders placed yet!</p>';
   }
   ?>

   </div>

</section>

<!-- placed orders section ends -->



<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>