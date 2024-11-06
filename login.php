<!doctype html>
<html lang="en">
<head>
    <title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>
<body class="img js-fullheight" style="background-image: url(images/astronaut\ run.gif);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Đăng nhập tài khoản</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <form action="login.php" class="signin-form" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nhập email" name="email" required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" class="form-control" placeholder="Nhập mật khẩu" name="pass" required>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Đăng nhập</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Nhớ tài khoản
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="" style="color: #fff">Quên mật khẩu</a>
                                </div>
                            </div>
                        </form>
                        <p class="w-100 text-center">&mdash; Design by TRAN HUNG &mdash;</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
// Kết nối CSDL
include "config/db_connect.php";
session_start(); // Khởi tạo session

// Kiểm tra nếu form đã được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận email và mật khẩu từ form
// Giả sử bạn đã lấy thông tin người dùng từ CSDL vào biến $user
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = trim($_POST['pass']); // Lấy mật khẩu từ form và loại bỏ khoảng trắng

$sql = "SELECT * FROM tai_khoan WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
//Lưu id 
$_SESSION['user_id'] = $user['id'];
//Lưu id 
$_SESSION['nv_id'] = $user['nhan_vien_id'];
//Lưu họ tên
$_SESSION['user_firstname'] = $user['ho'];
$_SESSION['user_lastname'] = $user['ten'];
//Lưu ảnh
$_SESSION['user_img'] = $user['hinh_anh'];
//Lưu quyền
$_SESSION['level'] = $user['quyen'];
//Lưu email
$_SESSION['user_email'] = $user['email'];
    // Kiểm tra mật khẩu
    if($password === $user['mat_khau']) {
        // Mật khẩu chính xác
        echo "Mật khẩu chính xác!";
        $luot_truy_cap = $user['truy_cap'] + 1;
            $update_sql = "UPDATE tai_khoan SET truy_cap='$luot_truy_cap' WHERE email='$email'";
            mysqli_query($conn, $update_sql);
            $_SESSION['user_truy_cap'] = $luot_truy_cap;
        header("Location: index.php");
        exit();
    } else {
        // Mật khẩu không chính xác
        echo "<script>alert('Mật khẩu không chính xác!');</script>";

    }
} else {
    echo "<script>alert('Email không tồn tại!');</script>";
}
}
?>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>