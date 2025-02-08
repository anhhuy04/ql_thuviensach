<?php
    ob_start();
    include "../../Model/m_admin/m_ad_ql_home.php";

    if(isset($_GET['act'])){
        switch($_GET['act']){
            case 'home':
                $view_name ="trangchu/ad_home";
                $title_bar ="Home";
                $total_xacnhan_tk = total_xacnhan_tk();
                $total_xacnhan_ms = total_xacnhan_ms();
                break;
            
            default:
                $view_name ="trangchu/ad_home";
                $title_bar ="Home";
                break;
        }
        include_once('Home/nav_bar.php');
    }
?>  