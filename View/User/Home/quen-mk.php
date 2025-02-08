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
    <title>Quên mật khẩu</title>
</head>

<body class="body-login">
    <div class="main-login">
        <div class="login-content">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active custom-tab-pane " id="login-form" role="tabpanel" aria-labelledby="login-form-tab" tabindex="0" style="background-color: transparent;">
                    <form class="login-form form " action="" method="post" novalidate>
                        <div class="title-login">
                            <h2>Quên mật khẩu</h2>

                            <?php if (isset($_SESSION['error']) && $_SESSION['error'] != ""): ?>
                                <div class="alert alert-danger" role="alert" style="font-size: 15px;">
                                    <?= $_SESSION['error'] ?>
                                </div>
                            <?php endif;
                            unset($_SESSION['error']); ?>
                        </div>
                        <div class="alert alert-light" role="alert">
                            Nhập email để lấy lại mật khẩu
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

                        <button type="submit" name="btn-laymk">Lấy lại mật khẩu</button>
                        <a href="login" class="">Đăng nhập</a>
                        <p class="message"><a href="<?=$base_url?>"><i class="fa-solid fa-arrow-left"></i> Trở về trang chủ</a></p>
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
        const form = document.querySelector(".login-form");

        form.addEventListener("submit", function (event) {
            if (!form.checkValidity()) {
                event.preventDefault(); // Ngăn chặn gửi form
                event.stopPropagation(); // Ngăn chặn các hành động mặc định khác
            }

            // Thêm lớp Bootstrap validation
            form.classList.add("was-validated");
        });
    });
</script>


</html>