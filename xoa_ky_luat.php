<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    include("config/db_connect.php");
    $sql = "DELETE FROM khenthuong_kyluat WHERE ma_kt = '$id'";
    if(mysqli_query($conn, $sql)){
       session_start();
       $_SESSION['xoakyluat']="Xóa thành công";
       header("Location: tao_ky_luat.php");
    }
    else{
        die("Thất bại!") ;
    }
}
?>