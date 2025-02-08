<?php
include "../../Model/library.php";

    function total_xacnhan_tk(){
        return get_query_value("SELECT count(*) as total FROM taikhoan WHERE MaTrangThai = 3");
    }
    function total_xacnhan_ms(){
        return get_query_value("SELECT count(*) as total FROM muonsach WHERE TrangThai = 'Chờ xác nhận'");
    }
    
?>