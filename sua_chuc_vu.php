<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once('config/db_connect.php');
$sql = "Select * from tbl_menu WHERE is_Active = 'Yes';";
$query = mysqli_query($conn, $sql);
$macv = "MCV" . time();
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
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-----------Modal end------>
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src=" dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
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
                            <h1>Chức vụ</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Nhân viên</a></li>
                                <li class="breadcrumb-item active">Chức vụ</li>
                                <li class="breadcrumb-item active">Sửa chức vụ</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <?php
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        include "config/db_connect.php";
                        $truyvan = "SELECT * FROM chuc_vu WHERE id = '$id'";
                        $que = mysqli_query($conn, $truyvan);
                        $ketqua = mysqli_fetch_assoc($que);
                    }
                ?>
                <form action="sua_chuc_vu.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $ketqua['id']  ?>" name="id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Chỉnh sửa chức vụ
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <label for="exampleInputPassword1">Mã chức vụ</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $macv  ?>" name="macv" readonly>
                                </div>
                                <div class="card-body">
                                    <label for="exampleInputPassword1">Tên chức vụ </label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $ketqua['ten_chuc_vu']  ?>" name="tencv" required>
                                </div>
                                <div class="card-body">
                                    <label for="exampleInputPassword1">Lương ngày</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $ketqua['luong_ngay']  ?>" name="luong" required>
                                </div>
                                <div class="card-body">
                                    <label for="exampleInputEmail1">Mô tả: </label>
                                    <textarea id="summernote" name="description"><?php echo $ketqua['ghi_chu']  ?>
                                    </textarea>
                                </div>
                                <div class="card-body">
                                    <label for="exampleInputPassword1">Người sửa</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                        value="<?php
                                                echo isset($_SESSION['user_firstname']) ? $_SESSION['user_firstname'] : '';
                                                echo ' ';
                                                echo isset($_SESSION['user_lastname']) ? $_SESSION['user_lastname'] : '';
                                                ?>"
                                        name="nguoisua" readonly>
                                </div>
                                <div class="card-body">
                                    <label for="exampleInputPassword1">Ngày sửa</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" readonly name="ngaysua" value="<?php echo date('Y-m-d H:i:s') ?>">
                                </div>
                                <div style="margin: 20px;">
                                <button type='submit' class='btn btn-warning' name='suachucvu'><i class='fa fa-edit'></i> Lưu lại</button>
                            </div>
                                <!-- /.col-->
                            </div>                         
                        </div>
                    </div>
                </form>
                </div>
                <!-- /.card -->

            </section>
            <?php
include 'config/db_connect.php';

if (isset($_POST['suachucvu'])) {

    $id = $_POST['id']; 
    $macv = $_POST['macv']; 
    $tencv = $_POST['tencv']; 
    $luong = $_POST['luong'];
    $mota = $_POST['description']; 
    $nguoisua = $_POST['nguoisua'];
    $ngaysua = $_POST['ngaysua'];

    // Kiểm tra các trường nhập vào có đầy đủ không
    if (!empty($macv) && !empty($tencv) && !empty($luong)) {
        // Câu lệnh SQL để cập nhật thông tin chức vụ trong bảng "chuc_vu"
        $sql = "UPDATE chuc_vu 
                SET ten_chuc_vu = '$tencv', 
                    luong_ngay = '$luong', 
                    ghi_chu = '$mota', 
                    nguoi_sua = '$nguoisua', 
                    ngay_sua = '$ngaysua' 
                WHERE id = '$id'";

        if (mysqli_query($conn, $sql)) {

            echo "<script>alert('Cập nhật chức vụ thành công!'); window.location.href = 'them_chuc_vu.php';</script>";
        } else {
            // Nếu có lỗi khi cập nhật, hiển thị thông báo lỗi
            echo "<script>alert('Có lỗi xảy ra khi cập nhật chức vụ!');</script>";
        }
    } else {
        // Nếu các trường không đầy đủ, hiển thị thông báo
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin!');</script>";
    }
}
mysqli_close($conn);
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
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
</body>
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
</html>