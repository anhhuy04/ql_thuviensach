<?php
    ob_start();
    include('../../config.php');
    
    if (isset($_GET['mod'])) {
        switch ($_GET['mod']) {
            case 'home':
                $ctrl_name = "c_ad_home";
                break;
            case 'ql_nv':
                $ctrl_name = "c_ad_ql_nv";
                $view_name ="quanlynhanvien/qlnhanvien_view";
                $title_bar = 'Quản lý nhân viên';
                break;
            case 'ql_kh':
                $ctrl_name = "c_ad_ql_docgia";
                $view_name ="quanlydocgia/docgia";
                $title_bar = 'Quản lý đọc giả';
                break;
            case 'ql_sach':
                $ctrl_name = "c_ad_ql_sach";
                $view_name ="quanlysach/quanlysach";
                $title_bar = 'Quản lý sách';
                break;
            case 'ql_muon_sach':
                $ctrl_name = "c_ad_ql_muon_tra";
                $view_name = "muontrasach/muontra";
                break;
            case 'ql_thongke':
                $ctrl_name = "c_ad_ql_thongke";
                $view_name = "thongke/thongke";
                $title_bar = 'Trang chủ thống kê';
                break;
            default:
                $ctrl_name = "c_ad_home";
                break;
        }
        include_once '../../controller/c_admin/'.$ctrl_name.'.php'; 
    } else{
        // Nếu không có giá trị 'mod', hiển thị trang mặc định
        header('Location: ?mod=home&act=home');
    }
    
?>