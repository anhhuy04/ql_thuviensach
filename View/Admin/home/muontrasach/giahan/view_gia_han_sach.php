<!-- Thanh tìm kiếm -->
<div class="row my-4 justify-content-center boxsearch items-center">
    <div class="col-md-8 pl20">
        <input class="form-control" type="text" placeholder="Tìm kiếm sách, mã sách, tên tác giả, thể loại...">
    </div>
    <div class="col-md-2">
        <button class="btn btn-success">tìm kiếm</button>
    </div>
    <div class="col-md-2">
        <a href="<?=$base_url_admin?>ql_muon_sach/add_MuonSach" class="btn btn_custom_arrow_right float-end">Thêm mượn sách <i class="bi bi-arrow-right"></i></a>
    </div>
</div>

<!-- Bảng danh sách sách -->
<div class="row">
    <div class="col">
        <div class="table-responsive">
            <!-- Bảng ở đây -->
            <table class="table text-center table-hover mt-4 table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã mượn sách</th>
                        <th scope="col">Mã tài khoản</th>
                        <th scope="col">Tên người mượn</th>
                        <th scope="col">Số lượng sách mượn</th>
                        <th scope="col">Ngày dự kiến trả</th>
                        <th scope="col">Ngày trả thực</th>
                        <th scope="col">Phương thức thanh toán</th>
                        <th scope="col">Trạng thái</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php $stt = 1;
                        foreach($select_MuonSach as $select_MuonSach):
                    ?>
                    <tr>
                        <th scope="row"><div><?=$stt?></div></th>
                        <td><div class="hang1_table" style="max-width: 30px;min-width: 100px;"><?=$select_MuonSach["MaMuonSach"]?></div></td>
                        <td><div class="hang1_table" style="max-width: 200px;min-width: 100px;"><?=$select_MuonSach["MaTaiKhoan"]?></div></td>
                        <td><div class="hang1_table" style="max-width: 200px;min-width: 100px;"><?=$select_MuonSach["HoTen"]?></div></td>
                        <td><div class="hang1_table" style="max-width: 200px;min-width: 100px;"><?=$select_MuonSach["SoLuongSachMuon"]?></div></td>
                        <td><div class="hang1_table" style="min-width: 50px;"><?=$select_MuonSach["NgayDuKienTra"]?></div></td>
                        <td><div class="hang1_table" style="min-width: 50px;"><?=$select_MuonSach["NgayTraThuc"]?></div></td>
                        <td><div class="hang1_table" style="min-width: 50px;"><?=$select_MuonSach["PhuongThucThanhToan"]?></div></td>
                        <td><div class="hang1_table" style="min-width: 50px;"><span style="min-width: 120px;" class="btn <?=$select_MuonSach["TrangThai"]=="Gia hạn"?"btn-warning":"btn-danger"?>"><?=$select_MuonSach["TrangThai"]?></span></div></td>
                    </tr>
                    <?php $stt++; endforeach; ?>
                </tbody>
            </table>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<!-- Modal Bootstrap -->
<div class="modal fade" id="renewModal" tabindex="-1" aria-labelledby="renewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="renewModalLabel">Gia hạn sách</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="renewForm" method="post" action="<?=$base_url_admin?>ql_muon_sach/giahan">
                    <input type="hidden" name="magiahan" id="magiahan">
                    <div class="mb-3">
                        
                        <label for="ngaygiahan" class="form-label">Gia hạn đến ngày</label>
                        <input type="date" class="form-control" id="ngaygiahan" name="ngaygiahan" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function openRenewModal(mamuonsach) {
    document.getElementById('magiahan').value = mamuonsach;
    var renewModal = new bootstrap.Modal(document.getElementById('renewModal'));
    renewModal.show();
}
</script>
