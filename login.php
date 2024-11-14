<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QUẢN LÝ NHÂN SỰ</title>
    <!-- Favicon  -->
    <link rel="icon" href="img/logo_web.png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href=" dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h1"><b>Đăng nhập</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Đăng nhập để bắt đầu phiên làm việc</p>

                <form action="login.php" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo isset($_COOKIE['user_email']) ? $_COOKIE['user_email'] : ''; ?>" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Mật khẩu" name="pass" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember"
                                    <?php echo isset($_COOKIE['user_email']) ? 'checked' : ''; ?>>
                                <label for="remember">
                                    Nhớ tài khoản
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <div class="social-auth-links text-center mt-2 mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Đăng nhập với Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Đăng nhập với Google+
                    </a>
                </div>
                <!-- /.social-auth-links -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
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
            if ($password === $user['mat_khau']) {
                if (isset($_POST['remember'])) {
                    setcookie('user_email', $email, time() + (30 * 24 * 60 * 60), '/');
                } else {
                    setcookie('user_email', '', time() - 3600, '/');
                }
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
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>