
    <div class="container mt-3 mb-3">
        <div class="row justify-content-center">
            <div class="header-row">
            <a href="<?=$base_url_admin?>ql_sach/bosach" class="btn btn_custom_arrow_left"><i class="bi bi-arrow-left"></i> Trang xem bộ sách</a>
                <h2 class="text-center">Sửa bộ sách</h2>
            </div>
            <form class="row g-3 needs-validation d-flex justify-content-center" action="<?=$base_url_admin?>ql_sach/update_BoSach/<?=$selectBS["MaBoSach"]?>" method="post" enctype="multipart/form-data" novalidate>
            <!-- Hình ảnh -->
                <div class="col-md-4 me-3 form-container">
                    <label for="url_hinh_dm" class="form-label">Hình Ảnh Danh Mục</label>
                    <div class="row justify-content-md-center">
                        <div class="mb-3 d-flex justify-content-center">
                            <img id="preview" class="preview-img" src="../../../Assets/Upload/sach/bosach/<?=$selectBS["URL_HinhBoSach"]?>" alt="Hình Danh Mục">
                        </div>
                        <p><?=$selectBS["URL_HinhBoSach"]?></p>  
                        <input class="form-control form-control-sm" type="file" name="url_hinh_bosach" id="url_hinh_bosach" accept="image/*" onchange="loadFile(event)" disabled>
                        <div class="invalid-feedback">
                            Vui lòng chọn hình ảnh hợp lệ.
                        </div>
                    </div>
                </div>
                
            <!-- Nhập thông tin -->
                <div class="col-md-7 ps-4 form-container">
                    <div class="col-md-12">
                        <label for="tenbosach" class="form-label">Nhập tên bộ sách</label>
                        <input type="text" class="form-control" id="tenbosach" name="tenbosach" placeholder="Tên bộ sách" value="<?=$selectBS["TenBoSach"]?>" disabled required>
                        <div class="invalid-feedback">
                            Vui lòng không bỏ trống ô này
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="motabosach" class="form-label">Mô tả</label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Mô tả bộ sách" id="motabosach" name="mota" style="height: 300px"  disabled required><?=$selectBS["MoTa"]?></textarea>
                            <label for="motabosach">Mô tả bộ sách</label>
                            <div class="invalid-feedback">
                                Vui lòng nhập tiểu sử của tác giả.
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6 ">
                            <label for="vitrisach" class="form-label">Ngày thêm sách: <?=$selectBS["CreatedAt"]?></label>
                        </div>  
                        <div class="col-md-6">
                            <label for="vitrisach" class="form-label">Cập nhật gần nhất: <?=$selectBS["UpdatedAt"]?></label>
                        </div> 
                    </div>
                </div>
            <!-- Submit -->
                <div class="text-center mt-4">
                    <button id="editButton" type="button" class="btn btn-warning shadou-btn">Sửa</button>
                    <button id="saveButton" class="btn btn-success d-none shadou-btn" type="submit" name="submit-update-bosach">Lưu</button>
                    <a class="btn btn-danger shadou-btn" data-bs-toggle="modal" data-bs-target="#actionModal" data-action="xoa" data-item="<?=$name?>" data-id="<?=$selectBS["MaBoSach"]?>" onclick="event.stopPropagation()">Xóa</a>
                </div>
            </form>
        </div>
    </div>
<script src="<?=$base_url?>Assets/js/quanlysach/sua-xoa.js"></script>
<script src="<?=$base_url?>Assets/js/quanlysach/file_img.js"></script>

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

