<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    include("config/db_connect.php");
    $sql = "DELETE FROM lich_tuan WHERE id=$id";
    if(mysqli_query($conn, $sql)){
       session_start();
       $_SESSION['xoalichtuan']="Xóa thành công";
       header("Location: danh_sach_lich_tuan.php");
    }
    else{
        die("Thất bại!") ;
    }
}
?>