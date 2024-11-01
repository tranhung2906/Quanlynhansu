<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    include("config/db_connect.php");
    $sql = "DELETE FROM nhan_vien WHERE id=$id";
    if(mysqli_query($conn, $sql)){
       session_start();
       $_SESSION['xoa']="Xóa thành công";
       header("Location: danh_sach_nv.php");
    }
    else{
        die("Thất bại!") ;
    }
}
?>