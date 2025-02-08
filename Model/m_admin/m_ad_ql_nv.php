<?php
include "../../Model/library.php";

    function getnhanvien(){
        return get_all("SELECT * FROM nhanvien LEFT JOIN taikhoan ON nhanvien.MaTaiKhoan = taikhoan.MaTaiKhoan");
    }
?>