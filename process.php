<?php
include("config/db_connect.php");
if(isset($_POST["add"])){
    $menuname = mysqli_real_escape_string($conn, $_POST['menuname']);
    $link = mysqli_escape_string($conn, $_POST['link']);
    $icon = mysqli_escape_string($conn, $_POST['icon']);
    $isactive = mysqli_escape_string($conn, $_POST['isactive']);
    $parent_id = mysqli_escape_string($conn, $_POST['parent_id']);
    $sql = "INSERT INTO tbl_menu(name, link, is_Active, icon, parent_id) VALUES ('$menuname', '$link', '$isactive', '$icon', '$parent_id')";
    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['add'] = "Thêm thành công";
        header("Location: all_menu.php");
    }
    else{
        die("Thất bại") ;
    }
}
?>
<?php
include("config/db_connect.php");
if(isset($_POST["edit"])){
    $menuname = mysqli_real_escape_string($conn, $_POST['menuname']);
    $link = mysqli_escape_string($conn, $_POST['link']);
    $icon = mysqli_escape_string($conn, $_POST['icon']);
    $isactive = mysqli_escape_string($conn, $_POST['isactive']);
    $parent_id = mysqli_escape_string($conn, $_POST['parent_id']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $sql = "UPDATE tbl_menu SET name='$menuname', link = '$link', is_Active = '$isactive', icon = '$icon', parent_id = '$parent_id' WHERE id = $id";
    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['edit'] = "Đã cập nhật";
        header("Location: all_menu.php");
    }
    else{
        die("Thất bại");
    }
}
?>
<?php
include("config/db_connect.php");
if(isset($_POST["save"])){
    $roomCode = mysqli_real_escape_string($conn, $_POST['roomCode']);
    $roomName = mysqli_escape_string($conn, $_POST['roomName']);
    $decreption = mysqli_escape_string($conn, $_POST['description']);
    $personCreate = mysqli_escape_string($conn, $_POST['personCreate']);
    $dateCreate = mysqli_escape_string($conn, $_POST['dateCreate']);
    $sql = "INSERT INTO phongban(ma_phong_ban, ten_phong_ban, ghi_chu, nguoi_tao, ngay_tao) VALUES ('$roomCode', '$roomName', '$decreption', '$personCreate', '$dateCreate')";
    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['save'] = "Tạo phòng ban thành công";
        header("Location: quanly_phongban.php");
    }
    else{
        die("Thất bại") ;
    }
}
?>
<?php
include("config/db_connect.php");
if(isset($_POST["saveEdit"])){
    $roomName = mysqli_real_escape_string($conn, $_POST['roomName']);
    $description = mysqli_escape_string($conn, $_POST['description']);
    $personEdit = mysqli_escape_string($conn, $_POST['personEdit']);
    $dateEdit = mysqli_escape_string($conn, $_POST['dateEdit']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $sql ="UPDATE phongban SET ten_phong_ban = '$roomName', ghi_chu = '$description',nguoi_sua = '$personEdit', ngay_sua = '$dateEdit' WHERE id = '$id';";
    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['saveEdit'] = "Sửa phòng ban thành công";
        header("Location: quanly_phongban.php");
    }
    else{
        die("Thất bại") ;
    }
}
?>