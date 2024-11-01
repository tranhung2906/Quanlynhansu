<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    include("config/db_connect.php");
    $sql = "DELETE FROM tai_khoan WHERE id=$id";
    if(mysqli_query($conn, $sql)){
       session_start();
       $_SESSION['deleteac']="Xóa thành công";
       header("Location: all_account.php");
    }
    else{
        die("Thất bại!") ;
    }
}
?>