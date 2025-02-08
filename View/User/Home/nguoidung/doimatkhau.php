<div class="container mb-3">
    <div class="row justify-content-center">
        <form class="row g-3 needs-validation d-flex justify-content-center" id="password-form" action="<?=$base_url?>user/doimk" method="post" enctype="multipart/form-data" novalidate>
            <!-- Hình ảnh -->
            <div class="col-md-4 me-3 form-container">
                <h2 class="text-center">Đổi mật khẩu</h2>
                <div class="row justify-content-md-center">
                    <!-- Mật khẩu cũ -->
                    <div class="col-md-12">
                        <label for="oldPassword" class="form-label me-2">Mật khẩu cũ</label>
                        <input type="password" class="form-control me-2" id="mkcu" name="mkcu" placeholder="Mật khẩu cũ" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập mật khẩu cũ.
                        </div>
                    </div>
                    <!-- Mật khẩu mới -->
                    <div class="col-md-12">
                        <label for="newPassword" class="form-label me-2">Mật khẩu mới</label>
                        <input type="password" class="form-control me-2" id="newPassword" name="mkmoi" placeholder="Mật khẩu mới" pattern=".{8,}" title="Mật khẩu phải có ít nhất 8 ký tự." required>
                        <div class="invalid-feedback">
                            Mật khẩu mới phải có ít nhất 8 ký tự.
                        </div>
                    </div>
                    <!-- Nhập lại mật khẩu mới -->
                    <div class="col-md-12">
                        <label for="confirmPassword" class="form-label me-2">Nhập lại mật khẩu mới</label>
                        <input type="password" class="form-control" id="confirmPassword" name="" placeholder="Nhập lại mật khẩu mới" required>
                        
                        <div class="text-danger mt-2" id="password-match-error" style="display: none;">
                            Mật khẩu mới và nhập lại không khớp.
                        </div>
                    </div>
                    <!-- Nút Đổi mật khẩu -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary shadou-btn" name="submit-doimk">Đổi mật khẩu</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("password-form");
        const newPassword = document.getElementById("newPassword");
        const confirmPassword = document.getElementById("confirmPassword");
        const passwordMatchError = document.getElementById("password-match-error");

        // Kiểm tra khớp mật khẩu
        confirmPassword.addEventListener("input", function () {
            if (confirmPassword.value !== newPassword.value) {
                passwordMatchError.style.display = "block";
                confirmPassword.classList.add("is-invalid");
            } else {
                passwordMatchError.style.display = "none";
                confirmPassword.classList.remove("is-invalid");
            }
        });

        // Ngăn gửi form nếu có lỗi
        form.addEventListener("submit", function (event) {
            if (!form.checkValidity() || confirmPassword.value !== newPassword.value) {
                event.preventDefault();
                event.stopPropagation();
                if (confirmPassword.value !== newPassword.value) {
                    passwordMatchError.style.display = "block";
                    confirmPassword.classList.add("is-invalid");
                }
            }
            form.classList.add("was-validated");
        });
    });
</script>
