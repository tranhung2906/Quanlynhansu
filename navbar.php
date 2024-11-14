  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="<?php
                          $image = isset($_SESSION['user_img']) ? $_SESSION['user_img'] : '';
                          $image = str_replace('../', '', $image);
                          echo $image;
                          ?>"" alt=" User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    <?php

                    echo isset($_SESSION['user_firstname']) ? $_SESSION['user_firstname'] : '';
                    echo ' ';
                    echo isset($_SESSION['user_lastname']) ? $_SESSION['user_lastname'] : '';
                    ?>
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">
                    <?php
                       isset($_SESSION['level']) ? $_SESSION['level'] : '';
                      if($_SESSION['level'] == 1){
                        echo "Quản trị viên";
                      }else if($_SESSION['level'] == 0){
                        echo "Nhân viên";
                      }
                    ?>
                  </p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> Lượt truy cập: <?php echo isset($_SESSION['user_truy_cap']) ? $_SESSION['user_truy_cap'] : ''; ?></p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">Thông tin</a>
            <a href="logout.php" class="dropdown-item dropdown-footer">Đăng xuất</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php
                      $image = isset($_SESSION['user_img']) ? $_SESSION['user_img'] : '';
                      $image = str_replace('../', '', $image);
                      echo $image;
                      ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="index.php" class="d-block"> <?php

                                                  echo isset($_SESSION['user_firstname']) ? $_SESSION['user_lastname'] : '';
                                                  echo ' ';
                                                  echo isset($_SESSION['user_lastname']) ? $_SESSION['user_firstname'] : '';
                                                  ?></a>
            <a href="#" style="font-size: 12px; line-height: 1.2;">
              <i class="fa fa-circle text-success" style="font-size: 10px; margin-right: 5px;"></i>
              <?php
                            if($_SESSION['level']==1){
                                echo"Quản trị viên";
                            }else{
                                echo"Nhân viên";
                            }
                            ?></a>
          </div>
        </div>
<!-- Navbar End -->