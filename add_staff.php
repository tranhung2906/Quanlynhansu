<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
// create code room
$manv = "MNV" . time();
include "config/db_connect.php";
// ----- Hôn nhân
$honNhan = "SELECT id, ten_tinh_trang FROM trinh_trang_hon_nhan";
$resultHonNhan = mysqli_query($conn, $honNhan);
$arrHonNhan = array();
while ($rowHonNhan = mysqli_fetch_array($resultHonNhan)) {
  $arrHonNhan[] = $rowHonNhan;
}
// ----- Quốc tịch
$quocTich = "SELECT id, ten_quoc_tich FROM quoc_tich";
$resultQuocTich = mysqli_query($conn, $quocTich);
$arrQuocTich = array();
while ($rowQuocTich = mysqli_fetch_array($resultQuocTich)) {
  $arrQuocTich[] = $rowQuocTich;
}

// ----- Tôn giáo
$tonGiao = "SELECT id, ten_ton_giao FROM ton_giao";
$resultTonGiao = mysqli_query($conn, $tonGiao);
$arrTonGiao = array();
while ($rowTonGiao = mysqli_fetch_array($resultTonGiao)) {
  $arrTonGiao[] = $rowTonGiao;
}

// ----- Dân tộc
$danToc = "SELECT id, ten_dan_toc FROM dan_toc";
$resultDanToc = mysqli_query($conn, $danToc);
$arrDanToc = array();
while ($rowDanToc = mysqli_fetch_array($resultDanToc)) {
  $arrDanToc[] = $rowDanToc;
}

// ----- Loại nhân viên
$loaiNhanVien = "SELECT id, ten_loai_nv FROM loai_nv";
$resultLoaiNhanVien = mysqli_query($conn, $loaiNhanVien);
$arrLoaiNhanVien = array();
while ($rowLoaiNhanVien = mysqli_fetch_array($resultLoaiNhanVien)) {
  $arrLoaiNhanVien[] = $rowLoaiNhanVien;
}

// ----- Trình độ
$trinhDo = "SELECT id, ten_trinh_do FROM trinh_do";
$resultTrinhDo = mysqli_query($conn, $trinhDo);
$arrTrinhDo = array();
while ($rowTrinhDo = mysqli_fetch_array($resultTrinhDo)) {
  $arrTrinhDo[] = $rowTrinhDo;
}

// ----- Chuyên môn
$chuyenMon = "SELECT id, ten_chuyen_mon FROM chuyen_mon";
$resultChuyenMon = mysqli_query($conn, $chuyenMon);
$arrChuyenMon = array();
while ($rowChuyenMon = mysqli_fetch_array($resultChuyenMon)) {
  $arrChuyenMon[] = $rowChuyenMon;
}

// ----- Bằng cấp
$bangCap = "SELECT id, ten_bang_cap FROM bang_cap";
$resultBangCap = mysqli_query($conn, $bangCap);
$arrBangCap = array();
while ($rowBangCap = mysqli_fetch_array($resultBangCap)) {
  $arrBangCap[] = $rowBangCap;
}

// ----- Phòng ban
$phongBan = "SELECT id, ten_phong_ban FROM phongban";
$resultPhongBan = mysqli_query($conn, $phongBan);
$arrPhongBan = array();
while ($rowPhongBan = mysqli_fetch_array($resultPhongBan)) {
  $arrPhongBan[] = $rowPhongBan;
}

