<?php
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include "config/db_connect.php";
    // hien thi record
    $kt = "SELECT * FROM khenthuong_kyluat WHERE ma_kt = '$id'";
    $resultKT = mysqli_query($conn, $kt);
    $rowKT = mysqli_fetch_array($resultKT);
    // set value active
    $nvAC = "SELECT nv.id as idAC, ma_nv, ten_nv, lktkl.id as loai_id, ten_loai FROM khenthuong_kyluat ktkl, nhan_vien nv, loai_khenthuong_kyluat lktkl WHERE nv.id = ktkl.nhanvien_id AND lktkl.id = ktkl.loai_kt_id AND  ma_kt = '$id'";
    $resultNVAC = mysqli_query($conn, $nvAC);
    $rowNVAC = mysqli_fetch_array($resultNVAC);
    $idNVAC = $rowNVAC['idAC'];
    $loaiAC = $rowNVAC['loai_id'];
    // hien thi loai khen thuong
    $showData = "SELECT id, ma_loai, ten_loai FROM loai_khenthuong_kyluat WHERE id <> $loaiAC AND flag = 1 ORDER BY ngay_tao DESC";
    $result = mysqli_query($conn, $showData);
    $arrShow = array();
    while ($row = mysqli_fetch_array($result)) {
        $arrShow[] = $row;
    }
    // hien thi nhan vien
    $nv = "SELECT id, ma_nv, ten_nv FROM nhan_vien WHERE id <> $idNVAC";
    $resultNV = mysqli_query($conn, $nv);
    $arrNV = array();
    while ($rowNV = mysqli_fetch_array($resultNV)) {
        $arrNV[] = $rowNV;
    }
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
                        <h1>Khen thưởng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Khen thưởng</a></li>
                            <li class="breadcrumb-item active">Sửa Khen thưởng</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <form action="sua_khen_thuong.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Chỉnh sửa khen thưởng
                                </h3>
                            </div>
                            <div class="card-body">
                                <label for="exampleInputPassword1">Mã khen thưởng</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $id ?>" name="makt" readonly>
                            </div>
                            <div class="card-body">
                                <label for="exampleInputPassword1">Số quyết định</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $rowKT['so_qd']; ?>" name="soqd">
                            </div>
                            <div class="card-body">
                                <label for="exampleInputPassword1">Ngày quyết định</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo date_format(date_create($rowKT['ngay_qd']), 'Y-m-d'); ?>" name="ngayqd">
                            </div>
                            <div class="card-body">
                                <label for="exampleInputPassword1">Tên khen thưởng</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $rowKT['ten_khen_thuong']; ?>" name="tenkt">
                            </div>
                            <div class="card-body">
                                <label for="status">Nhân viên <span style="color: red;">*</span> </label>
                                <select class="form-control" name="nhanvien" id="status" required>
                                    <option value="<?php echo $rowNVAC['idAC']; ?>"><?php echo $rowNVAC['ma_nv']; ?> - <?php echo $rowNVAC['ten_nv']; ?></option>
                                    <?php
                                    foreach ($arrNV as $nv) {
                                        echo "<option value='" . $nv['id'] . "'>" . $nv['ma_nv'] . " - " . $nv['ten_nv'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="card-body">
                                <label for="status">Loại khen thưởng </label>
                                <select class="form-control" name="loaikt" id="status" required>
                                    <option value="<?php echo $rowNVAC['loai_id']; ?>"><?php echo $rowNVAC['ten_loai']; ?></option>
                                    <?php
                                    foreach ($arrShow as $arrS) {
                                        echo "<option value='" . $arrS['id'] . "'>" . $arrS['ten_loai'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="card-body">
                                <label for="exampleInputPassword1">Số tiền thưởng <span style="color: red;">*</span></label>
                                <input type="number" class="form-control" id="exampleInputPassword1" value="<?php echo $rowKT['so_tien']; ?>" name="tienthuong">
                            </div>
                            <div class="card-body">
                                <label for="exampleInputEmail1">Mô tả: </label>
                                <textarea id="summernote" name="description"> <?php echo $rowKT['ghi_chu']; ?>
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
                                <?php
                                if ($_SESSION['level'] == 1) {
                                    echo "<button type='submit' class='btn btn-primary' name='suakhenthuong'><i class='fa fa-save'></i> Lưu lại</button>";
                                } else if ($_SESSION['level'] == 0) {
                                    echo "<button type='button' class='btn btn-primary'><i class='fa fa-plus'></i> Lưu lại</button>";
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
        include "config/db_connect.php";

        if (isset($_POST['suakhenthuong'])) {
            // Lấy dữ liệu từ form
            $makt = $_POST['makt'];
            $soqd = $_POST['soqd'];
            $ngayqd = $_POST['ngayqd'];
            $tenkt = $_POST['tenkt'];
            $nhanvien_id = $_POST['nhanvien'];
            $loai_id = $_POST['loaikt'];
            $tienthuong = $_POST['tienthuong'];
            $description = $_POST['description'];
            $nguoisua = $_POST['nguoisua'];
            $ngaysua = $_POST['ngaysua'];
            if ($tienthuong < 100000  && $tienthuong > 2000000) {
                echo "<script>alert('Số tiền thưởng không hợp lệ!'); window.history.back();</script>";
            } else {
            if ($conn) {
                // Câu truy vấn cập nhật dữ liệu khen thưởng
                $query = "UPDATE khenthuong_kyluat 
                  SET so_qd = '$soqd', ngay_qd = '$ngayqd', ten_khen_thuong = '$tenkt', nhanvien_id = '$nhanvien_id', 
                      loai_kt_id = '$loai_id', so_tien = '$tienthuong', ghi_chu = '$description', nguoi_sua = '$nguoisua', ngay_sua = '$ngaysua'
                  WHERE ma_kt = '$makt'";
                // Thực hiện cập nhật
                if (mysqli_query($conn, $query)) {
                    echo "<script>alert('Cập nhật khen thưởng thành công!'); window.location.href = 'tao_khen_thuong.php';</script>";
                } else {
                    echo "<script>alert('Cập nhật khen thưởng thất bại: " . mysqli_error($conn) . "');</script>";
                }
            } else {
                echo "<script>alert('Không thể kết nối tới cơ sở dữ liệu');</script>";
            }
            // Đóng kết nối
            mysqli_close($conn);
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