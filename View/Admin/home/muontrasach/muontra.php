<!-- Điều hướng trang -->
<nav class="tabs ghim-tabs">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <a href="<?=$base_url_admin?>ql_muon_sach/muonsach">
            <li class="nav-item" role="presentation">
                <button class="nav-link <?= in_array($_GET['act'], ['muonsach', 'add_MuonSach', 'update_book']) ? 'active': '' ?>">Mượn sách</button>
            </li>
        </a>
        <a href="<?=$base_url_admin?>ql_muon_sach/trasach">
            <li class="nav-item" role="presentation">
            <button class="nav-link <?= in_array($_GET['act'], ['trasach']) ? 'active' : '' ?>" >Trả sách</button>
            </li>
        </a>
        <a href="<?=$base_url_admin?>ql_muon_sach/giahan">
            <li class="nav-item" role="presentation">
            <button class="nav-link <?= in_array($_GET['act'], ['giahan' ]) ? 'active' : '' ?>" >Gia hạn sách</button>
            </li>
        </a>
        <a href="<?=$base_url_admin?>ql_muon_sach/sachquahan">
            <li class="nav-item" role="presentation">
            <button class="nav-link <?= in_array($_GET['act'], ['sachquahan']) ? 'active' : '' ?>" >Sách quá hạn trả</button>
            </li>
        </a>
        <a href="<?=$base_url_admin?>ql_muon_sach/choxacnhan">
            <li class="nav-item" role="presentation">
            <button class="nav-link <?= in_array($_GET['act'], ['choxacnhan','detail_muon_sach']) ? 'active' : '' ?>" >Xác nhận mượn sách</button>
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