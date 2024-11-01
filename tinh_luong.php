<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$mal = "ML" . time();
// show data
include "config/db_connect.php";
$nv = "SELECT id, ma_nv, ten_nv FROM nhan_vien WHERE trang_thai <> 0";
$resultNV = mysqli_query($conn, $nv);
$arrNV = array();
while ($rowNV = mysqli_fetch_array($resultNV)) {
    $arrNV[] = $rowNV;
}
// thang tinh luong
$thang = date_create(date("Y-m-d"));
$thangFormat = date_format($thang, "m/Y");
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
                            <a href="quanly_phongban.php" class="nav-link ">
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
                            <a href="them_bang_cap.php" class="nav-link ">
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
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>
                            Quản lý lương
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="bang_luong.php" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bảng tính lương</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/icons.html" class="nav-link active">
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
                        <h1>Tính lương</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Quản lý lương</a></li>
                            <li class="breadcrumb-item active">Tính lương</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <form action="tinh_luong.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Tính lương nhân viên
                                </h3>
                            </div>
                            <div class="card-body">
                                <label for="exampleInputPassword1">Mã lương</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $mal  ?>" name="mal" readonly>
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
                                <label for="exampleInputPassword1">Số ngày công <b style="color: red;">*</b></label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập số ngày công" name="luong" required>
                            </div>
                            <div class="card-body">
                                <label for="exampleInputEmail1">Phụ cấp (Phụ cấp chức vụ, xăng xe, ăn trưa,...): </label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="Chọn 'tính phụ cấp' để biết số tiền phụ cấp" name="phuCap" id="phuCap">
                                    </div>
                                    <div class="col-md-8">
                                        <button type="button" class="btn btn-primary btn-flat" id="tinhPhuCap"><i class="fa fa-calculator"></i> Tính phụ cấp</button>
                                    </div>
                                </div>
                                <small style="color: red;"><?php if (isset($error['phuCap'])) {
                                                                echo 'Vui lòng chọn tính phụ cấp';
                                                            } ?></small>
                                <small style="color: red;"><?php if (isset($error['phuCapSo'])) {
                                                                echo 'Vui lòng nhập số';
                                                            } ?></small>
                            </div>
                            <div class="card-body">
                                <label for="exampleInputEmail1">Tạm ứng: </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="tamUng" placeholder="Nhập số tiền muốn tạm ứng" value="0">
                                <small style="color: red;"><?php if (isset($error['tamUngQuaLon'])) {
                                                                echo 'Bạn đã tạm ứng vượt quá 2/3 lương tháng. Chỉ tạm ứng tối đa: ' . number_format(ceil($tamUngChoPhep)) . "vnđ";
                                                            } ?></small>
                            </div>
                            <div class="card-body">
                                <label for="exampleInputEmail1">Ngày tính lương: </label>
                                <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Nhập số tiền phụ cấp" name="ngayTinhLuong" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="card-body">
                                <label for="exampleInputEmail1">Mô tả: </label>
                                <textarea id="summernote" name="description">
                                    </textarea>
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
                                    echo "<button type='submit' class='btn btn-primary' name='themchucvu'><i class='fa fa-money-bill'></i> Tính lương nhân viên</button>";
                                } else if ($_SESSION['level'] == 0) {
                                    echo "<button type='button' class='btn btn-primary'><i class='fa fa-plus'></i> Tạo chức vụ</button>";
                                }
                                ?>
                            </div>
                            <!-- /.col-->
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ form
            $maLuong = $_POST['mal'];
            $nhanvien = $_POST['nhanvien'];
            $soNgayCong = $_POST['luong']; // Số ngày công
            $phuCap = $_POST['phuCap']; // Phụ cấp
            $tamUng = $_POST['tamUng']; // Tạm ứng
            $ngayTinhLuong = $_POST['ngayTinhLuong']; // Ngày tính lương
            $moTa = $_POST['description']; // Mô tả
            $nguoiTao = $_POST['nguoitao']; // Người tạo
            $ngayTao = $_POST['ngaytao']; // Ngày tạo

            // Kết nối cơ sở dữ liệu
            include 'config/db_connect.php'; // Kết nối cơ sở dữ liệu

            // Truy vấn để lấy chức vụ của nhân viên
            $sqlChucVu = "SELECT chuc_vu.luong_ngay
                  FROM nhan_vien 
                  INNER JOIN chuc_vu ON nhan_vien.chuc_vu_id = chuc_vu.id 
                  WHERE nhan_vien.id = '$nhanvien'";

            $resultChucVu = mysqli_query($conn, $sqlChucVu);
            if (mysqli_num_rows($resultChucVu) > 0) {
                $row = mysqli_fetch_assoc($resultChucVu);
                $luongCoBan = $row['luong_ngay']; // Lương cơ bản từ bảng chức vụ
            } else {
                echo "<script>alert('Không tìm thấy thông tin chức vụ của nhân viên!');</script>";
                exit();
            }

            // Tính tổng lương dựa trên số ngày công và lương cơ bản
            $tongLuong = $soNgayCong * $luongCoBan;

            // Nếu phụ cấp không được nhập thì gán giá trị bằng 0
            if (empty($phuCap)) {
                $phuCap = 0;
            }

            // Tính tổng thu nhập = lương cơ bản + phụ cấp
            $tongThuNhap = $tongLuong + $phuCap;
            // tinh cac khoan phai nop lai
            // bao hiem xa hoi: 8%
            $baoHiemXaHoi = $tongLuong * (8 / 100);
            // bao hiem y te : 1,5%
            $baoHiemYTe = $tongLuong * (1.5 / 100);
            // bao hiem that nghiep
            $baoHiemThatNghiep = $tongLuong * (1 / 100);
            // tinh tong cac khoan tru
            $tongKhoanTru = $baoHiemXaHoi + $baoHiemYTe + $baoHiemThatNghiep;
            // Kiểm tra nếu tạm ứng lớn hơn 2/3 tổng thu nhập thì thông báo lỗi
            if ($tamUng > (2 / 3) * $tongThuNhap) {
                $tamUngChoPhep = (2 / 3) * $tongThuNhap;
                echo "<script>alert('Tạm ứng quá lớn! window'); window.location.href='tinh_luong.php';</script>";
                exit();
            } else {
                // Tính lương thực nhận = tổng thu nhập - tạm ứng
                $luongThucNhan = $tongThuNhap - $tamUng - $tongKhoanTru;

                // Lưu dữ liệu vào cơ sở dữ liệu (ví dụ về cách lưu)
                $sql = "INSERT INTO luong (ma_luong, nhanvien_id, ngay_cong, luong_thang ,phu_cap, tam_ung, khoan_nop, ngay_cham, thuc_lanh, ghi_chu, nguoi_tao, ngay_tao) 
                VALUES ('$maLuong', '$nhanvien', '$soNgayCong',$tongLuong ,'$phuCap', '$tamUng',$tongKhoanTru ,'$ngayTinhLuong', '$luongThucNhan', '$moTa', '$nguoiTao', '$ngayTao')";

                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Tính lương thành công!');</script>";
                } else {
                    echo "<script>alert('Có lỗi xảy ra khi tính lương!');</script>";
                }
            }
        }
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