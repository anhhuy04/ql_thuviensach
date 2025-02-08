<?php
include "../../Model/library.php";

function getdocgia(){
    return get_all("SELECT * FROM taikhoan");
}
function get_ALL_tk_xn(){
    return get_all("SELECT * FROM taikhoan WHERE MaTrangThai = 3");
}

function get_ALL_tk_bikhoa(){
    return get_all("SELECT * FROM taikhoan WHERE MaTrangThai = 2");
}

function update_trangthai_tk($mataikhoan, $status = 1){
    return execute("UPDATE taikhoan SET MaTrangThai = $status WHERE MaTaiKhoan = $mataikhoan");
}


?>