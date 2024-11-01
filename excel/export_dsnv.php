<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
include "../config/db_connect.php";
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();


$sheet->setCellValue('A1', 'Mã NV');
$sheet->setCellValue('B1', 'Tên NV');
$sheet->setCellValue('C1', 'Biệt danh');
$sheet->setCellValue('D1', 'Giới tính');
$sheet->setCellValue('E1', 'Ngày sinh');
$sheet->setCellValue('F1', 'Nơi sinh');
$sheet->setCellValue('G1', 'Số CCCD');
$sheet->setCellValue('H1', 'Tình trạng hôn nhân');
$sheet->setCellValue('I1', 'Phòng ban');
$sheet->setCellValue('J1', 'Chức vụ');
$sheet->setCellValue('K1', 'Trạng thái');

$sql = "SELECT nv.ma_nv, nv.ten_nv, nv.biet_danh, nv.gioi_tinh, nv.ngay_sinh, nv.noi_sinh, nv.so_cmnd, 
        hn.ten_tinh_trang, pb.ten_phong_ban, cv.ten_chuc_vu, nv.trang_thai 
        FROM nhan_vien nv
        JOIN trinh_trang_hon_nhan hn ON nv.hon_nhan_id = hn.id
        JOIN phongban pb ON nv.phong_ban_id = pb.id
        JOIN chuc_vu cv ON nv.chuc_vu_id = cv.id";
$result = mysqli_query($conn, $sql);


if ($result && mysqli_num_rows($result) > 0) {
    $rowNumber = 2;
    while ($row = mysqli_fetch_assoc($result)) {
        $sheet->setCellValue('A' . $rowNumber, $row['ma_nv']);
        $sheet->setCellValue('B' . $rowNumber, $row['ten_nv']);
        $sheet->setCellValue('C' . $rowNumber, $row['biet_danh']);
        $sheet->setCellValue('D' . $rowNumber, $row['gioi_tinh'] == 1 ? 'Nam' : 'Nữ');
        $sheet->setCellValue('E' . $rowNumber, $row['ngay_sinh']);
        $sheet->setCellValue('F' . $rowNumber, $row['noi_sinh']);
        $sheet->setCellValue('G' . $rowNumber, $row['so_cmnd']);
        $sheet->setCellValue('H' . $rowNumber, $row['ten_tinh_trang']);
        $sheet->setCellValue('I' . $rowNumber, $row['ten_phong_ban']);
        $sheet->setCellValue('J' . $rowNumber, $row['ten_chuc_vu']);
        $sheet->setCellValue('K' . $rowNumber, $row['trang_thai'] == 1 ? 'Đang làm việc' : 'Đã nghỉ việc');
        $rowNumber++;
    }
}

$writer = new Xlsx($spreadsheet);
$filename = 'Danh_sach_nhan_vien.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . urlencode($filename) . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');

mysqli_close($conn);
exit();
?>
