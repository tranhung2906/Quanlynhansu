<?php
session_start(); // Bắt đầu phiên làm việc

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['user_id'])) {
  // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
  header("Location: login.php");
  exit();
}
?>
<?php
include 'config/db_connect.php';
// Show data
$showData = "SELECT id, ma_phong_ban, ten_phong_ban, ghi_chu, nguoi_tao, ngay_tao, nguoi_sua, ngay_sua FROM phongban ORDER BY ngay_tao DESC";
$result = mysqli_query($conn, $showData);
$arrShow = array();
while ($row2 = mysqli_fetch_array($result)) {
  $arrShow[] = $row2;
}
// Show data chuc vu
$showData1 = "SELECT * FROM chuc_vu ORDER BY ngay_tao DESC";
$result1 = mysqli_query($conn, $showData1);
$arrShow1 = array();
while ($row2 = mysqli_fetch_array($result1)) {
  $arrShow1[] = $row2;
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
    <?php
    include "menu.php";
    ?>
  </div>
  <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tổng quan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Tổng quan</a></li>
              <li class="breadcrumb-item active">Thống kê</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <?php
            include "config/db_connect.php";
            $sql2 = "SELECT COUNT(*) AS tong_nv FROM nhan_vien";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $tong_nv = $row2['tong_nv'];
            ?>
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $tong_nv ?></h3>

                <p>Nhân viên</p>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
              <a href="danh_sach_nv.php" class="small-box-footer">Danh sách nhân viên <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php
            include "config/db_connect.php";
            $sql = "SELECT COUNT(*) AS tong_phong_ban FROM phongban";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $tong_phong_ban = $row['tong_phong_ban'];
            ?>
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $tong_phong_ban  ?></h3>

                <p>Phòng ban</p>
              </div>
              <div class="icon">
                <i class="fas fa-building"></i>
              </div>
              <a href="quanly_phongban.php" class="small-box-footer">Danh sách phòng ban <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php
            include "config/db_connect.php";
            $sql1 = "SELECT COUNT(*) AS tong_tk FROM tai_khoan";
            $ketqua = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_assoc($ketqua);
            $tong_tk = $row1['tong_tk'];
            ?>
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $tong_tk  ?></h3>

                <p>Tài khoản</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="all_account.php" class="small-box-footer">Danh sách tài khoản <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php
            include "config/db_connect.php";
            $sql3 = "SELECT COUNT(*) AS so_luong_nghi_viec
                      FROM nhan_vien
                      WHERE trang_thai = 0;";
            $ketqua3 = mysqli_query($conn, $sql3);
            $row3 = mysqli_fetch_assoc($ketqua3);
            $nv_nghivc = $row3['so_luong_nghi_viec'];
            ?>
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $nv_nghivc ?></h3>

                <p>Nhân viên nghỉ việc</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="danhsach_nghiviec.php" class="small-box-footer">Danh sách nghỉ việc <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <!-- AREA CHART -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Area Chart</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="chart">
                      <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- DONUT CHART -->
                <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">Donut Chart</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <?php
                // Kết nối cơ sở dữ liệu
                include('config/db_connect.php');

                $sqll = "SELECT pb.ten_phong_ban, COUNT(*) as count 
                        FROM nhan_vien nv
                        JOIN phongban pb ON nv.phong_ban_id = pb.id
                        GROUP BY nv.phong_ban_id";
                $resultt = mysqli_query($conn, $sqll);
                $labels = [];
                $data = [];

                // Nếu có dữ liệu, đưa vào mảng labels và data
                while ($roww = mysqli_fetch_assoc($resultt)) {
                  $ten_phong_ban = $roww['ten_phong_ban'];
                  $count = $roww['count'];
                  $labels[] = "$ten_phong_ban";
                  $data[] = $count;
                }
                // Chuyển mảng PHP sang JavaScript
                $labels_json = json_encode($labels);
                $data_json = json_encode($data);
                ?>
                <!-- PIE CHART -->
                <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">Số lượng nhân viên theo phòng ban</h3>
                  </div>
                  <div class="card-body">
                    <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

              </div>
              <!-- /.col (LEFT) -->
              <div class="col-md-6">
                <?php
                include "config/db_connect.php";
                $sqll1 = "SELECT
    MONTH(ngay_tao) AS month,
    COUNT(CASE WHEN ngay_tao IS NOT NULL AND trang_thai = 1 THEN 1 END) AS new_hires,  -- Nhân viên mới
    COUNT(CASE WHEN ngay_sua IS NOT NULL AND trang_thai = 0 THEN 1 END) AS resignations  -- Nhân viên nghỉ việc
    FROM nhan_vien
    GROUP BY MONTH(ngay_tao)
    ORDER BY month ASC;";
                $resultt1 = mysqli_query($conn, $sqll1);
                $new_hires = [];
                $resignations = [];
                $months = [];

                // Lấy dữ liệu vào các mảng để hiển thị trên biểu đồ
                while ($roww1 = mysqli_fetch_assoc($resultt1)) {
                  $months[] = "Tháng " . $roww1['month'];
                  $new_hires[] = $roww1['new_hires'];
                  $resignations[] = $roww1['resignations'];
                }

                // Chuyển mảng PHP sang JavaScript
                $months_json = json_encode($months);
                $new_hires_json = json_encode($new_hires);
                $resignations_json = json_encode($resignations);
                ?>
                <!-- LINE CHART -->
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Tình Trạng Nhân Sự</h3>
                  </div>
                  <div class="card-body">
                    <div class="chart">
                      <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- BAR CHART -->
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">Bar Chart</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="chart">
                      <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- STACKED BAR CHART -->
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">Stacked Bar Chart</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="chart">
                      <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

              </div>
              <!-- /.col (RIGHT) -->
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-6 connectedSortable">
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách chức vụ</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Mã chức vụ </th>
                    <th>Tên chức vụ </th>
                    <th>Ngày tạo</th>
                  </tr>
                </thead>
                <?php
                $count = 1;
                foreach ($arrShow1 as $arrS1) {
                ?>
                  <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $arrS1['ma_chuc_vu']; ?></td>
                    <td><?php echo $arrS1['ten_chuc_vu']; ?></td>
                    <td><?php echo $arrS1['ngay_tao']; ?></td>
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
        <section class="col-lg-6 connectedSortable">
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
                    <th>Ngày tạo</th>
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
                    <td><?php echo $arrS['ngay_tao']; ?></td>
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
        <!-- Control Sidebar -->
      </div>
      <!-- ./wrapper -->

      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
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
  $(function() {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------
    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [{
          label: 'Digital Goods',
          backgroundColor: 'rgba(60,141,188,0.9)',
          borderColor: 'rgba(60,141,188,0.8)',
          pointRadius: false,
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label: 'Electronics',
          backgroundColor: 'rgba(210, 214, 222, 1)',
          borderColor: 'rgba(210, 214, 222, 1)',
          pointRadius: false,
          pointColor: 'rgba(210, 214, 222, 1)',
          pointStrokeColor: '#c1c7d1',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data: [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio: false,
      responsive: true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines: {
            display: false,
          }
        }],
        yAxes: [{
          gridLines: {
            display: false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })
    $('#areaChart').closest('.card').hide();
    //-------------
    //- LINE CHART -
    //--------------
//--------------
/// Chuyển đổi dữ liệu PHP sang JavaScript
var months = <?php echo $months_json; ?>;
var newHiresData = <?php echo $new_hires_json; ?>;
var resignationsData = <?php echo $resignations_json; ?>;

// Cài đặt Line Chart
var lineChartCanvas = $('#lineChart').get(0).getContext('2d');
var lineChartOptions = {
  maintainAspectRatio: false,
  responsive: true,
  datasetFill: false,
  scales: {
    x: {
      display: true,
      labels: months, // Gán các tháng vào trục X
      grid: {
        display: false, // Tắt các đường kẻ dọc
      }
    },
    y: {
      beginAtZero: true,
      title: {
        display: true,
        text: 'Số lượng',
      },
      grid: {
        display: false, // Tắt các đường kẻ ngang
      }
    }
  }
};

var lineChartData = {
  labels: months, // Tên các tháng
  datasets: [{
      label: 'Nhân viên mới',
      data: newHiresData, // Dữ liệu số lượng nhân viên mới
      fill: false,
      borderColor: '#00a65a', // Màu cho đường biểu đồ của nhân viên mới
      tension: 0.1 // Để hiển thị đường cong
    },
    {
      label: 'Nhân viên nghỉ việc',
      data: resignationsData, // Dữ liệu số lượng nhân viên nghỉ việc
      fill: false,
      borderColor: '#f56954', // Màu cho đường biểu đồ của nhân viên nghỉ việc
      tension: 0.1 // Để hiển thị đường cong
    }
  ]
};

// Tạo Line Chart
new Chart(lineChartCanvas, {
  type: 'line',
  data: lineChartData,
  options: lineChartOptions
});



    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData = {
      labels: [
        'Chrome',
        'IE',
        'FireFox',
        'Safari',
        'Opera',
        'Navigator',
      ],
      datasets: [{
        data: [700, 500, 400, 600, 300, 100],
        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
      }]
    }
    var donutOptions = {
      maintainAspectRatio: false,
      responsive: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
    $('#donutChart').closest('.card').hide();
    //-------------
    //- PIE CHART -
    //-------------
    // Chuyển đổi dữ liệu PHP sang JavaScript
    var pieLabels = <?php echo $labels_json; ?>;
    var pieData = <?php echo $data_json; ?>;

    // Cài đặt Pie Chart
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
    var pieOptions = {
      maintainAspectRatio: false,
      responsive: true,
    };

    var pieData = {
      labels: pieLabels, // Danh sách phòng ban
      datasets: [{
        data: pieData, // Số lượng nhân viên theo từng phòng ban
        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'], // Màu sắc cho các phần
      }]
    };

    // Tạo biểu đồ Pie
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    });

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      datasetFill: false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
    $('#barChart').closest('.card').hide();
    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
    $('#stackedBarChart').closest('.card').hide();
  })
</script>

</html>