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
            
            <div class="row justify-content-center mt-4 ">
                <div class="table-responsive">
                    <table class="table text-center table-hover mt-4 table-bordered table-striped small" id="borrowedBooksTable">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Mã sách</th>
                                <th scope="col">Tên sách</th>
                                <th scope="col">Mã sách lỗi</th>
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
                                <td><div class="hang1_table"><?=$detail["ThanhTien"]?></div></td>
                            </tr>
                            <?php $stt++; endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>       
    </div>
</div>
