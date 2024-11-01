<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    include("config/db_connect.php");
    $sql = "DELETE FROM tbl_menu WHERE id=$id";
    if(mysqli_query($conn, $sql)){
       session_start();
       $_SESSION['delete']="Xóa thành công";
       header("Location: all_menu.php");
    }
    else{
        die("Thất bại!") ;
    }
}
?>