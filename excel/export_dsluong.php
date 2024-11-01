<?php
// Include thư viện PhpSpreadsheet (Nếu bạn đã cài qua Composer)
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

ob_start();

// Kết nối cơ sở dữ liệu
include '../config/db_connect.php'; 

// Tạo đối tượng Spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Tiêu đề cho các cột
$sheet->setCellValue('A1', 'Mã Lương');
$sheet->setCellValue('B1', 'Mã Nhân Viên');
$sheet->setCellValue('C1', 'Tên Nhân Viên');
$sheet->setCellValue('D1', 'Số Ngày Công');
$sheet->setCellValue('E1', 'Phụ Cấp');
$sheet->setCellValue('F1', 'Tạm Ứng');
$sheet->setCellValue('G1', 'Lương Thực Nhận');
$sheet->setCellValue('H1', 'Ngày Tính Lương');
// Truy vấn dữ liệu từ bảng lương
$sql = "SELECT luong.ma_luong, nhan_vien.ma_nv, nhan_vien.ten_nv, luong.ngay_cong, luong.phu_cap, luong.tam_ung, luong.thuc_lanh, luong.ngay_cham 
        FROM luong 
        INNER JOIN nhan_vien ON luong.nhanvien_id = nhan_vien.id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $rowNumber = 2;
    while ($row = mysqli_fetch_assoc($result)) {
        $sheet->setCellValue('A' . $rowNumber, $row['ma_luong']);
        $sheet->setCellValue('B' . $rowNumber, $row['ma_nv']);
        $sheet->setCellValue('C' . $rowNumber, $row['ten_nv']);
        $sheet->setCellValue('D' . $rowNumber, $row['ngay_cong']);
        $sheet->setCellValue('E' . $rowNumber, $row['phu_cap']);
        $sheet->setCellValue('F' . $rowNumber, $row['tam_ung']);
        $sheet->setCellValue('G' . $rowNumber, $row['thuc_lanh']);
        $sheet->setCellValue('H' . $rowNumber, $row['ngay_cham']);
        $rowNumber++;
    }
}

// Xuất file Excel
$filename = 'Danh_sach_luong_' . date('Ymd') . '.xlsx';
$writer = new Xlsx($spreadsheet);

ob_end_clean();

// Gửi các header yêu cầu cho trình duyệt
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Cache-Control: max-age=0');

// Xuất file ra trình duyệt
$writer->save('php://output');
exit;
?>
