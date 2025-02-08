<?php
include('../../../config.php');
include('../../../controller/c_login.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$base_url?>Assets/css/main.css">
    <link rel="stylesheet" href="<?=$base_url?>Assets/css/boostraps/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Login</title>
</head>

<body class="body-login">
    <div class="main-login">
        <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" id="login-form-tab" data-bs-toggle="pill" data-bs-target="#login-form" type="button" role="tab" aria-controls="login-form" aria-selected="true">Đăng nhập</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="register-form-tab" data-bs-toggle="pill" data-bs-target="#register-form" type="button" role="tab" aria-controls="register-form" aria-selected="false">Đăng ký</button>
            </li>
        </ul>
        <div class="login-content">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active custom-tab-pane" id="login-form" role="tabpanel" aria-labelledby="login-form-tab" tabindex="0" style="background-color: transparent;">
                    <form class="login-form form" action="" method="post">
                        <div class="title-login">
                            <h2>Đăng nhập</h2>

                            <?php if (isset($_SESSION['error']) && $_SESSION['error'] != ""): ?>
                                <div class="alert alert-danger" role="alert" style="font-size: 15px;">
                                    <?= $_SESSION['error'] ?>
                                </div>
                            <?php endif;
                            unset($_SESSION['error']); ?>
                        </div>
                        <input type="text" name="username" placeholder="Username" required />
                        <input type="password" name="password" placeholder="Password" required />
                        <button type="submit" name="btn-login">Đăng nhập</button>
                        <a href="quenmatkhau" class="">Quên mật khẩu</a>
                        <p class="message"><a href="<?=$base_url?>"><i class="fa-solid fa-arrow-left"></i> Trở về trang chủ</a></p>
                    </form>


                </div>

                <div class="tab-pane fade custom-tab-pane" id="register-form" role="tabpanel" aria-labelledby="register-form-tab" tabindex="0" style="background-color: transparent;">
                <form class="register-form form" action="" method="POST" enctype="multipart/form-data" novalidate>
                    <div class="title-login">
                        <h2>Đăng ký</h2>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingName" name="hoten" placeholder="Họ và tên" required>
                        <label for="floatingName">Họ và tên</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingUsername" name="tendangnhap" placeholder="Tên đăng nhập *" pattern="^[a-zA-Z0-9]+$" title="Tên đăng nhập không được chứa dấu cách hoặc ký tự đặc biệt." required>
                        <label for="floatingUsername">Tên đăng nhập</label>
                        <div class="invalid-feedback">
                            <div class="alert alert-danger" id="password-message" style="font-size: 15px;">
                                Tên đăng nhập không được chứa dấu cách hoặc ký tự đặc biệt.
                            </div> 
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="Email *" pattern="^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$" title="Email không hợp lệ." required>
                        <label for="floatingEmail">Email</label>
                        <div class="invalid-feedback">
                            <div class="alert alert-danger" id="password-message" style="font-size: 15px;">
                                Email không hợp lệ.
                            </div> 
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingPhone" name="dienthoai" placeholder="Số điện thoại *" pattern="^[0-9]{10,11}$" title="Số điện thoại phải có 10 - 11 số." required>
                        <label for="floatingPhone">Số điện thoại</label>
                        <div class="invalid-feedback">       
                            <div class="alert alert-danger" id="password-message" style="font-size: 15px;">
                                Số điện thoại phải có 10 - 11 số.
                            </div> 
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingCccd" name="cccd" placeholder="Cccd *" pattern="^[0-9]{13}$" title="CCCD phải có 13 số." required>
                        <label for="floatingCccd">Cccd</label>
                        <div class="invalid-feedback">
                            
                            <div class="alert alert-danger" id="password-message" style="font-size: 15px;">
                                CCCD phải có 13 số.
                            </div> 
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingAddress" name="diachi" placeholder="Địa chỉ *" required>
                        <label for="floatingAddress">Địa chỉ</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" name="matkhau" placeholder="Mật khẩu *" pattern=".{8,}" title="Mật khẩu phải có ít nhất 8 ký tự." required>
                        <label for="floatingPassword">Mật khẩu</label>
                        <div class="invalid-feedback">
                            
                            <div class="alert alert-danger" id="password-message" style="font-size: 15px;">
                                Mật khẩu phải có ít nhất 8 ký tự.
                            </div> 
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingConfirmPassword" name="nhaplaimatkhau" placeholder="Nhập lại mật khẩu *" required>
                        <label for="floatingConfirmPassword">Nhập lại mật khẩu</label>
                        <div class="invalid-feedback">
                            <div class="alert alert-danger" id="password-message" style="font-size: 15px;">
                                Mật khẩu và mật khẩu nhập lại không giống nhau.
                            </div> 
                        </div>
                    </div>

                    
                    <span class="text-white">Hình người dùng</span>
                    <input type="file" name="user_image" accept="image/*" required />
                    <button type="submit" name="btn-dangky" class="btn btn-primary w-100">Đăng ký</button>
                    <p class="message"><a href="<?=$base_url?>"><i class="fa-solid fa-arrow-left"></i> Trở về trang chủ</a></p>
                    <div class="alert alert-primary" role="alert">
                        Mỗi 1 tài khoản đăng ký giá 30.000 vnđ có thể thanh toán tại thư viện hoặc chuyển khoản qua mã QR(Ghi chú: khi chuyển khoản hãy ghi tên tài khoản và mật khẩu đăng ký vào phần ghi chú)
                        <img src="\do_an_quanlythuvien\Assets\img\qr-chuyenkhoan\qr-thaianhhuy-chuyenkhoan.jpg" alt="">
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector(".register-form");
    const password = document.getElementById("floatingPassword");
    const confirmPassword = document.getElementById("floatingConfirmPassword");
    const passwordMessage = document.getElementById("password-message");

    // Kiểm tra khớp mật khẩu
    confirmPassword.addEventListener("input", function () {
        if (confirmPassword.value !== password.value) {
            passwordMessage.style.display = "block";
            confirmPassword.classList.add("is-invalid");
        } else {
            passwordMessage.style.display = "none";
            confirmPassword.classList.remove("is-invalid");
        }
    });

    // Ngăn gửi form nếu có lỗi
    form.addEventListener("submit", function (event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add("was-validated");
    });
});

</script>

</html>
