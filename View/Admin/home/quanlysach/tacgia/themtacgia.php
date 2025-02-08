<!-- Start -->
    <div class="container mt-3 mb-3">
        <div class="row justify-content-center">
            <div class="form-container">
            <div class="header-row">
                <a href="<?=$base_url_admin?>ql_sach/tacgia" class="btn btn_custom_arrow_left"><i class="bi bi-arrow-left"></i> Trang xem danh mục</a>
                <h2 class="text-center">Thêm tác giả</h2>
            </div>
                <form class="row g-3 needs-validation" action="?mod=ql_sach&act=themtg" method="post" novalidate>
                <!-- Tên tác giả -->
                    <div class="col">
                        <label for="tenTacGia" class="form-label">Tên Tác Giả</label>
                        <input type="text" class="form-control" id="tenTacGia" name="tenTacGia" placeholder="Tên Tác Giả" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập tên tác giả.
                        </div>
                    </div>


                <!-- Tiểu sử -->
                    <div class="col-md-12">
                        <label for="tieuSu">Tiểu Sử</label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Nhập tiểu sử tác giả" id="tieuSu" name="tieuSu" style="height: 200px" required></textarea>
                            <label for="tieuSu">Tiểu Sử</label>
                            <div class="invalid-feedback">
                            Vui lòng nhập tiểu sử của tác giả.
                            </div>
                        </div>
                    </div>

                    <!-- Nút submit -->
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit" name="submit_addtacgia">Thêm Tác Giả</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- End -->