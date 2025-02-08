<?php
   include_once "library.php";
    function get_TaiKhoanByMaTK($mataikhoan){
        return get_one("SELECT tk.*, nv.`ChucVu`, tt.`TenTrangThai`,vt.`TenVaiTro`
            FROM taikhoan as tk 
            LEFT JOIN nhanvien AS nv ON tk.`MaTaiKhoan` = nv.`MaTaiKhoan`
            LEFT JOIN trangthai AS tt ON tk.`MaTrangThai` = tt.`MaTrangThai`
            LEFT JOIN vaitro AS vt ON tk.`MaVaiTro` = vt.`MaVaiTro`
            WHERE tk.`MaTaiKhoan`= $mataikhoan");
    }
    function get_SachLuuByMaTK($mataikhoan){
        return get_all("SELECT * FROM sachluu LEFT JOIN sach ON sachluu.MaSach = sach.MaSach WHERE sachluu.MaTaiKhoan = $mataikhoan");
    }
    function delete_1_sachluu($mataikhoan,$masach) {
        $sql = "DELETE FROM sachluu WHERE MaTaiKhoan = $mataikhoan AND MaSach = $masach";
        return execute($sql);
    }
    function delete_all_sachluu($mataikhoan,$masach) {
        $sql = "DELETE FROM sachluu WHERE MaTaiKhoan = $mataikhoan";
        return execute($sql);
    }

    function get_All_GioHang($matk) {
        return get_all("
            SELECT giohang.*, sach.TenSach, sach.URL_HinhSach ,sach.DonGia
            FROM giohang 
            LEFT JOIN sach ON giohang.MaSach = sach.MaSach 
            WHERE giohang.MaTaiKhoan = $matk
        ");
    }
    function insert_GioHang($MaTaiKhoan, $MaSach, $GiaMuon, $SoLuong) {
        // Kết nối đến cơ sở dữ liệu
        $conn = connectdb();
        $conn->begin_transaction();
        try {
            // Chuẩn bị câu lệnh SQL
            $sql = "INSERT INTO giohang (MaTaiKhoan, MaSach, GiaMuon, SoLuong)
                    VALUES (?, ?, ?, ?)";
            // Sử dụng câu lệnh chuẩn bị (prepared statement) để tránh SQL injection
            $stmt = $conn->prepare($sql);
            // Gắn các tham số vào câu lệnh SQL
            $stmt->bind_param("iiid", $MaTaiKhoan, $MaSach, $GiaMuon, $SoLuong);
            // Thực thi câu lệnh SQL
             $stmt->execute();
             $conn->commit();
             return true;
        } catch (Exception $e) {
            $conn->rollback();
            return $e->getMessage();
        }
    }
    function delete_GioHang($MaTaiKhoan, $MaSach){
        return execute("DELETE FROM giohang WHERE MaTaiKhoan = $MaTaiKhoan AND MaSach = $MaSach");
    }
    function delete_GioHangByMaTK($MaTaiKhoan){
        return execute("DELETE FROM giohang WHERE MaTaiKhoan = $MaTaiKhoan");
    }

    
function doimk($mataikhoan, $matKhauCu, $matKhauMoi) {
    $conn = connectdb();
    $conn->begin_transaction();
    try {
        // Kiểm tra tài khoản và mật khẩu cũ
        $stmt = $conn->prepare("SELECT MatKhauHash FROM taikhoan WHERE MaTaiKhoan = ?");
        $stmt->bind_param("s", $mataikhoan);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        // if (!password_verify($matKhauCu, $row['MatKhauHash'])) {
        //     throw new Exception("Mật khẩu cũ không chính xác.");
        // }
        if ($matKhauCu !== $row['MatKhauHash']) {
            throw new Exception("Mật khẩu cũ không chính xác.");
        }
        // Cập nhật mật khẩu mới
        //$matKhauHashMoi = password_hash($matKhauMoi, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("UPDATE taikhoan SET MatKhauHash = ? WHERE MaTaiKhoan = ?");
        $stmt->bind_param("ss", $matKhauMoi, $mataikhoan);
        $stmt->execute();
        
        // Thực thi câu lệnh SQL
            $stmt->execute();
            $conn->commit();
            return true;
    } catch (Exception $e) {
        $conn->rollback();
        return $e->getMessage();
    }
    
}

function add_MuonSach($matk, $ngaymuon, $ngaydukientra, $soluong, $tongThanhTien, $trangthai, $pttt, $giohang, $giamuon) {
    $conn = connectdb();
    $conn->begin_transaction();
    try {    
        $sql = "INSERT INTO muonsach(MaTaiKhoan, NgayMuon, NgayDuKienTra, HanTra, SoLuongSachMuon, TongTien, TrangThai, PhuongThucThanhToan) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtSach = $conn->prepare($sql);
        $stmtSach->bind_param("isssidss", $matk, $ngaymuon, $ngaydukientra, $ngaydukientra, $soluong, $tongThanhTien, $trangthai, $pttt);
        $stmtSach->execute();
        $MaMuonSach = $conn->insert_id;
        foreach ($giohang as $giohang) {
            $sqlchitiethd = "INSERT INTO chitietmuonsach (MaMuonSach, MaSach, GiaMuon_Ngay, ThanhTien, TrangThai) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sqlchitiethd);
            foreach ($giamuon as $key => $data) {
                if ($key == $giohang['MaSach']) {
                    $stmt->bind_param("iidds", $MaMuonSach, $key, $data["phimuon"], $data["thanhtien"], $trangthai);
                    $stmt->execute();
                }  
            }
        }
        $conn->commit();
        return true;
    } catch (Exception $e) {
        $conn->rollback();
        return $e->getMessage();
    }   
}
function get_muonsach_damuon($mataikhoan){
    $conn = connectdb();
    $sql = "SELECT DISTINCT muonsach.*, taikhoan.HoTen, muonsach.NgayTraThuc FROM muonsach 
    LEFT JOIN taikhoan on muonsach.MaTaiKhoan = taikhoan.MaTaiKhoan 
    LEFT JOIN chitietmuonsach ON muonsach.`MaMuonSach` = chitietmuonsach.`MaMuonSach`
    WHERE muonsach.MaTaiKhoan = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Lỗi prepare: " . $conn->error);
    }
    // Gắn tham số
    $stmt->bind_param("s", $mataikhoan);
    // Thực thi câu lệnh
    $stmt->execute();
    // Lấy kết quả
    $result = $stmt->get_result();
    $list = [];
    while ($row = $result->fetch_assoc()) {
        array_push($list, $row);
    }
    return $list;
}
?>