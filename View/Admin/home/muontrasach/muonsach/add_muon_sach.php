<!-- Start -->
    <div class="container mt-3 mb-3">
    <div class="row justify-content-center">
        <div class="header-row">
            <a href="<?=$base_url_admin?>ql_muon_sach/muonsach" class="btn btn_custom_arrow_left"><i class="bi bi-arrow-left"></i> Trang xem danh mục</a>
            <h2 class="text-center">Mượn sách</h2>
        </div>
        
        <div class="form-container mb-2 container pd20">
            
            <div class="border border-primary rounded position-relative">
                <!-- Tiêu đề khung -->
                <span class="border-title text-primary">Người dùng</span>
                <!-- Nội dung khung người dung-->
                <div class="row items-center">
            <!-- Tìm kiếm người dùng -->
                    <div class="col-md-4">
                        <form class="d-flex items-center needs-validation" method="get" >
                            <label for="" class="me-2">Đọc giả:</label>
                            <div class="input-group w-75">
                                <input class="form-control" list="id_user" name="search_id_user" placeholder="Nhập mã tài khoản" value="<?= $_GET['search_id_user'] ?? '' ?>" autocomplete="off" required>
                                    <datalist id="id_user">
                                        <?php foreach($selectMaTK as $selectMaTK):?>
                                            <option value="<?=$selectMaTK["MaTaiKhoan"]?>"></option>
                                        <?php endforeach;?>
                                    </datalist>
                                <button class="btn btn-primary" id="btnNavbarSearch" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <input type="hidden" <?= (isset($_GET['search_id_book']) && $_GET['search_id_book'] != "") ? 'name="search_id_book"' : '' ?> value="<?= $_GET['search_id_book'] ?? '' ?>">
                        </form>
                    </div>
            <!-- Thông tin người dùng -->
                    <div class="col-md-4 ">
                        <label for="" class="me-2">Trạng thái: <?=$selectKH["TenTrangThai"] ?? ""?></label>
                    </div>
                    <div class="col-md-4 ">
                        <label for="" class="me-2">Vai trò: <?=$selectKH["TenVaiTro"] ?? ""?></label>
                    </div>
                </div>
                <div class="row items-center pt-2">
                    <div class="col-md-4 ">
                        <label for="" class="me-2">Mã tài khoản: <?=$selectKH["MaTaiKhoan"] ?? ""?></label>
                    </div>
                    <div class="col-md-4 ">
                        <label for="" class="me-2">Họ tên: <?=$selectKH["HoTen"] ?? ""?></label>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Số điện thoại: <?=$selectKH["DienThoai"] ?? ""?></label>
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-label">Địa chỉ: <?=$selectKH["DiaChi"] ?? ""?></label>
                    </div>
                </div>
                <div class="col-md-12 text-end">
                    <a href="<?= isset($_GET['search_id_book']) && $_GET['search_id_book'] != '' ? '?search_id_book='. $_GET['search_id_book'] : ''.$base_url_admin.'ql_muon_sach/add_MuonSach' ?>" class="btn btn-danger">Reset Độc giả</a>
                </div>
            </div>          
        </div>
        <div class="form-container ">
            
                <div class="border border-primary rounded position-relative">
                    <!-- tiêu đề khung -->
                        <span class="border-title text-primary">Thông tin sách mượn</span>
            <!-- Nội dung khung mượn sách -->
                <!-- tìm kiếm sách -->
                    <div class="row items-center mb-4">
                        <div class="col-md-6 ">
                        <form class="d-flex items-center needs-validation" action="" method="get">
                            <label for="" class="me-2">Sách mượn:</label>
                            <div class="input-group w-75">
                                <input class="form-control" list="namebook" name="search_id_book" placeholder="Nhập mã sách" value="<?= $_GET['search_id_book'] ?? '' ?>" autocomplete="off" required>
                                <datalist id="namebook">
                                        <?php foreach($selectMaSach as $selectMaSach):?>
                                            <option value="<?=$selectMaSach["TenSach"]?>"></option>
                                        <?php endforeach;?>
                                    </datalist>
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <input type="hidden" <?= (isset($_GET['search_id_user']) && $_GET['search_id_user'] != "") ? 'name="search_id_user"' : '' ?> value="<?= $_GET['search_id_user'] ?? '' ?>">
                        </form>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="<?= isset($_GET['search_id_user']) && $_GET['search_id_user'] != '' ? '?search_id_user='. $_GET['search_id_user'] : ''.$base_url_admin.'ql_muon_sach/add_MuonSach' ?>" class="btn btn-danger">Reset Sách</a>
                        </div>
                    </div>
                <!-- hiển thị sách tìm kiếm -->
                    <div class="row <?=($selectBook) ?? 'd-none'?>" id="table_book">
                        <div class="table-responsive" style="max-height: 500px;">
                            <!-- Bảng ở đây -->
                            <table class="table text-center table-hover mt-4 table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col" style="width:94px;">Hình ảnh</th>
                                        <th scope="col">Mã sách</th>
                                        <th scope="col">Tên sách</th>
                                        <th scope="col">Tác giả</th>
                                        <th scope="col">Thể loại</th>
                                        <th scope="col">Tổng số lượng</th>
                                        <th scope="col">Số lượng còn lại</th>
                                        <th scope="col" style="width: 150px;">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <?php $stt = 1;
                                        foreach($selectBook as $selectBook):
                                    ?>
                                    <tr onclick="window.location.href='<?=$base_url_admin?>ql_sach/update_book/<?=$selectBook['MaSach']?>'">
                                        <th scope="row"><div ><?=$stt?></div></th>
                                        <td >
                                            <div class="img-sach"><img src="../../Assets/Upload/sach/biasach/<?=$selectBook["URL_HinhSach"]?>" alt=""></div>
                                        </td>
                                        <td><div class="hang1_table" style="max-width: 30px;min-width: 10px;"><?=$selectBook["MaSach"]?></div></td>
                                        <td><div class="hang1_table" style="max-width: 200px;min-width: 100px;"><?=$selectBook["TenSach"]?></div></td>
                                        <td><div class="hang1_table" style="max-width: 200px;min-width: 100px;"><?=$selectBook["TacGia"]?></div></td>
                                        <td><div class="hang1_table" style="max-width: 200px;min-width: 100px;"><?=$selectBook["DanhMuc"]?></div></td>
                                        <td><div class="hang1_table" style="min-width: 50px;"><?=$selectBook["TongSL"]?></div></td>
                                        <?php if($selectBook["SLConLai"] == 0):?>
                                            <td><div class="hang1_table" style="min-width: 50px;"><span class="btn btn-danger">Hết sách</span></div></td>
                                        <?php else:?>
                                            <td><div class="hang1_table" style="min-width: 50px;"><?=$selectBook["SLConLai"]?></div></td>
                                        <?php endif;?>
                                        <td>
                                            <div >
                                                <form action="<?=$_SERVER['REQUEST_URI']?>&masach=<?=$selectBook['MaSach']?>&$dongia=<?=$selectBook["DonGia"]?>" method="post">
                                                    
                                                    <button class="btn btn-primary" type="submit" name="submit-muonsach">Mượn sách</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <?php $stt++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <div class="row justify-content-center needs-validation">
                    <!-- Tiểu sử -->
                    <div class="row items-center <?=($selectGioHang) ?? 'd-none'?>">
                        <!-- Bảng hiển thị danh sách sách đã mượn -->
                        <div class="border border-secondary rounded position-relative mt-4">
                            <span class="border-title text-secondary">Danh sách sách mượn</span>
                            <div class="table-responsive">
                                <table class="table text-center table-hover mt-4 table-bordered table-striped" id="borrowedBooksTable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col" style="width:94px;">Hình ảnh</th>
                                            <th scope="col">Mã sách</th>
                                            <th scope="col">Tên sách</th>
                                            <th scope="col">Đơn giá</th>
                                            <th scope="col">Phí mượn/ngày</th>
                                            <th scope="col">Tổng phí mượn</th>
                                            <th scope="col">Thành tiền</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <?php 
                                            $stt = 1;
                                            $tongSoLuong = 0;
                                            $tongThanhTien = 0;
                                            if (!isset($_SESSION['gioHang'])) {
                                                $_SESSION['gioHang'] = [];
                                            }
                                            foreach($selectGioHang as $selectGioHang):
                                                $tongSoLuong += $selectGioHang["SoLuong"]; // Cộng dồn số lượng sách
                                                $tongThanhTien += $selectGioHang["ThanhTien"]; // Cộng dồn thành tiền
                                        
                                        ?>
                                        <tr>
                                            <th scope="row"><div ><?=$stt?></div></th>
                                            <td >
                                                <div class="img-sach"><img src="../../Assets/Upload/sach/biasach/<?=$selectGioHang["URL_HinhSach"]?>" alt=""></div>
                                            </td>
                                            <td><div class="hang1_table" style="max-width: 30px;min-width: 10px;"><?=$selectGioHang["MaSach"]?></div></td>
                                            <td><div class="hang1_table" style="max-width: 200px;min-width: 100px;"><?=$selectGioHang["TenSach"]?></div></td>
                                            <td><div class="hang1_table" style="max-width: 200px;min-width: 100px;"><?=$selectGioHang["DonGia"]?></div></td>
                                            <!-- Phí mượn 1 ngày  -->
                                            <td>
                                                <div class="hang1_table" style="max-width: 200px;min-width: 100px;"><?=$selectGioHang["GiaMuon"]?>
                                                </div>
                                            </td>
                                            <!-- Tổng phi mượn  -->
                                            <td>
                                                <div class="hang1_table" style="min-width: 50px;">
                                                </div>
                                            </td>
                                            <!-- Thành tiền  -->
                                            <td>
                                                <div class="hang1_table" style="min-width: 50px;">
                                                </div>
                                            </td>
                                            <td>
                                                <div >
                                                    <form action="<?=$_SERVER['REQUEST_URI']?>&masach=<?=$selectGioHang["MaSach"]?>" method="post">
                                                        <button class="btn btn-danger" type="submit" name="submit-xoasach">Xóa</button>
                                                    </form>                                                
                                                </div>
                                            </td>
                                        </tr>

                                        <?php $stt++; endforeach; ?>
                                    </tbody>
                                    <tfoot class="<?=$giohang?"":"d-none"?>">
                                        <tr>
                                            <td colspan="7"><b>Tổng thành tiền</b></td>
                                            <td></td>
                                            <td>
                                                <form action="" method="post">
                                                    <button class="btn btn-danger" name="submit_xoahet" type="submit">Xóa hết</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <form  action="" method="post" novalidate>
                    <div id="muonsachInputs"></div>
                    <input type="hidden" name="tongSoLuong" value="<?=$tongSoLuong?>">
                        <input type="hidden" name="tongThanhTien" id="tongtien" value="">
                        <div class="row mt-lg-3" >
                            <div class="col-md-4">
                                <div class="input-group flex-nowrap">
                                    <label for="" class="input-group-text">Ngày mượn: </label>
                                    <input type="datetime-local" class="form-control" name="ngaymuon" id="ngaymuon" value="<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); echo date('Y-m-d H:i:s');?>" onchange="tinhThanhTien()" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group flex-nowrap">
                                    <label for="" class="input-group-text">Ngày dự kiến trả: </label>
                                    <input type="datetime-local" class="form-control" name="ngaydukientra" id="ngaydukientra" value="<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); echo date('Y-m-d H:i:s');?>" onchange="tinhThanhTien()">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Số ngày mượn: <span id="songaymuon"></span></label>
                            </div>
                        </div>
                        <div class="row mt-lg-3" >
                            <div class="d-flex col-md-3">
                                <label for="" class="form-label">Số lượng sách mượn: <?=$tongSoLuong?></label>
                            </div>
                            
                            <div class="d-flex col-md-6 ">
                                <label for="" class="form-label">Phương thức thanh toán: </label>
                                <select class="form-select w-50 ms-2" name="pttt" aria-label="Default select example">
                                    <option selected value="Tiền mặt">Tiền mặt</option>
                                    <option value="Chuyển khoản">Chuyển khoản</option>
                                    <option value="Tiền trong tài khoản thư viện">Tiền trong tài khoản thư viện</option>
                                </select>
                            </div>
                        </div>
                    <!-- Nút submit -->
                        <div class="text-center">
                            <button class="btn btn-primary mt-3" type="submit" name="submit-themhoadon">Thêm hóa đơn</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End -->
