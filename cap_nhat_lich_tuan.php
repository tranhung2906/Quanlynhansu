<?php
// Kết nối cơ sở dữ liệu
include 'config/db_connect.php';

if (isset($_GET['id'])) {
    $lich_tuan_id = $_GET['id'];
    // Chuẩn bị câu truy vấn cập nhật trạng thái
    $update_query = "UPDATE lich_tuan SET trang_thai_cv = 1 WHERE id = '$lich_tuan_id'";
    
    // Thực hiện câu truy vấn
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Cập nhật trạng thái thành công!'); window.location.href = 'danh_sach_lich_tuan.php';</script>";
    } else {
        echo "<script>alert('Có lỗi xảy ra khi cập nhật trạng thái!');</script>";
    }
}

// Đóng kết nối cơ sở dữ liệu
mysqli_close($conn);
?>
