<?php
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include("config/db_connect.php");
    $sql = "DELETE FROM chuyen_mon WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
       $_SESSION['success'] = ["Xóa chuyên môn thành công"];
       $_SESSION['showMess'] = true;
       header("Location: them_chuyen_mon.php");
       exit();
    } else {
        die("Thất bại!");
    }
}
?>
