<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    include("config/db_connect.php");
    $sql = "DELETE FROM loai_nv WHERE id=$id";
    if(mysqli_query($conn, $sql)){
       session_start();
       $_SESSION['xoa']="Xóa thành công";
       header("Location: them_trinh_do.php");
    }
    else{
        die("Thất bại!") ;
    }
}
?>