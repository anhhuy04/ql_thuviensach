<?php
include "../../Model/library.php";

    function get_One_KH($makh){
        return get_one(
            "SELECT MaTaiKhoan, HoTen, DienThoai, DiaChi, TenTrangThai, TenVaiTro
            FROM taikhoan 
            LEFT JOIN trangthai ON taikhoan.MaTrangThai = trangthai.MaTrangThai 
            LEFT JOIN vaitro on taikhoan.MaVaiTro = vaitro.MaVaiTro
            WHERE MaTaiKhoan = $makh");
    }
    function get_All_MaTK(){
        return get_all("SELECT MaTaiKhoan FROM taikhoan");
    }
    function get_muonsach($trangthai){
        $conn = connectdb();
        $sql = "SELECT DISTINCT muonsach.*, taikhoan.HoTen, muonsach.NgayTraThuc FROM muonsach 
        LEFT JOIN taikhoan on muonsach.MaTaiKhoan = taikhoan.MaTaiKhoan 
        LEFT JOIN chitietmuonsach ON muonsach.`MaMuonSach` = chitietmuonsach.`MaMuonSach`
        WHERE muonsach.TrangThai = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Lỗi prepare: " . $conn->error);
        }
        // Gắn tham số
        $stmt->bind_param("s", $trangthai);
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
    function get_sachquahantra() {
        $conn = connectdb();
        
        // Lấy ngày hiện tại
        $current_date = date('Y-m-d H:i:s');
    
        // SQL query lọc các sách quá hạn chưa trả hoặc đã trả nhưng quá hạn
        $sql = "SELECT DISTINCT muonsach.*, taikhoan.HoTen, muonsach.NgayTraThuc FROM muonsach 
                LEFT JOIN taikhoan ON muonsach.MaTaiKhoan = taikhoan.MaTaiKhoan 
                WHERE 
                    (muonsach.HanTra < ? AND muonsach.NgayTraThuc IS NULL)           
                AND muonsach.TrangThai IN ('Đang mượn', 'Gia hạn')";
        
        $stmt = $conn->prepare($sql);
        
        // Gắn tham số là ngày hiện tại
        $stmt->bind_param("s", $current_date);
        
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
    
    function search_book($string)
    {
        return get_all("SELECT 
                Sach.*,  -- Lấy tất cả các cột của bảng Sach
                BoSach.TenBoSach,  -- Tên bộ sách từ bảng BoSach
                GROUP_CONCAT(DISTINCT DanhMuc.TenDanhMuc SEPARATOR ', ') AS DanhMuc,  -- Gộp danh mục vào một cột
                GROUP_CONCAT(DISTINCT TacGia.TenTacGia SEPARATOR ', ') AS TacGia -- Gộp tên tác giả vào một cột
                FROM 
                    Sach
                LEFT JOIN SachDanhMuc ON Sach.MaSach = SachDanhMuc.MaSach
                LEFT JOIN DanhMuc ON SachDanhMuc.MaDanhMuc = DanhMuc.MaDanhMuc
                LEFT JOIN BoSach ON Sach.MaBoSach = BoSach.MaBoSach
                LEFT JOIN SachTacGia ON Sach.MaSach = SachTacGia.MaSach
                LEFT JOIN TacGia ON SachTacGia.MaTacGia = TacGia.MaTacGia
                WHERE Sach.MaSach LIKE '".$string."' OR Sach.TenSach LIKE '%".$string."%' OR Sach.ISBN LIKE '".$string."'
                GROUP BY 
                    Sach.MaSach;
            ");
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

    function update_soluongmuonsach($SoLuong, $masach){
        $conn = connectdb();
        $conn->begin_transaction();
        try {
            // Chuẩn bị câu lệnh SQL
            $sql = "UPDATE sach SET SLConLai = SLConLai - ? WHERE MaSach = ?";
            // Sử dụng câu lệnh chuẩn bị (prepared statement) để tránh SQL injection
            $stmt = $conn->prepare($sql);
            // Gắn các tham số vào câu lệnh SQL
            $stmt->bind_param("ii", $SoLuong, $masach);
            // Thực thi câu lệnh SQL
             $stmt->execute();
             $conn->commit();
             return true;
        } catch (Exception $e) {
            $conn->rollback();
            return $e->getMessage();
        }
    }
    function update_soluongtrasach($SoLuong, $masach){
        $conn = connectdb();
        $conn->begin_transaction();
        try {
            // Chuẩn bị câu lệnh SQL
            $sql = "UPDATE sach SET SLConLai = SLConLai + ? WHERE MaSach = ?";
            // Sử dụng câu lệnh chuẩn bị (prepared statement) để tránh SQL injection
            $stmt = $conn->prepare($sql);
            // Gắn các tham số vào câu lệnh SQL
            $stmt->bind_param("ii", $SoLuong, $masach);
            // Thực thi câu lệnh SQL
             $stmt->execute();
             $conn->commit();
             return true;
        } catch (Exception $e) {
            $conn->rollback();
            return $e->getMessage();
        }    
    }
    function add_MuonSach($matk,$ngaymuon, $ngaydukientra,$soluong, $tongThanhTien, $trangthai, $pttt, $giohang, $giamuon){

        $conn = connectdb();
        // Bắt đầu giao dịch
        $conn->begin_transaction();
        try {    
            $sql = "INSERT INTO muonsach(MaTaiKhoan, NgayMuon, NgayDuKienTra,HanTra, SoLuongSachMuon, TongTien, TrangThai, PhuongThucThanhToan) 
            VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";
            // Chuẩn bị câu lệnh SQL
            $stmtSach = $conn->prepare($sql);
            // Liên kết tham số với các biến
            $stmtSach->bind_param("isssidss",$matk,$ngaymuon, $ngaydukientra, $ngaydukientra,$soluong, $tongThanhTien, $trangthai, $pttt);
            // Thực thi câu lệnh SQL và kiểm tra lỗi
            $stmtSach->execute();
            $MaMuonSach = $conn->insert_id;
                foreach ($giohang as $giohang) {
                    $sqlchitiethd = "INSERT INTO chitietmuonsach (MaMuonSach,MaSach,GiaMuon_Ngay,ThanhTien, TrangThai) VALUES (?,?, ?,?, ?)";
                    $stmt = $conn->prepare($sqlchitiethd);
                    // chưa gán giá trị giá mượn 
                    foreach ($giamuon as $key => $data) {
                        if($key == $giohang['MaSach']){
                            $stmt->bind_param("iidds", $MaMuonSach, $key,$data["phimuon"],$data["thanhtien"],$trangthai);
                            $stmt->execute();
                            if (!$stmt) {
                                throw new Exception("Error preparing statement: " . $conn->error);
                            }
                        }  
                    }
                }
                $conn->commit();
                return true;
        } catch (Exception $e) {
            // Nếu có lỗi, rollback
            $conn->rollback();
            return $e->getMessage();
        }   
    }
    function update_trangthai_muonsach($tenbang, $trangthaimuondoi, $mamuonsach){
        $conn = connectdb();
        $conn->begin_transaction();
        try {
            // Chuẩn bị câu lệnh SQL
            $sql = "UPDATE $tenbang SET TrangThai = ?  WHERE MaMuonSach = ? ";
            // Sử dụng câu lệnh chuẩn bị (prepared statement) để tránh SQL injection
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $conn->error);
            }
            // Gắn các tham số vào câu lệnh SQL
            $stmt->bind_param("si", $trangthaimuondoi, $mamuonsach);
            // Thực thi câu lệnh SQL
             $stmt->execute();
             $conn->commit();
             return true;
        } catch (Exception $e) {
            $conn->rollback();
            return $e->getMessage();
        }
    }

    function get_ALL_MaSach_chitietmuonsach($mamuonsach){
        return get_all("SELECT MaSach FROM chitietmuonsach WHERE MaMuonSach = $mamuonsach");
    }

    function update_hantra_chitietmuonsach($mamuonsach, $ngaygiahan){
        $conn = connectdb();
        $conn->begin_transaction();
        try {
            // Chuẩn bị câu lệnh SQL
            $sql = "UPDATE chitietmuonsach SET HanTra = ?, GiaHan = NOW() WHERE MaMuonSach = ?";
            // Sử dụng câu lệnh chuẩn bị (prepared statement) để tránh SQL injection
            $stmt = $conn->prepare($sql);
            // Gắn các tham số vào câu lệnh SQL
            $stmt->bind_param("si", $ngaygiahan, $mamuonsach);
            // Thực thi câu lệnh SQL
            $stmt->execute();
            $conn->commit();
            return true;
        } catch (Exception $e) {
            $conn->rollback();
            return $e->getMessage();
        }
    }

    function get_One_MuonSach($mamuonsach){
        return get_one("SELECT * FROM muonsach 
        LEFT JOIN taikhoan on muonsach.MaTaiKhoan = taikhoan.MaTaiKhoan
        WHERE MaMuonSach = $mamuonsach");
    }

    function get_chitiet_muonsach($mamuonsach){
        $conn = connectdb();
        $sql = "SELECT chitietmuonsach.*, sach.TenSach, sachcabiet.SoHieuBanSao
                FROM chitietmuonsach
                LEFT JOIN sach ON chitietmuonsach.MaSach = sach.MaSach
                LEFT JOIN muonsach ON chitietmuonsach.MaMuonSach = muonsach.MaMuonSach
                LEFT JOIN sachcabiet ON chitietmuonsach.MaSachCaBiet = sachcabiet.MaSachCaBiet
                WHERE chitietmuonsach.MaMuonSach = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Error preparing statement: " . $conn->error);
        }
        $stmt->bind_param("i", $mamuonsach);
        $stmt->execute();
        $result = $stmt->get_result();
        $list = [];
        while ($row = $result->fetch_assoc()) {
            array_push($list, $row);
        }   
        return $list;
    }
    function get_chitiet_muonsach_giahan($mamuonsach){
        $list = get_chitiet_muonsach($mamuonsach);
        return $list;
    }
    

    function get_chitiet_muonsach_xacnhanmuon($mamuonsach){
        $list = get_chitiet_muonsach($mamuonsach);
        foreach ($list as $key => $item) {
            $masach = $item['MaSach']; // Lấy MaSach từ danh sách
            $item['MaSachCaBiet'] = get_all_sachloi($masach); // Gọi hàm phụ
            $list[$key] = $item; // Ghi đè lại phần tử trong $list
        }
        return $list;
    }
    function xacnhan_giahan($hantra, $mamuonsach,$thanhtien, $tongtiengiahan){
        $conn = connectdb();
        $conn->begin_transaction();
        try {
            $sql = "UPDATE muonsach SET  HanTra = ?, NgayGiaHan = NOW(),TongTien = TongTien +?  WHERE MaMuonSach = ? ";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sdi", $hantra,$tongtiengiahan, $mamuonsach);
            // Thực thi câu lệnh SQL
            $stmt->execute();
            foreach ($thanhtien as $masach => $data) {
                $sql = "UPDATE chitietmuonsach SET ThanhTien = ThanhTien + ? WHERE MaSach = ? AND MaMuonSach = ?";
                $stmt = $conn->prepare($sql);
                // Gắn các tham số vào câu lệnh SQL
                $stmt->bind_param("dii", $data['ThanhTien'], $masach, $mamuonsach);
                // Thực thi câu lệnh SQL
                $stmt->execute();
            }
            $conn->commit();
            return true;
        } catch (Exception $e) {
            $conn->rollback();
            return $e->getMessage();
        }
    }
    function ngaytra($mamuonsach){
        $conn = connectdb();
        $conn->begin_transaction();
        try {
            $sql = "UPDATE muonsach SET NgayTraThuc = NOW()  WHERE MaMuonSach = ? ";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i",$mamuonsach);
            // Thực thi câu lệnh SQL
            $stmt->execute();
            
            $conn->commit();
            return true;
        } catch (Exception $e) {
            $conn->rollback();
            return $e->getMessage();
        }
    }
    function xacnhantra_loi($mamuonsach, $sachcabiet,$trangthai="Bị lỗi") {
        $conn = connectdb();
        $conn->begin_transaction();
        try {
            $sql = "INSERT INTO sachcabiet(MaSach,MoTa,SoHieuBanSao,TrangThai) VALUES (?,?,?,?)";
            $stmt = $conn->prepare($sql);
            foreach ($sachcabiet as $maSach => $data) {
                if (!empty($data['SoHieuBanSao'])) {
                    // Gắn các tham số vào câu lệnh SQL
                    $stmt->bind_param("isss", $maSach, $data['MoTa'], $data['SoHieuBanSao'],$trangthai);
                    // Thực thi câu lệnh SQL
                    $stmt->execute();
                }
            }
            $conn->commit();
            return true;
        } catch (Exception $e) {
            $conn->rollback();
            return $e->getMessage();
        }
    }
    function xacnhanchomuon($mamuonsach, $masachcabiet) {
        $conn = connectdb();
        $conn->begin_transaction();
        try {
            $sql = "UPDATE chitietmuonsach SET MaSachCaBiet = ? WHERE MaSach = ? AND MaMuonSach = ?";
            $stmt = $conn->prepare($sql);
            foreach ($masachcabiet as $maSach => $data) {
                if (!empty($data['masachcabiet'])) {
                    // Gắn các tham số vào câu lệnh SQL
                    $stmt->bind_param("iii", $data['masachcabiet'], $maSach, $mamuonsach);
                    // Thực thi câu lệnh SQL
                    $stmt->execute();
                }
            }
            $conn->commit();
            return true;
        } catch (Exception $e) {
            $conn->rollback();
            return $e->getMessage();
        }
    }
    function get_all_sachloi($masach){
        return get_all("SELECT MaSachCaBiet, SoHieuBanSao FROM sachcabiet WHERE Masach = $masach");
    }
?>