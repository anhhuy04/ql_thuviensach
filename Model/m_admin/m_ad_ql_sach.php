<?php
include "../../Model/library.php";
// sách ==>

//xem sách
 
    function get_nxb(){
        return get_all("SELECT DISTINCT `NhaXuatBan` FROM sach");
    }

    function book_view()
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
                GROUP BY 
                    Sach.MaSach;
            ");
    }

    function selectSachByID($masach){
        return get_one("SELECT 
            Sach.*,  -- Lấy tất cả các cột của bảng Sach
            BoSach.TenBoSach,  -- Tên bộ sách từ bảng BoSach
            GROUP_CONCAT(DISTINCT DanhMuc.TenDanhMuc SEPARATOR ', ') AS TenDanhMuc,  -- Gộp danh mục vào một cột
            GROUP_CONCAT(DISTINCT TacGia.TenTacGia SEPARATOR ', ') AS TenTacGia -- Gộp tên tác giả vào một cột
        FROM 
            Sach
        LEFT JOIN SachDanhMuc ON Sach.MaSach = SachDanhMuc.MaSach
        LEFT JOIN DanhMuc ON SachDanhMuc.MaDanhMuc = DanhMuc.MaDanhMuc
        LEFT JOIN BoSach ON Sach.MaBoSach = BoSach.MaBoSach
        LEFT JOIN SachTacGia ON Sach.MaSach = SachTacGia.MaSach
        LEFT JOIN TacGia ON SachTacGia.MaTacGia = TacGia.MaTacGia
        WHERE 
            Sach.MaSach = $masach  
        GROUP BY 
            Sach.MaSach;");
    }

    function add_book($tensach, $mota, $nxb, $ngayxb, $isbn, $file_name, $vitrisach, $ghimsach, $mabosach, $soluong, $sachconlai, $dongia, $tacgia, $danhmuc)
    {
        
        $conn = connectdb();
        // Bắt đầu giao dịch
        $conn->begin_transaction();
        try {    
            $sqlSach = "INSERT INTO Sach(TenSach, MoTa, NhaXuatBan, NgayXuatBan, ISBN, URL_HinhSach, ViTriSach, GhimSach, MaBoSach, TongSL, SLConLai, DonGia) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            // Chuẩn bị câu lệnh SQL
            $stmtSach = $conn->prepare($sqlSach);
            // Liên kết tham số với các biến
            $stmtSach->bind_param("ssssssiiiiid",$tensach, $mota, $nxb, $ngayxb, $isbn, $file_name, $vitrisach, $ghimsach, $mabosach, $soluong, $sachconlai, $dongia);
            // Thực thi câu lệnh SQL và kiểm tra lỗi
            $stmtSach->execute();
            $maSach = $conn->insert_id;

            //xử lý tác giả
            // 3. Thêm vào bảng SachTacGia
                foreach ($tacgia as $matacgia) {
                    $sqlSachTacGia = "INSERT INTO SachTacGia (MaSach, MaTacGia) VALUES (?, ?)";
                    $stmtSachTacGia = $conn->prepare($sqlSachTacGia);
                    $stmtSachTacGia->bind_param("ii", $maSach, $matacgia);
                    $stmtSachTacGia->execute();  
                }
        
            // nhập danh mục
                // Tách chuỗi thành mảng
                foreach ($danhmuc as $madanhmuc) {
                    $sqlSachdanhmuc = "INSERT INTO Sachdanhmuc (MaSach, MaDanhMuc) VALUES (?, ?)";
                    $stmtSachdanhmuc = $conn->prepare($sqlSachdanhmuc);
                    $stmtSachdanhmuc->bind_param("ii", $maSach, $madanhmuc);
                    $stmtSachdanhmuc->execute();
                }
                $conn->commit();
                return true;
        } catch (Exception $e) {
            // Nếu có lỗi, rollback
            $conn->rollback();
            return $e->getMessage();
        }
    }

    function update_book($masach, $tensach, $mota, $nxb, $ngayxb, $isbn, $file_name, $vitrisach, $ghimsach, $mabosach, $soluong, $sachconlai, $dongia, $tacgia, $danhmuc)
    {
        $conn = connectdb();
        // Bắt đầu giao dịch
        $conn->begin_transaction();
        try {
            // Cập nhật bảng Sach
            $sqlSach = "UPDATE Sach SET TenSach = ?, MoTa = ?, NhaXuatBan = ?, NgayXuatBan = ?, ISBN = ?, URL_HinhSach = ?, ViTriSach = ?, GhimSach = ?, MaBoSach = ?, TongSL = ?, SLConLai = ?, DonGia = ? WHERE MaSach = ?";
            $stmtSach = $conn->prepare($sqlSach);
            $stmtSach->bind_param("ssssssiiiiidi", $tensach, $mota, $nxb, $ngayxb, $isbn, $file_name, $vitrisach, $ghimsach, $mabosach, $soluong, $sachconlai, $dongia, $masach);
            $stmtSach->execute();

            // Xóa các liên kết cũ trong bảng SachTacGia và Sachdanhmuc
            $conn->query("DELETE FROM SachTacGia WHERE MaSach = $masach");
            $conn->query("DELETE FROM Sachdanhmuc WHERE MaSach = $masach");

            // Thêm các tác giả mới
            foreach ($tacgia as $matacgia) {
                $sqlSachTacGia = "INSERT INTO SachTacGia (MaSach, MaTacGia) VALUES (?, ?)";
                $stmtSachTacGia = $conn->prepare($sqlSachTacGia);
                $stmtSachTacGia->bind_param("ii", $masach, $matacgia);
                $stmtSachTacGia->execute();
            }

            // Thêm các danh mục mới
            foreach ($danhmuc as $madanhmuc) {
                $sqlSachdanhmuc = "INSERT INTO Sachdanhmuc (MaSach, MaDanhMuc) VALUES (?, ?)";
                $stmtSachdanhmuc = $conn->prepare($sqlSachdanhmuc);
                $stmtSachdanhmuc->bind_param("ii", $masach, $madanhmuc);
                $stmtSachdanhmuc->execute();
            }

            // Commit giao dịch
            $conn->commit();
            return true;
        } catch (Exception $e) {
            // Nếu có lỗi, rollback
            $conn->rollback();
            return $e->getMessage();
        }
    }


    function deleteSach($masach) {
        $sql = "DELETE FROM sach WHERE masach = $masach";
        return execute($sql);
    }

// danh mục
    function deletedanhmuc($madanhmuc) {
        $sql = "DELETE FROM danhmuc WHERE  MaDanhMuc= $madanhmuc";
        return execute($sql);
    }

    function selectDanhMucByID($maDM){
        $sql = "SELECT * FROM danhmuc WHERE MaDanhMuc = $maDM";
        return get_one($sql);
    }

    function get_All_danhmuc(){
        return get_all("SELECT MaDanhMuc, TenDanhMuc, MoTa, URL_HinhDM FROM danhmuc");
    }

    function add_danhmuc($tendanhmuc,$mota,$file_name){
        $conn = connectdb();
        $conn ->begin_transaction();
        try{
            $sql = "INSERT INTO danhmuc (TenDanhMuc, MoTa, URL_HinhDM) VALUES (?, ?, ?)";
            $stmtdanhmuc = $conn->prepare($sql);
            $stmtdanhmuc->bind_param("sss",$tendanhmuc, $mota, $file_name);
            $stmtdanhmuc->execute();
            $conn->commit();
            return true;
        } catch(Exception $e){
            $conn->rollback();
            return $e->getMessage();
        }
    }
    
    function update_danhmuc($tendanhmuc,$mota,$file_name,$id){
        $conn = connectdb();
        $conn->begin_transaction();
        try {
            $sql = "UPDATE danhmuc SET TenDanhMuc = ?, MoTa = ?, URL_HinhDM = ? WHERE MaDanhMuc = ?";
            $stmtdanhmuc = $conn->prepare($sql);
            $stmtdanhmuc->bind_param("sssi", $tendanhmuc, $mota, $file_name, $id);
            $stmtdanhmuc->execute();
            $conn->commit();
            return true;
        } catch (Exception $e) {
            $conn->rollback();
            return $e->getMessage();
        }
    }

// tác giả
    function deletetacgia($matg) {
        $sql = "DELETE FROM Tacgia WHERE MaTacGia = $matg";
        return execute($sql);
    }

    function add_tacgia($tentacgia, $tieusu){
        $conn = connectdb();
        $conn ->begin_transaction();
        try{
            $sql = "INSERT INTO tacgia (TenTacGia, TieuSu) VALUES (?, ?)";
            $stmttacgia = $conn->prepare($sql);
            $stmttacgia->bind_param("ss",$tentacgia, $tieusu);
            $stmttacgia->execute();
            $conn->commit();
            return true;
        } catch(Exception $e){
            $conn->rollback();
            return $e->getMessage();
        }
    }
    function update_tacgia($tentacgia, $tieusu, $id){
        $conn = connectdb();
        $conn ->begin_transaction();
        try{
            $sql = "UPDATE tacgia Set TenTacGia = ?, TieuSu = ? WHERE MaTacGia =?";
            $stmttacgia = $conn->prepare($sql);
            $stmttacgia->bind_param("ssi",$tentacgia, $tieusu, $id);
            $stmttacgia->execute();
            $conn->commit();
            return true;
        } catch(Exception $e){
            $conn->rollback();
            return $e->getMessage();
        }
    }

    function getMaTacGia($tentacgia){
        $sql = "SELECT MaTacGia FROM tacgia WHERE TenTacGia = $tentacgia";
        return get_one($sql);
    }

    function get_All_TacGia(){
        return get_all("SELECT * FROM tacgia ");
    }

    function get_TacGia_byID($id){
        return get_one($sql = "SELECT * FROM tacgia WHERE MaTacGia = $id");
    }
// Bộ sách
    function get_All_bosach(){
        return get_all("SELECT * FROM bosach ");
    }
    function get_All_mabosach(){
        return get_all("SELECT MaBoSach FROM bosach ");
    }
    function get_BoSach_ByID($id){
        return get_one("SELECT * FROM bosach WHERE MaBoSach = $id");
    }
    function add_bosach($tenbosach, $mota, $url_hinh_bosach){
        $conn = connectdb();
        $conn->begin_transaction();
        try {
            $sql = "INSERT INTO bosach(TenBoSach, MoTa, URL_HinhBoSach) VALUE (?, ?, ?)";
            $stmtbosach = $conn->prepare($sql);
            $stmtbosach->bind_param("sss",$tenbosach, $mota, $url_hinh_bosach);
            $stmtbosach->execute();
            $conn->commit();
            return true;
        } catch (Exception $e) {
            $conn->rollback();
            return $e->getMessage();
        }
    }
    function update_bosach($tenbosach,$mota,$file_name,$id){
        $conn = connectdb();
        $conn->begin_transaction();
        try {
            $sql = "UPDATE bosach SET TenBoSach = ?, MoTa = ?, URL_HinhBoSach = ? WHERE MaBoSach = ?";
            $stmtdanhmuc = $conn->prepare($sql);
            $stmtdanhmuc->bind_param("sssi", $tenbosach, $mota, $file_name, $id);
            $stmtdanhmuc->execute();
            $conn->commit();
            return true;
        } catch (Exception $e) {
            $conn->rollback();
            return $e->getMessage();
        }
    }
    function deletebosach($mabosach) {
        $sql = "DELETE FROM bosach WHERE MaBoSach = $mabosach";
        return execute($sql);
    }