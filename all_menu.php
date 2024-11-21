<?php
require_once('config/db_connect.php');
$sql = "Select * from tbl_menu;";
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
  <style>
  /* Thông báo chung */
  .alert {
    padding: 15px;
      background-color: #4CAF50; /* Màu nền */
      color: white;
      opacity: 1;
      transition: opacity 0.6s;
      margin-bottom: 15px;
      border-radius: 5px;
      width: 300px;
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 9999;
      text-align: center;
  }

  /* Thông báo thành công */
  .alert-success {
    background-color: #4CAF50; /* Màu xanh thành công */
    color: white;
  }

  /* Thông báo lỗi */
  .alert-danger {
    background-color: #f44336; /* Màu đỏ lỗi */
    color: white;
  }

  /* Khi thêm lớp này, opacity sẽ giảm dần và trượt ra khỏi màn hình */
  .fade-out {
    opacity: 0; /* Mờ dần */
    right: -300px; /* Di chuyển ra khỏi màn hình từ bên phải */
  }

  /* Nút đóng */
  .closebtn {
    position: absolute;
    top: 0;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
    color: white;
  }
</style>
</head>
<?php
session_start();
$message = '';
$type = '';

if(isset($_SESSION['add'])) {
    // Kiểm tra thông báo thêm
    $message = $_SESSION['add'];
    $type = 'success'; // Loại thông báo: success
    unset($_SESSION['add']); // Xóa session sau khi hiển thị
} elseif (isset($_SESSION['edit'])) {
    // Kiểm tra thông báo sửa
    $message = $_SESSION['edit'];
    $type = 'success'; // Loại thông báo: success
    unset($_SESSION['edit']); // Xóa session sau khi hiển thị
} elseif (isset($_SESSION['delete'])) {
    // Kiểm tra thông báo xóa
    $message = $_SESSION['delete'];
    $type = 'success'; // Loại thông báo: success
    unset($_SESSION['delete']); // Xóa session sau khi hiển thị
}
?>
<!-- Hiển thị thông báo nếu có -->
<?php if($message !== ''): ?>
<div id="notificationContainer">
        <?php echo $message; ?>
</div>
<?php endif; ?>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <?php include "navbar.php" ?>
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
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="all_menu.php" class="nav-link">
                <i class="fa fa-bars"></i>
                <p>
                  Menu
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="add_menu.php" class="nav-link">
                    <i class="fa fa-plus nav-icon"></i>
                    <p>Thêm menu</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="all_menu.php" class="nav-link">
                    <i class="fa fa-list nav-icon"></i>
                    <p>Danh sách menu</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Danh sách menu</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">ID</th>
                  <th>Tên menu</th>
                  <th>Icon</th>
                  <th>Is Active</th>
                  <th style="text-align: center;">Chức năng</th>
                </tr>
              </thead>
                <tbody>
                <?php
                $i=1;
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
                  <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><i class="<?php echo $row['icon'] ?>"></i></td>
                    <td><?php echo $row['is_Active'] ?></td>
                    <td style="text-align: center;"><a href="edit_menu.php?id=<?php echo $row['id']?>"><span class="badge bg-primary" style="width: 50px; margin-right: 20px;">Sửa</span></a>
                      <a href="delete_menu.php?id=<?php echo $row['id']?>" onclick="return confirm('Bạn có chắc muốn xóa menu?');"><span class="badge bg-danger" style="width: 50px;">Xóa</span></a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
            </table>
          </div>
          <!-- /.card-body -->

        </div>
        <!-- /.card -->
      </div>
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
  // Hàm tạo thông báo
  function showAlert(message, type = 'alert-success') {
    var alertBox = document.createElement('div');
    alertBox.classList.add('alert', type);
    
    alertBox.innerHTML = message + '<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>';

    // Thêm thông báo vào container
    document.getElementById('notificationContainer').appendChild(alertBox);

    // Tự động ẩn toàn bộ thông báo sau 3 giây
    setTimeout(function() {
      alertBox.classList.add('fade-out');  // Thêm class để làm mờ dần và trượt ra
      setTimeout(function() { 
        alertBox.remove(); // Xóa hoàn toàn thông báo sau khi mờ dần
      }, 600);  // Phải phù hợp với thời gian `transition` trong CSS (0.6 giây)
    }, 3000);  // 3 giây trước khi bắt đầu mờ dần
  }

  // PHP truyền thông báo sang JavaScript
  var message = "<?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>";
  var type = "<?php echo htmlspecialchars($type === 'success' ? 'alert-success' : 'alert-danger', ENT_QUOTES, 'UTF-8'); ?>";

  // Nếu có thông báo từ PHP, hiển thị thông báo
  if (message) {
    showAlert(message, type);
  }
</script>
</html>