<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$malt = "MLT" . time();
// show data
include "config/db_connect.php";
$nv = "SELECT id, ma_nv, ten_nv FROM nhan_vien WHERE trang_thai <> 0";
$resultNV = mysqli_query($conn, $nv);
$arrNV = array();
while ($rowNV = mysqli_fetch_array($resultNV)) {
    $arrNV[] = $rowNV;
}
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
                        <h1>Lịch tuần</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Quản lý lịch tuần</a></li>
                            <li class="breadcrumb-item active">Tạo lịch tuần</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <form action="tao_lich_tuan.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Tạo lịch tuần
                                </h3>
                            </div>
                            <div class="card-body">
                                <label for="exampleInputPassword1">Mã lịch tuần</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $malt  ?>" name="malt" readonly>
                            </div>
                            <div class="card-body">
                                <label for="status">Nhân viên </label>
                                <select class="form-control" name="nhanvien" id="status" required>
                                    <option>--Chọn nhân viên--</option>
                                    <?php
                                    foreach ($arrNV as $nv) {
                                        echo "<option value='" . $nv['id'] . "'>" . $nv['ma_nv'] . " - " . $nv['ten_nv'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="card-body">
                                <label for="exampleInputPassword1">Nhiệm vụ</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập nhiệm vụ cần giao" name="nhiemvu" required>
                            </div>
                            <div class="card-body">
                                <label for="exampleInputPassword1">Ngày bắt đầu</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" readonly name="ngaybatdau" value="<?php echo date('Y-m-d H:i:s') ?>">
                            </div>
                            <div class="card-body">
                                <label for="exampleInputPassword1">Ngày kết thúc</label>
                                <input type="date" class="form-control" id="exampleInputPassword1" name="ngayketthuc">
                            </div>
                            <div class="card-body">
                                <label for="exampleInputEmail1">Mô tả: </label>
                                <textarea id="summernote" name="description">
                                    </textarea>
                            </div>
                            <div class="card-body">
                                <label for="status">Trạng thái công việc <b style="color: red;">*</b></label>
                                <select class="form-control" name="status" id="status" required>
                                    <option>--Chọn trạng thái--</option>
                                    <option value="0">Chưa hoàn thành</option>
                                    <option value="1">Đã hoàn thành</option>
                                </select>
                            </div>
                            <div class="card-body">
                                <label for="exampleInputPassword1">Người tạo</label>
                                <input type="text" class="form-control" id="exampleInputPassword1"
                                    value="<?php
                                            echo isset($_SESSION['user_firstname']) ? $_SESSION['user_firstname'] : '';
                                            echo ' ';
                                            echo isset($_SESSION['user_lastname']) ? $_SESSION['user_lastname'] : '';
                                            ?>"
                                    name="nguoitao" readonly>
                            </div>
                            <div class="card-body">
                                <label for="exampleInputPassword1">Ngày tạo</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" readonly name="ngaytao" value="<?php echo date('Y-m-d H:i:s') ?>">
                            </div>
                            <div style="margin: 20px;">
                                <?php
                                if ($_SESSION['level'] == 1) {
                                    echo "<button type='submit' class='btn btn-primary' name='taolichtuan'><i class='fa fa-plus'></i> Tạo lịch tuần</button>";
                                } else if ($_SESSION['level'] == 0) {
                                    echo "<button type='button' class='btn btn-primary'><i class='fa fa-plus'></i> Tạo trình độ</button>";
                                }
                                ?>
                            </div>
                            <!-- /.col-->
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.card -->

        </section>
        <?php
// Kết nối cơ sở dữ liệu
include 'config/db_connect.php';

// Kiểm tra nếu người dùng đã gửi form
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['taolichtuan'])) {
    // Lấy dữ liệu từ form
    $malt = $_POST['malt'];
    $nhanvien_id = $_POST['nhanvien'];
    $nhiemvu = $_POST['nhiemvu'];
    $ngaybatdau = $_POST['ngaybatdau'];
    $ngayketthuc = $_POST['ngayketthuc'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $nguoitao = $_POST['nguoitao'];
    $ngaytao = $_POST['ngaytao'];
    // Kiểm tra các trường cần thiết đã được nhập
    if (!empty($nhanvien_id) && !empty($nhiemvu) && !empty($ngaybatdau) && !empty($ngayketthuc) && isset($status)) {
        // Chuẩn bị câu lệnh SQL để thêm lịch tuần
        $sql = "INSERT INTO lich_tuan (ma_lt, nhan_vien_id, nhiem_vu, ngay_bat_dau, ngay_ket_thuc, ghi_chu, trang_thai_cv, nguoi_tao, ngay_tao) 
                VALUES ('$malt', '$nhanvien_id', '$nhiemvu', '$ngaybatdau', '$ngayketthuc', '$description', '$status', '$nguoitao', '$ngaytao')";
       if (mysqli_query($conn, $sql)) {

           echo "<script>alert('Tạo lịch tuần thành công!'); window.location.href = 'danh_sach_lich_tuan.php';</script>";
       } else {
           // Nếu có lỗi khi cập nhật, hiển thị thông báo lỗi
           echo "<script>alert('Có lỗi xảy ra !');</script>";
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
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    });
</script>

</html>