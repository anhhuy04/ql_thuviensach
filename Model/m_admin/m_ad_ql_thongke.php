<?php
include "../../Model/library.php";

function executeQuery($sql) {
    $conn = connectDB();
    $result = $conn->query($sql);
    if ($result === false) {
        die("Lỗi truy vấn SQL: " . $conn->error);
    }
    $conn->close();
    return $result;
}

function thongKeTheoNgay($start_date, $end_date) {
    $start_date = $start_date ?: date('Y-m-d');
    $end_date = $end_date ?: $start_date;
    
    $sql = "SELECT DATE(NgayMuon) AS thongtin, SUM(TongTien) AS tongtien
            FROM muonsach
            WHERE NgayMuon BETWEEN '$start_date' AND '$end_date'
            GROUP BY DATE(NgayMuon)";
    
    return executeQuery($sql)->fetch_all(MYSQLI_ASSOC);
}

function thongKeTheoThang($month_start, $month_end) {
    $sql = "SELECT DATE_FORMAT(NgayMuon, '%Y-%m') AS thongtin, SUM(TongTien) AS tongtien
            FROM muonsach
            WHERE DATE_FORMAT(NgayMuon, '%Y-%m') BETWEEN '$month_start' AND '$month_end'
            GROUP BY DATE_FORMAT(NgayMuon, '%Y-%m')";
    
    return executeQuery($sql)->fetch_all(MYSQLI_ASSOC);
}

function thongKeTheoNam($year_start, $year_end) {
    $sql = "SELECT YEAR(NgayMuon) AS thongtin, SUM(TongTien) AS tongtien
            FROM muonsach
            WHERE YEAR(NgayMuon) BETWEEN $year_start AND $year_end
            GROUP BY YEAR(NgayMuon)";
    
    return executeQuery($sql)->fetch_all(MYSQLI_ASSOC);
}

function thongKeTheoQuy($quarter, $year_quarter) {
    $start_month = ($quarter - 1) * 3 + 1;
    $end_month = $start_month + 2;
    
    $sql = "SELECT QUARTER(NgayMuon) AS thongtin, SUM(TongTien) AS tongtien
            FROM muonsach
            WHERE YEAR(NgayMuon) = $year_quarter AND MONTH(NgayMuon) BETWEEN $start_month AND $end_month
            GROUP BY QUARTER(NgayMuon)";
    
    return executeQuery($sql)->fetch_all(MYSQLI_ASSOC);
}

function thongKeTongQuan() {
    // Tổng doanh thu toàn thời gian
    $sql_total = "SELECT SUM(TongTien) AS tong_tien FROM muonsach";
    $result_total = executeQuery($sql_total);
    $tong_tien = $result_total->fetch_assoc()['tong_tien'];

    // Tổng doanh thu theo từng năm
    $sql_by_year = "SELECT YEAR(NgayMuon) AS nam, SUM(TongTien) AS tong_tien
                    FROM muonsach
                    GROUP BY YEAR(NgayMuon)";
    $result_by_year = executeQuery($sql_by_year);
    $doanh_thu_theo_nam = [];
    while ($row = $result_by_year->fetch_assoc()) {
        $doanh_thu_theo_nam[$row['nam']] = $row['tong_tien'];
    }

    // Tổng doanh thu tháng gần nhất
    $sql_recent_month = "SELECT SUM(TongTien) AS tong_tien 
                         FROM muonsach 
                         WHERE MONTH(NgayMuon) = MONTH(CURDATE()) AND YEAR(NgayMuon) = YEAR(CURDATE())";
    $result_recent_month = executeQuery($sql_recent_month);
    $tong_tien_thang = $result_recent_month->fetch_assoc()['tong_tien'];

    // Tổng doanh thu ngày hôm nay
    $sql_today = "SELECT SUM(TongTien) AS tong_tien 
                  FROM muonsach 
                  WHERE DATE(NgayMuon) = CURDATE()";
    $result_today = executeQuery($sql_today);
    $tong_tien_ngay = $result_today->fetch_assoc()['tong_tien'];

    return [
        'Tổng Doanh Thu' => $tong_tien,
        'Doanh Thu Theo Năm' => $doanh_thu_theo_nam,
        'Doanh Thu Tháng Gần Nhất' => $tong_tien_thang,
        'Doanh Thu Ngày Hôm Nay' => $tong_tien_ngay,
    ];
}

