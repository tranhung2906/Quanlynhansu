<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once('config/db_connect.php');
$sql = "Select * from tbl_menu WHERE is_Active = 'Yes';";
$query = mysqli_query($conn, $sql);
// Show data
$showData = "SELECT * FROM tai_khoan";
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
    <style>
        /* Thông báo chung */
        .alert {
            padding: 15px;
            background-color: #4CAF50;
            /* Màu nền */
            color: white;
            opacity: 1;
            transition: opacity 0.6s;
            margin-bottom: 15px;
            border-radius: 5px;
            width: 300px;
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            text-align: center;
        }

        /* Thông báo thành công */
        .alert-success {
            background-color: #4CAF50;
            /* Màu xanh thành công */
            color: white;
        }

        /* Thông báo lỗi */
        .alert-danger {
            background-color: #f44336;
            /* Màu đỏ lỗi */
            color: white;
        }

        /* Khi thêm lớp này, opacity sẽ giảm dần và trượt ra khỏi màn hình */
        .fade-out {
            opacity: 0;
            /* Mờ dần */
            right: -300px;
            /* Di chuyển ra khỏi màn hình từ bên phải */
        }

        /* Nút đóng */
        .closebtn {
            position: absolute;
            top: 0;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
            color: white;
        }
    </style>
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
} elseif (isset($_SESSION['deleteac'])) {
    // Kiểm tra thông báo xóa
    $message = $_SESSION['deleteac'];
    $type = 'success'; // Loại thông báo: success
    unset($_SESSION['deleteac']); // Xóa session sau khi hiển thị
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
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
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
                            <h1>Tài khoản</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
                                <li class="breadcrumb-item active">Danh sách tài khoản</li>
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
                        <h3 class="card-title">Danh sách tài khoản</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Ảnh</th>
                                    <th>Họ </th>
                                    <th>Tên </th>
                                    <th>Email</th>
                                    <th>Truy cập</th>
                                    <th>Điện thoại</th>
                                    <th>Quyền hạn</th>
                                    <th>Trạng thái</th>
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
                                    <td><img src="<?php echo $arrS['hinh_anh']; ?>" style="width: 50px;"> </td>
                                    <td><?php echo $arrS['ten']; ?></td>
                                    <td><?php echo $arrS['ho']; ?></td>
                                    <td><?php echo $arrS['email']; ?></td>
                                    <td><?php echo $arrS['truy_cap']; ?></td>
                                    <td><?php echo $arrS['so_dt']; ?></td>
                                    <td><?php
                                        if ($arrS['quyen'] == 1) {
                                            echo "Quản trị viên";
                                        } elseif ($arrS['quyen'] == 0) {
                                            echo "Nhân viên";
                                        }
                                        ?></td>
                                    <td><?php
                                        if ($arrS['trang_thai'] == 1) {
                                            echo "Đang hoạt động";
                                        } elseif ($arrS['trang_thai'] == 0) {
                                            echo "Ngừng hoạt động";
                                        }
                                        ?></td>
                                    <?php 
                                    if ($_SESSION['level'] == 1){
                                         echo "<td style='width: 10px;'><a href='edit_account.php?id=" . $arrS['id'] . "' class='btn bg-orange btn-flat' name='editaccount'><i class='fa fa-edit'></i></a></td>";
                                    }else if($_SESSION['level'] == 0){
                                        echo "<td style='width: 10px;'><a class='btn bg-orange btn-flat'><i class='fa fa-edit'></i></a></td>";
                                        }
                                        ?>
                                    <?php
                                    isset($_SESSION['level']) ? $_SESSION['level'] : '';
                                    if ($_SESSION['level'] == 1) {
                                        echo "<td style='width: 10px;'><a href='delete_account.php?id=" . $arrS['id'] . "' class='btn bg-maroon btn-flat' name='xoaluong' onclick='return confirm(\"Bạn có chắc chắn muốn xóa phòng ban?\");'><i class='fa fa-trash'></i></a></td>";
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