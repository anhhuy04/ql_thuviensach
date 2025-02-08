<?php
    ob_start();
    include "../../Model/m_admin/m_ad_ql_muon_tra.php";

    if(isset($_GET['act'])){
        switch($_GET['act']){
        //muonsach
            case "muonsach":
                $manage = 'muonsach/view_muon_sach';
                $title_bar = 'Trang chủ mượn sách';
                $select_MuonSach = array_merge(get_muonsach("Đang mượn"), get_muonsach("Gia hạn"));
                // if(isset($_POST['matrasach'])){
                //     $id=($_POST['matrasach']);
                //     try {
                //         $tenbang = "muonsach";
                //         $trangthaimuondoi = "Đã trả";
                //         if(!update_trangthai_muonsach($tenbang, $trangthaimuondoi, $id)){
                //             ham_thongbao("error","Không trả được sách");
                //             header("Location: ".$_SERVER['HTTP_REFERER']);
                //             exit();
                //         }elseif (update_trangthai_muonsach('chitietmuonsach', $trangthaimuondoi, $id)) {
                //             $machitiet = get_ALL_MaSach_chitietmuonsach($id);
                //             foreach ($machitiet as $machitiet) {
                //                 update_soluongtrasach(1, $machitiet['MaSach']);
                //             }
                //         }
                //         ham_thongbao("success","Trả sách thành công");

                //     } catch (Exception $e) {
                //         ham_thongbao("error","Lỗi: ".$e->getMessage());
                //         header("Location: ".$_SERVER['HTTP_REFERER']);
                //         exit();
                //     }
                //     header("Location: ".$_SERVER['HTTP_REFERER']);
                //     exit();
                // }
                break;
            case "tra_sach":
                $manage = 'muonsach/tra_sach';
                $title_bar = 'Trả sách';
                $trangthai = "Đã trả";
                if(isset($_GET['mamuonsach'])){
                        $mamuonsach = $_GET['mamuonsach'];
                        $details = get_chitiet_muonsach_xacnhanmuon($mamuonsach);
                        // Lấy thông tin mượn sách
                        $muonsach = get_One_MuonSach($mamuonsach);
                    try {
                        $sachcabiet = $_POST['sohieubansao'];
                        // Lấy chi tiết mượn sách
                        $trangthaimuondoi = "Đã trả";
                        if(isset($_POST["submit-xacnhan"])){
                            $mamuonsach = $_GET['mamuonsach'];
                            $sachcabiet = $_POST['sohieubansao'];
                            $trangthaimuondoi = "Đã trả";
                            $result = xacnhantra_loi($mamuonsach, $sachcabiet);
                            if($result !== true){
                                throw new Exception("Lỗi khi trả sách: ".$result);
                            }
                            if(!ngaytra($mamuonsach)){
                                throw new Exception("Lỗi khi trả sách: ");
                            }
                            if(!update_trangthai_muonsach('muonsach', $trangthaimuondoi, $mamuonsach)){
                                throw new Exception("Lỗi khi trả sách: ");
                            }
                            if (!update_trangthai_muonsach('chitietmuonsach', $trangthaimuondoi, $mamuonsach)) {
                                throw new Exception("Lỗi khi trả sách: ");
                            } else {
                                $machitiet = get_ALL_MaSach_chitietmuonsach($mamuonsach);
                                foreach ($machitiet as $machitiet) {
                                    update_soluongtrasach(1, $machitiet['MaSach']);
                                }
                            }
                            ham_thongbao("success","Trả sách thành công");
                            header("Location: ".$base_url_admin."ql_muon_sach/muonsach");
                        exit();
                        }
                    } catch (Exception $e) {
                        ham_thongbao("error","Lỗi: ".$e->getMessage());
                        header("Location: ".$base_url_admin."ql_muon_sach/muonsach");
                        exit();
                    }
                    
                }
                break;
            case "detail_giahan":
                $manage = 'giahan/detail_gia_han';
                $title_bar = 'Chi tiết gia hạn sách';
                if(isset($_GET['mamuonsach'])){
                    try{
                        $mamuonsach = $_GET['mamuonsach'];
                        // Lấy chi tiết mượn sách
                        $details = get_chitiet_muonsach_giahan($mamuonsach);
                        // Lấy thông tin mượn sách
                        $test = ($details);
                        $muonsach = get_One_MuonSach($mamuonsach);
                        if(isset($_POST['submit-xacnhan'])){
                            $mamuonsach = $_GET['mamuonsach'];
                            $thanhtien = $_POST['tongtien'];
                            $tongtiengiahan = $_POST['tongtiengiahan'];
                            $hantra = date_format(date_create($_POST['giahanngay']),"Y-m-d H:i:s") ?? 0;
                            $trangthai = "Gia hạn";
                            $result = xacnhan_giahan($hantra, $mamuonsach,$thanhtien, $tongtiengiahan);
                            if($result !== true){
                                throw new Exception("Lỗi khi gia hạn sách: ".$result);
                            }
                            $result = update_trangthai_muonsach('muonsach', $trangthai, $mamuonsach);
                            if($result !== true){
                                throw new Exception("Lỗi khi cập nhật trạng thái mượn sách: ".$result);
                            }
                             foreach ($thanhtien as $key => $value) {
                                $result = update_trangthai_muonsach('chitietmuonsach', $trangthai, $mamuonsach);
                                if($result !== true){
                                    throw new Exception("Lỗi khi cập nhật trạng thái mượn sách: ".$result);
                                }
                            }
                            ham_thongbao("success","Gia hạn thành công thành công");

                            header("Location: ".$base_url_admin."ql_muon_sach/muonsach");
                            exit();
                        }
                    }catch(Exception $e){
                        ham_thongbao("error","Lỗi: ".$e->getMessage());
                        header("Location: ".$_SERVER['HTTP_REFERER']);
                        exit();
                    }
                }
                break;
            case "add_MuonSach":
                try{
                    $manage = 'muonsach/add_muon_sach';
                    $title_bar = 'Mượn sách';
                    $selectMaTK = get_All_MaTK();
                    $selectMaSach =search_book("");
                    $id_user='';
                    $id_book='';
                    $giohang = true;
                    if (isset($_GET['search_id_user'])) {
                        $id_user = $_GET["search_id_user"];
                        if(!$selectKH = get_One_KH($id_user)){
                            throw new Exception("Mã tài khoản ".$id_user." không tồn tại");
                        }
                        if(!$selectGioHang = get_All_GioHang($id_user)){
                            $giohang = false;
                        }
                    }
                    if (isset($_GET['search_id_book'])) {
                        $id_book = $_GET['search_id_book'];
                        if(!$selectBook = search_book($id_book)){
                            throw new Exception("Không có sách nào phù hợp với từ khóa ".$id_book."");
                        }
                    }
                    
                    //$_SERVER['HTTP_REFERER']: lấy url trước đó
                    //REQUEST_URI: lấy url hiện tại
                    if (isset($_POST['submit-muonsach'])) {
                        $MaSach = $_GET['masach'];
                        $GiaMuon = max($_GET['dongia']*0.5/100,500);
                        $SoLuong = 1;
                        if (isset($_GET['search_id_user'])) {
                            $MaTaiKhoan = $id_user;
                        }else{
                            throw new Exception("Lỗi bạn chưa nhập người dùng");
                            header("Location: ".$_SERVER['HTTP_REFERER']);
                            exit();
                        }
                        if(!insert_GioHang($MaTaiKhoan, $MaSach, $GiaMuon, $SoLuong)){
                            throw new Exception("lỗi ko thêm được vào giỏ sách");
                            header("Location: ".$_SERVER['HTTP_REFERER']);
                            exit();
                        }
                        
                        header("Location: ".$_SERVER['HTTP_REFERER']);
                            exit();
                    }
                    if (isset($_POST['submit-xoasach'])) {
                        if (isset($_GET['search_id_user'])) {
                            $MaTaiKhoan = $id_user;
                        }else{
                            throw new Exception("Lỗi bạn chưa nhập người dùng");
                            header("Location: ".$_SERVER['HTTP_REFERER']);
                            exit();
                        }
                        if(!$MaSach = $_GET['masach']){
                            throw new Exception("lỗi ko xóa được khỏi giỏ sách. Không có mã sách ");
                        };
                        if(!delete_GioHang($MaTaiKhoan, $MaSach)){
                            throw new Exception("lỗi ko xóa được khỏi giỏ sách");
                        }
                        header("Location: ".$_SERVER['HTTP_REFERER']);
                        exit();
                    }
                    if (isset($_POST['submit_xoahet'])) {
                        if (isset($_GET['search_id_user'])) {
                            $MaTaiKhoan = $id_user;
                        }else{
                            throw new Exception("Lỗi bạn chưa nhập người dùng");
                        }
                        
                        if(!delete_GioHangByMaTK($MaTaiKhoan)){
                            throw new Exception("lỗi ko xóa được khỏi giỏ sách");
                        }

                        header("Location: ".$_SERVER['HTTP_REFERER']);
                        exit();
                    }
                    if (isset($_POST['submit-themhoadon'])) {
                        $giamuon = $_POST["muonsach"];
                        $tongSoLuong = $_POST['tongSoLuong'] ?? 0;
                        $tongThanhTien = $_POST['tongThanhTien'] ?? 0;
                        $ngaymuon = date_format(date_create($_POST['ngaymuon']),"Y-m-d H:i:s") ?? 0;
                        $ngaydukientra = date_format(date_create($_POST['ngaydukientra']),"Y-m-d H:i:s") ?? 0;
                        $pttt = $_POST['pttt'];
                        $trangthai = "Chờ xác nhận";    
                        $result = add_MuonSach($id_user,$ngaymuon, $ngaydukientra,$tongSoLuong, $tongThanhTien, $trangthai, $pttt, $selectGioHang, $giamuon);
                        if($result !== true){
                            ham_thongbao("error","Lỗi: không thêm được hóa đơn". $result);
                            header("Location: ".$_SERVER['HTTP_REFERER']);
                        }else{
                            delete_GioHangByMaTK($id_user);
                        }
                        ham_thongbao("success","Chờ xác nhận mượn sách");
                        header("Location: ".$_SERVER['HTTP_REFERER']);
                        exit();
                    }
                }catch(Exception $e){
                    ham_thongbao("error","Lỗi: ".$e->getMessage());
                    header("Location: ".$_SERVER['HTTP_REFERER']);
                    exit();
                }
                break;
            case "trasach":
                $manage = 'trasach/view_tra_sach';
                $title_bar = 'Trang chủ trả sách sách';
                $trangthai = "Đã trả";
                $select_MuonSach = get_muonsach($trangthai);
                break;
            case "sachquahan":
                $manage = 'quahantra/view_sachquahantra';
                $title_bar = 'Sách quá hạn trả';
                $select_MuonSach = get_sachquahantra();
                break;
            case "choxacnhan":
                $manage = 'choxacnhan/view_sach_cho_xac_nhan';
                $title_bar = 'Sách chờ xác nhận';
                $select_MuonSach = get_muonsach("Chờ xác nhận");

                break;
            case "detail_muon_sach":
                $manage = 'choxacnhan/detail_muon_sach';
                $title_bar = 'Chi tiết mượn sách';
                if(isset($_GET['mamuonsach'])){
                    $mamuonsach = $_GET['mamuonsach'];
                    // Lấy chi tiết mượn sách
                    $details = get_chitiet_muonsach_xacnhanmuon($mamuonsach);
                    // Lấy thông tin mượn sách
                    $muonsach = get_One_MuonSach($mamuonsach);
                
                    if(isset($_POST['submit-xacnhan'])){
                        try{
                        $mamuonsach = $_GET['mamuonsach'];
                        $masachcabiet = $_POST['masachcabiet'];
                        // Xác nhận cho mượn sách
                        // Gọi hàm update_trangthai_muonsach và kiểm tra kết quả
                        $result = update_trangthai_muonsach('muonsach', 'Đang mượn', $mamuonsach);
                        if ($result !== true) {
                            throw new Exception("Lỗi khi cập nhật trạng thái mượn sách: " . $result);
                        }

                        $result = xacnhanchomuon($mamuonsach, $masachcabiet);
                        if ($result !== true) {
                            ham_thongbao("error","Lỗi: ".$result);
                        } else {
                            foreach ($details as $detail) {
                                update_soluongmuonsach(1, $detail['MaSach']);
                            }
                            
                            ham_thongbao("success","Xác nhận sách thành công");
                        }
                        $result = update_trangthai_muonsach('chitietmuonsach', 'Đang mượn', $mamuonsach);
                        if ($result !== true) {
                            throw new Exception("Lỗi khi cập nhật trạng thái chi tiết mượn sách: " . $result);
                        }
                        
                            ham_thongbao("success","Xác nhận sách thành công");
                                header("Location: ".$base_url_admin."ql_muon_sach/muonsach");
                                exit();
                      
                    }catch(Exception $e){
                        ham_thongbao("error","Lỗi: ".$e->getMessage());
                        header("Location: ".$_SERVER['HTTP_REFERER']);
                        exit();
                    }}
                }
                break;
            case "giahan":
                $manage = 'giahan/view_gia_han_sach';
                $title_bar = 'Gia hạn sách';
                $select_MuonSach = get_muonsach("Gia hạn");

                if(isset($_POST['magiahan']) && isset($_POST['ngaygiahan'])){
                    $id = $_POST['magiahan'];
                    $ngaygiahan = date_format(date_create($_POST['ngaygiahan']), "Y-m-d");
                    // $hantra = hantra
                    try {
                        $tenbang = "muonsach";
                        $trangthaimuondoi = "Gia hạn";
                        if(!update_trangthai_muonsach($tenbang, $trangthaimuondoi, $id)){
                            ham_thongbao("error","Không gia hạn được sách");
                            header("Location: ".$_SERVER['HTTP_REFERER']);
                            exit();
                        }elseif (update_hantra_chitietmuonsach($id, $ngaygiahan)) {
                            ham_thongbao("success","Gia hạn sách thành công");
                        }
                    } catch (Exception $e) {
                        ham_thongbao("error","Lỗi: ".$e->getMessage());
                        header("Location: ".$_SERVER['HTTP_REFERER']);
                        exit();
                    }
                    header("Location: ".$_SERVER['HTTP_REFERER']);
                    exit();
                }
                break;
            case "detail_view":
                $manage = 'muonsach/detail_view';
                $title_bar = 'Chi tiết mượn sách';
                if(isset($_GET['mamuonsach'])){
                    $mamuonsach = $_GET['mamuonsach'];
                    // Lấy chi tiết mượn sách
                    $details = get_chitiet_muonsach($mamuonsach);
                    // Lấy thông tin mượn sách
                    $muonsach = get_One_MuonSach($mamuonsach);
                }
                break;
        }
        include_once('Home/nav_bar.php');
    }
?>