
<!-- Điều hướng trang -->
<nav class="tabs ghim-tabs">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <a href="<?=$base_url_admin?>ql_sach/sach">
            <li class="nav-item" role="presentation">
                <button class="nav-link <?= in_array($_GET['act'], ['sach', 'themsach', 'update_book']) ? 'active': '' ?>">Quản lý sách</button>
            </li>
        </a>
        <a href="<?=$base_url_admin?>ql_sach/danhmuc">
            <li class="nav-item" role="presentation">
            <button class="nav-link <?= in_array($_GET['act'], ['danhmuc', 'themdm', 'update_DanhMuc']) ? 'active' : '' ?>" >Danh mục</button>
            </li>
        </a>
        <a href="<?=$base_url_admin?>ql_sach/tacgia">
            <li class="nav-item" role="presentation">
                <button class="nav-link <?=in_array($_GET['act'], ['tacgia', 'themtg', 'update_TacGia']) ? 'active': '' ?>"">Tác giả</button>
            </li>
        </a>
        <a href="<?=$base_url_admin?>ql_sach/bosach">
            <li class="nav-item" role="presentation">
                <button class="nav-link <?=in_array($_GET['act'], ['bosach', 'thembosach', 'update_BoSach']) ? 'active': '' ?>"">Bộ sách</button>
            </li>
        </a>
    </ul>
</nav>

<?php include($manage_book);?>

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