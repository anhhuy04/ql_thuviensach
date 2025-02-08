<div class="container-fluid px-4 radius-5px">
<!-- Start -->
<div class="container mt-3 mb-3">
        <div class="row justify-content-center">
            <div class="form-container">
            <div class="header-row">
                <a href="<?=$base_url_admin?>ql_sach/tacgia" class="btn btn_custom_arrow_left"><i class="bi bi-arrow-left"></i> Trang xem danh mục</a>
                <h2 class="text-center">Cập nhật tác giả</h2>
            </div>
                <form class="row g-3 needs-validation" action="<?=$base_url_admin?>ql_sach/update_TacGia/<?=$selecttg['MaTacGia']?>" method="post" novalidate>
                <!-- Tên tác giả -->
                    <div class="col">
                        <label for="tenTacGia" class="form-label">Tên Tác Giả</label>
                        <input type="text" class="form-control" id="tenTacGia" name="tenTacGia" placeholder="Tên Tác Giả" value="<?=$selecttg['TenTacGia']?>" disabled required>
                        <div class="invalid-feedback">
                            Vui lòng nhập tên tác giả.
                        </div>
                    </div>
                <!-- Tiểu sử -->
                    <div class="col-md-12">
                        <label for="tieuSu">Tiểu Sử</label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Nhập tiểu sử tác giả" id="tieuSu" name="tieuSu" style="height: 200px" disabled required><?=$selecttg['TieuSu']?></textarea>
                            <label for="tieuSu">Tiểu Sử</label>
                            <div class="invalid-feedback">
                            Vui lòng nhập tiểu sử của tác giả.
                            </div>
                        </div>
                    </div>

                    <!-- Nút submit -->
                    
                    <div class="text-center mt-4">
                        <button id="editButton" type="button" class="btn btn-warning shadou-btn">Sửa</button>
                        <button id="saveButton" class="btn btn-success d-none shadou-btn" type="submit" name="submit-update-tacgia">Lưu</button>
                        <a class="btn btn-danger shadou-btn" data-bs-toggle="modal" data-bs-target="#actionModal" data-action="xoa" data-item="<?=$name?>" data-id="<?=$selecttg['MaTacGia']?>" onclick="event.stopPropagation()">Xóa</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- End -->
</div>
<script src="../../../Assets/js/quanlysach/sua-xoa.js"></script>
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