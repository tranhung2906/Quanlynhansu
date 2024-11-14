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
        <?php include "menu.php"; ?>
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
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách tính lương nhân viên</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="post">
                        <?php if($_SESSION['level']==1){
                        echo "<button type='submit' class='btn btn-success' name='calculate_salary'><i class='fa fa-money-bill'></i> Tính lương</button>";
                        }else{
                            echo '
                                <div class=" alert alert-danger alert-dismissible">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fas fa-ban"></i> Thông báo!</h5>
                                 Bạn không đủ thẩm quyền để thực hiện chức năng này!
                               </div>';
                        }?>
                </form>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Nhân viên</th>
                                <th>Chức vụ</th>
                                <th>Số ngày công</th>
                                <th>Tạm ứng</th>
                                <th>Khoản trừ bảo hiểm</th>
                                <th>Phụ cấp</th>
                                <th>Khen thưởng, Kỷ luật</th>
                                <th>Lương ngày</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php
$count = 1;
// show danh sach ung luong
$sql = "SELECT 
    nv.ten_nv,
    cv.ten_chuc_vu,                      
    cc.ngay_cong,                         
    ((cv.luong_ngay * cc.ngay_cong * 0.08) + 
     (cv.luong_ngay * cc.ngay_cong * 0.0015) + 
     (cv.luong_ngay * cc.ngay_cong * 0.01)) AS khoan_tru,
    tu.so_tien_ung, 
    cv.luong_ngay,
    IFNULL(
        SUM(
            CASE 
                WHEN ktkl.flag = 1 THEN ktkl.so_tien
                ELSE -ktkl.so_tien
            END
        ), 0
    ) AS khen_thuong_ky_luat,
    (hsl.he_so * cc.ngay_cong * cv.luong_ngay) AS phu_cap
FROM 
    nhan_vien nv
LEFT JOIN 
    cham_cong cc ON nv.id = cc.nhanvien_id
LEFT JOIN 
    chuc_vu cv ON nv.chuc_vu_id = cv.id
LEFT JOIN 
    tam_ung tu ON nv.id = tu.nhan_vien_id
LEFT JOIN 
    he_so_luong hsl ON cv.id = hsl.chuc_vu_id
LEFT JOIN 
    khenthuong_kyluat ktkl ON nv.id = ktkl.nhanvien_id
WHERE 
    nv.trang_thai = 1
GROUP BY 
    nv.id, nv.ten_nv, cv.ten_chuc_vu, cc.ngay_cong, tu.so_tien_ung, cv.luong_ngay, hsl.he_so";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
?>
    <tr>
        <td><?php echo $count++; ?></td>
        <td><?php echo $row['ten_nv']; ?></td>
        <td><?php echo $row['ten_chuc_vu']; ?></td>
        <td><?php echo $row['ngay_cong']; ?></td>
        <td><?php echo number_format($row['so_tien_ung'], 0, ',', '.'); ?> VND</td>
        <td><?php echo number_format($row['khoan_tru'], 0, ',', '.'); ?> VND</td>
        <td><?php echo number_format($row['phu_cap'], 0, ',', '.'); ?> VND</td>
        <td><?php echo number_format($row['khen_thuong_ky_luat'], 0, ',', '.'); ?> VND</td>
        <td><?php echo number_format($row['luong_ngay'], 0, ',', '.'); ?> VND</td>
    </tr>
<?php
}
?>
        </section>
        <?php
if (isset($_POST['calculate_salary'])) {
    $ngay_cham = date('Y-m-d');
    $sql = "SELECT 
                nv.id AS nhanvien_id,
                nv.ten_nv,
                cv.ten_chuc_vu,                      
                cc.ngay_cong,                         
                ((cv.luong_ngay * cc.ngay_cong * 0.08) + 
                 (cv.luong_ngay * cc.ngay_cong * 0.0015) + 
                 (cv.luong_ngay * cc.ngay_cong * 0.01)) AS khoan_tru,
                IFNULL(tu.so_tien_ung, 0) AS so_tien_ung, 
                cv.luong_ngay,
                IFNULL(
                    SUM(
                        CASE 
                            WHEN ktkl.flag = 1 THEN ktkl.so_tien
                            ELSE -ktkl.so_tien
                        END
                    ), 0
                ) AS khen_thuong_ky_luat,
                (hsl.he_so * cc.ngay_cong * cv.luong_ngay) AS phu_cap
            FROM 
                nhan_vien nv
            LEFT JOIN 
                cham_cong cc ON nv.id = cc.nhanvien_id
            LEFT JOIN 
                chuc_vu cv ON nv.chuc_vu_id = cv.id
            LEFT JOIN 
                tam_ung tu ON nv.id = tu.nhan_vien_id
            LEFT JOIN 
                he_so_luong hsl ON cv.id = hsl.chuc_vu_id
            LEFT JOIN 
                khenthuong_kyluat ktkl ON nv.id = ktkl.nhanvien_id
            WHERE 
                nv.trang_thai = 1
            GROUP BY 
                nv.id, nv.ten_nv, cv.ten_chuc_vu, cc.ngay_cong, tu.so_tien_ung, cv.luong_ngay, hsl.he_so";

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $nhanvien_id = $row['nhanvien_id'];
        $ngay_cong = $row['ngay_cong'];
        $luong_ngay = $row['luong_ngay'];
        $tam_ung = $row['so_tien_ung'];
        $khoan_tru = $row['khoan_tru'];
        $phu_cap = $row['phu_cap'];
        $khen_thuong_ky_luat = $row['khen_thuong_ky_luat'];
        $luong_thang = ($luong_ngay * $ngay_cong) + $phu_cap + $khen_thuong_ky_luat;

        $thuc_lanh = $luong_thang - $khoan_tru - $tam_ung;
        $ma_luong = 'ML' . time();
        $insert_sql = "INSERT INTO luong (nhanvien_id, ma_luong, luong_thang, ngay_cong, phu_cap, khoan_nop, tam_ung, thuc_lanh, ngay_cham) 
                       VALUES ('$nhanvien_id', '$ma_luong', '$luong_thang', '$ngay_cong', '$phu_cap', '$khoan_tru', '$tam_ung', '$thuc_lanh', '$ngay_cham')";

        if (mysqli_query($conn, $insert_sql)) {
            echo "<script>alert('Tính lương thành công'); window.location.href='bang_luong.php';</script>";
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