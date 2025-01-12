<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
  header('location:login.php');
};

if(isset($_GET['logout'])){
  unset($user_id);
  session_destroy();
  header('location:login.php');
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    
    <!-- custom css file link-->
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">

      <div class="profile">
         <?php
           $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
           if(mysqli_num_rows($select) > 0){
              $fetch = mysqli_fetch_assoc($select);
           }
           if($fetch['image'] == ''){
            echo '<img src="imgprofile/2.png">';
           }else{
              echo '<img src="uploaded_img/'.$fetch['image'].'">';
           }  
         ?>
         <h3 style="font-family: 'Poppins', sans-serif;">PROFILE PICTURE : <?php echo $fetch['image']; ?></h3>
         <h3 style="text-transform: uppercase; font-family: 'Poppins', sans-serif;">USERNAME : <?php echo $fetch['name']; ?></h3>
         <h3 style="text-transform: uppercase; font-family: 'Poppins', sans-serif;">EMAIL : <?php echo $fetch['email']; ?></h3>
         <h3 style="text-transform: uppercase; font-family: 'Poppins', sans-serif;"> USER FUNCTION : Affiliate marketer</h3>
      </div>

    </div>
  </body>
</html>