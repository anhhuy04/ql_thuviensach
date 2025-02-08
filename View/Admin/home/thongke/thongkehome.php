<div class="container mt-5">
    <h1 class="text-center mb-4">Thống Kê Thư Viện</h1>
    <div class="justify-content-center">
        <!-- Nút thống kê -->
        <div class="row stats-container">
        <!-- Thống kê tài chính -->
            <div class="col-md-4 mb-3">
                <a href="<?=$base_url_admin?>ql_thongke/tk_doanhthu" >
                    <div class="card card-custom text-center justify-content-center">
                        <i class="fas fa-dollar-sign icon text-info"></i>
                        <h5 class="card-title text-info">Thống kê doanh thu</h5>
                        <p class="card-text">Theo dõi doanh thu, chi phí từ thư viện.</p>
                    </div>
                </a>
            </div>
        <!-- Thống kê tổng quan -->
            <div class="col-md-4 mb-3">
                <a href="<?=$base_url_admin?>ql_thongke/tk_tongquan">
                    <div class="card card-custom text-center justify-content-center">
                        <i class="fas fa-chart-pie icon text-primary"></i>
                        <h5 class="card-title text-primary">Thống kê tổng quan</h5>
                        <p class="card-text">Xem tổng số sách, người dùng, và mượn trả.</p>
                    </div>
                </a>
            </div>
        <!-- Thống kê sách -->
            <div class="col-md-4 mb-3">
                <a href="<?=$base_url_admin?>ql_thongke/tk_sach" >
                    <div class="card card-custom text-center justify-content-center">
                    <i class="fas fa-book icon text-danger"></i>
                            <h5 class="card-title text-danger">Thống kê sách</h5>
                            <p class="card-text">Xem danh sách sách mượn nhiều, ít và theo danh mục.</p>
                    </div>
                </a>
            </div>
        <!-- Thống kê đọc giả -->
            <div class="col-md-4 mb-3">
                <a href="<?=$base_url_admin?>ql_thongke/tk_docgia" >
                    <div class="card card-custom text-center justify-content-center">
                        <i class="fas fa-users icon text-warning"></i>
                        <h5 class="card-title text-warning">Thống kê độc giả</h5>
                        <p class="card-text">Xem hoạt động và xếp hạng độc giả tích cực.</p>
                    </div>
                </a>
            </div>
        <!-- Thống kê chi tiết khách hàng mượn-->
            <div class="col-md-4 mb-3">
                <a href="<?=$base_url_admin?>ql_thongke/tk_sachdocgiamuon" >
                    <div class="card card-custom text-center justify-content-center">
                    <i class="fas fa-info-circle icon text-secondary"></i>
                            <h5 class="card-title text-secondary">Thống kê sách đọc giả mượn mượn</h5>
                            <p class="card-text">Xem thông tin chi tiết các sách của từng đọc giả đã mượn.</p>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>

