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
        <li class="active">
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

        <li>
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
      <!-- NAVBAR -->

      <!-- MAIN -->
      <main>
        <div class="head-title">
          <div class="left">
            <h1>Dashboard</h1>
            <ul class="breadcrumb">
              <li>
                <a href="#">Dashboard</a>
              </li>
              <li><i class='bx bx-chevron-right'></i></li>
              <li>
                <a class="active" href="digi.php">Home</a>
              </li>
            </ul>
          </div>
          <a href="withdraw.php" class="btn-download">
            <i style="color: white;" class='bx bxs-coin'></i>
            <span class="text" style="color: white;">Withdrawal</span>
          </a>
        </div>

        <div class="row">
          <div class="col-3 col-md-6 col-sm-12">
            <!-- TOP PRODUCT -->
            <div class="box f-height">
              <div class="box-header">
                top product
              </div>
              <div class="box-body">
                <ul class="product-list">
                  <li class="product-list-item">
                    <div class="item-info">
                      <img src="./images/thumb-7.jpg" alt="product image">
                      <div class="item-name">
                        <div class="product-name">Jacket</div>
                        <div class="text-second">Cloths</div>
                      </div>
                    </div>
                    <div class="item-sale-info">
                      <div class="text-second">Sales</div>
                      <div class="product-sales">$5,930</div>
                    </div>
                  </li>
                  <li class="product-list-item">
                    <div class="item-info">
                      <img src="./images/sneaker.jpg" alt="product image">
                      <div class="item-name">
                        <div class="product-name">sneaker</div>
                        <div class="text-second">Cloths</div>
                      </div>
                    </div>
                    <div class="item-sale-info">
                      <div class="text-second">Sales</div>
                      <div class="product-sales">$5,930</div>
                    </div>
                  </li>
                  <li class="product-list-item">
                    <div class="item-info">
                      <img src="./images/headphone.jpg" alt="product image">
                      <div class="item-name">
                        <div class="product-name">headphone</div>
                        <div class="text-second">Devices</div>
                      </div>
                    </div>
                    <div class="item-sale-info">
                      <div class="text-second">Sales</div>
                      <div class="product-sales">$5,930</div>
                    </div>
                  </li>
                  <li class="product-list-item">
                    <div class="item-info">
                      <img src="./images/backpack.jpg" alt="product image">
                      <div class="item-name">
                        <div class="product-name">Backpack</div>
                        <div class="text-second">Bags</div>
                      </div>
                    </div>
                    <div class="item-sale-info">
                      <div class="text-second">Sales</div>
                      <div class="product-sales">$5,930</div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <!-- TOP PRODUCT -->
          </div>
          <div class="col-4 col-md-6 col-sm-12">
            <!-- CATEGORY CHART -->
            <div class="box f-height">
              <div class="box-body">
                <div id="category-chart"></div>
              </div>
            </div>
            <!-- END CATEGORY CHART -->
          </div>
          <div class="col-5 col-md-12 col-sm-12">
            <!-- CUSTOMERS CHART -->
            <div class="box f-height">
              <div class="box-header">
                customers
              </div>
              <div class="box-body">
                <div id="customer-chart"></div>
              </div>
            </div>
            <!-- END CUSTOMERS CHART -->
          </div>
            <!-- END ORDERS TABLE -->
          </div>
        </div>
        </div>
      </main>
      <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <!-- APEX CHART -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- APP JS -->
    <script src="./js/app.js"></script>
    <script src="admin.js"></script>
    <script src="search.js"></script>
  </body>

</html>