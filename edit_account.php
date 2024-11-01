<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once('config/db_connect.php');
$sql = "Select * from tbl_menu WHERE is_Active = 'Yes';";
$query = mysqli_query($conn, $sql);
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
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
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
                                <img src=" dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
                        <img src=" img/admin.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href=" index.php" class="d-block">Quản trị viên</a>
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
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Nhân viên
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="quanly_phongban.php" class="nav-link">
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
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
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
              <a href="all_account.php" class="nav-link active">
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
                            <h1>Chỉnh sửa tài khoản</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
                                <li class="breadcrumb-item active">Danh sách tài khoản</li>
                                <li class="breadcrumb-item active">Chỉnh sửa tài khoản</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    include 'config/db_connect.php';
                    $sql1 = "SELECT * FROM tai_khoan WHERE id = '$id';";
                    $query1 = mysqli_query($conn, $sql1);
                    $row1 = mysqli_fetch_assoc($query1);
                }
                ?>
                <form action="edit_account.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Sửa tài khoản
                                    </h3>
                                </div>
                                <input type="hidden" value="<?php echo $row1['id'] ?>" name="id">
                                <div class="card-body">
                                    <label for="exampleInputEmail1">Chọn ảnh: </label>
                                    <input type="file" class="form-control" id="exampleInputEmail1" name="image">
                                    <p class="help-block">Vui lòng chọn file đúng định dạng: jpg, jpeg, png, gif.</p>
                                </div>
                                <div class="card-body">
                                    <label for="exampleInputPassword1">Họ: <b style="color: red;">*</b></label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $row1['ho'] ?>" name="firstname">
                                </div>
                                <div class="card-body">
                                    <label for="exampleInputPassword1">Tên: <b style="color: red;">*</b></label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $row1['ten'] ?>" name="lastname">
                                </div>
                                <div class="card-body">
                                    <label for="exampleInputPassword1">Email: <b style="color: red;">*</b></label>
                                    <input type="email" class="form-control" id="exampleInputPassword1" value="<?php echo $row1['email'] ?>" name="email" readonly>
                                </div>
                                <div class="card-body">
                                    <label for="exampleInputPassword1">Số điện thoại:</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $row1['so_dt'] ?>" name="phone" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>">
                                </div>
                                <div class="card-body">
                                    <label for="level">Quyền hạn:</label>
                                    <select class="form-control" name="level" id="level">
                                        <?php
                                        if ($row1['quyen'] == 1) {
                                            echo '<option value="1">Quản trị viên</option>';
                                            echo '<option value="0">Nhân viên</option>';
                                        } else if ($row1['quyen'] == 0) {
                                            echo '<option value="0">Nhân viên</option>';
                                            echo '<option value="1">Quản trị viên</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="card-body">
                                    <label for="status">Trạng thái:</label>
                                    <select class="form-control" name="status" id="status">
                                    <?php
                                        if ($row1['trang_thai'] == 1) {
                                            echo '<option value="1">Đang hoạt động</option>';
                                            echo '<option value="0"Ngừng hoạt động</option>';
                                        } else if ($row1['trang_thai'] == 0) {
                                            echo '<option value="0"Ngừng hoạt động</option>';
                                            echo '<option value="1">Đang hoạt động</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- /.col-->
                            </div>
                            <div style="margin: 20px;">
                                <button type='submit' class='btn btn-primary' name='editaccount'><i class='fa fa-save'></i> Lưu lại</button>
                            </div>
                </form>
                <!-- /.card -->
                <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </section>
        <?php
// Kết nối cơ sở dữ liệu
include "config/db_connect.php";
if (isset($_POST['editaccount'])) {
    // Nhận dữ liệu từ form
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $level = mysqli_real_escape_string($conn, $_POST['level']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    
    // Xử lý ảnh tải lên nếu có
    $target_dir = "uploads/";  // Thư mục lưu ảnh
    $image_file = $_FILES["image"]["name"];
    
    if ($image_file) {
        $target_file = $target_dir . basename($image_file);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");

        // Kiểm tra định dạng file ảnh
        if (!in_array($imageFileType, $allowed_extensions)) {
            echo "<script>alert('Chỉ chấp nhận các định dạng ảnh: jpg, jpeg, png, gif');</script>";
            exit();
        }

        // Di chuyển ảnh vào thư mục uploads
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = $target_file;
        } else {
            echo "<script>alert('Lỗi trong quá trình tải ảnh lên.');</script>";
            exit();
        }

        // Cập nhật thông tin tài khoản bao gồm ảnh
        $sql = "UPDATE tai_khoan 
                SET ho = '$firstname', ten = '$lastname', so_dt = '$phone', hinh_anh = '$image_path', quyen = '$level', trang_thai = '$status' 
                WHERE id = '$id'";
    } else {
        // Cập nhật thông tin tài khoản không bao gồm ảnh
        $sql = "UPDATE tai_khoan 
                SET ho = '$firstname', ten = '$lastname', so_dt = '$phone', quyen = '$level', trang_thai = '$status' 
                WHERE id = '$id'";
    }

    // Thực thi câu lệnh cập nhật
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Cập nhật tài khoản thành công!'); window.location.href='all_account.php';</script>";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
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