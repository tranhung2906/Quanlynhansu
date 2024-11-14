<?php
session_start();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    include("config/db_connect.php");
    $sql = "DELETE FROM khenthuong_kyluat WHERE ma_kt = '$id'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = ["Xóa khen thưởng thành công"];
        $_SESSION['showMess'] = true;
        header("Location: tao_khen_thuong.php");
        exit();
     } else {
         die("Thất bại!");
     }
 }
 ?>
 