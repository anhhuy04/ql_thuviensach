<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-secondary text-white text-center justify-content-center">
                    <div class="">
                        <a href="<?=$base_url_admin?>ql_thongke/home" class="btn btn_custom_arrow_left" style="color: white !important;">
                            <i class="bi bi-arrow-left"></i> Home
                        </a>
                        <h5 class="text-center">Thống kê sách</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <!-- Chọn thời gian -->
                        <div class="form-group row">
                            <label for="start_date" class="col-sm-4 col-form-label">Từ ngày</label>
                            <div class="col-sm-8">
                                <input type="date" id="start_date" name="start_date" class="form-control" 
                                    value="<?= htmlspecialchars($start_date ?? '') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="end_date" class="col-sm-4 col-form-label">Đến ngày</label>
                            <div class="col-sm-8">
                                <input type="date" id="end_date" name="end_date" class="form-control" 
                                    value="<?= htmlspecialchars($end_date ?? '') ?>">
                            </div>
                        </div>    

                        <!-- Radiobutton hiển thị sách -->
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Hiển thị sách</label>
                            <div class="col-sm-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="book_status" id="all_books" value="all" 
                                        <?= isset($book_status) && $book_status == 'all' ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="all_books">
                                        Tất cả sách
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="book_status" id="borrowed_books" value="borrowed" 
                                        <?= isset($book_status) && $book_status == 'borrowed' ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="borrowed_books">
                                        Sách đang mượn
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="book_status" id="returned_books" value="returned" 
                                        <?= isset($book_status) && $book_status == 'returned' ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="returned_books">
                                        Sách đã trả
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <button type="submit" name="submit" class="btn btn-secondary">Xem thống kê</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <h5 class="text-center text-secondary">Chi Tiết Mượn Sách</h5>
    <table class="table table-bordered mt-3">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Mã Chi Tiết Mượn</th>
                <th>Mã Mượn Sách</th>
                <th>Họ Tên</th>
                <th>Tên Sách</th>
                <th>Ngày Mượn</th>
                <th>Ngày Dự Kiến Trả</th>
                <th>Ngày Trả Thực</th>
                <th>Giá Mượn</th>
                <th>Trạng Thái</th>
                <th>Phương Thức Thanh Toán</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($thong_ke_sach)): ?>
                <?php foreach ($thong_ke_sach as $index => $item): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($item['MaChiTietMuon']) ?></td>
                        <td><?= htmlspecialchars($item['MaMuonSach']) ?></td>
                        <td><?= htmlspecialchars($item['HoTen']) ?></td>
                        <td><?= htmlspecialchars($item['TenSach']) ?></td>
                        <td><?= htmlspecialchars($item['NgayMuon']) ?></td>
                        <td><?= htmlspecialchars($item['NgayDuKienTra']) ?></td>
                        <td><?= htmlspecialchars($item['NgayTraThuc']) ?></td>
                        <td><?= htmlspecialchars($item['GiaMuon']) ?></td>
                        <td><?= htmlspecialchars($item['TrangThai']) ?></td>
                        <td><?= htmlspecialchars($item['PhuongThucThanhToan']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="11" class="text-center">Không có dữ liệu phù hợp</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
