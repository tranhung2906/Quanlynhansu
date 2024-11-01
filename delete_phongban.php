<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    include("config/db_connect.php");
    $sql = "DELETE FROM phongban WHERE id=$id";
    if(mysqli_query($conn, $sql)){
       session_start();
       $_SESSION['xoa']="Xóa thành công";
       header("Location: quanly_phongban.php");
    }
    else{
        die("Thất bại!") ;
    }
}
?>