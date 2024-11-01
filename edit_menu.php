<?php
require_once('config/db_connect.php');
$sql = "Select * from tbl_menu WHERE is_Active = 'Yes';";
$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trang quản trị</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

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
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
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
            <img src="img/admin.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="index.php" class="d-block">Quản trị viên</a>
            <a href="#" style="font-size: 12px; line-height: 1.2;">
        <i class="fa fa-circle text-success" style="font-size: 10px; margin-right: 5px;"></i> 
        Đang hoạt động</a>
          </div>
        </div>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Tìm kiếm..." aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <?php
// Tạo mảng chứa danh sách menu từ cơ sở dữ liệu
$menus = [];
while ($row = mysqli_fetch_assoc($query)) {
    $menus[] = $row; // Lưu từng menu vào mảng
}

// Hàm hiển thị menu đa cấp
function displayMenu($menus, $parent_id = 0) {
    foreach ($menus as $menu) {
        if ($menu['parent_id'] == $parent_id) { // Kiểm tra xem menu có phải là con của menu cha không
            echo '<li class="nav-item">';
            echo '<a href="' . $menu['link'] . '" class="nav-link">';
            echo '<i class="' . $menu['icon'] . '"></i>';
            echo '<p style="padding:8px;">' . $menu['name'];

            // Kiểm tra xem menu có con hay không
            if (hasChildren($menus, $menu['id'])) {
                echo '<i class="right fas fa-angle-left"></i>'; // Thêm icon để cho thấy có menu con
            }
            echo '</p>';
            echo '</a>';

            // Nếu menu có con, gọi đệ quy để hiển thị các menu con
            if (hasChildren($menus, $menu['id'])) {
                echo '<ul class="nav nav-treeview" style="display: none;">'; // Bắt đầu menu con với style ẩn
                displayMenu($menus, $menu['id']);
                echo '</ul>';
            }
            echo '</li>'; // Đóng li
        }
    }
}

// Hàm kiểm tra menu có con không
function hasChildren($menus, $id) {
    foreach ($menus as $menu) {
        if ($menu['parent_id'] == $id) {
            return true; // Nếu tìm thấy menu con
        }
    }
    return false; // Không có menu con
}

// Gọi hàm để hiển thị menu
echo '<nav class="mt-2">';
echo '<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">';
displayMenu($menus);
echo '</ul>';
echo '</nav>';
?>

<!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title" style="text-align: center;">Sửa menu</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <?php
          if (isset($_GET['id'])) {
            $id = $_GET['id'];
            include("config/db_connect.php");
            $sql = "Select * from tbl_menu where id = $id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
          }
          ?>
          <form action="process.php" method="post">
            <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Tên menu</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $row['name'] ?>" name="menuname">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Link menu</label>
                <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $row['link'] ?>" name="link">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Icon menu</label>
                <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $row['icon'] ?>" name="icon">
              </div>
              <div class="form-group">
            <label for="parent_id">Menu Cha</label>
            <select id="parent_id" class="form-control" name="parent_id">
                <option value="0">Không có menu cha</option>
                <?php
                // Giả sử bạn có một truy vấn để lấy tất cả các menu
                $menu_query = mysqli_query($conn, "SELECT * FROM tbl_menu WHERE id != {$row['id']}");
                while ($menu = mysqli_fetch_assoc($menu_query)) {
                    $selected = $menu['id'] == $row['parent_id'] ? 'selected' : ''; // Đánh dấu menu cha hiện tại
                    echo '<option value="' . $menu['id'] . '" ' . $selected . '>' . $menu['name'] . '</option>';
                }
                ?>
            </select>
        </div>
              <div class="form-group">
                <label for="inputState">Is Active</label>
                <select id="inputState" class="form-control" name="isactive">
                <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
              </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary" name="edit">Sửa</button>
        </div>
        </form>

      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
</body>
<script>
  // JavaScript để xử lý mở/đóng menu
document.addEventListener('DOMContentLoaded', function() {
    const menuItems = document.querySelectorAll('.nav-item > a');

    menuItems.forEach(item => {
        item.addEventListener('click', function(event) {
            const parentItem = this.parentNode;
            const subMenu = parentItem.querySelector('.nav-treeview');

            if (subMenu) {
                event.preventDefault(); // Ngăn chặn sự kiện mặc định nếu có subMenu
                subMenu.style.display = (subMenu.style.display === 'none' || subMenu.style.display === '') ? 'block' : 'none';
            }
        });
    });
});

 </script>
</html>