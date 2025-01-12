<?php

include 'config.php';
session_start();

if (isset($_POST['submit'])) {

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, $_POST['password']);

  $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

  if (mysqli_num_rows($select) > 0) {
    $row = mysqli_fetch_assoc($select);
    $_SESSION['user_id'] = $row['id'];
    header('location:homepage.php');
  } else {
    $message[] = 'incorrect email or password!';
  }
}

?>

<DOCTYPE>
  <html>

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width" , initial-scale="1.0">
    <title>Affiliate program</title>

    <!-- swiper css link-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">

    <!-- font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link-->
    <link rel="stylesheet" href="book.css">
  </head>

  <body>

    <!-- booking section starts -->
    <section class="booking">
      <h1 class="heading-title">book your delivery!

        <form action="book_form.php" method="post" class="book-form">

          <div class="flex">
            <div class="inputbox">
              <span>name :</span>
              <input type="text" placeholder="enter your name" name="name">
            </div>
            <div class="inputbox">
              <span>email :</span>
              <input type="text" placeholder="enter your email" name="email">
            </div>
            <div class="inputbox">
              <span>phone :</span>
              <input type="number" placeholder="enter your number" name="phone">
            </div>
            <div class="inputbox">
              <span>address :</span>
              <input type="text" placeholder="enter your address" name="address">
            </div>
            <div class="inputbox">
              <span>Country</span>
              <input type="text" placeholder="country" name="country">
            </div>
            <div class="inputbox">
              <span>State</span>
              <input type="text" placeholder="state" name="state">
            </div>

          </div>
          <div style="display: flex;">
            <div>
              <input type="submit" value="save" class="btn" name="send">
            </div>
            <div style="margin-left: 20px; margin-top: 34px;">
              <a href="login.php"><span class="btn">continue</span></a>
            </div>
            <div class="inputbox" style="margin-top: 40px; margin-left: 500px; background: rgb(244, 244, 255); padding: 5px;">
              <span>Getting product 3 days after booking</span>
            </div>
          </div>

        </form>
      </h1>
    </section>



    <!-- swiper js link -->
    <script src="https://unpkg.com/swiper@7/swiper.bundl.min.js"></script>

    <!-- custom js file link -->
    <script src="aff-script.js"></script>
  </body>

  </html>
</DOCTYPE>