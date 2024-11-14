<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
include "config/db_connect.php";
    if(isset($_GET['id']))
  {
$id = $_GET['id'];
$showData = "SELECT nv.id as id, quoc_tich_id, ton_giao_id, dan_toc_id, loai_nv_id, bang_cap_id, phong_ban_id, chuc_vu_id, trinh_do_id, chuyen_mon_id, hon_nhan_id, ma_nv, hinh_anh, ten_nv, biet_danh, gioi_tinh, nv.ngay_tao as ngay_tao, ngay_sinh, noi_sinh, so_cmnd, ngay_cap_cmnd, noi_cap_cmnd, nguyen_quan, ten_quoc_tich, ten_dan_toc, ten_ton_giao, ho_khau, tam_tru, ten_loai_nv, ten_trinh_do, ten_chuyen_mon, ten_bang_cap, ten_phong_ban, ten_chuc_vu, ten_tinh_trang, trang_thai FROM nhan_vien nv, quoc_tich qt, dan_toc dt, ton_giao tg, loai_nv lnv, trinh_do td, chuyen_mon cm, bang_cap bc, phongban pb, chuc_vu cv, trinh_trang_hon_nhan hn WHERE nv.quoc_tich_id = qt.id AND nv.dan_toc_id = dt.id AND nv.ton_giao_id = tg.id AND nv.loai_nv_id = lnv.id AND nv.trinh_do_id = td.id AND nv.chuyen_mon_id = cm.id AND nv.bang_cap_id = bc.id AND nv.phong_ban_id = pb.id AND nv.chuc_vu_id = cv.id AND nv.hon_nhan_id = hn.id AND nv.id = $id";
$result = mysqli_query($conn, $showData);
$row = mysqli_fetch_array($result);

// set option active
$qt_id = $row['quoc_tich_id'];
$ten_qt = $row['ten_quoc_tich'];

$tg_id = $row['ton_giao_id'];
$ten_tg = $row['ten_ton_giao'];

$dt_id = $row['dan_toc_id'];
$ten_dt = $row['ten_dan_toc'];

$nv_id = $row['loai_nv_id'];
$ten_nv = $row['ten_loai_nv'];

$bc_id = $row['bang_cap_id'];
$ten_bc = $row['ten_bang_cap'];

$pb_id = $row['phong_ban_id'];
$ten_pb = $row['ten_phong_ban'];

$cv_id = $row['chuc_vu_id'];
$ten_cv = $row['ten_chuc_vu'];

$td_id = $row['trinh_do_id'];
$ten_td = $row['ten_trinh_do'];

$cm_id = $row['chuyen_mon_id'];
$ten_cm = $row['ten_chuyen_mon'];

$hn_id = $row['hon_nhan_id'];
$ten_hn = $row['ten_tinh_trang'];
// ----- Hôn nhân
$honNhan = "SELECT id, ten_tinh_trang FROM trinh_trang_hon_nhan WHERE id <> $hn_id";
$resultHonNhan = mysqli_query($conn, $honNhan);
$arrHonNhan = array();
while ($rowHonNhan = mysqli_fetch_array($resultHonNhan)) {
    $arrHonNhan[] = $rowHonNhan;
}
// ----- Quốc tịch
$quocTich = "SELECT id, ten_quoc_tich FROM quoc_tich WHERE id <> $qt_id";
$resultQuocTich = mysqli_query($conn, $quocTich);
$arrQuocTich = array();
while ($rowQuocTich = mysqli_fetch_array($resultQuocTich)) {
    $arrQuocTich[] = $rowQuocTich;
}

// ----- Tôn giáo
$tonGiao = "SELECT id, ten_ton_giao FROM ton_giao WHERE id <> $tg_id";
$resultTonGiao = mysqli_query($conn, $tonGiao);
$arrTonGiao = array();
while ($rowTonGiao = mysqli_fetch_array($resultTonGiao)) {
    $arrTonGiao[] = $rowTonGiao;
}

// ----- Dân tộc
$danToc = "SELECT id, ten_dan_toc FROM dan_toc WHERE id <> $dt_id";
$resultDanToc = mysqli_query($conn, $danToc);
$arrDanToc = array();
while ($rowDanToc = mysqli_fetch_array($resultDanToc)) {
    $arrDanToc[] = $rowDanToc;
}

// ----- Loại nhân viên
$loaiNhanVien = "SELECT id, ten_loai_nv FROM loai_nv WHERE id <> $nv_id";
$resultLoaiNhanVien = mysqli_query($conn, $loaiNhanVien);
$arrLoaiNhanVien = array();
while ($rowLoaiNhanVien = mysqli_fetch_array($resultLoaiNhanVien)) {
    $arrLoaiNhanVien[] = $rowLoaiNhanVien;
}

// ----- Trình độ
$trinhDo = "SELECT id, ten_trinh_do FROM trinh_do WHERE id <> $td_id";
$resultTrinhDo = mysqli_query($conn, $trinhDo);
$arrTrinhDo = array();
while ($rowTrinhDo = mysqli_fetch_array($resultTrinhDo)) {
    $arrTrinhDo[] = $rowTrinhDo;
}

// ----- Chuyên môn
$chuyenMon = "SELECT id, ten_chuyen_mon FROM chuyen_mon WHERE id <> $cm_id";
$resultChuyenMon = mysqli_query($conn, $chuyenMon);
$arrChuyenMon = array();
while ($rowChuyenMon = mysqli_fetch_array($resultChuyenMon)) {
    $arrChuyenMon[] = $rowChuyenMon;
}

// ----- Bằng cấp
$bangCap = "SELECT id, ten_bang_cap FROM bang_cap WHERE id <> $bc_id";
$resultBangCap = mysqli_query($conn, $bangCap);
$arrBangCap = array();
while ($rowBangCap = mysqli_fetch_array($resultBangCap)) {
    $arrBangCap[] = $rowBangCap;
}

// ----- Phòng ban
$phongBan = "SELECT id, ten_phong_ban FROM phongban WHERE id <> $pb_id";
$resultPhongBan = mysqli_query($conn, $phongBan);
$arrPhongBan = array();
while ($rowPhongBan = mysqli_fetch_array($resultPhongBan)) {
    $arrPhongBan[] = $rowPhongBan;
}

// ----- Chức vụ
$chucVu = "SELECT id, ten_chuc_vu FROM chuc_vu WHERE id <> $cv_id";
$resultChucVu = mysqli_query($conn, $chucVu);
$arrChucVu = array();
while ($rowChucVu = mysqli_fetch_array($resultChucVu)) {
    $arrChucVu[] = $rowChucVu;
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
       <?php
       include "menu.php";?>
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
                            <li class="breadcrumb-item active">Sửa nhân viên</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
        <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    include "config/db_connect.php";
                    $truyvan = "SELECT * FROM nhan_vien  WHERE id = '$id'";
                    $que = mysqli_query($conn, $truyvan);
                    $ketqua = mysqli_fetch_assoc($que);
                }
                ?>
            <form action="edit_nhanvien.php" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $ketqua['id'] ?>" name="id">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Chỉnh sửa nhân viên
                                </h3>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <label for="exampleInputPassword1">Mã nhân viên: <b style="color: red;">*</b></label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $ketqua['ma_nv'] ?>" name="manv" readonly>
                                    </div>
                                    <div class="card-body">
                                        <label for="exampleInputPassword1">Tên nhân viên: <b style="color: red;">*</b></label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $ketqua['ten_nv'] ?>" name="tennv">
                                    </div>
                                    <div class="card-body">
                                        <label for="exampleInputPassword1">Biệt danh:</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $ketqua['biet_danh'] ?>" name="bietdanh">
                                    </div>
                                    <div class="card-body">
                                        <label for="status">Tình trạng hôn nhân: <b style="color: red;">*</b></label>
                                        <select class="form-control" name="honnhan" id="status">
                                            <option value="<?php echo $hn_id; ?>"><?php echo $ten_hn; ?></option>
                                            <?php
                                            foreach ($arrHonNhan as $hn) {
                                                echo "<option value='" . $hn['id'] . "'>" . $hn['ten_tinh_trang'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="card-body">
                                        <label for="exampleInputPassword1">Số CCCD: <b style="color: red;">*</b></label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $ketqua['so_cmnd']  ?>" name="cccd">
                                    </div>
                                    <div class="card-body">
                                        <label for="exampleInputPassword1">Ngày cấp <b style="color: red;">*</b></label>
                                        <input type="date" class="form-control" value="<?php echo $ketqua['ngay_cap_cmnd']  ?>" id="exampleInputPassword1"
                                            name="ngaycap">
                                    </div>
                                    <div class="card-body">
                                        <label for="exampleInputPassword1">Nơi cấp <b style="color: red;">*</b></label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $ketqua['noi_cap_cmnd']  ?>" name="noicap">
                                    </div>
                                    <div class="card-body">
                                        <label for="status">Quốc tịch <b style="color: red;">*</b></label>
                                        <select class="form-control" name="quoctich" id="status">
                                            <option value="<?php echo $qt_id; ?>"><?php echo $ten_qt; ?></option>
                                            <?php
                                            foreach ($arrQuocTich as $qt) {
                                                echo "<option value='" . $qt['id'] . "'>" . $qt['ten_quoc_tich'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="card-body">
                                        <label for="status">Tôn giáo <b style="color: red;">*</b></label>
                                        <select class="form-control" name="tongiao" id="status">
                                            <option value="<?php echo $tg_id; ?>"><?php echo $ten_tg ?></option>
                                            <?php
                                            foreach ($arrTonGiao as $tg) {
                                                echo "<option value='" . $tg['id'] . "'>" . $tg['ten_ton_giao'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="card-body">
                                        <label for="status">Dân tộc <b style="color: red;">*</b></label>
                                        <select class="form-control" name="dantoc" id="status">
                                            <option value="<?php echo $dt_id; ?>"><?php echo $ten_dt; ?></option>
                                            <?php
                                            foreach ($arrDanToc as $dt) {
                                                echo "<option value='" . $dt['id'] . "'>" . $dt['ten_dan_toc'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="card-body">
                                        <label for="status">Loại nhân viên <b style="color: red;">*</b></label>
                                        <select class="form-control" name="loainv" id="status">
                                            <option value="<?php echo $nv_id; ?>"><?php echo $ten_nv; ?></option>
                                            <?php
                                            foreach ($arrLoaiNhanVien as $lnv) {
                                                echo "<option value='" . $lnv['id'] . "'>" . $lnv['ten_loai_nv'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="card-body">
                                        <label for="status">Bằng cấp <b style="color: red;">*</b></label>
                                        <select class="form-control" name="bangcap" id="status">
                                            <option value="<?php echo $bc_id; ?>"><?php echo $ten_bc; ?></option>
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
                                        <input type="file" class="form-control" id="exampleInputEmail1" name="image">
                                        <p class="help-block">Vui lòng chọn file đúng định dạng: jpg, jpeg, png, gif.</p>
                                    </div>
                                    <div class="card-body">
                                        <label for="status">Giới tính <b style="color: red;">*</b></label>
                                        <select class="form-control" name="gioitinh" id="status">
                                            <?php
                                            if ($ketqua['gioi_tinh'] == 1) {
                                                echo "<option value='1' selected>Nam</option>";
                                                echo "<option value='0'>Nữ</option>";
                                            } else {
                                                echo "<option value='1'>Nam</option>";
                                                echo "<option value='0' selected>Nữ</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="card-body">
                                        <label for="exampleInputPassword1">Ngày sinh <b style="color: red;">*</b></label>
                                        <input type="date" class="form-control" id="exampleInputPassword1" name="ngaysinh" value="<?php echo $ketqua['ngay_sinh'] ?>">
                                    </div>
                                    <div class="card-body">
                                        <label for="exampleInputPassword1">Nơi sinh</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $ketqua['noi_sinh'] ?>" name="noisinh">
                                    </div>
                                    <div class="card-body">
                                        <label for="exampleInputPassword1">Nguyên quán</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $ketqua['nguyen_quan'] ?>" name="nguyenquan">
                                    </div>
                                    <div class="card-body">
                                        <label for="exampleInputPassword1">Hộ khẩu <b style="color: red;">*</b></label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $ketqua['ho_khau'] ?>" name="hokhau">
                                    </div>
                                    <div class="card-body">
                                        <label for="exampleInputPassword1">Tạm trú <b style="color: red;">*</b></label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $ketqua['tam_tru'] ?>" name="tamtru">
                                    </div>
                                    <div class="card-body">
                                        <label for="status">Phòng ban <b style="color: red;">*</b></label>
                                        <select class="form-control" name="phongban" id="status">
                                            <option value="<?php echo $pb_id; ?>"><?php echo $ten_pb; ?></option>
                                            <?php
                                            foreach ($arrPhongBan as $pb) {
                                                echo "<option value='" . $pb['id'] . "'>" . $pb['ten_phong_ban'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="card-body">
                                        <label for="status">Chức vụ <b style="color: red;">*</b></label>
                                        <select class="form-control" name="chucvu" id="status">
                                            <option value="<?php echo $cv_id; ?>"><?php echo $ten_cv; ?></option>
                                            <?php
                                            foreach ($arrChucVu as $cv) {
                                                echo "<option value='" . $cv['id'] . "'>" . $cv['ten_chuc_vu'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="card-body">
                                        <label for="status">Trình độ <b style="color: red;">*</b></label>
                                        <select class="form-control" name="trinhdo" id="status">
                                            <option value="<?php echo $td_id; ?>"><?php echo $ten_td; ?></option>
                                            <?php
                                            foreach ($arrTrinhDo as $trd) {
                                                echo "<option value='" . $trd['id'] . "'>" . $trd['ten_trinh_do'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="card-body">
                                        <label for="status">Chuyên môn <b style="color: red;">*</b></label>
                                        <select class="form-control" name="chuyenmon" id="status">
                                            <option value="<?php echo $cm_id; ?>"><?php echo $ten_cm; ?></option>
                                            <?php
                                            foreach ($arrChuyenMon as $cm) {
                                                echo "<option value='" . $cm['id'] . "'>" . $cm['ten_chuyen_mon'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="card-body">
                                        <label for="status">Trạng thái <b style="color: red;">*</b></label>
                                        <select class="form-control" name="status" id="status">
                                            <?php
                                            if ($ketqua['trang_thai'] == 1) {
                                                echo "<option value='1' selected>Đang làm việc</option>";
                                                echo "<option value='0'>Đã nghỉ việc</option>";
                                            } else {
                                                echo "<option value='1'>Đang làm việc</option>";
                                                echo "<option value='0' selected>Đã nghỉ việc</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div style="margin:20px">
                                    <button type='submit' class='btn btn-warning' name='suanhanvien'><i class='fa fa-save'></i> Lưu lại</button>
                                </div>
                            </div>
                            <!-- /.col-->
                        </div>
            </form>
            <!-- /.card -->
            <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </section>
    <?php
// Kết nối cơ sở dữ liệu
include 'config/db_connect.php';

if (isset($_POST['suanhanvien'])) {
    // Lấy dữ liệu từ form
    $id = $_POST['id'];
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
    $gioitinh = $_POST['gioitinh'];
    $status = $_POST['status'];
    $ngaysua = date('Y-m-d');
    // Xử lý hình ảnh
    $image_name = "";
    if ($_FILES['image']['name']) {
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_name = time() . '_' . $image; // Đổi tên file để tránh trùng lặp
        $target = "uploads/" . $image_name;

        // Kiểm tra định dạng ảnh
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed_types)) {
            echo "Chỉ cho phép các định dạng jpg, jpeg, png, gif.";
            exit();
        }
        
        // Di chuyển file đến thư mục đích
        if (!move_uploaded_file($image_tmp, $target)) {
            echo "Lỗi khi tải ảnh lên.";
            exit();
        }
    }

    // Cập nhật thông tin nhân viên trong cơ sở dữ liệu
    $update_query = "
        UPDATE nhan_vien 
        SET ten_nv = '$tennv', biet_danh = '$bietdanh', hon_nhan_id = '$honnhan', so_cmnd = '$cccd', ngay_cap_cmnd = '$ngaycap', 
        noi_cap_cmnd = '$noicap', quoc_tich_id = '$quoctich', ton_giao_id = '$tongiao', dan_toc_id = '$dantoc', 
        loai_nv_id = '$loainv', bang_cap_id = '$bangcap', ngay_sinh = '$ngaysinh', noi_sinh = '$noisinh', 
        nguyen_quan = '$nguyenquan', ho_khau = '$hokhau', tam_tru = '$tamtru', phong_ban_id = '$phongban', 
        chuc_vu_id = '$chucvu', trinh_do_id = '$trinhdo', chuyen_mon_id = '$chuyenmon', gioi_tinh = '$gioitinh', trang_thai = '$status', ngay_sua = '$ngaysua'
    ";

    // Nếu có ảnh mới, thêm cập nhật ảnh vào query
    if ($image_name) {
        $update_query .= ", hinh_anh = '$image_name'";
    }

    $update_query .= " WHERE id = '$id'";

    // Thực hiện truy vấn
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Cập nhật nhân viên thành công!'); window.location.href='danh_sach_nv.php';</script>";
    } else {
        echo "Lỗi: " . mysqli_error($conn);
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