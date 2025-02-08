
<div class="container mt-5">
    <div class="header-row">
        <a href="<?=$base_url_admin?>ql_thongke/home" class="btn btn_custom_arrow_left"><i class="bi bi-arrow-left"></i> Home</a>
        <h1 class="text-center">Thống kê doanh thu</h1>
    </div>
    <form action="" method="POST">
        <div class="row mb-4">
            <label for="thongke_theo" class="form-label">Chọn loại thống kê:</label>
            <select class="form-select" id="thongke_theo" name="thongke_theo" onchange="toggleFields()" required>
                <option value="" selected disabled>-- Chọn loại thống kê --</option>
                <option value="ngay">Theo ngày</option>
                <option value="thang">Theo tháng</option>
                <option value="nam">Theo năm</option>
                <option value="quy">Theo quý</option>
                <option value="tongquan">Tổng quan</option>
            </select>
        </div>

        <!-- Các trường đầu vào -->
        <div id="field_ngay" class="mb-3 d-none">
            <label class="form-label">Từ ngày:</label>
            <input type="date" id="start_date" name="start_date" class="form-control" onchange="setEndDate(this, 'end_date')">
            <label class="form-label">Đến ngày:</label>
            <input type="date" id="end_date" name="end_date" class="form-control">
        </div>

        <div id="field_thang" class="mb-3 d-none">
            <label class="form-label">Từ tháng:</label>
            <input type="month" id="month_start" name="month_start" class="form-control" onchange="setEndMonth(this, 'month_end')">
            <label class="form-label">Đến tháng:</label>
            <input type="month" id="month_end" name="month_end" class="form-control">
        </div>

        <div id="field_nam" class="mb-3 d-none">
            <label class="form-label">Từ năm:</label>
            <input type="number" id="year_start" name="year_start" class="form-control" placeholder="Nhập năm" onchange="setEndYear(this, 'year_end')">
            <label class="form-label">Đến năm:</label>
            <input type="number" id="year_end" name="year_end" class="form-control" placeholder="Nhập năm">
        </div>

        <div id="field_quy" class="mb-3 d-none">
            <label class="form-label">Chọn quý:</label>
            <select id="quarter" name="quarter" class="form-select">
                <option value="" selected disabled>-- Chọn quý --</option>
                <option value="1">Quý 1 (Tháng 1-3)</option>
                <option value="2">Quý 2 (Tháng 4-6)</option>
                <option value="3">Quý 3 (Tháng 7-9)</option>
                <option value="4">Quý 4 (Tháng 10-12)</option>
            </select>
            <label class="form-label mt-2">Nhập năm:</label>
            <input type="number" id="year_quarter" name="year_quarter" class="form-control" placeholder="Nhập năm">
        </div>

        <button type="submit"  class="btn btn-primary w-100">Thống Kê</button>
    </form>

    <!-- Hiển thị kết quả -->
    <div id="result" class="mt-4">
    <?php if (!empty($result)): ?>
        <h3>Kết quả thống kê:</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Năm/Tháng/Ngày</th>
                    <th>Doanh Thu (VNĐ)</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total = 0;
                foreach ($result as $row): 
                    $total += $row['tongtien'];
                ?>
                    <tr>
                        <td><?= htmlspecialchars($row['thongtin']) ?></td>
                        <td><?= number_format($row['tongtien'], 0) ?> VNĐ</td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td><strong>Tổng cộng</strong></td>
                    <td><strong><?= number_format($total, 0) ?> VNĐ</strong></td>
                </tr>
            </tbody>
        </table>
        <?php elseif (!empty($thongKeTongQuan)): ?>
            <div class="mt-4">
                <h2 class="text-center">Thống Kê Tổng Quan</h2>
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>Chỉ số</th>
                            <th>Giá trị</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Doanh thu hôm nay -->
                        <tr>
                            <td><strong>Doanh Thu Ngày Hôm Nay</strong></td>
                            <td><?= number_format($thongKeTongQuan['Doanh Thu Ngày Hôm Nay'], 0, ',', '.') ?> VNĐ</td>
                        </tr>
                        
                        <!-- Doanh thu tháng gần nhất -->
                        <tr>
                            <td><strong>Doanh Thu Tháng Gần Nhất</strong></td>
                            <td><?= number_format($thongKeTongQuan['Doanh Thu Tháng Gần Nhất'], 0, ',', '.') ?> VNĐ</td>
                        </tr>
                        <!-- Doanh thu theo năm -->
                        <tr>
                            <td><strong>Doanh Thu Theo Năm</strong></td>
                            <td>
                                <?php foreach ($thongKeTongQuan['Doanh Thu Theo Năm'] as $nam => $tong_tien): ?>
                                    Năm <?= $nam ?>: <?= number_format($tong_tien, 0, ',', '.') ?> VNĐ<br>
                                <?php endforeach; ?>
                            </td>
                        </tr>
                        <!-- Tổng doanh thu -->
                        <tr>
                            <td><strong>Tổng Doanh Thu</strong></td>
                            <td><?= number_format($thongKeTongQuan['Tổng Doanh Thu'], 0, ',', '.') ?> VNĐ</td>
                        </tr>
                    </tbody>
                </table>
            </div>

    <?php else: ?>
        <p class="text-danger">Không có dữ liệu để thống kê.</p>
    <?php endif; ?>
</div>
</div>

<script>
    function toggleFields() {
        //Ẩn tất cả các trường
        document.querySelectorAll('.mb-3').forEach(el => el.classList.add('d-none'));
        //Hiện trường được chọn
        const type = document.getElementById("thongke_theo").value;
        document.getElementById(`field_${type}`).classList.remove('d-none');
    }

    function setEndDate(startElem, endId) {
        document.getElementById(endId).value = startElem.value;
    }

    function setEndMonth(startElem, endId) {
        document.getElementById(endId).value = startElem.value;
    }

    function setEndYear(startElem, endId) {
        document.getElementById(endId).value = startElem.value;
    }
</script>