<?php
    ob_start();
    include "../../Model/m_admin/m_ad_ql_docgia.php";

    if(isset($_GET['act'])){
        switch($_GET['act']){
            case "xemdocgia":
                $manage = "xemdocgia/qldocgia_view";
                $view_docgia = getdocgia();
                if(isset($_POST["submit_khoa_tk"])){
                    $mataikhoan = $_GET["mataikhoan"];
                    if(update_trangthai_tk($mataikhoan, 2)){
                        ham_thongbao('success','Khóa tài khoản thành công');
                        header("Location: ".$base_url_admin."ql_kh/xemdocgia");
                        exit();     
                    }else{
                        ham_thongbao('error','Khóa tài khoản thất bại');
                        header("Location: ".$base_url_admin."ql_kh/xemdocgia");
                        exit();  
                    }
                }
                break;
            case 'xacnhan_tk':
                $manage = "xemdocgia/xacnhan_tk";
                $title_bar ="Xác nhận đăng ký tài khoản";
                $get_ALL_tk_xn = get_ALL_tk_xn();
                if(isset($_POST["submit_xacnhan_tk"])){
                    $mataikhoan = $_GET["mataikhoan"];
                    if(update_trangthai_tk($mataikhoan)){
                        ham_thongbao('success','xác nhận tạo tài khoản thành công');
                        header("Location: ".$base_url_admin."ql_kh/xacnhan_tk");
                        exit();     
                    }else{
                        ham_thongbao('error','xác nhận tạo tài khoản thất bại');
                        header("Location: ".$base_url_admin."ql_kh/xacnhan_tk");
                        exit();  
                    }
                }
                break;
            case 'docgia_bikhoa':
                $manage = "xemdocgia/docgia_bikhoa";
                $title_bar ="Tài khoản bị khóa";
                $get_ALL_tk_bikhoa = get_ALL_tk_bikhoa();
                if(isset($_POST["submit_mokhoa_tk"])){
                    $mataikhoan = $_GET["mataikhoan"];
                    if(update_trangthai_tk($mataikhoan)){
                        ham_thongbao('success','Mở khóa tài khoản thành công');
                        header("Location: ".$base_url_admin."ql_kh/docgia_bikhoa");
                        exit();     
                    }else{
                        ham_thongbao('error','Mở khóa tài khoản thất bại');
                        header("Location: ".$base_url_admin."ql_kh/docgia_bikhoa");
                        exit();  
                    }
                }
                break;
        }
        include_once('Home/nav_bar.php');
    }
?>