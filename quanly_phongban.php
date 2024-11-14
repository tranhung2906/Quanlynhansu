<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once('config/db_connect.php');
$sql = "Select * from tbl_menu WHERE is_Active = 'Yes';";
$query = mysqli_query($conn, $sql);
// create code room
$roomCode = "MBP" . time();
// Show data
$showData = "SELECT id, ma_phong_ban, ten_phong_ban, ghi_chu, nguoi_tao, ngay_tao, nguoi_sua, ngay_sua FROM phongban ORDER BY ngay_tao DESC";
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
            <h1>Phòng ban</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Nhân viên</a></a></li>
              <li class="breadcrumb-item active">Phòng ban</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <form action="quanly_phongban.php" method="post">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">
                  Tạo phòng ban
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
              </div>
              <div class="card-body">
                <label for="exampleInputEmail1">Mã phòng ban: </label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="roomCode" value="<?php echo $roomCode ?>" readonly>
              </div>
              <div class="card-body">
                <label for="exampleInputEmail1">Tên phòng ban: </label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên phòng ban" name="roomName">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <label for="exampleInputEmail1">Mô tả: </label>
                <textarea id="summernote" name="description">
              </textarea>
              </div>
              <div class="card-body">
                <label for="exampleInputEmail1">Người tạo: </label>
                <input type="text" class="form-control" id="exampleInputEmail1"
                  value="<?php
                          echo isset($_SESSION['user_firstname']) ? $_SESSION['user_firstname'] : '';
                          echo ' ';
                          echo isset($_SESSION['user_lastname']) ? $_SESSION['user_lastname'] : '';
                          ?>"
                  name="personCreate" readonly>
              </div>
              <div class="card-body">
                <label for="exampleInputEmail1">Ngày tạo: </label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo date('Y-m-d H:i:s'); ?>" name="dateCreate" readonly>
              </div>
              <div style="margin: 20px;">
                <?php
                if ($_SESSION['level'] == 1) {
                  echo "<button type='submit' class='btn btn-primary' name='save'><i class='fa fa-plus'></i> Tạo phòng ban</button>";
                } else if ($_SESSION['level'] == 0) {
                  echo "<button type='button' class='btn btn-primary'><i class='fa fa-plus'></i> Tạo phòng ban</button>";
                }
                ?>

              </div>
            </div>
            <!-- /.col-->
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
                <th>Mã phòng </th>
                <th>Tên phòng</th>
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
                <td><?php echo $arrS['ma_phong_ban']; ?></td>
                <td><?php echo $arrS['ten_phong_ban']; ?></td>
                <td><?php echo $arrS['ghi_chu']; ?></td>
                <td><?php echo $arrS['nguoi_tao']; ?></td>
                <td><?php echo $arrS['ngay_tao']; ?></td>
                <td><?php echo $arrS['nguoi_sua']; ?></td>
                <td><?php echo $arrS['ngay_sua']; ?></td>
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
    // Kết nối cơ sở dữ liệu
    include 'config/db_connect.php';

    // Kiểm tra nếu người dùng nhấn nút "Tạo phòng ban"
    if (isset($_POST['save'])) {
      // Lấy dữ liệu từ form
      $roomCode = $_POST['roomCode'];  // Mã phòng ban
      $roomName = $_POST['roomName'];  // Tên phòng ban
      $description = $_POST['description'];  // Mô tả
      $personCreate = $_POST['personCreate'];  // Người tạo
      $dateCreate = $_POST['dateCreate'];  // Ngày tạo

      // Kiểm tra nếu tên phòng ban không bị trống
      if (!empty($roomName)) {
        // Tạo truy vấn chèn phòng ban mới vào cơ sở dữ liệu
        $sql = "INSERT INTO phongban (ma_phong_ban, ten_phong_ban, ghi_chu, nguoi_tao, ngay_tao) 
                VALUES ('$roomCode', '$roomName', '$description', '$personCreate', '$dateCreate')";

        // Thực thi truy vấn
        if (mysqli_query($conn, $sql)) {
          // Thông báo thành công và chuyển hướng về trang danh sách phòng ban
          echo "<script>alert('Phòng ban đã được thêm thành công'); window.location.href='quanly_phongban.php';</script>";
        } else {
          // Thông báo lỗi nếu có lỗi xảy ra
          echo "<script>alert('Đã xảy ra lỗi khi thêm phòng ban: " . mysqli_error($conn) . "');</script>";
        }
      } else {
        // Thông báo lỗi nếu tên phòng ban bị trống
        echo "<script>alert('Vui lòng nhập tên phòng ban.');</script>";
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