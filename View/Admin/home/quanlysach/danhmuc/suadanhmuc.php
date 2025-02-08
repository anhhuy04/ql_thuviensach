<div class="container-fluid px-4 radius-5px">
<?php
            echo "<pre>";
            print_r($selectDM);
            // print_r($DanhMucArray);
            // echo $_GET["mod"];
            echo "</pre>";
        ?>
    <div class="container mt-3 mb-3">
        <div class="row justify-content-center">
            <div class="header-row">
            <a href="<?=$base_url_admin?>ql_sach/danhmuc" class="btn btn_custom_arrow_left"><i class="bi bi-arrow-left"></i> Trang xem danh mục</a>
                <h2 class="text-center">Sửa danh mục</h2>
            </div>
            <form class="row g-3 needs-validation d-flex justify-content-center" action="<?=$base_url_admin?>ql_sach/update_DanhMuc/<?=$selectDM["MaDanhMuc"]?>" method="post" enctype="multipart/form-data" novalidate>
            <!-- Hình ảnh -->
                <div class="col-md-4 me-3 form-container">
                    <label for="url_hinh_dm" class="form-label">Hình Ảnh Danh Mục</label>
                    <div class="row justify-content-md-center">
                        <div class="mb-3 d-flex justify-content-center">
                            <img id="preview" class="preview-img" src="../../../Assets/Upload/sach/danhmuc/<?=$selectDM["URL_HinhDM"]?>" alt="Hình Danh Mục">
                        </div>
                        <p><?=$selectDM["URL_HinhDM"]?></p>  
                        <input class="form-control form-control-sm" type="file" name="url_hinh_dm" id="url_hinh_dm" accept="image/*" onchange="loadFile(event)" disabled>
                        <div class="invalid-feedback">
                            Vui lòng chọn hình ảnh hợp lệ.
                        </div>
                    </div>
                </div>
                
            <!-- Nhập thông tin -->
                <div class="col-md-7 ps-4 form-container">
                    <div class="col-md-12">
                        <label for="tendanhmuc" class="form-label">Nhập tên danh mục</label>
                        <input type="text" class="form-control" id="tendanhmuc" name="tendanhmuc" placeholder="Tên danh mục" value="<?=$selectDM["TenDanhMuc"]?>" disabled required>
                        <div class="invalid-feedback">
                            Vui lòng không bỏ trống ô này
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="motadanhmuc" class="form-label">Mô tả</label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Mô tả danh mục" id="motadanhmuc" name="mota" style="height: 300px"  disabled required><?=$selectDM["MoTa"]?></textarea>
                            <label for="motadanhmuc">Mô tả danh mục</label>
                            <div class="invalid-feedback">
                                Vui lòng nhập tiểu sử của tác giả.
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6 ">
                            <label for="vitrisach" class="form-label">Ngày thêm sách: <?=$selectDM["CreatedAt"]?></label>
                        </div>  
                        <div class="col-md-6">
                            <label for="vitrisach" class="form-label">Cập nhật gần nhất: <?=$selectDM["UpdatedAt"]?></label>
                        </div> 
                    </div>
                </div>
            <!-- Submit -->
                <div class="text-center mt-4">
                    <button id="editButton" type="button" class="btn btn-warning shadou-btn">Sửa</button>
                    <button id="saveButton" class="btn btn-success d-none shadou-btn" type="submit" name="submit-update-DM">Lưu</button>
                    <a class="btn btn-danger shadou-btn" data-bs-toggle="modal" data-bs-target="#actionModal" data-action="xoa" data-item="<?=$name?>" data-id="<?=$selectDM["MaDanhMuc"]?>" onclick="event.stopPropagation()">Xóa</a>
                </div>
            </form>
        </div>
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

