<!-- Điều hướng trang -->
<nav class="tabs ghim-tabs">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <a href="<?=$base_url_admin?>ql_kh/xemdocgia">
            <li class="nav-item" role="presentation">
                <button class="nav-link <?= in_array($_GET['act'], ['xemdocgia']) ? 'active': '' ?>">Đọc giả</button>
            </li>
        </a>
        
        <a href="<?=$base_url_admin?>ql_kh/docgia_bikhoa">
            <li class="nav-item" role="presentation">
            <button class="nav-link <?= in_array($_GET['act'], ['docgia_bikhoa']) ? 'active' : '' ?>" >Tài khoản bị khóa</button>
            </li>
        </a>
        <a href="<?=$base_url_admin?>ql_kh/xacnhan_tk">
            <li class="nav-item" role="presentation">
            <button class="nav-link <?= in_array($_GET['act'], ['xacnhan_tk']) ? 'active' : '' ?>" >Tài khoản chờ xác nhận</button>
            </li>
        </a>
    </ul>
</nav>
<div class="container-fluid px-4 radius-5px">

    <?php include($manage.'.php');?>

</div>

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