<div class="container mt-5">
<div class="header-row">
        <a href="<?=$base_url_admin?>ql_thongke/home" class="btn btn_custom_arrow_left"><i class="bi bi-arrow-left"></i> Home</a>
        <h1 class="text-center">Thống Kê Tổng Quan</h1>
    </div>


        <div id="result" class="mt-4">
            <form action="" method="post">
                <div id="field_ngay" class="mb-3 row items-center">
                    <div class="col-md-5 d-flex items-center">
                        <label class="me-2">Từ ngày:</label>
                        <input type="date" id="start_date" name="start_date" class="form-control w-65" value="<?=$start_date?>">
                    </div>
                    <div class="col-md-5 d-flex items-center">
                        <label class="me-2">Đến ngày:</label>
                        <input type="date" id="end_date" name="end_date" class="form-control w-65" value="<?=$end_date?>">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" name="submit" class="btn btn-primary">Lọc ngày</button>
                    </div>
                </div>
            </form>
            <?php
                if (!empty($thongKeTongQuan)):
            ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Chỉ số</th>
                            <th>Giá trị</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Tổng số sách -->
                    
                        <tr>
                            <td><strong>Số sách mới thêm</strong></td>
                            <td><?= number_format($thongKeTongQuan['Tổng Số Sách Mới']) ?> quyển (<?= number_format($thongKeTongQuan['Tổng Số Sách']) ?>)</td>
                        </tr>
                        <tr>
                            <td><strong>Số người dùng mới</strong></td>
                            <td><?= number_format($thongKeTongQuan['Tổng Số Người Dùng Mới']) ?> người (<?= number_format($thongKeTongQuan['Tổng Số Người Dùng']) ?>)</td>
                        </tr>
                        <!-- Tổng số người dùng -->
                        
                        <!-- Tổng số mượn trả -->
                        <tr>
                            <td><strong>Tổng Số Lượt Mượn</strong></td>
                            <td><?= number_format($thongKeTongQuan['Tổng Số Đang Mượn Ngày']) ?> lượt</td>
                        </tr>
                        <!-- Tổng số mượn trả -->
                        <tr>
                            <td><strong>Tổng Số Lượt Trả</strong></td>
                            <td><?= number_format($thongKeTongQuan['Tổng Số Đã Trả Ngày']) ?> lượt</td>
                        </tr>
                        <!-- Tổng số mượn trả -->
                        <tr>
                            <td><strong>Tổng Số Lượt Mượn/Trả</strong></td>
                            <td><?= number_format($thongKeTongQuan['Tổng Số Mượn Trả']) ?> lượt</td>
                        </tr>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-center text-danger">Không có dữ liệu thống kê.</p>
            <?php endif; ?>
        </div>

    </div>