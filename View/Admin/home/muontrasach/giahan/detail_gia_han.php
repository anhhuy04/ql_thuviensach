<form method="post" action="<?=$base_url_admin?>ql_muon_sach/detail_giahan?mamuonsach=<?=$muonsach['MaMuonSach']?>">
<div class="container mt-3 mb-3">
    <div class="row justify-content-center">
        <div class="col-md-12 ">
            <h2>Chi tiết mượn sách</h2>
            <!-- thông tin người dùng -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Thông tin người mượn
                        </div>
                        <div class="card-body row">
                            <div class="col-md-6">
                                <p><strong>Họ tên:</strong> <?=$muonsach["HoTen"]?></p>
                                <p><strong>Email:</strong> <?=$muonsach["Email"]?></p>
                                <p><strong>Điện thoại:</strong> <?=$muonsach["DienThoai"]?></p>
                                <p><strong>Địa chỉ:</strong> <?=$muonsach["DiaChi"]?></p>
                                <p><strong>Cccd:</strong> <?=$muonsach["Cccd"]?></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Mã mượn sách:</strong> <?=$muonsach["MaMuonSach"]?></p>
                                <p><strong>Ngày mượn:</strong> <?=$muonsach["NgayMuon"]?></p>
                                <p><strong>Ngày dự kiến trả:</strong> <?=$muonsach["NgayDuKienTra"]?></p>
                                <p><strong>Số lượng sách:</strong> <?=$muonsach["SoLuongSachMuon"]?></p>
                                <p><strong>Tổng tiền:</strong> <?=$muonsach["TongTien"]?></p>
                                <p><strong>Phương thức thanh toán:</strong> <?=$muonsach["PhuongThucThanhToan"]?></p>
                            </div>
                            
                        </div>
                            
                    </div>
                </div>
                
            </div>
            <!-- Thông tin gia hạn -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header blue">
                            Tổng
                        </div>
                        <div class="card-body">
                        
                            <div class="form-label">
                                <label for="">Từ ngày: </label><label for="" class="form-label ms-2" id=""> <?=$muonsach["NgayDuKienTra"]?></label>
                            </div>
                            <div class="form-label">
                                <label for="">Đến ngày: </label><label for="" class="form-label ms-2" id="denngay"> </label>
                            </div><div class="form-label">
                                <label for="">Số ngày gia hạn: </label><label for="" class="form-label ms-2" id="songaymuon"> </label>
                            </div>
                            <hr class="my-2">
                            <div class="form-label">
                                <label for="">Tổng tiền gia hạn: </label><label for="" class="form-label ms-2 " id="label-tongtiengiahan"> </label>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-header bg-success text-white">
                            Chọn ngày
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="magiahan" id="magiahan">
                            <div class="mb-3 row">
                                <label>Ngày gia hạn: <?=$current_date = date("Y-m-d");?></label>
                                <label for="giahanngay" class="form-label">Gia hạn đến ngày</label>
                                <input type="datetime-local" class="form-control" id="giahanngay" name="giahanngay"  required>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row justify-content-center mt-2">
                        <button type="submit" name="submit-xacnhan" class="btn btn-primary w-94">Xác nhận gia hạn sách</button>
                    </div>
                </div>
            </div>
            
        </div>       
    </div>
    <div class="row justify-content-center mt-4 ">
        
            <div class="table-responsive">
                <table class="table text-center table-hover mt-4 table-bordered table-striped small" id = "borrowedBooksTable">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Mã sách</th>
                            <th scope="col">Tên sách</th>
                            <th scope="col">Ngày dự kiến trả</th>
                            <th scope="col">Phí mượn/ngày</th>
                            <th scope="col">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php $stt = 1;
                            foreach($details as $detail):
                        ?>
                        <tr>
                            <th scope="row"><div><?=$stt?></div></th>
                            <td><div class="hang1_table"><?=$detail["MaSach"]?></div></td>
                            <td><div class="hang1_table"><?=$detail["TenSach"]?></div></td>
                            <td><div class="hang1_table"><?=$detail["SoHieuBanSao"]?></div></td>
                            <td><div class="hang1_table"><?=$detail["GiaMuon_Ngay"]?></div></td>
                            <td><div class="hang1_table"><?=$detail["ThanhTien"]?></div>
                            <input type="hidden" id = "input-thanhtiengiahan" name="tongtien[<?=$detail["MaSach"]?>][ThanhTien]" value="">
                            </td>

                        </tr>
                        <?php $stt++; endforeach; ?>
                    </tbody>
                    <input type="hidden" id="tongtiengiahan" name="tongtiengiahan" >
                </table>
            </div>
            
        
    </div>
</div>
</form>
<script>
    
function tinhThanhTien() {
    // Lấy ngày gia hạn từ input và thay thế "T" bằng dấu cách
    var dsSach = document.querySelectorAll("#borrowedBooksTable tbody tr");
    var giahanngay = document.querySelector('#giahanngay').value.replace("T", " ");
    
    // Lấy ngày hiện tại từ PHP
    var currentDate = new Date("<?=$muonsach["NgayDuKienTra"]?>");

    // Tính số ngày giữa ngày gia hạn và ngày hiện tại
    var soNgayMuon = (new Date(giahanngay) - currentDate) / (24 * 60 * 60 * 1000);
    var tong = 0;
    // Làm tròn số ngày (bỏ qua phần thập phân)
    soNgayMuon = Math.floor(soNgayMuon);
    if (soNgayMuon == 0 ) {
        soNgayMuon = 1;
    }
    if (soNgayMuon < 1 ) {
        alert('Ngày chọn phải lớn hơn ngày hiện tại. Vui lòng chọn lại.');
        document.querySelector('#giahanngay').value = ''; // Xóa giá trị trong ô input
        document.querySelector('#songaymuon').innerText = '';

    }else{
        document.querySelector('#songaymuon').innerText = soNgayMuon;
    }

    for (const sach of dsSach) {
        var gia = Number(sach.querySelector('td:nth-child(5) div').innerText);
        var thanhtien = gia * soNgayMuon;
        sach. querySelector('td:nth-child(6) div').innerText = thanhtien;
        tong += thanhtien;
        sach.querySelector('#input-thanhtiengiahan').value = thanhtien;
    }
    document.querySelector('#tongtiengiahan').value = tong;
    document.querySelector('#label-tongtiengiahan').innerText = tong;
    document.querySelector('#denngay').innerText = giahanngay;

    //document.querySelector('#input-thanhtiengiahan').value = tong;

    document.querySelector('#songaymuon').innerText = soNgayMuon;
    
}

document.querySelector('#giahanngay').addEventListener('change', tinhThanhTien);

// function tinhThanhTien(){
//     var ngaydukientra = document.querySelector("#ngaydukientra").value;
//     var soNgayMuon = (new Date(ngaydukientra) - new Date(ngaymuon)) / (24*60*60*1000);
//     var tong = 0;
//     for (const sach of dsSach) {
//         var dongia = Number(sach.querySelector('td:nth-child(5) div').innerText);
//         var gia = Number(sach.querySelector('td:nth-child(6) div').innerText);
//         var tien = gia * soNgayMuon;
//         sach. querySelector('td:nth-child(7) div').innerText = tien
//         thanhtien = dongia + tien
//         sach. querySelector('td:nth-child(8) div').innerText = thanhtien
//         tong += thanhtien;
//     }
//     document.querySelector('#borrowedBooksTable tfoot tr td:nth-child(2)').innerText = tong;
//     document.querySelector('#tongtien').value = tong;
//     document.querySelector('#songaymuon').innerText = soNgayMuon;
//     }
</script>