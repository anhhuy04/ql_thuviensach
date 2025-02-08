<div class="container-fluid px-4 radius-5px">
    <!-- Start -->
    <div class="container mt-3 mb-3">
        <div class="row justify-content-center">
            <!-- Form Container -->
            <div class="form-container p-4 row text-center">
                <h2 class="mb-4">Thông báo</h2>
                <div class="col-md-6">
                    <a href="<?=$base_url_admin?>ql_kh/xacnhan_tk" class="btn btn-primary w-100 d-flex align-items-center justify-content-between mt-3 mb-3 position-relative">
                        <span>Xác nhận đăng ký tài khoản</span>
                        <?= $total_xacnhan_tk >= 1 ? '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">'.$total_xacnhan_tk.'</span>': ""?>
                    </a>
                </div>    
                <div class="col-md-6">
                    <a type="button" href="<?=$base_url_admin?>ql_muon_sach/choxacnhan" class="btn btn-primary w-100 d-flex align-items-center justify-content-between mt-3 mb-3 position-relative">
                        <span>xác nhận mượn sách</span>
                        <?= $total_xacnhan_ms >= 1 ? '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">'.$total_xacnhan_ms.'</span>': ""?>
                    </a>
                </div>     
            </div>
        </div>
    </div>
    <!-- End -->
</div>
