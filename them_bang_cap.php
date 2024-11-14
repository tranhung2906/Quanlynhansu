<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$mabc = "MBC" . time();
include "config/db_connect.php";
// Show data
$showData = "SELECT * FROM bang_cap ORDER BY ngay_tao DESC";
$result = mysqli_query($conn, $showData);
$arrShow = array();
while ($row1 = mysqli_fetch_array($result)) {
    $arrShow[] = $row1;
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
                        <h1>Bằng cấp</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Nhân viên</a></li>
                            <li class="breadcrumb-item active">Bằng cấp</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <form action="them_bang_cap.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Thêm bằng cấp
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
                                <label for="exampleInputPassword1">Mã bằng cấp</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $mabc  ?>" name="mabc" readonly>
                            </div>
                            <div class="card-body">
                                <label for="exampleInputPassword1">Tên bằng cấp</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập tên bằng cấp" name="tenbc" required>
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
                                    echo "<button type='submit' class='btn btn-primary' name='thembangcap'><i class='fa fa-plus'></i> Tạo bằng cấp</button>";
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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách bằng cấp</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã bằng cấp</th>
                                <th>Tên bằng cấp </th>
                                <th>Mô tả</th>
                                <th>Người tạo</th>
                                <th>Ngày tạo</th>
                                <th>Người sửa</th>
                                <th>Ngày sửa</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <?php
                        $count = 1;
                        foreach ($arrShow as $arrS) {
                        ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $arrS['ma_bang_cap']; ?></td>
                                <td><?php echo $arrS['ten_bang_cap']; ?></td>
                                <td><?php echo $arrS['ghi_chu']; ?></td>
                                <td><?php echo $arrS['nguoi_tao']; ?></td>
                                <td><?php echo $arrS['ngay_tao']; ?></td>
                                <td><?php echo $arrS['nguoi_sua']; ?></td>
                                <td><?php echo $arrS['ngay_sua']; ?></td>
                                <?php
                                if ($_SESSION['level'] == 1) {
                                    echo "<td style='width: 10px;'><a href='sua_bang_cap.php?id=" . $arrS['id'] . "' class='btn bg-orange btn-flat' name='editaccount'><i class='fa fa-edit'></i></a></td>";
                                } else if ($_SESSION['level'] == 0) {
                                    echo "<td style='width: 10px;'><a class='btn bg-orange btn-flat'><i class='fa fa-edit'></i></a></td>";
                                }
                                ?>
                                <?php
                                isset($_SESSION['level']) ? $_SESSION['level'] : '';
                                if ($_SESSION['level'] == 1) {
                                    echo "<td style='width: 10px;'><a href='xoa_bang_cap.php?id=" . $arrS['id'] . "' class='btn bg-maroon btn-flat' name='xoa' onclick='return confirm(\"Bạn có chắc chắn muốn xóa trình độ?\");'><i class='fa fa-trash'></i></a></td>";
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

        // Kiểm tra nếu form đã được gửi
        if (isset($_POST['thembangcap'])) {
            // Lấy dữ liệu từ form
            $mabc = $_POST['mabc']; // Mã trình độ
            $tenbc = $_POST['tenbc']; // Tên trình độ
            $mota = $_POST['description']; // Mô tả trình độ
            $nguoitao = $_POST['nguoitao']; // Người tạo
            $ngaytao = $_POST['ngaytao']; // Ngày tạo

            // Kiểm tra nếu các trường bắt buộc có dữ liệu
            if (!empty($tenbc)) {
                // Tạo câu truy vấn để chèn trình độ mới vào cơ sở dữ liệu
                $sql = "INSERT INTO bang_cap (ma_bang_cap, ten_bang_cap, ghi_chu, nguoi_tao, ngay_tao)
                VALUES ('$mabc', '$tenbc', '$mota', '$nguoitao', '$ngaytao')";

                // Thực thi câu truy vấn
                if (mysqli_query($conn, $sql)) {
                    // Chuyển hướng sau khi thành công
                    echo "<script>alert('Bằng cấp đã được thêm thành công'); window.location.href='them_bang_cap.php';</script>";
                } else {
                    echo "<script>alert('Đã xảy ra lỗi trong quá trình thêm: " . mysqli_error($conn) . "');</script>";
                }
            } else {
                echo "<script>alert('Vui lòng nhập tên bằng cấp.');</script>";
            }
        }

        // Đóng kết nối cơ sở dữ liệu
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