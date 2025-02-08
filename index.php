<?php
    ob_start();
    include_once('config.php');

    if (isset($_GET['mod'])) {
        switch ($_GET['mod']) {
            case 'book':
                include_once "Model/m_sach.php";
                $danhmuc_view = get_All_DanhMuc();
                include "View/User/Home/header.php";
                    $ctrl_name = 'c_book';
                    $view_name = 'book/home';


                include_once 'controller/'.$ctrl_name.'.php';
                include "View/User/Home/footer.php";

                break;
            case 'user':
                $ctrl_name = "c_user";
                include_once 'controller/'.$ctrl_name.'.php';
                break;
            default:
                $ctrl_name = "c_book";
                include_once 'controller/'.$ctrl_name.'.php';
                break;
        }
    } else{
        // Nếu không có giá trị 'mod', hiển thị trang mặc định
        header('Location: '.$base_url.'book/home');
    }

?>