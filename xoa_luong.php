<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    include("config/db_connect.php");
    $sql = "DELETE FROM luong WHERE id=$id";
    if(mysqli_query($conn, $sql)){
       session_start();
       $_SESSION['xoaluong']="Xóa thành công";
       header("Location: bang_luong.php");
    }
    else{
        die("Thất bại!") ;
    }
}
?>