<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
// Show data
include 'config/db_connect.php';
// show data
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $showData = "SELECT 
    nhan_vien.id AS id, 
    ma_nv, 
    hinh_anh, 
    ten_nv, 
    biet_danh, 
    gioi_tinh, 
    nhan_vien.ngay_tao AS ngay_tao, 
    ngay_sinh, 
    noi_sinh, 
    so_cmnd, 
    ten_tinh_trang, 
    ngay_cap_cmnd, 
    noi_cap_cmnd, 
    nguyen_quan, 
    ten_quoc_tich, 
    ten_dan_toc, 
    ten_ton_giao, 
    ho_khau, 
    tam_tru, 
    ten_loai_nv, 
    ten_trinh_do, 
    ten_chuyen_mon, 
    ten_bang_cap, 
    ten_phong_ban, 
    ten_chuc_vu, 
    trang_thai 
FROM 
    nhan_vien 
JOIN 
    quoc_tich qt ON nhan_vien.quoc_tich_id = qt.id 
JOIN 
    dan_toc dt ON nhan_vien.dan_toc_id = dt.id 
JOIN 
    ton_giao tg ON nhan_vien.ton_giao_id = tg.id 
JOIN 
    loai_nv ln_v ON nhan_vien.loai_nv_id = ln_v.id 
JOIN 
    trinh_do td ON nhan_vien.trinh_do_id = td.id 
JOIN 
    chuyen_mon cm ON nhan_vien.chuyen_mon_id = cm.id 
JOIN 
    bang_cap bc ON nhan_vien.bang_cap_id = bc.id 
JOIN 
    phongban pb ON nhan_vien.phong_ban_id = pb.id 
JOIN 
    chuc_vu cv ON nhan_vien.chuc_vu_id = cv.id 
JOIN 
    trinh_trang_hon_nhan hn ON nhan_vien.hon_nhan_id = hn.id 
WHERE 
    nhan_vien.id = $id;
";
  $result = mysqli_query($conn, $showData);
  $row = mysqli_fetch_array($result);

  $luong = "SELECT n_v.id as idNhan_vien, ma_luong, ma_nv, ten_nv, ten_chuc_vu, luong_ngay, luong_thang, ngay_cong, phu_cap, thuc_lanh, khoan_nop, tam_ung, ngay_cham FROM luong l, nhan_vien n_v, chuc_vu cv WHERE l.nhanvien_id = n_v.id AND n_v.chuc_vu_id = cv.id AND n_v.id = $id";
  $resultLuong = mysqli_query($conn, $luong);
  $arrLuong = array();
  while ($rowLuong = mysqli_fetch_array($resultLuong)) {
    $arrLuong[] = $rowLuong;
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
        <li class="nav-item">
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
              <a href="danh_sach_n_v.php" class="nav-link">
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
        <li class="nav-item  menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Nhân viên
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="quanly_phongban.php" class="nav-link">
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
              <a href="them_bang_cap.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Bằng cấp</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="them_loai_n_v.php" class="nav-link">
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
              <a href="" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách nhân viên</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-money-bill"></i>
            <p>
              Quản lý lương
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/UI/general.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Bảng tính lương</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/UI/icons.html" class="nav-link">
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
              <a href="add_account.php" class="nav-link ">
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
    <!-- /.sidebar-menu -->
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
            <h1>Thông tin nhân viên</h1>
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
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid "
                    src="uploads/<?php echo $row['hinh_anh'] ?>" style="width: 400px;"
                    alt="User profile picture">
                </div>
                <h3 class="profile-username text-center"><?php echo $row['ten_nv'] ?></h3>
                <p class="profile-username text-center"><?php echo $row['ma_nv'] ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <!-- /.user-block -->
                      <p>Biệt danh:
                        <?php echo $row['biet_danh'] ?>
                      </p>
                      <p>Giới tính:
                        <?php
                        if ($row['gioi_tinh'] == 1) {
                          echo "Nam";
                        } else {
                          echo "Nữ";
                        }
                        ?>
                      </p>


                      <p>
                        Ngày sinh: <?php echo $row['ngay_sinh'] ?>
                      </p>
                      <p>
                        Nơi sinh: <?php echo $row['noi_sinh'] ?>
                      </p>
                      <p>
                        Số CCCD: <?php echo $row['so_cmnd'] ?>
                      </p>
                      <p>
                        Nguyên quán: <?php echo $row['nguyen_quan'] ?>
                      </p>
                      <p>
                        Hộ khẩu: <?php echo $row['ho_khau'] ?>
                      </p>
                      <p>
                        Tạm trú: <?php echo $row['tam_tru'] ?>
                      </p>
                      <p>
                        Trạng thái: <?php
                                    if ($row['trang_thai'] == 1) {
                                      echo '<span class="badge bg-blue"> Đang làm việc </span>';
                                    } else {
                                      echo '<span class="badge bg-red"> Đã nghỉ việc </span>';
                                    }
                                    ?>
                      </p>
                    </div>
                    <!-- /.post -->

                  </div>

                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.card -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Bảng lương nhân viên</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>STT</th>
                <th>Mã lương</th>
                <th>Lương ngày</th>
                <th>Ngày công</th>
                <th>Lương tháng</th>
                <th>Phụ cấp</th>
                <th>Khoản nộp</th>
                <th>Tạm ứng</th>
                <th>Thực lãnh</th>
                <th>Ngày chấm</th>
              </tr>
            </thead>
            <?php 
                    $count = 1;
                    foreach ($arrLuong as $luong) 
                    {
                  ?>
              <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $luong['ma_luong']; ?></td>
                <td><?php echo number_format($luong['luong_ngay'], 0, '', ','); ?> VNĐ</td>
                <td><?php echo $luong['ngay_cong']; ?></td>
                <td><?php echo number_format($luong['luong_thang'], 0, '', ','); ?> VNĐ </td>
                <td><?php echo number_format($luong['phu_cap'], 0, '', ','); ?> VNĐ</td>
                <td><?php echo number_format($luong['khoan_nop'], 0, '', ','); ?> VNĐ</td>
                <td><?php echo number_format($luong['tam_ung'], 0, '', ','); ?> VNĐ</td>
                <td><?php echo number_format($luong['thuc_lanh'], 0, '', ','); ?> VNĐ</td>
                <td><?php echo $luong['ngay_cham']; ?></td>
              </tr>
              <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
  </div>

  </section>
  <!-- /.content -->
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