<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
  header('location:login.php');
};

if (isset($_GET['logout'])) {
  unset($user_id);
  session_destroy();
  header('location:login.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Boxicons -->
  <link rel="shortcut icon" href="/images/logo-mb.png" type="image/png">
  <!-- GOOGLE FONT -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <!-- BOXICONS -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <!-- APP CSS -->
  <!-- My CSS -->
  <link rel="stylesheet" href="admin.css">
  <link rel="stylesheet" href="./css/grid.css">
  <link rel="stylesheet" href="./css/app.css">

  <title>Admindashboard</title>
</head>

<body>


  <!-- SIDEBAR -->
  <section id="sidebar">
    <a href="#" class="brand">
      <i class='bx bxs-smile'></i>
      <span class="text">DigiMark</span>
    </a>
    <ul class="side-menu top" id="navbar">
      <li>
        <a href="homepage.php">
          <i class='bx bxs-dashboard'></i>
          <span class="text">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="shop.php">
          <i class='bx bxs-shopping-bag-alt'></i>
          <span class="text">My Store</span>
        </a>
      </li>
      <li>
        <a href="analytics.php">
          <i class='bx bxs-doughnut-chart'></i>
          <span class="text">Analytics</span>
        </a>
      </li>
      <li>
        <a href="sales.php">
          <i class='bx bxs-shopping-bag'></i>
          <span class="text">Sales</span>
        </a>
      </li>

      <li class="sidebar-submenu">
        <a href="#" class="sidebar-menu-dropdown">
          <i class='bx bx-category'></i>
          <span>e-commerce</span>
          <div class="dropdown-icon"></div>
        </a>
        <ul class="sidebar-menu sidebar-menu-dropdown-content">
          <li>
            <a href="#">
              list product
            </a>
          </li>
          <li>
            <a href="#">
              add product
            </a>
          </li>
          <li>
            <a href="#">
              orders
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="update_form.php">
          <i class='bx bxs-group'></i>
          <span class="text">Upgrade</span>
        </a>
      </li>

      <li class="active">
        <a href="feed.php">
          <i class='bx bxs-group'></i>
          <span class="text">Feed Back</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bxs-cog'></i>
          <span class="text">Settings</span>
        </a>
      </li>
      <li>
        <a href="login.php?logout=<?php echo $user_id; ?>" class="logout"><i style="margin-left: -40px;" class='bx bxs-log-out-circle'></i>logout</a>
        <span class="text"></span>
        </a>
      </li>
    </ul>
    <div id="mobile">
      <a href="cart.php"><i class="fas fa-shopping-bag"></i></a>
      <i id="bar" class="fas fa-outdent"></i>
    </div>
  </section>
  <!-- SIDEBAR -->



  <!-- CONTENT -->
  <section id="content">
    <!-- NAVBAR -->
    <nav>
      <i class='bx bx-menu'></i>
      <a href="#" class="nav-link">Categories</a>
      <form action="#">
        <div class="search-box">
          <div class="row">
            <input type="search" class="search-input" id="input-box" placeholder="Search..." autocomplete="off">
            <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
          </div>
          <div class="result-box">
          </div>
        </div>
      </form>
      <input type="checkbox" id="switch-mode" hidden>
      <label for="switch-mode" class="switch-mode"></label>
      <a href="notify.php" class="notification">
        <i class='bx bxs-bell'></i>
        <span class="num">1</span>
      </a>
      <a href="profile.php" class="profile">
        <?php
        $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
        if (mysqli_num_rows($select) > 0) {
          $fetch = mysqli_fetch_assoc($select);
        }
        if ($fetch['image'] == '') {
          echo '<img src="imgprofile/2.png">';
        } else {
          echo '<img src="uploaded_img/' . $fetch['image'] . '">';
        }
        ?>
      </a>
    </nav>

    <section id="form-details">
      <form action="">
        <span>LEAVE A MESSAGE</span>
        <h2>We love to hear from you</h2>
        <input type="text" placeholder="Your Name">
        <input type="text" placeholder="E-mail">
        <input type="text" placeholder="Subject">
        <textarea name="" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
        <button class="normal">Submit</button>
      </form>

      <div class="people">
        <div>
          <img src="img/people/1.png" alt="">
          <p><span>John Doe</span> Senior Marketing Manager <br> Phone: + 000 123 000 77 88 <br>Email: contact@example.com</p>
        </div>
        <div>
          <img src="img/people/2.png" alt="">
          <p><span>Williams Smith</span> Senior Marketing Manager <br> Phone: + 000 123 000 77 88 <br>Email: contact@example.com</p>
        </div>
        <div>
          <img src="img/people/3.png" alt="">
          <p><span>Emma Stone</span> Senior Marketing Manager <br> Phone: + 000 123 000 77 88 <br>Email: contact@example.com</p>
        </div>
      </div>
    </section>
</body>

</html>