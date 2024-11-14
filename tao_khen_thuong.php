<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$success = $_SESSION['success'] ?? [];
$showMess = $_SESSION['showMess'] ?? false;
unset($_SESSION['success'], $_SESSION['showMess']);
$malt = "MKT" . time();
// show data
include "config/db_connect.php";
$nv = "SELECT id, ma_nv, ten_nv FROM nhan_vien WHERE trang_thai <> 0";
$resultNV = mysqli_query($conn, $nv);
$arrNV = array();
while ($rowNV = mysqli_fetch_array($resultNV)) {
    $arrNV[] = $rowNV;
}
$lkt = "SELECT id, ma_loai, ten_loai FROM loai_khenthuong_kyluat WHERE flag = 1";
$resultkt = mysqli_query($conn, $lkt);
$arrlkt = array();
while ($rowlkt = mysqli_fetch_array($resultkt)) {
    $arrlkt[] = $rowlkt;
}
// hien thi khen thuong
$kt = "SELECT ktkl.id as id, ma_kt, ten_khen_thuong, ten_nv, so_qd, ngay_qd, ten_loai, so_tien, ktkl.ngay_tao as ngay_tao FROM khenthuong_kyluat ktkl, nhan_vien nv, loai_khenthuong_kyluat lktkl WHERE ktkl.nhanvien_id = nv.id AND ktkl.loai_kt_id = lktkl.id AND ktkl.flag = 1 ORDER BY ktkl.ngay_tao DESC";
$resultKT = mysqli_query($conn, $kt);
$arrKT = array();
while ($rowKT = mysqli_fetch_array($resultKT)) {
    $arrKT[] = $rowKT;
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
<?php
$message = '';
$type = '';

if (isset($_SESSION['save'])) {
    // Kiểm tra thông báo thêm
    $message = $_SESSION['save'];
    $type = 'success'; // Loại thông báo: success
    unset($_SESSION['save']); // Xóa session sau khi hiển thị
} elseif (isset($_SESSION['saveEdit'])) {
    // Kiểm tra thông báo sửa
    $message = $_SESSION['saveEdit'];
    $type = 'success'; // Loại thông báo: success
    unset($_SESSION['saveEdit']); // Xóa session sau khi hiển thị
} elseif (isset($_SESSION['xoakhenthuong'])) {
    // Kiểm tra thông báo xóa
    $message = $_SESSION['xoakhenthuong'];
    $type = 'success'; // Loại thông báo: success
    unset($_SESSION['xoakhenthuong']); // Xóa session sau khi hiển thị
}
?>
<!-- Hiển thị thông báo nếu có -->
<?php if ($message !== ''): ?>
    <div id="notificationContainer">
        <?php echo $message; ?>
    </div>
<?php endif; ?>

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
                            <li class="breadcrumb-item active">Tạo Khen thưởng</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <form action="tao_khen_thuong.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Tạo khen thưởng
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
                            <?php
                            if ($showMess && !empty($success)) {
                                echo '<div class="card-body" id="success-message">';
                                echo "<div class='alert alert-success alert-dismissible'>";
                                echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                                echo "<h5><i class='icon fa fa-check'></i> Thành công!</h5>";
                                foreach ($success as $suc) {
                                    echo $suc . "<br/>";
                                }
                                echo "</div>";
                                echo "</div>";
                            }
                            ?>
                            <div class="card-body">
                                <label for="exampleInputPassword1">Mã khen thưởng</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $malt  ?>" name="makt" readonly>
                            </div>
                            <div class="card-body">
                                <label for="exampleInputPassword1">Số quyết định</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập số quyết định" name="soqd">
                            </div>
                            <div class="card-body">
                                <label for="exampleInputPassword1">Ngày quyết định</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo date('Y/m/d')  ?>" name="ngayqd">
                            </div>
                            <div class="card-body">
                                <label for="exampleInputPassword1">Tên khen thưởng</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập tên khen thưởng" name="tenkt">
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
                                <label for="status">Loại khen thưởng </label>
                                <select class="form-control" name="loaikt" id="status" required>
                                    <option>--Chọn loại khen thưởng--</option>
                                    <?php
                                    foreach ($arrlkt as $kt) {
                                        echo "<option value='" . $kt['id'] . "'>" . $kt['ma_loai'] . " - " . $kt['ten_loai'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="card-body">
                                <label for="exampleInputPassword1">Số tiền thưởng</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập số tiền thưởng" name="tienthuong">
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
                                    echo "<button type='submit' class='btn btn-primary' name='taokhenthuong'><i class='fa fa-plus'></i> Tạo khen thưởng</button>";
                                } else if ($_SESSION['level'] == 0) {
                                    echo "<button type='button' class='btn btn-primary'><i class='fa fa-plus'></i> Tạo khen thưởng</button>";
                                }
                                ?>
                            </div>
                            <!-- /.col-->
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách khen thưởng</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã khen thưởng </th>
                                <th>Tên khen thưởng</th>
                                <th>Nhân viên</th>
                                <th>Số quyết định</th>
                                <th>Ngày quyết định</th>
                                <th>Tên loại</th>
                                <th>Số tiền</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <?php
                        $count = 1;
                        foreach ($arrKT as $kt) {
                        ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $kt['ma_kt']; ?></td>
                                <td><?php echo $kt['ten_khen_thuong']; ?></td>
                                <td><?php echo $kt['ten_nv']; ?></td>
                                <td><?php echo $kt['so_qd']; ?></td>
                                <td><?php echo $kt['ngay_qd']; ?></td>
                                <td><?php echo $kt['ten_loai']; ?></td>
                                <td><?php echo number_format($kt['so_tien'], 0, '', ','); ?> VNĐ</td>
                                <?php
                                if ($_SESSION['level'] == 1) {
                                    echo "<td style='width: 10px;'><a href='sua_khen_thuong.php?id=" . $kt['ma_kt'] . "' class='btn bg-orange btn-flat' name='editaccount'><i class='fa fa-edit'></i></a></td>";
                                } else if ($_SESSION['level'] == 0) {
                                    echo "<td style='width: 10px;'><a class='btn bg-orange btn-flat'><i class='fa fa-edit'></i></a></td>";
                                }
                                ?>
                                <?php
                                isset($_SESSION['level']) ? $_SESSION['level'] : '';
                                if ($_SESSION['level'] == 1) {
                                    echo "<td style='width: 10px;'><a href='xoa_khen_thuong.php?id=" . $kt['ma_kt'] . "' class='btn bg-maroon btn-flat' name='xoaloaikt' onclick='return confirm(\"Bạn có chắc chắn muốn xóa loại khen thưởng?\");'><i class='fa fa-trash'></i></a></td>";
                                } else if ($_SESSION['level'] == 0) {
                                    echo "<td style='width: 10px;'><a  class='btn bg-maroon btn-flat'><i class='fa fa-trash'></i></a></td>";
                                }

                                ?>
                            </tr>
                        <?php
                            $count++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <?php
        // Kết nối cơ sở dữ liệu
        include 'config/db_connect.php';

        // Kiểm tra nếu người dùng đã gửi form
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['taokhenthuong'])) {
            // Lấy dữ liệu từ form
            $makt = $_POST['makt'];
            $nhanvien_id = $_POST['nhanvien'];
            $soqd = $_POST['soqd'];
            $ngayqd = $_POST['ngayqd'];
            $tenkt = $_POST['tenkt'];
            $loaikt = $_POST['loaikt'];
            $description = $_POST['description'];
            $tienthuong = $_POST['tienthuong'];
            $nguoitao = $_POST['nguoitao'];
            $ngaytao = $_POST['ngaytao'];
            if ($tienthuong < 100000 || $tienthuong > 2000000) {
                echo "<script>alert('Số tiền thưởng không hợp lệ!'); window.history.back();</script>";
            } else {
            // Kiểm tra các trường cần thiết đã được nhập
            if (!empty($nhanvien_id) && !empty($tenkt) && !empty($loaikt) && !empty($tienthuong) && isset($ngayqd)) {
                // Chuẩn bị câu lệnh SQL để thêm lịch tuần
                $sql = "INSERT INTO khenthuong_kyluat (ma_kt, nhanvien_id, so_qd, ngay_qd, ten_khen_thuong, loai_kt_id, so_tien, flag, ghi_chu, nguoi_tao, ngay_tao) 
                VALUES ('$makt', '$nhanvien_id', '$soqd', '$ngayqd', '$tenkt', '$loaikt', '$tienthuong', '1','$description', '$nguoitao', '$ngaytao')";
                if (mysqli_query($conn, $sql)) {

                    echo "<script>alert('Tạo khen thưởng thành công!'); window.location.href = 'tao_khen_thuong.php';</script>";
                } else {
                    // Nếu có lỗi khi cập nhật, hiển thị thông báo lỗi
                    echo "<script>alert('Có lỗi xảy ra !');</script>";
                }
            } else {
                // Nếu các trường không đầy đủ, hiển thị thông báo
                echo "<script>alert('Vui lòng nhập đầy đủ thông tin!');</script>";
            }
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
<script>
    setTimeout(function() {
        var message = document.getElementById('success-message');
        if (message) {
            message.style.transition = 'opacity 0.5s ease';
            message.style.opacity = '0';
            setTimeout(function() {
                message.style.display = 'none';
            }, 500);
        }
    }, 2000);
</script>
</html>