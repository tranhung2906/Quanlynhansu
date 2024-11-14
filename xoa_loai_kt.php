<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    include("config/db_connect.php");
    $sql = "DELETE FROM loai_khenthuong_kyluat WHERE id=$id";
    if(mysqli_query($conn, $sql)){
       session_start();
       $_SESSION['xoaloaikt']="Xóa thành công";
       header("Location: loai_kt_kl.php");
    }
    else{
        die("Thất bại!") ;
    }
}
?>