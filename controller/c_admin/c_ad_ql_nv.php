<?php
    ob_start();
    include "../../Model/m_admin/m_ad_ql_nv.php";

    if(isset($_GET['act'])){
        switch($_GET['act']){
            case "home":
                $view_nhanvien = getnhanvien();
                break;
        }
        include_once('Home/nav_bar.php');
    }
?>