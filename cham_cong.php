<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
$today = date('Y-m-d');
include('config/db_connect.php');
$sql_check = "SELECT * FROM cham_cong WHERE DATE(ngay_cham) != '$today'"; // Kiểm tra ngày của bản ghi
$result_check = mysqli_query($conn, $sql_check);
if (mysqli_num_rows($result_check) > 0) {
    // Reset trạng thái chấm công về 0
    $sql_reset = "UPDATE cham_cong SET trang_thai_cham = 0 WHERE trang_thai_cham = 1";
    if (mysqli_query($conn, $sql_reset)) {
        echo "Đã reset trạng thái chấm công thành công!";
    } else {
        echo "Lỗi khi reset trạng thái chấm công!";
    }
}
// Show data
include 'config/db_connect.php';
$showData = "SELECT * FROM nhan_vien JOIN cham_cong ON nhan_vien.id = cham_cong.nhanvien_id WHERE trang_thai=1";
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
                        <h1>Chấm công</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Chấm công</a></li>
                            <li class="breadcrumb-item active">Chấm công nhân viên</li>
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
                    <h3 class="card-title">Chấm công nhân viên</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="" method="post">
                        <button type='submit' class='btn btn-success' name='chamcongall'><i class='fa fa-check'></i> Chấm công tất cả</button>
                    </form>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã nhân viên</th>
                                <th>Họ tên</th>
                                <th>Chấm công</th>
                                <th>Nghỉ làm</th>
                            </tr>
                        </thead>
                        <?php
                        $count = 1;
                        foreach ($arrShow as $arrS) {
                        ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $arrS['ma_nv']; ?></td>
                                <td><?php echo $arrS['ten_nv']; ?></td>
                                <?php
                                if ($_SESSION['level'] == 1) {
                                    echo "<td style='width: 10px;'><a href='cham_cong_nv.php?id=" . $arrS['id'] . "' class='btn bg-success btn-flat'><i class='fa fa-check'></i></a></td>";
                                } else if ($_SESSION['level'] == 0) {
                                    echo "<td style='width: 10px;'><a  class='btn bg-maroon btn-flat'><i class='fa fa-trash'></i></a></td>";
                                }
                                ?>
                                <?php
                                if ($_SESSION['level'] == 1) {
                                    echo "<td style='width: 10px;'><a href='nghi_viec.php?id=" . $arrS['id'] . "' class='btn bg-danger btn-flat'><i class='fa fa-times'></i></a></td>";
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
        <!-- /.content -->
        <?php
// Kiểm tra nếu người dùng nhấn nút "Chấm công tất cả"
if (isset($_POST['chamcongall'])) {
    include('config/db_connect.php');
    $ngaycham = date('Y-m-d');
    
    // Kiểm tra nếu nhân viên chưa được chấm công
    $check_query = "SELECT id, trang_thai_cham FROM cham_cong WHERE trang_thai_cham = 0";
    $result = mysqli_query($conn, $check_query);
    
    // Nếu có nhân viên chưa chấm công
    if (mysqli_num_rows($result) > 0) {
        // Cập nhật trạng thái chấm công cho tất cả nhân viên chưa chấm công
        $update = "UPDATE cham_cong SET ngay_cong = ngay_cong + 1, ngay_cham = '$ngaycham', trang_thai_cham = 1 WHERE trang_thai_cham = 0";
        
        if (mysqli_query($conn, $update)) {
            echo "<script>alert('Đã chấm công tất cả nhân viên!'); window.location.href='cham_cong.php';</script>";
        } else {
            echo "<script>alert('Có lỗi khi chấm công tất cả nhân viên!');</script>";
        }
    } else {
        // Nếu không có nhân viên nào chưa được chấm công
        echo "<script>alert('Tất cả nhân viên đã được chấm công!'); window.location.href='cham_cong.php';</script>";
    }

    // Đóng kết nối cơ sở dữ liệu
    mysqli_close($conn);
}
?>

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
<script>
    // JavaScript để xử lý mở/đóng menu
    document.addEventListener('DOMContentLoaded', function() {
        const menuItems = document.querySelectorAll('.nav-item > a');

        menuItems.forEach(item => {
            item.addEventListener('click', function(event) {
                const parentItem = this.parentNode;
                const subMenu = parentItem.querySelector('.nav-treeview');

                if (subMenu) {
                    event.preventDefault(); // Ngăn chặn sự kiện mặc định nếu có subMenu
                    subMenu.style.display = (subMenu.style.display === 'none' || subMenu.style.display === '') ? 'block' : 'none';
                }
            });
        });
    });
</script>
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
    // Hàm tạo thông báo
    function showAlert(message, type = 'alert-success') {
        var alertBox = document.createElement('div');
        alertBox.classList.add('alert', type);

        alertBox.innerHTML = message + '<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>';

        // Thêm thông báo vào container
        document.getElementById('notificationContainer').appendChild(alertBox);

        // Tự động ẩn toàn bộ thông báo sau 3 giây
        setTimeout(function() {
            alertBox.classList.add('fade-out'); // Thêm class để làm mờ dần và trượt ra
            setTimeout(function() {
                alertBox.remove(); // Xóa hoàn toàn thông báo sau khi mờ dần
            }, 600); // Phải phù hợp với thời gian `transition` trong CSS (0.6 giây)
        }, 3000); // 3 giây trước khi bắt đầu mờ dần
    }

    // PHP truyền thông báo sang JavaScript
    var message = "<?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>";
    var type = "<?php echo htmlspecialchars($type === 'success' ? 'alert-success' : 'alert-danger', ENT_QUOTES, 'UTF-8'); ?>";

    // Nếu có thông báo từ PHP, hiển thị thông báo
    if (message) {
        showAlert(message, type);
    }
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