<?php
session_start();
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

    <?php include "navbar2.php" ?>

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

        <!-- Sidebar Menu -->
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
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Thêm mới menu</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="process.php" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Tên menu</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên menu" name="menuname">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Link menu</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập đường dẫn menu" name="link">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Icon menu</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập đường dẫn icon menu" name="icon">
              </div>
              <div class="form-group">
            <label for="parent_id">Menu cha</label>
            <select id="parent_id" class="form-control" name="parent_id">
                <option value="0">Không có</option>
                <?php
                foreach ($menus as $menu) {
                    if ($menu['parent_id'] == 0) { 
                        echo '<option value="' . $menu['id'] . '">' . $menu['name'] . '</option>';
                    }
                }
                ?>
            </select>
        </div>
              <div class="form-group">
              <label for="inputState">Is Active</label>
              <select id="inputState" class="form-control" name="isactive">
                <option selected>Yes</option>
                <option>No</option>
              </select>
            </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-success" name="add">Thêm</button>
        </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.content-wrapper -->
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

</html>