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
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <!-----------Modal end------>
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src=" dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
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
    <?php include "menu.php";  ?>
    <!-- Sidebar Menu -->
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
            <h1>Tài khoản</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
              <li class="breadcrumb-item active">Tạo tài khoản</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <form action="add_account.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">
                  Tạo tài khoản
                </h3>
              </div>
              <?php
              if ($_SESSION['level'] == 0) {
                echo '<div class="card-body">
                                <div class=" alert alert-danger alert-dismissible">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fas fa-ban"></i> Thông báo!</h5>
                                 Bạn không đủ thẩm quyền để thực hiện chức năng này!
                               </div> 
                                </div>';
              }
              ?>
              <div class="card-body">
                <label for="exampleInputEmail1">Chọn ảnh: </label>
                <input type="file" class="form-control" id="exampleInputEmail1" name="image">
                <p class="help-block">Vui lòng chọn file đúng định dạng: jpg, jpeg, png, gif.</p>
              </div>
              <div class="card-body">
                <label for="exampleInputPassword1">Họ: <b style="color: red;">*</b></label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập họ" name="lastname">
              </div>
              <div class="card-body">
                <label for="exampleInputPassword1">Tên: <b style="color: red;">*</b></label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập tên" name="firstname">
              </div>
              <div class="card-body">
                <label for="exampleInputPassword1">Email: <b style="color: red;">*</b></label>
                <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Nhập email" name="email">
              </div>
              <div class="card-body">
                <label for="exampleInputPassword1">Mật khẩu: <b style="color: red;">*</b></label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập mật khẩu" name="password">
              </div>
              <div class="card-body">
                <label for="exampleInputPassword1">Nhập lại mật khẩu: <b style="color: red;">*</b></label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập lại mật khẩu" name="repass">
              </div>
              <div class="card-body">
                <label for="exampleInputPassword1">Số điện thoại:</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập số điện thoại" name="phone" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>">
              </div>
              <div class="card-body">
                <label for="level">Quyền hạn:</label>
                <select class="form-control" name="level" id="level">
                  <option value="1">Quản trị viên</option>
                  <option value="0">Nhân viên</option>
                </select>
              </div>

              <div class="card-body">
                <label for="status">Trạng thái:</label>
                <select class="form-control" name="status" id="status">
                  <option value="1">Đang hoạt động</option>
                  <option value="0">Ngừng hoạt động</option>
                </select>
              </div>
              <div style="margin: 20px;">
                <?php
                if ($_SESSION['level'] == 1) {
                  echo "<button type='submit' class='btn btn-primary' name='addaccount'><i class='fa fa-plus'></i> Tạo tài khoản mới</button>";
                } else if ($_SESSION['level'] == 0) {
                  echo "<button type='button' class='btn btn-primary'><i class='fa fa-plus'></i> Tạo tài khoản mới</button>";
                }
                ?>
              </div>
              <!-- /.col-->
            </div>

      </form>
      <!-- /.card -->
      <!-- /.card-body -->
  </div>
  <!-- /.card -->
  </section>
  <?php
  // Kết nối CSDL
  include "config/db_connect.php";

  if (isset($_POST['addaccount'])) {
    // Nhận dữ liệu từ form
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $repass = mysqli_real_escape_string($conn, $_POST['repass']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $level = mysqli_real_escape_string($conn, $_POST['level']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Kiểm tra xem mật khẩu và nhập lại mật khẩu có khớp không
    if ($password !== $repass) {
      echo "<script>alert('Mật khẩu không khớp!');</script>";
      exit();
    }

    // Kiểm tra xem email đã tồn tại hay chưa
    $check_email = "SELECT * FROM tai_khoan WHERE email='$email'";
    $result = $conn->query($check_email);

    if ($result->num_rows > 0) {
      echo "<script>alert('Email đã tồn tại!'); window.location.href='add_account.php';</script>";
      exit();
    }

    // Xử lý ảnh tải lên
    $target_dir = "uploads/";  // Thư mục lưu ảnh
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Kiểm tra xem file có phải là ảnh thật hay không
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
      echo "<script>alert('File không phải là ảnh.');  window.location.href='add_account.php';</script>";
      exit();
    }

    if ($_FILES["image"]["size"] > 2000000) {
      echo "<script>alert('File quá lớn. Chỉ cho phép file dưới 2MB.');  window.location.href='add_account.php';</script>";
      exit();
    }

    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowed_extensions)) {
      echo "<script>alert('Chỉ chấp nhận các định dạng ảnh: jpg, jpeg, png, gif'); </script>";
      exit();
    }

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      $sql = "INSERT INTO tai_khoan (ho, ten, hinh_anh, email, mat_khau, so_dt, quyen, trang_thai) 
        VALUES ('$firstname', '$lastname', '$target_file', '$email', '$password', '$phone', '$level', '$status')";
      if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Tạo tài khoản thành công!'); window.location.href='add_account.php';</script>";
      } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
      }
    } else {
      echo "<script>alert('Lỗi trong quá trình tải ảnh lên.');</script>";
    }
  }

  $conn->close();
  ?>

  <!-- /.content -->
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

</html>