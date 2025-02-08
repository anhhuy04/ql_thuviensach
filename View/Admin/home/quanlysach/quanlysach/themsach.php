

<div class="container-fluid px-4 radius-5px">
    <div class="container mt-3 mb-3">
        <div class="row justify-content-center form-container">
            <div class="header-row">
                <a href="<?=$base_url_admin?>ql_sach/sach" class="btn btn_custom_arrow_left">
                    <i class="bi bi-arrow-left"></i> Trang xem sách
                </a>
                <h2 class="text-center">Thêm Sách Mới</h2>
            </div>
            <div>
                <form class="row g-3 needs-validation d-flex justify-content-center" action="?mod=ql_sach&act=themsach" method="post" enctype="multipart/form-data" novalidate>
                    <!-- Hình ảnh -->
                    <div class="col-md-4 form-container">
                            <label for="URL_HinhSach" class="form-label text-center w-100">Hình Ảnh Sách</label>
                            <div class="row justify-content-md-center">
                                <div class="mb-3 d-flex justify-content-center">
                                    <img id="preview" class="preview-img"  alt="Hình Sách">    
                                </div>
                                <input class="form-control form-control-sm w-94" type="file" id="URL_HinhSach" name="URL_HinhSach" accept="image/*" onchange="loadFile(event)"  required>
                                <div class="invalid-feedback">Vui lòng chọn hình ảnh hợp lệ.</div>
                            </div>
                        </div>
                    <!-- Nhập dữ liệu sách -->
                        <div class="col-md-8 ps-4 ">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="tensach" class="form-label">Nhập tên sách</label>
                                    <input type="text"  class="form-control" id="tensach" name="tensach" placeholder="Tên sách" required>
                                    <div class="invalid-feedback">Vui lòng không bỏ trống ô này</div>
                                </div>
                                <div class="col-md-12 multi-select-container">
                                    <label id="label-tacgia" for="multiSelectInput-tacgia" class="form-label hang1_table" style="width: 100%;">Tác giả:</label>
                                    <input type="text" id="multiSelectInput-tacgia" class="multi-select-input form-control" placeholder="Chọn tác giả..." >
                                    <div id="multiSelectMenu-tacgia" class="multi-select-menu multi-select-menu-tacgia radius-5px shadow p-2">
                                        <?php foreach($tacgia_view as $tacgia): ?>
                                            <input type="checkbox" id="tacgia-<?=$tacgia["MaTacGia"]?>" class="form-check-input-custom btn-check" name="tacgia[]" value="<?=$tacgia["MaTacGia"]?>" autocomplete="off" >
                                            <label class="btn btn-outline-primary" for="tacgia-<?=$tacgia["MaTacGia"]?>">
                                                    <?= $tacgia["TenTacGia"] ?>
                                            </label>
                                        <?php endforeach; ?>            
                                    </div>
                                    <div class="invalid-feedback">Vui lòng không bỏ trống ô này</div>
                                </div>
                                <div class="col-md-12 multi-select-container">
                                    <label id="label-danhmuc" for="multiSelectInput-danhmuc" class="form-label hang1_table" style="width: 100%;">Danh mục:</label>
                                    <input type="text" id="multiSelectInput-danhmuc" class="multi-select-input form-control" placeholder="Chọn danh mục...">
                                    <div id="multiSelectMenu-danhmuc" class="multi-select-menu multi-select-menu-danhmuc radius-5px shadow p-2">
                                        <?php foreach($danhmuc_view as $danhmuc): ?>
                                            <input type="checkbox" id="dm-<?=$danhmuc["MaDanhMuc"]?>" class="form-check-input-custom btn-check" name="danhmuc[]" 
                                            value="<?=$danhmuc["MaDanhMuc"]?>" autocomplete="off" >
                                            <label class="btn btn-outline-primary" for="dm-<?=$danhmuc["MaDanhMuc"]?>">
                                                    <?= $danhmuc["TenDanhMuc"] ?>
                                            </label>
                                        <?php endforeach; ?>            
                                        <!-- Thêm các danh mục khác -->
                                    </div>
                                </div>
                                <div class="col-md-12 multi-select-container using-select2">
                                    <label id="label-danhmuc" for="multiSelectInput-danhmuc" class="form-label hang1_table " style="width: 100%;">Bộ sách</label>
                                    <select name="mabosach" class="js-select2 form-control" >
                                        <option value="0">Không có bộ sách</option>
                                        <?php foreach($bosach_view as $bosach_view): ?>
                                            <option value="<?=$bosach_view["MaBoSach"]?>" ><?=$bosach_view["TenBoSach"]?></option>
                                        <?php endforeach; ?> 
                                    </select>
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $('.js-select2').select2();
                                        });
                                    </script>
                                </div>
                                <div class="col-md-4">
                                    <label for="nxb" class="form-label">Nhà xuất bản</label>
                                    <input list="nhaxb" class="form-control" name="nxb" id="nxb" placeholder="Nhà xuất bản" autocomplete="off" >
                                    <datalist id="nhaxb">
                                        <?php foreach($nxb_view as $nxb_view):?>
                                            <option value="<?=$nxb_view["NhaXuatBan"]?>"></option>
                                        <?php endforeach;?>
                                    </datalist>
                                </div>
                                <div class="col-md-4">
                                    <label for="ngayxb" class="form-label">Ngày xuất bản</label>
                                    <input type="date" class="form-control" id="ngayxb" name="ngayxb" placeholder="Ngày xuất bản" >
                                </div>
                                <div class="col-md-4">
                                    <label for="isbn" class="form-label">ISBN Sách</label>
                                    <input type="text" class="form-control" id="isbn" name="isbn" placeholder="ISBN Sách" >
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="dongia" class="form-label">Đơn giá:</label>
                                    <input type="number" class="form-control" id="dongia" name="dongia" placeholder="Đơn giá" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="vitrisach" class="form-label">Vị trí sách</label>
                                    <input type="text"  class="form-control" id="vitrisach" name="vitrisach" placeholder="Vị trí sách">
                                </div>                   

                                <div class="col-md-12 d-flex my-lg-3">
                                    <div class="col-md-5 d-flex">
                                        <label for="soluong" class="form-label me-2">Tổng số sách: </label>
                                        <input type="number" class="form-control w-50" id="soluong" name="soluong" placeholder="Số lượng" required>
                                    </div>
                                    <div class="col-md-5 d-flex">
                                        <label for="soluong" class="form-label me-2">Số sách còn lại:</label>
                                        <input type="number" class="form-control w-50" id="sachconlai" name="sachconlai" placeholder="Số lượng sách còn lại" required>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check m-2">
                                            <input type="hidden" name="ghimsach" value="0">
                                            <input class="form-check-input" type="checkbox" value="1" id="ghimsach" name="ghimsach" >
                                            <label class="form-check-label" for="ghimsach">Ghim sách</label>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class=" my-4 justify-content-center d-flex row">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Mô tả" id="mota" name="mota" style="height: 260px" ></textarea>
                                    <label for="mota">Mô tả</label>
                                </div>
                            </div>
                        <div class="text-center mt-3">
                            <button class="btn btn-primary shadou-btn" type="submit" name="submit-add-sach">Thêm Sách</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?=$base_url?>Assets/js/quanlysach/quanlysach.js"></script>
