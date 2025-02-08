<!-- Modal Bootstrap -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Xác nhận thông tin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Nội dung xác nhận -->
                <table class="table text-center table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hình ảnh</th>
                            <th>Mã sách</th>
                            <th>Tên sách</th>
                            <th>Đơn giá</th>
                            <th>Phí mượn/ngày</th>
                            <th>Tổng tiền mượn</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody id="confirmTableBody">
                        <!-- Nội dung được thêm bằng JS -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7" class="text-end"><b>Tổng thành tiền:</b></td>
                            <td id="totalAmount"><b>0</b></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="mb-3">
                    <p><b>Ngày mượn:</b> <span id="confirmNgayMuon"></span></p>
                    <p><b>Ngày dự kiến trả:</b> <span id="confirmNgayTra"></span></p>
                    <p><b>Số lượng sách:</b> <span id="confirmSoLuong"></span></p>
                    <p><b>Phương thức thanh toán:</b> <span id="confirmPhuongThuc"></span></p>
                </div>
                <div id="qrCodeContainer" class="text-center mt-4" style="display: none;">
                    <p><b>Quét mã QR để thanh toán:</b></p>
                    <img src="\do_an_quanlythuvien\Assets\img\qr-chuyenkhoan\qr-thaianhhuy-chuyenkhoan.jpg" alt="Mã QR" style="max-width: 200px; height: auto; border-radius: 5px;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-primary" id="submitConfirm">Xác nhận</button>
            </div>
        </div>
    </div>
</div>
<script>
    function formatDate(dateStr) {
    const date = new Date(dateStr);
    if (isNaN(date)) return "Không hợp lệ"; // Trường hợp ngày không đúng định dạng
    const day = date.getDate().toString().padStart(2, '0');
    const month = (date.getMonth() + 1).toString().padStart(2, '0'); // Tháng bắt đầu từ 0
    const year = date.getFullYear();
    return `${day}/${month}/${year}`;
}
    function openConfirmModal() {
        
        const tableRows = document.querySelectorAll("#borrowedBooksTable tbody tr");
    const confirmTableBody = document.getElementById("confirmTableBody");
    confirmTableBody.innerHTML = ""; // Xóa dữ liệu cũ

    const ngayMuon = document.querySelector("#ngaymuon").value;
    const ngayTra = document.querySelector("#ngaydukientra").value;
    const soLuong = document.querySelector("[name='tongSoLuong']").value;
    const phuongThuc = document.querySelector("[name='pttt']").value;

    // Hiển thị thông tin ngày tháng, số lượng, và phương thức thanh toán
    document.getElementById("confirmNgayMuon").innerText = formatDate(ngayMuon);
    document.getElementById("confirmNgayTra").innerText = formatDate(ngayTra);
    document.getElementById("confirmSoLuong").innerText = soLuong;
    document.getElementById("confirmPhuongThuc").innerText = phuongThuc;

    // Kiểm tra nếu chọn phương thức thanh toán "Chuyển khoản"
    const qrCodeContainer = document.getElementById("qrCodeContainer");
    if (phuongThuc.toLowerCase() === "chuyển khoản") {
        qrCodeContainer.style.display = "block";
    } else {
        qrCodeContainer.style.display = "none";
    }
    let totalAmount = 0; // Biến lưu tổng thành tiền

    confirmTableBody.innerHTML = ""; // Xóa dữ liệu cũ trong modal

    // Duyệt qua từng dòng trong bảng và thêm vào modal
    tableRows.forEach((row, index) => {
        const stt = row.querySelector("th").innerText;
        const hinhAnh = row.querySelector("td:nth-child(2) img").src;
        const maSach = row.querySelector("td:nth-child(3)").innerText;
        const tenSach = row.querySelector("td:nth-child(4)").innerText;
        const donGia = row.querySelector("td:nth-child(5)").innerText;
        const giaMuon = row.querySelector("td:nth-child(6)").innerText;
        const tongTienMuon = row.querySelector("td:nth-child(7)").innerText;
        const thanhTien = parseFloat(row.querySelector("td:nth-child(8)").innerText);

        totalAmount += thanhTien; // Cộng giá trị thành tiền vào tổng

        // Tạo một dòng mới cho modal
        confirmTableBody.innerHTML += `
            <tr>
                <td>${stt}</td>
                <td><img src="${hinhAnh}" alt="Hình ảnh" style="width: 50px; height: auto;"></td>
                <td>${maSach}</td>
                <td>${tenSach}</td>
                <td>${donGia}</td>
                <td>${giaMuon}</td>
                <td>${tongTienMuon}</td>
                <td>${thanhTien.toLocaleString().replace(/\./g, ' ') || 0}</td>
            </tr>
        `;
    });

    // Hiển thị tổng thành tiền trong tfoot của modal
    document.getElementById("totalAmount").innerText = totalAmount.toLocaleString().replace(/\./g, ' ') || 0;

}

// Gắn sự kiện mở modal vào nút xác nhận
document.getElementById("submit-themhoadon").addEventListener("click", function (e) {
    e.preventDefault(); // Ngăn form submit ngay lập tức
    openConfirmModal();
});

// Xác nhận và submit form
document.getElementById("submitConfirm").addEventListener("click", function () {
    // Thực hiện submit form hoặc hành động xác nhận
    document.querySelector("form[novalidate]").submit();
});

</script>