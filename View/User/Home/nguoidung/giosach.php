<?php if(!empty($selectGioHang)):?>
<div class="row justify-content-center needs-validation">
    <!-- Tiểu sử -->
    <div class="row items-center ">
        <!-- Bảng hiển thị danh sách sách đã mượn -->
        <div class="border border-secondary rounded position-relative mt-4">
            <span class="border-title text-secondary">Danh sách sách lưu</span>
            <div class="table-responsive">
                <table class="table text-center table-hover mt-4 table-bordered table-striped" id="borrowedBooksTable">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col" style="width:94px;">Hình ảnh</th>
                            <th scope="col" style="width:150px;">Mã sách</th>
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
                                <div class="img-sach"><img src="<?=$base_url?>Assets/Upload/sach/biasach/<?=$selectGioHang["URL_HinhSach"]?>" alt=""></div>
                            </td>
                            <td><div class="hang1_table" style="max-width: 30px;min-width: 150px;"><?=$selectGioHang["MaSach"]?></div></td>
                            <td><div class="hang1_table" style="max-width: 200px;min-width: 100px;"><?=$selectGioHang["TenSach"]?></div></td>
                            <td><div class="hang1_table" style="max-width: 200px;min-width: 100px;"><?=$selectGioHang["DonGia"]?></div></td>
                            <td><div class="hang1_table" style="max-width: 200px;min-width: 100px;"><?=$selectGioHang["GiaMuon"]?></div></td>
                            <td><div class="hang1_table" style="min-width: 50px;"></div></td>
                            <td><div class="hang1_table" style="min-width: 50px;"></div></td>
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
                    <tfoot>
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
        <form action="" method="post" novalidate>
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
                <button class="btn btn-primary mt-3" name="submit-themhoadon" type="submit" >Thêm hóa đơn</button>

            </div>
        </form>    
    </div>
</div>
<?php else:?>
    <div class="text-center">
            <span colspan="10"><b>Hiện không có sách nào được lưu</b></span>    
    </div>
<?php endif;?>
<!-- // include_once("View/Admin/home/muontrasach/muonsach/xacnhanmuon.php"); -->
<!-- ?> -->
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