function frmthongKeTongQuan($start_date = null, $end_date = null) {
    $conn = connectDB();

    // Nếu không có start_date hoặc end_date, lấy dữ liệu cho toàn bộ thời gian
    if ($start_date == null) {
        $start_date = '1900-01-01'; // Ngày bắt đầu từ năm 1900
    }
    if ($end_date == null) {
        $end_date = date('Y-m-d'); // Ngày kết thúc là hôm nay
    }
    $between = "BETWEEN '$start_date' AND DATE_ADD('$end_date', INTERVAL 1 DAY)";

        // Thống kê tổng số sách
        $sql_sach = "SELECT COUNT(*) AS tong_so_sach_moi FROM sach WHERE CreatedAt $between";
        $result_sach_moi = executeQuery($sql_sach);
        $tongSoSachMoi = $result_sach_moi->fetch_assoc()['tong_so_sach_moi'];
    
        // Thống kê tổng số người dùng
        $sql_nguoi_dung = "SELECT COUNT(*) AS tong_so_nguoi_dung_moi FROM taikhoan WHERE CreatedAt $between";
        $result_nguoi_dung_moi = executeQuery($sql_nguoi_dung);
        $tongSoNguoiDungMoi = $result_nguoi_dung_moi->fetch_assoc()['tong_so_nguoi_dung_moi'];

    // Thống kê tổng số sách
    $sql_sach = "SELECT COUNT(*) AS tong_so_sach FROM sach ";
    $result_sach = executeQuery($sql_sach);
    $tongSoSach = $result_sach->fetch_assoc()['tong_so_sach'];

    // Thống kê tổng số người dùng
    $sql_nguoi_dung = "SELECT COUNT(*) AS tong_so_nguoi_dung FROM taikhoan";
    $result_nguoi_dung = executeQuery($sql_nguoi_dung);
    $tongSoNguoiDung = $result_nguoi_dung->fetch_assoc()['tong_so_nguoi_dung'];

    // Thống kê tổng số mượn trả
    $sql_muon_tra = "SELECT COUNT(*) AS tong_so_muon_tra FROM muonsach WHERE CreatedAt $between";
    $result_muon_tra = executeQuery($sql_muon_tra);
    $tongSoMuonTra = $result_muon_tra->fetch_assoc()['tong_so_muon_tra'];

    // Thống kê tổng số sách mượn theo ngày
    $sql_muon_ngay = "SELECT COUNT(*) AS tong_so_muon_ngay FROM muonsach WHERE TrangThai = 'Đang mượn' AND CreatedAt $between";
    $result_muon_ngay = executeQuery($sql_muon_ngay);
    $tongSoMuonNgay = $result_muon_ngay->fetch_assoc()['tong_so_muon_ngay'];

    // Thống kê tổng số sách đã trả theo ngày
    $sql_tra_ngay = "SELECT COUNT(*) AS tong_so_tra_ngay FROM muonsach WHERE TrangThai = 'Đã trả' AND UpdatedAt $between";
    $result_tra_ngay = executeQuery($sql_tra_ngay);
    $tongSoTraNgay = $result_tra_ngay->fetch_assoc()['tong_so_tra_ngay'];

    $conn->close();

    return [
        'Tổng Số Sách Mới' => $tongSoSachMoi,
        'Tổng Số Người Dùng Mới' => $tongSoNguoiDungMoi,
        'Tổng Số Sách' => $tongSoSach,
        'Tổng Số Người Dùng' => $tongSoNguoiDung,
        'Tổng Số Mượn Trả' => $tongSoMuonTra,
        'Tổng Số Đang Mượn Ngày' => $tongSoMuonNgay,
        'Tổng Số Đã Trả Ngày' => $tongSoTraNgay
    ];
}
function thongKeSach($start_date = null, $end_date = null, $category_id = null , $filter = null, $limit = null) {
    $conn = connectDB();

    // Xây dựng câu truy vấn
    $sql = "SELECT s.TenSach, COUNT(m.MaSach) AS so_luot_muon 
            FROM chitietmuonsach AS m 
            JOIN sach AS s ON m.MaSach = s.MaSach 
            WHERE 1=1";

    // Thêm điều kiện thời gian
    if (!empty($start_date)) {
        $sql .= " AND m.CreatedAt >= '$start_date'";
    }
    if (!empty($end_date)) {
        $sql .= " AND m.CreatedAt <= '$end_date'";
    }

    // Thêm điều kiện danh mục
    if (!empty($category_id)) {
        $sql .= " AND s.DanhMucId = '$category_id'";
    }

    // Thêm sắp xếp theo filter
    if ($filter === 'most') {
        $sql .= " GROUP BY s.MaSach ORDER BY so_luot_muon DESC";
    } elseif ($filter === 'least') {
        $sql .= " GROUP BY s.MaSach ORDER BY so_luot_muon ASC";
    } else {
        $sql .= " GROUP BY s.MaSach"; // Bắt buộc cần GROUP BY
    }

    // Giới hạn số lượng kết quả
    if (!empty($limit)) {
        $sql .= " LIMIT $limit";
    }

    // Thực hiện câu lệnh và kiểm tra lỗi
    $result = $conn->query($sql);
    if (!$result) {
        die("Lỗi SQL: " . $conn->error . "\nSQL: " . $sql);
    }

    return $result->fetch_all(MYSQLI_ASSOC);
}
function thongKeDocGia($start_date = null, $end_date = null, $filter = null, $limit = 5) {
    $conn = connectDB();

    // Xây dựng câu truy vấn
    $sql = "SELECT dg.MaTaiKhoan, dg.HoTen, COUNT(ms.`SoLuongSachMuon`) AS so_luot_muon, SUM(ms.SoLuongSachMuon) AS tong_so_lan_muon
            FROM muonsach AS ms
            LEFT JOIN taikhoan AS dg ON dg.MaTaiKhoan = ms.MaTaiKhoan
            WHERE 1=1";

    // Thêm điều kiện thời gian
    if (!empty($start_date)) {
        $sql .= " AND ms.CreatedAt >= '$start_date'";
    }
    if (!empty($end_date)) {
        $sql .= " AND ms.CreatedAt <= '$end_date'";
    }

    // Thêm sắp xếp theo filter
    if ($filter === 'most') {
        $sql .= " GROUP BY dg.MaTaiKhoan ORDER BY so_luot_muon DESC";
    } elseif ($filter === 'least') {
        $sql .= " GROUP BY dg.MaTaiKhoan ORDER BY so_luot_muon ASC";
    }elseif ($filter === 'nhieusachmuon') {
        $sql .= " GROUP BY dg.MaTaiKhoan ORDER BY tong_so_lan_muon DESC";
    }elseif ($filter === 'itsachmuon') {
        $sql .= " GROUP BY dg.MaTaiKhoan ORDER BY tong_so_lan_muon ASC";
    }

    // Giới hạn số lượng kết quả
    $sql .= " LIMIT $limit";

    $result = $conn->query($sql);

    if ($result === false) {
        die("Lỗi SQL: " . $conn->error);
    }

    return $result->fetch_all(MYSQLI_ASSOC);
}

