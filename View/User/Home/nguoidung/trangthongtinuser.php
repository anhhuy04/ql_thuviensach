
    <div class="container mb-3">
        <div class="row justify-content-center">
            <form class="row g-3 needs-validation d-flex justify-content-center" action="<?=$base_url_admin?>ql_sach/<?=$user["MaTaiKhoan"]?>" method="post" enctype="multipart/form-data" novalidate>
            <!-- Hình ảnh -->
                <div class="col-md-4 me-3 form-container">
                    <label for="url_hinh_dm" class="form-label">Hình Ảnh</label>
                    <div class="row justify-content-md-center">
                        <div class="mb-3 d-flex justify-content-center">
                            <img id="preview" class="preview-img-user" src="<?=$base_url?>Assets/Upload/nguoidung/<?=$user["URL_HinhNguoiDung"]?>" alt="Hình Danh Mục">
                        </div>
                        <p><?=$user["URL_HinhNguoiDung"]?></p>  
                        <input class="form-control form-control-sm" type="file" name="url_hinh_bosach" id="url_hinh_bosach" accept="image/*" onchange="loadFile(event)" disabled>
                        <div class="invalid-feedback">
                            Vui lòng chọn hình ảnh hợp lệ.
                        </div>
                    </div>
                </div>
                
            <!-- Nhập thông tin -->
                <div class="col-md-7 ps-4 form-container">
                    <div class="row">
                        <div class="col-md-4 ">
                            <label for="vitrisach" class="form-label">Mã tài khoản: <?=$user["MaTaiKhoan"]?></label>
                        </div>
                        <div class="col-md-4 ">
                            <label for="vitrisach" class="form-label">Vai trò: <?=$user["TenVaiTro"]?></label>
                        </div>
                        <?php if (!empty($user["ChucVu"])): ?>
                            <div class="col-md-4">
                                <label for="vitrisach" class="form-label">Chức vụ: <?= htmlspecialchars($user["ChucVu"]) ?></label>
                            </div>
                        <?php endif; ?>

                        
                        <div class="col-md-12">
                            <label for="hoten" class="form-label me-2">Tên</label>
                            <input type="text" class="form-control me-2" id="hoten" name="hoten" placeholder="Nhập họ tên" value="<?=$user['HoTen']?>" disabled required>
                            <div class="invalid-feedback">
                                Vui lòng không bỏ trống ô này
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label me-2">Email</label>
                            <input type="text" class="form-control me-2" id="email" name="email" placeholder="Nhập họ tên" value="<?=$user['Email']?>" disabled required>
                            <div class="invalid-feedback">
                                Vui lòng không bỏ trống ô này
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="dienthoai" class="form-label me-2">Số điện thoại</label>
                            <input type="text" class="form-control me-2" id="dienthoai" name="dienthoai" placeholder="Nhập " value="<?=$user['DienThoai']?>" disabled required>
                            <div class="invalid-feedback">
                                Vui lòng không bỏ trống ô này
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="diachi" class="form-label me-2">Địa chỉ</label>
                            <input type="text" class="form-control me-2" id="diachi" name="diachi" placeholder="Nhập " value="<?=$user['DiaChi']?>" disabled required>
                            <div class="invalid-feedback">
                                Vui lòng không bỏ trống ô này
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="cccd" class="form-label me-2">Cccd</label>
                            <input type="text" class="form-control me-2" id="cccd" name="cccd" placeholder="Nhập " value="<?=$user['Cccd']?>" disabled required>
                            <div class="invalid-feedback">
                                Vui lòng không bỏ trống ô này
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6 ">
                            <label for="vitrisach" class="form-label">Ngày tạo tài khoản: <?=$user["CreatedAt"]?></label>
                        </div>  
                        <div class="col-md-6">
                            <label for="vitrisach" class="form-label">Cập nhật gần nhất: <?=$user["UpdatedAt"]?></label>
                        </div> 
                    </div>
                </div>
            <!-- Submit -->
                <div class="text-center mt-4">
                    <button id="editButton" type="button" class="btn btn-warning shadou-btn">Sửa</button>
                    <button id="saveButton" class="btn btn-success d-none shadou-btn" type="submit" name="submit-update-bosach">Lưu</button>
                </div>
            </form>
        </div>
    </div>
<script src="<?=$base_url?>Assets/js/quanlysach/sua-xoa.js"></script>
<script src="<?=$base_url?>Assets/js/quanlysach/file_img.js"></script>
<?php include "View/Admin/home/xacnhan-thongbao.php";?>

    <script>
        function showToast(type, message = '') {
            if (type === 'success') {
                var toastSuccess = document.getElementById('toastSuccess');
                toastSuccess.querySelector('.toast-body').textContent = message;
                new bootstrap.Toast(toastSuccess).show();
            } else if (type === 'error') {
                var toastError = document.getElementById('toastError');
                toastError.querySelector('.toast-body').textContent = message;
                new bootstrap.Toast(toastError).show();
            }
        }
    </script>
<!-- Ẩn hoặc đặt data-edit="true" -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Kiểm tra trạng thái "sửa" trực tiếp từ PHP
        let editButton = document.getElementById("editButton");
        
        <?php if (isset($_GET['edit']) && $_GET['edit'] === 'true'): ?>
            // Tự động click nút "Sửa" nếu edit=true
            editButton.click();
        <?php endif; ?>
    });
</script>

<script>
    // Ngăn form submit và kiểm tra tính hợp lệ
    (function() {
        'use strict';

        // Lấy tất cả các form cần kiểm tra
        var forms = document.querySelectorAll('.needs-validation');

        // Lặp qua các form để ngăn việc gửi đi khi form chưa hợp lệ
        Array.prototype.slice.call(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault(); // Ngăn chuyển trang
                    event.stopPropagation(); // Ngăn việc gửi form lên server
                }

                form.classList.add('was-validated'); // Kích hoạt CSS báo lỗi
            }, false);
        });
    })();
</script>