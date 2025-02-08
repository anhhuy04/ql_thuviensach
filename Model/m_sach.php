<?php
   include "library.php";
    function get_All_DanhMuc(){
        return get_all("SELECT MaDanhMuc, TenDanhMuc, MoTa, URL_HinhDM FROM danhmuc");
    }

    function get_ALL_SachGhim($limit){
        return get_all("SELECT * FROM sach WHERE GhimSach = 1 LIMIT $limit");
    }

    function get_One_Sach($masach){
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
    function get_DanhMuc_1Sach($masach){
        return get_all("SELECT dm.MaDanhMuc,dm.TenDanhMuc FROM danhmuc as dm 
            LEFT JOIN sachdanhmuc as sdm on dm.MaDanhMuc = sdm.MaDanhMuc 
            WHERE sdm.MaSach =  $masach");
    }
    function get_Sach_in_DM($madanhmuc){
        return get_all("SELECT Sach.MaSach, Sach.TenSach,sach.URL_HinhSach
                FROM Sach
                JOIN SachDanhMuc ON Sach.MaSach = SachDanhMuc.MaSach
                WHERE SachDanhMuc.MaDanhMuc = $madanhmuc");
    }

    function get_sach_moi($limit = null){
        return get_all("SELECT * FROM sach ORDER BY MaSach DESC LIMIT $limit");
    }

    function get_sach_xemnhieu($limit = null){
        return get_all("SELECT * FROM sach ORDER BY luotxem DESC LIMIT $limit");
    }

    function get_sach_muonnhieu($limit = null){
        if ($limit) {
            $sql = "SELECT * FROM sach ORDER BY LuotLuu DESC LIMIT $limit";
        } else {
            $sql = "SELECT * FROM sach ORDER BY LuotLuu DESC";
        }
        return get_all($sql);
    }

    function get_danhmuc_BY_madm($madanhmuc){
        return get_one("SELECT * FROM danhmuc WHERE madanhmuc = $madanhmuc");
    }
    function book_search($keyword,$page=1){
        $batdau = ($page-1)*12;
        //1 trang 12 cuốn
        // trang 1 bắt đầu từ 0
        // trang 2 bắt đầu từ 12
        // trang n bắt đầu từ (n-1)*12
        return get_all("SELECT * FROM sach WHERE TenSach LIKE '%$keyword%' LIMIT $batdau,12");
    }
    function book_search_page_number($keyword){
        return get_query_value("SELECT count(*) sotrang FROM sach WHERE TenSach LIKE '%$keyword%'");
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
?>