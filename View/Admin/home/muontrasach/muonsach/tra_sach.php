<div class="container mt-3 mb-3">
    <div class="row justify-content-center">
        <div class="col-md-12 row">
            <h2>Chi tiết mượn sách</h2>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Thông tin người mượn
                    </div>
                    <div class="card-body">
                        <p><strong>Họ tên:</strong> <?=$muonsach["HoTen"]?></p>
                        <p><strong>Email:</strong> <?=$muonsach["Email"]?></p>
                        <p><strong>Điện thoại:</strong> <?=$muonsach["DienThoai"]?></p>
                        <p><strong>Địa chỉ:</strong> <?=$muonsach["DiaChi"]?></p>
                        <p><strong>Cccd:</strong> <?=$muonsach["Cccd"]?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Thông tin mượn
                    </div>
                    <div class="card-body">
                        <p><strong>Ngày mượn:</strong> <?=$muonsach["NgayMuon"]?></p>
                        <p><strong>Hạn trả:</strong> <?=$muonsach["HanTra"]?></p>
                        <p><strong>Số lượng sách:</strong> <?=$muonsach["SoLuongSachMuon"]?></p>
                        <p><strong>Tổng tiền:</strong> <?=$muonsach["TongTien"]?></p>
                        <p><strong>Phương thức thanh toán:</strong> <?=$muonsach["PhuongThucThanhToan"]?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <form method="post" action="">
            <input type="hidden" name="maxacnhan" value="<?=$muonsach['MaMuonSach']?>">
            <div class="table-responsive">
                <table class="table text-center table-hover mt-4 table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Mã sách</th>
                            <th scope="col">Tên sách</th>
                            <th scope="col">Phí mượn/ngày</th>
                            <th scope="col">Thành tiền</th>
                            <th scope="col">Lỗi</th>
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
                            <td><div class="hang1_table"><?=$detail["GiaMuon_Ngay"]?></div></td>
                            <td><div class="hang1_table"><?=$detail["ThanhTien"]?></div></td>
                            <td>
                                <div class="hang1_table">
                                <?=$detail["SoHieuBanSao"]?>
                                </div>
                            </td>
                        </tr>
                        <?php $stt++; endforeach; ?>
                    </tbody>
                </table>
            </div>
           
            <div class=" px-4 radius-5px">
                <div class="container mt-3 mb-3">
                    <div class="row justify-content-center form-container">
                        <div>Thêm lỗi</div>
                        <div class="table-responsive">
                            <table class="table text-center table-hover mt-4 table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Mã sách</th>
                                        
                                        <th scope="col" style="width: 160px;">Số hiệu bản sao</th>
                                        <th scope="col">Ghi chú lỗi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <?php $stt = 1;
                                        foreach($details as $detail):
                                    ?>
                                    <tr>
                                        <th scope="row"><div><?=$stt?></div></th>
                                        <td><div class="hang1_table"><?=$detail["MaSach"]?></div></td>
                                        <td><div class="hang1_table">
                                            <input class="form-control" list="shbs" name="sohieubansao[<?=$detail["MaSach"]?>][SoHieuBanSao]" placeholder="Số hiệu bản sao" autocomplete="off" >
                                                <datalist id="shbs">
                                                <?php foreach($detail["MaSachCaBiet"] as $sachCaBiet): ?>
                                                    <option"><?=$sachCaBiet['SoHieuBanSao']?></option>
                                                <?php endforeach; ?>
                                                </datalist>
                                        </div></td>
                                        
                                        <td>
                                            <div class="hang1_table">
                                            <textarea class="form-control" name="sohieubansao[<?=$detail["MaSach"]?>][MoTa]" id=""></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $stt++; endforeach; ?>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-4">
                <button type="submit" name="submit-xacnhan" class="btn btn-primary">Xác nhận trả sách</button>
            </div>
        </form>
    </div>
</div>
