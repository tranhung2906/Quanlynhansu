<?php
// Kết nối cơ sở dữ liệu
include 'config/db_connect.php';
$macc = "MCC" . time();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $nv_id = (int)$_GET['id'];
    $ngaycham = date('Y-m-d');

    // Kiểm tra trạng thái chấm công của nhân viên
    $check_query = "SELECT trang_thai_cham FROM cham_cong WHERE id = $nv_id";
    $result = mysqli_query($conn, $check_query);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        if ($row['trang_thai_cham'] == 1) {
            echo "<script>alert('Nhân viên đã được chấm công!'); window.location.href = 'cham_cong.php';</script>";
        } else {
            $update_query = "UPDATE cham_cong SET ma_cham_cong = '$macc', ngay_cham = '$ngaycham', trang_thai_cham = 1, tinh_trang = 0 WHERE id = $nv_id";
            
            if (mysqli_query($conn, $update_query)) {
                echo "<script>alert('Chấm công thành công!'); window.location.href = 'cham_cong.php';</script>";
            } else {
                echo "<script>alert('Có lỗi xảy ra khi chấm công!');</script>";
            }
        }
    } else {
        echo "<script>alert('Nhân viên không tồn tại!'); window.location.href = 'cham_cong.php';</script>";
    }
} else {
    echo "<script>alert('ID nhân viên không hợp lệ!'); window.location.href = 'cham_cong.php';</script>";
}

mysqli_close($conn);
?>
