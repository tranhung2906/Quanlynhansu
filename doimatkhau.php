<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
// Show data
include 'config/db_connect.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $showData = "SELECT * FROM tai_khoan WHERE id = $id";
    $result = mysqli_query($conn, $showData);
    $row1 = mysqli_fetch_array($result);
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
        <!-- /.sidebar-menu -->
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
                        <h1>Thông tin tài khoản</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Nhân viên</a></li>
                            <li class="breadcrumb-item active">Danh sách nhân viên</li>
                            <li class="breadcrumb-item active">Thông tin nhân viên</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- /.card -->
            <div class="login-box">
                <div class="card card-outline card-primary">
                    <div class="card-header text-center">
                        <a href="../../index2.html" class="h1">Đổi mật khẩu</a>
                    </div>
                    <div class="card-body">
                        <p class="login-box-msg">Hãy nhập mật khẩu muốn thay dổi của bạn!</p>
                        <form action="doimatkhau.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row1['id'] ?>">
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Nhập mật khẩu mới" name="newpass">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Nhập lại mật khẩu mới" name="cpass">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block">Thay đổi</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>
        </section>
        <!-- /.content -->
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $newpass = $_POST['newpass'];
            $cpass = $_POST['cpass'];
            $id = $_POST['id'];
            if ($newpass != $cpass) {
                echo "<script>alert('Mật khẩu không khớp!')</script>";
            } else {
                $sql = "UPDATE tai_khoan SET mat_khau = '$cpass' WHERE id = $id";
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Đổi mật khẩu thành công!'); window.location.href = 'login.php'</script>";
                }
            }
        }
        ?>
    </div>
    <!-- /.content-wrapper -->
    </div>
    <!-- Control Sidebar -->
    <aside class=" control-sidebar control-sidebar-dark">
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