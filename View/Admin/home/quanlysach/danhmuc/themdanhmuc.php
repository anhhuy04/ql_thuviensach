<div class="container-fluid px-4 radius-5px">
    <div class="container mt-3 mb-3">
        <div class="row justify-content-center">
            <div class="form-container">
            <div class="header-row">
                <a href="<?=$base_url_admin?>ql_sach/danhmuc" class="btn btn_custom_arrow_left"><i class="bi bi-arrow-left"></i> Trang xem danh mục</a>
                <h2 class="text-center">Thêm danh mục</h2>
            </div>
                <form class="row g-3 needs-validation d-flex justify-content-center" action="?mod=ql_sach&act=themdm" method="post" enctype="multipart/form-data" novalidate>
                <!-- Hình ảnh -->
                    <div class="col-md-4 me-3">
                        <label for="url_hinh_dm" class="form-label">Hình Ảnh Danh Mục</label>
                        <div class="row justify-content-md-center">
                            <div class="mb-3 d-flex justify-content-center">
                                <img id="preview" class="preview-img"  alt="Hình Danh Mục">
                            </div>
                            <input class="form-control form-control-sm" type="file" name="url_hinh_dm" id="url_hinh_dm" accept="image/*" onchange="loadFile(event)"  required>
                            <div class="invalid-feedback">
                                Vui lòng chọn hình ảnh hợp lệ.
                            </div>
                        </div>
                    </div>
                    
                <!-- Nhập thông tin -->
                    <div class="col-md-7 border-start ps-4">
                        <div class="col-md-12">
                            <label for="tendanhmuc" class="form-label">Nhập tên danh mục</label>
                            <input type="text" class="form-control" id="tendanhmuc" name="tendanhmuc" placeholder="Tên danh mục" required>
                            <div class="invalid-feedback">
                                Vui lòng không bỏ trống ô này
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="motadanhmuc" class="form-label">Mô tả</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Mô tả danh mục" id="motadanhmuc" name="mota" style="height: 300px" required></textarea>
                                <label for="motadanhmuc">Mô tả danh mục</label>
                                <div class="invalid-feedback">
                                    Vui lòng nhập tiểu sử của tác giả.
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Submit -->
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit" name="add_danhmuc">Thêm Danh Mục</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?=$base_url?>Assets/js/quanlysach/file_img.js"></script>
