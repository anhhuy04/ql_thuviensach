<?php
include_once("Model/m_user.php");
    if(isset($_GET['act'])){
        switch($_GET['act']){
            case 'ql_user':
                $mataikhoan = $_SESSION['user']['MaTaiKhoan'];
                $user = get_TaiKhoanByMaTK($mataikhoan);
                $view_name = "trangthongtinuser";
                $title_bar = 'Trang thông tin';
                break;
            case 'sachluu':
                $mataikhoan = $_SESSION['user']['MaTaiKhoan'];
                $sachluu = get_SachLuuByMaTK($mataikhoan);
                $view_name = "sachluu";
                $title_bar = 'Sách đã lưu';
                $name = "sách lưu";
                break;
            case 'giosach':
                $mataikhoan = $_SESSION['user']['MaTaiKhoan'];
                $selectGioHang = get_All_GioHang($mataikhoan);
                $view_name = "giosach";
                $title_bar = 'Sách đã lưu';
                if (isset($_POST['submit-xoasach'])) {
                    $MaSach = $_GET['masach'];
                    if (!delete_GioHang($mataikhoan, $MaSach)) {
                        echo "<script>alert('Lỗi không xóa được sách khỏi giỏ hàng');</script>";
                    }
                    header("Location: ".$_SERVER['REQUEST_URI']);
                    exit();
                }
                if (isset($_POST['submit_xoahet'])) {
                    if (!delete_GioHangByMaTK($mataikhoan)) {
                        echo "<script>alert('Lỗi không xóa được giỏ hàng');</script>";
                    }
                    header("Location: ".$_SERVER['REQUEST_URI']);
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
                    $result = add_MuonSach($mataikhoan, $ngaymuon, $ngaydukientra, $tongSoLuong, $tongThanhTien, $trangthai, $pttt, $selectGioHang, $giamuon);
                    if ($result !== true) {
                        echo "<script>alert('Lỗi không thêm được hóa đơn: ".$result."');</script>";
                    } else {
                        delete_GioHangByMaTK($mataikhoan);
                        echo "<script>alert('Chờ xác nhận mượn sách');</script>";
                    }
                    header("Location: ".$_SERVER['REQUEST_URI']);
                    exit();
                }
                break;
            case 'xemsach':
                $view_name = "viewsach";
                $title_bar = 'Lịch sử mượn sách';
                $mataikhoan = $_SESSION['user']['MaTaiKhoan'];
                $select_MuonSach = get_muonsach_damuon($mataikhoan);

                break;
            case 'doimk':
                $view_name = "doimatkhau";
                $title_bar = 'Đổi mật khẩu';
                
                if(isset($_POST["submit-doimk"])){
                    $mataikhoan = $_SESSION['user']['MaTaiKhoan'];
                    $matKhauCu = $_POST['mkcu'];
                    $matKhauMoi = $_POST['mkmoi'];
                    $result = doimk($mataikhoan, $matKhauCu, $matKhauMoi);
                    if($result !== true){
                        echo "<script>alert('".$result,"');window.history.back();</script>";
                    }else{
                        echo "<script>
                        if (confirm('Đổi mật khẩu thành công.')) {
                            window.location.href = '/do_an_quanlythuvien/book/logout';
                        } else {
                            window.history.back();
                        }
                    </script>";
                                        }
                }
                break;
            case 'delete_sachluu':
                $mataikhoan = $_SESSION['user']['MaTaiKhoan'];
                $giosach = get_SachLuuByMaTK($mataikhoan);
                $view_name = "giosach";
                $title_bar = 'Giỏ sách';
                break;
            default:
                header('Location: '.$base_url.'user/ql_user');
                break;
        }if (isset($view_name)) {
            include_once "View/User/Home/nguoidung/header.php";
        }

    }
?>