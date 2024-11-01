<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once('config/db_connect.php');
$sql = "Select * from tbl_menu WHERE is_Active = 'Yes';";
$query = mysqli_query($conn, $sql);
// create code room
$roomCode = "MBP" . time();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>QUẢN LÝ NHÂN SỰ</title>
    <!-- Favicon  -->
    <link rel="icon" href="img/logo_web.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href=" plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href=" plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href=" plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href=" plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href=" dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href=" plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href=" plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href=" plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href=" plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href=" plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href=" plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src=" dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <?php include "navbar.php"; ?>

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
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item ">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Tổng quan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thống kê</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./index2.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách nhân viên</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="all_account.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách tài khoản</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Nhân viên
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="quanly_phongban.php" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Phòng ban</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="them_chuc_vu.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Chức vụ</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="them_trinh_do.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Trình độ</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="them_chuyen_mon.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Chuyên môn</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="them_bang_cap.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Bằng cấp</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="them_loai_nv.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Loại nhân viên</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="add_staff.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm mới nhân viên</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách nhân viên</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-money-bill"></i>
            <p>
              Quản lý lương
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/UI/general.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Bảng tính lương</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/UI/icons.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tính lương</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>
              Quản lý công tác
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/forms/general.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tạo công tác</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/forms/advanced.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách công tác</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Nhóm nhân viên
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/tables/simple.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tạo nhóm</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/tables/data.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách nhóm</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-star"></i>
            <p>
              Khen thưởng-Kỷ luật
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/tables/simple.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Khen thưởng</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/tables/data.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kỷ luật</p>
              </a>
            </li>
          </ul>
        </li>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Tài khoản
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/tables/simple.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thông tin tài khoản</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="add_account.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tạo tài khoản</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="all_account.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách tài khoản</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/tables/data.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Đổi mật khẩu</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
  <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Phòng ban</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Nhân viên</a></li>
              <li class="breadcrumb-item active">Phòng ban</li>
              <li class="breadcrumb-item active">Chỉnh sửa phòng ban</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
      // Show data
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $showData = "SELECT * FROM phongban WHERE id = $id;";
        $result = mysqli_query($conn, $showData);
        $row1 = mysqli_fetch_array($result);
      } ?>
      <form action="edit_phongban.php" method="post">
        <input type='hidden' value="<?php echo $row1['id'] ?>" name='id' />
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">
                  Chỉnh sửa phòng ban
                </h3>
              </div>
              <div class="card-body">
                <label for="exampleInputEmail1">Mã phòng ban: </label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="roomCode" value="<?php echo $row1['ma_phong_ban'] ?>" readonly>
              </div>
              <div class="card-body">
                <label for="exampleInputEmail1">Tên phòng ban: </label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $row1['ten_phong_ban'] ?>" name="roomName">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <label for="exampleInputEmail1">Mô tả: </label>
                <textarea id="summernote" name="description"><?php echo $row1['ghi_chu'] ?></textarea>
              </div>
              <div class="card-body">
                <label for="exampleInputEmail1">Người sửa: </label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="personEdit"
                  value="<?php
                          echo isset($_SESSION['user_firstname']) ? $_SESSION['user_firstname'] : '';
                          echo ' ';
                          echo isset($_SESSION['user_lastname']) ? $_SESSION['user_lastname'] : '';
                          ?>"
                  readonly>
              </div>
              <div class="card-body">
                <label for="exampleInputEmail1">Ngày sửa: </label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo date('Y-m-d H:i:s'); ?>" name="dateEdit" readonly>
              </div>
              <div style="margin: 20px;">
                <?php
                if ($_SESSION['level'] == 1) {
                  echo "<button type='submit' class='btn btn-warning' name='saveEdit'><i class='fa fa-save'></i> Lưu lại</button>";
                } else if ($_SESSION['level'] == 0) {
                  echo "<button type='button' class='btn btn-warning' ><i class='fa fa-save'></i> Lưu lại</button>";
                }
                ?>

              </div>
            </div>
          </div>
          <!-- /.col-->
        </div>
      </form>
    </section>
    <!-- /.content -->
    <?php
// Kết nối cơ sở dữ liệu
include 'config/db_connect.php';

// Kiểm tra nếu người dùng nhấn nút "Lưu lại"
if (isset($_POST['saveEdit'])) {
    // Lấy dữ liệu từ form
    $id = $_POST['id'];  // ID phòng ban (ẩn)
    $roomCode = $_POST['roomCode'];  // Mã phòng ban (không thể chỉnh sửa)
    $roomName = $_POST['roomName'];  // Tên phòng ban
    $description = $_POST['description'];  // Mô tả
    $personEdit = $_POST['personEdit'];  // Người sửa
    $dateEdit = $_POST['dateEdit'];  // Ngày sửa

    // Kiểm tra nếu tên phòng ban không bị trống
    if (!empty($roomName)) {
        // Tạo truy vấn để cập nhật thông tin phòng ban
        $sql = "UPDATE phongban 
                SET ten_phong_ban = '$roomName', 
                    ghi_chu = '$description', 
                    nguoi_sua = '$personEdit', 
                    ngay_sua = '$dateEdit' 
                WHERE id = '$id'";

        // Thực thi truy vấn
        if (mysqli_query($conn, $sql)) {
            // Thông báo thành công và chuyển hướng về trang danh sách phòng ban
            echo "<script>alert('Thông tin phòng ban đã được cập nhật thành công'); window.location.href='quanly_phongban.php';</script>";
        } else {
            // Thông báo lỗi nếu có lỗi xảy ra
            echo "<script>alert('Đã xảy ra lỗi khi cập nhật thông tin phòng ban: " . mysqli_error($conn) . "');</script>";
        }
    } else {
        // Thông báo lỗi nếu tên phòng ban bị trống
        echo "<script>alert('Vui lòng nhập tên phòng ban.');</script>";
    }
}

// Đóng kết nối cơ sở dữ liệu
mysqli_close($conn);
?>

  </div>

  <!-- /.content-wrapper -->
  </div>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src=" plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src=" plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src=" plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src=" plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src=" plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src=" plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src=" plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src=" plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src=" plugins/moment/moment.min.js"></script>
  <script src=" plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src=" plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src=" plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src=" plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src=" dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src=" dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src=" dist/js/pages/dashboard.js"></script>
  <!-- Summernote -->
  <script src=" plugins/summernote/summernote-bs4.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src=" plugins/datatables/jquery.dataTables.min.js"></script>
  <script src=" plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src=" plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src=" plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src=" plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src=" plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src=" plugins/jszip/jszip.min.js"></script>
  <script src=" plugins/pdfmake/pdfmake.min.js"></script>
  <script src=" plugins/pdfmake/vfs_fonts.js"></script>
  <script src=" plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src=" plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src=" plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
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
<script>
  $(function() {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
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
      alertBox.classList.add('fade-out'); // Thêm class để làm mờ dần và trượt ra
      setTimeout(function() {
        alertBox.remove(); // Xóa hoàn toàn thông báo sau khi mờ dần
      }, 600); // Phải phù hợp với thời gian `transition` trong CSS (0.6 giây)
    }, 3000); // 3 giây trước khi bắt đầu mờ dần
  }

  // PHP truyền thông báo sang JavaScript
  var message = "<?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>";
  var type = "<?php echo htmlspecialchars($type === 'success' ? 'alert-success' : 'alert-danger', ENT_QUOTES, 'UTF-8'); ?>";

  // Nếu có thông báo từ PHP, hiển thị thông báo
  if (message) {
    showAlert(message, type);
  }
</script>
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</html>