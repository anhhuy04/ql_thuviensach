<div class="container-fluid px-4 radius-5px">

    <div class="container mt-3 mb-3">
        <div class="row justify-content-center form-container">
            <div class="header-row">
                <a href="<?=$base_url_admin?>ql_sach/sach" class="btn btn_custom_arrow_left">
                    <i class="bi bi-arrow-left"></i> Trang xem sách
                </a>
                <h2 class="text-center">Update sách</h2>
            </div>
            <div>
                <form class="row g-3 needs-validation d-flex justify-content-center" action="<?=$base_url_admin?>ql_sach/update_book/<?=$selectSach["MaSach"]?>" method="post" enctype="multipart/form-data" novalidate>
                <!-- Hình ảnh -->
                    <div class="col-md-4 form-container">
                        <label for="URL_HinhSach" class="form-label text-center w-100">Hình Ảnh Sách</label>
                        <div class="row justify-content-md-center">
                            <div class="mb-3 d-flex justify-content-center">
                            <input type="hidden" name="URL_HinhSach" value="<?=$selectSach['URL_HinhSach']?>">
                                <img id="preview" class="preview-img" src="../../../Assets/Upload/sach/biasach/<?=$selectSach["URL_HinhSach"]?>" alt="Hình Sách">    
                            </div>
                            <p><?=$selectSach["URL_HinhSach"]?></p>                    
                            <input class="form-control form-control-sm w-94" type="file" id="URL_HinhSach" name="URL_HinhSach" accept="image/*" onchange="loadFile(event)" disabled>
                            <div class="invalid-feedback">Vui lòng chọn hình ảnh hợp lệ.</div>
                        </div>
                    </div>
                <!-- Nhập dữ liệu sách -->
                    <div class="col-md-8 ps-4 ">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="tensach" class="form-label">Nhập tên sách</label>
                                <input type="text" disabled class="form-control" id="tensach" name="tensach" placeholder="Tên sách" value="<?=$selectSach["TenSach"]?>" required>
                                <div class="invalid-feedback">Vui lòng không bỏ trống ô này</div>
                            </div>
                            <div class="col-md-12 multi-select-container">
                                <label id="label-tacgia" for="multiSelectInput-tacgia" class="form-label hang1_table" style="width: 100%;">Tác giả: <?=$selectSach["TenTacGia"]?></label>
                                <input type="text" id="multiSelectInput-tacgia" class="multi-select-input form-control" placeholder="Chọn tác giả..." >
                                <div id="multiSelectMenu-tacgia" class="multi-select-menu multi-select-menu-tacgia radius-5px shadow p-2">
                                    <?php foreach($tacgia_view as $tacgia): ?>
                                        <input type="checkbox" id="tacgia-<?=$tacgia["MaTacGia"]?>" class="form-check-input-custom btn-check" name="tacgia[]" value="<?=$tacgia["MaTacGia"]?>" 
                                        <?= in_array($tacgia["TenTacGia"], $TacGiaArray) ? 'checked' : '' ?> autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="tacgia-<?=$tacgia["MaTacGia"]?>">
                                                <?= $tacgia["TenTacGia"] ?>
                                        </label>
                                    <?php endforeach; ?>            
                                </div>
                                <div class="invalid-feedback">Vui lòng không bỏ trống ô này</div>
                            </div>
                            <div class="col-md-12 multi-select-container">
                                <label id="label-danhmuc" for="multiSelectInput-danhmuc" class="form-label hang1_table" style="width: 100%;">Danh mục: <?=$selectSach["TenDanhMuc"]?></label>
                                <input type="text" id="multiSelectInput-danhmuc" class="multi-select-input form-control" placeholder="Chọn danh mục...">
                                <div id="multiSelectMenu-danhmuc" class="multi-select-menu multi-select-menu-danhmuc radius-5px shadow p-2">
                                    <?php foreach($danhmuc_view as $danhmuc): ?>
                                        <input type="checkbox" id="dm-<?=$danhmuc["MaDanhMuc"]?>" class="form-check-input-custom btn-check" name="danhmuc[]" 
                                        value="<?=$danhmuc["MaDanhMuc"]?>" <?= in_array($danhmuc["TenDanhMuc"], $DanhMucArray) ? 'checked' : '' ?> autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="dm-<?=$danhmuc["MaDanhMuc"]?>">
                                                <?= $danhmuc["TenDanhMuc"] ?>
                                        </label>
                                    <?php endforeach; ?>            
                                    <!-- Thêm các danh mục khác -->
                                </div>
                            </div>
                            <div class="col-md-12 multi-select-container using-select2">
                                <label id="label-danhmuc" for="multiSelectInput-danhmuc" class="form-label hang1_table " style="width: 100%;">Bộ sách</label>
                                <select name="mabosach" class="js-select2 form-control" disabled>
                                    <option value="0">Không có bộ sách</option>
                                    <?php foreach($bosach_view as $bosach_view): ?>
                                        <option value="<?=$bosach_view["MaBoSach"]?>"  <?= ($bosach_view["MaBoSach"] == $selectSach["MaBoSach"]) ?'selected' :'' ; ?> ><?=$bosach_view["TenBoSach"]?></option>
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
                                <input list="nhaxb" class="form-control" name="nxb" id="nxb" placeholder="Nhà xuất bản" autocomplete="off" value="<?=$selectSach["NhaXuatBan"]?>" disabled>
                                <datalist id="nhaxb">
                                    <?php foreach($nxb_view as $nxb_view):?>
                                        <option value="<?=$nxb_view["NhaXuatBan"]?>"></option>
                                    <?php endforeach;?>
                                </datalist>
                            </div>
                            <div class="col-md-4">
                                <label for="ngayxb" class="form-label">Ngày xuất bản</label>
                                <input type="date" class="form-control" id="ngayxb" name="ngayxb" value="<?=$selectSach["NgayXuatBan"]?>" placeholder="Ngày xuất bản" disabled>
                            </div>
                            <div class="col-md-4">
                                <label for="isbn" class="form-label">ISBN Sách</label>
                                <input type="text" value="<?=$selectSach["ISBN"]?>" class="form-control" id="isbn" name="isbn" placeholder="ISBN Sách" disabled>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="dongia" class="form-label">Đơn giá:</label>
                                <input type="number" class="form-control" id="dongia" name="dongia" placeholder="Đơn giá" value="<?=$selectSach["DonGia"]?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="vitrisach" class="form-label">Vị trí sách</label>
                                <input type="text"  class="form-control" id="vitrisach" name="vitrisach" placeholder="Vị trí sách" value="<?=$selectSach["ViTriSach"]?>" disabled>
                            </div>                   

                            <div class="col-md-12 d-flex my-lg-3">
                                <div class="col-md-5 d-flex">
                                    <label for="soluong" class="form-label me-2">Tổng số sách:</label>
                                    <input type="number" class="form-control w-50" id="soluong" name="soluong" placeholder="Số lượng" value="<?=$selectSach["TongSL"]?>" disabled>
                                </div>
                                <div class="col-md-5 d-flex">
                                    <label for="soluong" class="form-label me-2">Số sách còn lại:</label>
                                    <input type="number" class="form-control w-50" id="sachconlai" name="sachconlai" placeholder="Số lượng sách còn lại" value="<?=$selectSach["SLConLai"]?>" disabled>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check m-2">
                                        <input type="hidden" name="ghimsach" value="0">
                                        <input class="form-check-input" type="checkbox" value="1" id="ghimsach" name="ghimsach" <?= ($selectSach['GhimSach']) ? "Checked" : "" ?> disabled>
                                        <label class="form-check-label" for="ghimsach">Ghim sách</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="vitrisach" class="form-label">Lượt thích: <?=$selectSach["LuotThich"]?></label>
                            </div>
                            <div class="col-md-3">
                                <label for="vitrisach" class="form-label">Lượt xem: <?=$selectSach["LuotXem"]?></label>
                            </div>  
                            <div class="col-md-3">
                                <label for="vitrisach" class="form-label">Lượt lưu: <?=$selectSach["LuotLuu"]?></label>
                            </div>  
                            <div class="col-md-3">
                                <div class="form-check m-2">
                                    <input type="hidden" name="sachloi" value="0">
                                    <input class="form-check-input" type="checkbox" value="1" id="sachloi" name="sachloi" <?= ($selectSach['CoLoi']) ? "Checked" : "" ?> disabled>
                                    <label class="form-check-label" for="ghimsach">Sách có lỗi</label> 
                                    <?= ($selectSach['CoLoi']) ? '<a href="">(Xem lỗi)</a> ' : "" ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="vitrisach" class="form-label">Ngày thêm sách: <?=$selectSach["CreatedAt"]?></label>
                            </div>  
                            <div class="col-md-6">
                                <label for="vitrisach" class="form-label">Cập nhật gần nhất: <?=$selectSach["UpdatedAt"]?></label>
                            </div> 
                        </div>
                    </div>
                    <div class=" my-4 justify-content-center d-flex row">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Mô tả" id="mota" name="mota" style="height: 260px"  disabled><?=$selectSach['MoTa']?></textarea>
                                <label for="mota">Mô tả</label>
                            </div>
                        </div>
                        <div class="text-center form-container mt-4">
                            <button id="editButton" type="button" class="btn btn-warning shadou-btn">Sửa</button>
                            <button id="saveButton" class="btn btn-success d-none shadou-btn" type="submit" name="submit-update-sach">Lưu</button>
                            <a class="btn btn-danger shadou-btn" data-bs-toggle="modal" data-bs-target="#actionModal" data-action="xoa" data-item="<?=$name?>" data-id="<?=$selectSach["MaSach"]?>" onclick="event.stopPropagation()">Xóa</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../../../Assets/js/quanlysach/quanlysach.js"></script>
<script src="../../../Assets/js/quanlysach/sua-xoa.js"></script>
<script>
    function previewFile() {
    const file = document.getElementById("URL_HinhSach").files[0];
    const preview = document.getElementById("preview");

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
};
document.addEventListener("DOMContentLoaded", function() {
        // Kiểm tra trạng thái "sửa" trực tiếp từ PHP
        let editButton = document.getElementById("editButton");
        
        <?php if (isset($_GET['edit']) && $_GET['edit'] === 'true'): ?>
            // Tự động click nút "Sửa" nếu edit=true
            editButton.click();
        <?php endif; ?>
    });
</script>