// ----- Chức vụ
$chucVu = "SELECT id, ten_chuc_vu FROM chuc_vu";
$resultChucVu = mysqli_query($conn, $chucVu);
$arrChucVu = array();
while ($rowChucVu = mysqli_fetch_array($resultChucVu)) {
  $arrChucVu[] = $rowChucVu;
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
              <a href="./index2.html" class="nav-link">
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
        <li class="nav-item menu-open">
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
              <a href="them_loai_nv.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Loại nhân viên</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="add_staff.php" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm mới nhân viên</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
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
              <a href="add_account.php" class="nav-link">
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
            <h1>Nhân viên</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Nhân viên</a></li>
              <li class="breadcrumb-item active">Thêm nhân viên</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <form action="add_staff.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">
                  Thêm nhân viên
                </h3>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="card-body">
                    <label for="exampleInputPassword1">Mã nhân viên: <b style="color: red;">*</b></label>
                    <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $manv ?>" name="manv">
                  </div>
                  <div class="card-body">
                    <label for="exampleInputPassword1">Tên nhân viên: <b style="color: red;">*</b></label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập tên nhân viên" name="tennv" required>
                  </div>
                  <div class="card-body">
                    <label for="exampleInputPassword1">Biệt danh:</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập biệt danh" name="bietdanh">
                  </div>
                  <div class="card-body">
                    <label for="status">Tình trạng hôn nhân: <b style="color: red;">*</b></label>
                    <select class="form-control" name="honnhan" id="status" required>
                      <option>--Chọn tình trạng hôn nhân--</option>
                      <?php
                      foreach ($arrHonNhan as $hn) {
                        echo "<option value='" . $hn['id'] . "'>" . $hn['ten_tinh_trang'] . "</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="card-body">
                    <label for="exampleInputPassword1">Số CCCD: <b style="color: red;">*</b></label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập số căn cước công dân" name="cccd" required>
                  </div>
                  <div class="card-body">
                    <label for="exampleInputPassword1">Ngày cấp <b style="color: red;">*</b></label>
                    <input type="date" class="form-control" id="exampleInputPassword1" name="ngaycap" required>
                  </div>
                  <div class="card-body">
                    <label for="exampleInputPassword1">Nơi cấp <b style="color: red;">*</b></label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập nơi cấp" name="noicap" required>
                  </div>
                  <div class="card-body">
                    <label for="status">Quốc tịch <b style="color: red;">*</b></label>
                    <select class="form-control" name="quoctich" id="status" required>
                      <option>--Chọn quốc tịch--</option>
                      <?php
                      foreach ($arrQuocTich as $qt) {
                        echo "<option value='" . $qt['id'] . "'>" . $qt['ten_quoc_tich'] . "</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="card-body">
                    <label for="status">Tôn giáo <b style="color: red;">*</b></label>
                    <select class="form-control" name="tongiao" id="status" required>
                      <option>--Chọn tôn giáo--</option>
                      <?php
                      foreach ($arrTonGiao as $tg) {
                        echo "<option value='" . $tg['id'] . "'>" . $tg['ten_ton_giao'] . "</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="card-body">
                    <label for="status">Dân tộc <b style="color: red;">*</b></label>
                    <select class="form-control" name="dantoc" id="status" required>
                      <option>--Chọn dân tộc--</option>
                      <?php
                      foreach ($arrDanToc as $dt) {
                        echo "<option value='" . $dt['id'] . "'>" . $dt['ten_dan_toc'] . "</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="card-body">
                    <label for="status">Loại nhân viên <b style="color: red;">*</b></label>
                    <select class="form-control" name="loainv" id="status" required>
                      <option>--Chọn loại nhân viên--</option>
                      <?php
                      foreach ($arrLoaiNhanVien as $lnv) {
                        echo "<option value='" . $lnv['id'] . "'>" . $lnv['ten_loai_nv'] . "</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="card-body">
                    <label for="status">Bằng cấp <b style="color: red;">*</b></label>
                    <select class="form-control" name="bangcap" id="status" required>
                      <option>--Chọn bằng cấp--</option>
                      <?php
                      foreach ($arrBangCap as $bc) {
                        echo "<option value='" . $bc['id'] . "'>" . $bc['ten_bang_cap'] . "</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card-body">
                    <label for="exampleInputEmail1">Chọn ảnh: </label>
                    <input type="file" class="form-control" id="exampleInputEmail1" name="image" required>
                    <p class="help-block">Vui lòng chọn file đúng định dạng: jpg, jpeg, png, gif.</p>
                  </div>
                  <div class="card-body">
                    <label for="status">Giới tính <b style="color: red;">*</b></label>
                    <select class="form-control" name="gioitinh" id="status" required>
                      <option>--Chọn giới tính--</option>
                      <option value="1">Nam</option>
                      <option value="0">Nữ</option>
                    </select>
                  </div>
                  <div class="card-body">
                    <label for="exampleInputPassword1">Ngày sinh <b style="color: red;">*</b></label>
                    <input type="date" class="form-control" id="exampleInputPassword1" name="ngaysinh" required>
                  </div>
                  <div class="card-body">
                    <label for="exampleInputPassword1">Nơi sinh</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập nơi sinh" name="noisinh" required>
                  </div>
                  <div class="card-body">
                    <label for="exampleInputPassword1">Nguyên quán</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập nguyên quán" name="nguyenquan" required>
                  </div>
                  <div class="card-body">
                    <label for="exampleInputPassword1">Hộ khẩu <b style="color: red;">*</b></label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập hộ khẩu" name="hokhau" required>
                  </div>
                  <div class="card-body">
                    <label for="exampleInputPassword1">Tạm trú <b style="color: red;">*</b></label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nhập nơi tạm trú" name="tamtru" required>
                  </div>
                  <div class="card-body">
                    <label for="status">Phòng ban <b style="color: red;">*</b></label>
                    <select class="form-control" name="phongban" id="status" required>
                      <option>--Chọn phòng ban--</option>
                      <?php
                      foreach ($arrPhongBan as $pb) {
                        echo "<option value='" . $pb['id'] . "'>" . $pb['ten_phong_ban'] . "</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="card-body">
                    <label for="status">Chức vụ <b style="color: red;">*</b></label>
                    <select class="form-control" name="chucvu" id="status" required>
                      <option>--Chọn chức vụ--</option>
                      <?php
                      foreach ($arrChucVu as $cv) {
                        echo "<option value='" . $cv['id'] . "'>" . $cv['ten_chuc_vu'] . "</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="card-body">
                    <label for="status">Trình độ <b style="color: red;">*</b></label>
                    <select class="form-control" name="trinhdo" id="status" required>
                      <option>--Chọn trình độ--</option>
                      <?php
                      foreach ($arrTrinhDo as $trd) {
                        echo "<option value='" . $trd['id'] . "'>" . $trd['ten_trinh_do'] . "</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="card-body">
                    <label for="status">Chuyên môn <b style="color: red;">*</b></label>
                    <select class="form-control" name="chuyenmon" id="status" required>
                      <option>--Chọn chuyên môn--</option>
                      <?php
                      foreach ($arrChuyenMon as $cm) {
                        echo "<option value='" . $cm['id'] . "'>" . $cm['ten_chuyen_mon'] . "</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="card-body">
                    <label for="status">Trạng thái <b style="color: red;">*</b></label>
                    <select class="form-control" name="status" id="status" required>
                      <option>--Chọn trạng thái--</option>
                      <option value="1">Đang làm việc</option>
                      <option value="0">Đã nghỉ việc</option>
                    </select>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div style="margin:20px">
                <?php
                if ($_SESSION['level'] == 1) {
                  echo " <button type='submit' class='btn btn-primary' name='addstaff'><i class='fa fa-plus'></i> Tạo tài khoản mới</button>";
                } else if ($_SESSION['level'] == 0) {
                  echo "<button type='button' class='btn btn-primary'><i class='fa fa-plus'></i> Tạo tài khoản mới</button>";
                }
                ?>
               
              </div>
            </div>
      </form>
      <!-- /.card -->
      <!-- /.card-body -->
  </div>
  <!-- /.card -->
  </section>
  <?php
  include "config/db_connect.php";
  if (isset($_POST['addstaff'])) {
    // Lấy dữ liệu từ form
    $manv = $_POST['manv'];
    $tennv = $_POST['tennv'];
    $bietdanh = $_POST['bietdanh'];
    $honnhan = $_POST['honnhan'];
    $cccd = $_POST['cccd'];
    $ngaycap = $_POST['ngaycap'];
    $noicap = $_POST['noicap'];
    $quoctich = $_POST['quoctich'];
    $tongiao = $_POST['tongiao'];
    $dantoc = $_POST['dantoc'];
    $loainv = $_POST['loainv'];
    $bangcap = $_POST['bangcap'];
    $ngaysinh = $_POST['ngaysinh'];
    $noisinh = $_POST['noisinh'];
    $nguyenquan = $_POST['nguyenquan'];
    $hokhau = $_POST['hokhau'];
    $tamtru = $_POST['tamtru'];
    $phongban = $_POST['phongban'];
    $chucvu = $_POST['chucvu'];
    $trinhdo = $_POST['trinhdo'];
    $chuyenmon = $_POST['chuyenmon'];
    $status = $_POST['status'];

    // Xử lý ảnh
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    // Kiểm tra định dạng ảnh
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed = array("jpg", "jpeg", "png", "gif");
    if (in_array($imageFileType, $allowed)) {
      // Lưu ảnh vào thư mục
      move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    } else {
      echo "Định dạng file không hợp lệ.";
      exit;
    }

    // Chuẩn bị câu truy vấn SQL
    $sql = "INSERT INTO nhan_vien (ma_nv, ten_nv, biet_danh, hon_nhan_id, so_cmnd, ngay_cap_cmnd, noi_cap_cmnd, quoc_tich_id, ton_giao_id, dan_toc_id, loai_nv_id, bang_cap_id, ngay_sinh, noi_sinh, nguyen_quan, ho_khau, tam_tru, phong_ban_id, chuc_vu_id, trinh_do_id, chuyen_mon_id, trang_thai, hinh_anh)
            VALUES ('$manv', '$tennv', '$bietdanh', '$honnhan', '$cccd', '$ngaycap', '$noicap', '$quoctich', '$tongiao', '$dantoc', '$loainv', '$bangcap', '$ngaysinh', '$noisinh', '$nguyenquan', '$hokhau', '$tamtru', '$phongban', '$chucvu', '$trinhdo', '$chuyenmon', '$status', '$image')";

    // Thực thi câu lệnh
    if (mysqli_query($conn, $sql)) {
      echo "<script>alert('Tạo tài nhân viên thành công!'); window.location.href='danh_sach_nv.php';</script>";
    } else {
      echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
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

</html>