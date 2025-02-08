function tinhThanhTien(){
    var dsSach = document.querySelectorAll("#borrowedBooksTable tbody tr");
    var ngaymuon = document.querySelector("#ngaymuon").value;
    var ngaydukientra = document.querySelector("#ngaydukientra").value;
    var soNgayMuon = (new Date(ngaydukientra)- new Date(ngaymuon)) / (24*60*60*1000);
    var tong = 0;
    for (const sach of dsSach) {
        var gia = Number(sach.querySelector('td:nth-childe()').innerText);
        var tien = gia * soNgayMuon;
        sach. querySelector('td:nth-child()').innerText = tien
        
        tong += tien;
    }
    document.querySelector().innerText = tong;
}