function sachdocgiamuon($start_date = null, $end_date = null, $book_status = null) {
    $conn = connectDB();

    // Xây dựng câu truy vấn cơ bản
    $sql = "SELECT ctms.`MaChiTietMuon`, ctms.`MaMuonSach`, tk.`HoTen`, sach.`TenSach`, 
                   ms.`NgayMuon`, ms.`NgayDuKienTra`, ctms.`NgayTraThuc`, ctms.`GiaMuon`, 
                   ctms.`TrangThai`, ms.`PhuongThucThanhToan` 
            FROM chitietmuonsach as ctms
            LEFT JOIN muonsach as ms ON ctms.`MaMuonSach` = ms.`MaMuonSach`
            LEFT JOIN taikhoan as tk ON ms.`MaTaiKhoan` = tk.`MaTaiKhoan`
            LEFT JOIN sach ON ctms.`MaSach` = sach.`MaSach`
            WHERE 1=1";
    
    // Thêm điều kiện dựa trên trạng thái sách
    if ($book_status === 'borrowed') {
        $sql .= " AND ctms.`TrangThai` = 'đang mượn'";
    } elseif ($book_status === 'returned') {
        $sql .= " AND ctms.`TrangThai` = 'đã trả'";
    }

    // Thêm điều kiện thời gian
    if (!empty($start_date) && !empty($end_date)) {
        if ($book_status === 'returned') {
            // Lấy theo ngày trả thực nếu sách đã trả
            $sql .= " AND ctms.`NgayTraThuc` BETWEEN '$start_date' AND '$end_date'";
        } else {
            // Lấy theo ngày mượn nếu sách đang mượn hoặc tất cả sách
            $sql .= " AND ms.`NgayMuon` BETWEEN '$start_date' AND '$end_date'";
        }
    } elseif (!empty($start_date)) {
        if ($book_status === 'returned') {
            $sql .= " AND ctms.`NgayTraThuc` >= '$start_date'";
        } else {
            $sql .= " AND ms.`NgayMuon` >= '$start_date'";
        }
    } elseif (!empty($end_date)) {
        if ($book_status === 'returned') {
            $sql .= " AND ctms.`NgayTraThuc` <= '$end_date'";
        } else {
            $sql .= " AND ms.`NgayMuon` <= '$end_date'";
        }
    }

    // Thực hiện câu lệnh SQL
    $result = $conn->query($sql);
    if (!$result) {
        die("Lỗi SQL: " . $conn->error . "\nSQL: " . $sql);
    }

    return $result->fetch_all(MYSQLI_ASSOC);
}

?>
