
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-danger text-white text-center justify-content-center">
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

                        <!-- Chọn danh mục -->
                        <div class="form-group row">
                            <label for="category" class="col-sm-4 col-form-label">Danh mục</label>
                            <div class="col-sm-8">
                                <select id="category" name="category" class="form-control">
                                    <option value="">Tất cả</option>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?=$category['MaDanhMuc']?>" 
                                            <?= isset($category_id) && $category_id == $category['MaDanhMuc'] ? 'selected' : '' ?>>
                                            <?=$category['TenDanhMuc']?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- Chọn loại sách -->
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Lọc sách</label>
                            <div class="col-sm-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filter" id="most_borrowed" value="most" 
                                        <?= isset($filter) && $filter == 'most' ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="most_borrowed">
                                        Sách mượn nhiều nhất
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filter" id="least_borrowed" value="least" 
                                        <?= isset($filter) && $filter == 'least' ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="least_borrowed">
                                        Sách mượn ít nhất
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Chọn số lượng sách -->
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Số lượng sách</label>
                            <div class="col-sm-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="limit" id="limit_5" value="5" 
                                        <?= isset($limit) && $limit == '5' ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="limit_5">
                                        Top 5
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="limit" id="limit_10" value="10" 
                                        <?= isset($limit) && $limit == '10' ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="limit_10">
                                        Top 10
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <button type="submit" name="submit" class="btn btn-danger">Xem thống kê</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <h5 class="text-center text-danger">Kết Quả Thống Kê Sách</h5>
    <table class="table table-bordered mt-3">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Tên Sách</th>
                <th>Số Lượt Mượn</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($thong_ke_sach)): ?>
                <?php foreach ($thong_ke_sach as $index => $item): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($item['TenSach']) ?></td>
                        <td><?= $item['so_luot_muon'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center">Không có dữ liệu phù hợp</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
