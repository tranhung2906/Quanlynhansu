<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$mtu = "MTU" . time();
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
        <?php include"menu.php"; ?>
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
                        <h1>Tạm ứng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Ứng lương</a></li>
                            <li class="breadcrumb-item active">Tạm ứng</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <form action="tam_ung.php" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Tạm ứng lương
                                </h3>
                            </div>
                            <div class="card-body">
                                <label for="exampleInputPassword1">Mã ứng lương</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $mtu  ?>" name="matu" readonly>
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
                                <label for="exampleInputEmail1">Tạm ứng: </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="tamUng" placeholder="Nhập số tiền muốn tạm ứng" value="0">
                            </div>
                            <div style="margin: 20px;">
                                <?php
                                if ($_SESSION['level'] == 1) {
                                    echo "<button type='submit' class='btn btn-primary' name='tamung'><i class='fa fa-plus'></i> Tạm ứng</button>";
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
            <!-- /.card -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Danh sách phòng ban</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>STT</th>
                <th>Nhân viên </th>
                <th>Số tiền ứng</th>
                <th>Sửa</th>
                <th>Xóa</th>
              </tr>
            </thead>
            <?php
            $count = 1;
            // show danh sach ung luong
            $sql = "SELECT * FROM nhan_vien JOIN tam_ung ON nhan_vien.id = tam_ung.nhan_vien_id";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
            ?>
              <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $row['ten_nv']; ?></td>
                <td><?php echo number_format($row['so_tien_ung'], 0, '', ','); ?> VNĐ</td>
                <td style="width: 10px;"><a href="edit_phongban.php?id=<?php echo $arrS['id']; ?>" class='btn bg-orange btn-flat'>
                    <i class='fa fa-edit'></i>
                  </a></td>
                <td style="width: 10px;"><a href="delete_phongban.php?id=<?php echo $arrS['id']; ?>" class='btn bg-maroon btn-flat' name="xoa" onclick="return confirm('Bạn có chắc chắn muốn xóa phòng ban?');"><i class='fa fa-trash'></i></button></button></td>
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ form
            $matu = $_POST['matu'];
            $nhanvien = $_POST['nhanvien'];
            $tamUng = $_POST['tamUng']; // Tạm ứng
            include 'config/db_connect.php'; // Kết nối cơ sở dữ liệu
            if ($tamUng > 3000000) {
                echo "<script>alert('Tạm ứng quá lớn!'); window.location.href='tam_ung.php';</script>";
                exit();
            } else {
                $sql = "INSERT INTO tam_ung (ma_tam_ung, nhan_vien_id, so_tien_ung) 
                VALUES ('$matu', '$nhanvien', $tamUng )";

                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Tạm ứng thành công!');</script>";
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