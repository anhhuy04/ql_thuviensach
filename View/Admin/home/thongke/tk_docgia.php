<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-warning text-white text-center">
                    <div>
                        <a href="<?=$base_url_admin?>ql_thongke/home" class="btn btn_custom_arrow_left" style="color: white !important;"><i class="bi bi-arrow-left"></i> Home</a>
                        <h5 class="text-center">Thống kê độc giả</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?=$base_url_admin?>ql_thongke/tk_docgia" method="POST">
                        <div class="form-group row">
                            <label for="start_date" class="col-sm-4 col-form-label">Từ ngày</label>
                            <div class="col-sm-8">
                                <input type="date" id="start_date" name="start_date" class="form-control" value="<?= htmlspecialchars($_POST['start_date'] ?? '') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="end_date" class="col-sm-4 col-form-label">Đến ngày</label>
                            <div class="col-sm-8">
                                <input type="date" id="end_date" name="end_date" class="form-control" value="<?= htmlspecialchars($_POST['end_date'] ?? '') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Xếp hạng theo</label>
                            <div class="col-sm-8">
                                <div class="d_flex row">
                                    <div class="form-check col-4">
                                        <input class="form-check-input" type="radio" name="filter" id="most_active" value="most" <?= isset($_POST['filter']) && $_POST['filter'] === 'most' ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="most_active">
                                            Độc giả tích mượn sách
                                        </label>
                                    </div>
                                    <div class="form-check col-4">
                                        <input class="form-check-input" type="radio" name="filter" id="least_active" value="least" <?= isset($_POST['filter']) && $_POST['filter'] === 'least' ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="least_active">
                                            Độc giả ít mượn sách
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="d_flex row">
                                    <div class="form-check col-4">
                                        <input class="form-check-input" type="radio" name="filter" id="nhieusachmuon" value="nhieusachmuon" <?= isset($_POST['filter']) && $_POST['filter'] === 'nhieusachmuon' ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="nhieusachmuon">
                                            Độc giả mượn nhiều sách nhất
                                        </label>
                                    </div>
                                    <div class="form-check col-4">
                                        <input class="form-check-input" type="radio" name="filter" id="itsachmuon" value="itsachmuon" <?= isset($_POST['filter']) && $_POST['filter'] === 'itsachmuon' ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="itsachmuon">
                                            Độc giả mượn ít sách nhất
                                        </label>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="limit" class="col-sm-4 col-form-label">Giới hạn kết quả</label>
                            <div class="col-sm-8">
                                <select id="limit" name="limit" class="form-control">
                                    <option value="5" <?= isset($_POST['limit']) && $_POST['limit'] == '5' ? 'selected' : '' ?>>Top 5</option>
                                    <option value="10" <?= isset($_POST['limit']) && $_POST['limit'] == '10' ? 'selected' : '' ?>>Top 10</option>
                                    <option value="20" <?= isset($_POST['limit']) && $_POST['limit'] == '20' ? 'selected' : '' ?>>Top 20</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" name="submit" class="btn btn-warning">Xem thống kê</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <h5 class="text-center text-warning">Kết Quả Thống Kê Độc Giả</h5>
    <table class="table table-bordered mt-3">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Mã Độc Giả</th>
                <th>Tên Độc Giả</th>
                <th>Số Lượt Mượn</th>
                <th>Số Lượt tổng số sách mượn</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($thong_ke_doc_gia)): ?>
                <?php foreach ($thong_ke_doc_gia as $index => $item): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($item['MaTaiKhoan']) ?></td>
                        <td><?= htmlspecialchars($item['HoTen']) ?></td>
                        <td><?= $item['so_luot_muon'] ?></td>
                        <td><?= $item['tong_so_lan_muon'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Không có dữ liệu phù hợp</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