<!-- <script>
    function tinhThanhTien(){
    var dsSach = document.querySelectorAll("#borrowedBooksTable tbody tr");
    var ngaymuon = document.querySelector("#ngaymuon").value;
    var ngaydukientra = document.querySelector("#ngaydukientra").value;
    var soNgayMuon = (new Date(ngaydukientra) - new Date(ngaymuon)) / (24*60*60*1000);
    var tong = 0;
    for (const sach of dsSach) {
        var dongia = Number(sach.querySelector('td:nth-child(5) div').innerText);
        var gia = Number(sach.querySelector('td:nth-child(6) div').innerText);
        var tien = gia * soNgayMuon;
        var muonsach = document.querySelector('.muonsach[]').value;
        sach. querySelector('td:nth-child(7) div').innerText = tien
        thanhtien = dongia + tien
        sach. querySelector('td:nth-child(8) div').innerText = thanhtien
        tong += thanhtien;
    }
    document.querySelector('#tienmuonsach').value = muonsach;
    document.querySelector('#borrowedBooksTable tfoot tr td:nth-child(2)').innerText = tong;
    document.querySelector('#tongtien').value = tong;
    document.querySelector('#songaymuon').innerText = soNgayMuon;
    }
    tinhThanhTien();
</script> -->
<script>
function createHiddenInput(name, value) {
    var input = document.createElement("input");
    input.type = "hidden";
    input.name = name;
    input.value = value;
    return input;
}
function tinhThanhTien() {
    var dsSach = document.querySelectorAll("#borrowedBooksTable tbody tr");
    var ngaymuon = document.querySelector("#ngaymuon").value;
    var ngaydukientra = document.querySelector("#ngaydukientra").value;
    var soNgayMuon = (new Date(ngaydukientra) - new Date(ngaymuon)) / (24*60*60*1000);
    var tong = 0;
    var muonsachInputs = document.querySelector("#muonsachInputs");
    muonsachInputs.innerHTML = ""; // Clear previous inputs

    for (const sach of dsSach) {
        var dongia = Number(sach.querySelector('td:nth-child(5) div').innerText);
        var gia = Number(sach.querySelector('td:nth-child(6) div').innerText);
        var tien = gia * soNgayMuon;
        sach.querySelector('td:nth-child(7) div').innerText = tien;
        var thanhtien = dongia + tien;
        sach.querySelector('td:nth-child(8) div').innerText = thanhtien;
        tong += thanhtien;

        // Create hidden inputs for muonsach[]
        var maSach = sach.querySelector('td:nth-child(3) div').innerText;
        muonsachInputs.appendChild(createHiddenInput("muonsach[" + maSach + "][phimuon]", gia));
        muonsachInputs.appendChild(createHiddenInput("muonsach[" + maSach + "][thanhtien]", thanhtien));
    }
    document.querySelector('#borrowedBooksTable tfoot tr td:nth-child(2)').innerText = tong;
    document.querySelector('#tongtien').value = tong;
    document.querySelector('#songaymuon').innerText = soNgayMuon;
}
tinhThanhTien();
</script>