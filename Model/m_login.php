<?php
function user_login($taikhoan, $matkhau)
{
    // Truy vấn với tham số từ form
    return get_one4("SELECT * FROM taikhoan WHERE TenDangNhap = ? AND MatKhauHash = ?", [$taikhoan, $matkhau]);
}

function get_one4($sql, $params = [])
{
    $conn = connectdb();
    // Kiểm tra kết nối
    if ($conn === false) {
        die("Lỗi kết nối: " . mysqli_connect_error());
    }
    // Chuẩn bị câu lệnh truy vấn
    $stmt = mysqli_prepare($conn, $sql);
    // Kiểm tra nếu có tham số
    if ($params) {
        $types = str_repeat('s', count($params)); // Tất cả tham số là chuỗi
        mysqli_stmt_bind_param($stmt, $types, ...$params);
    }
    // Thực thi câu lệnh
    mysqli_stmt_execute($stmt);
    // Lấy kết quả
    $result = mysqli_stmt_get_result($stmt);
    // Kiểm tra nếu có dữ liệu
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false; // Không tìm thấy kết quả
    }
}
function getUserInfoByMaTaiKhoan($maTaiKhoan) {
    // Truy vấn để lấy thông tin người dùng từ bảng NguoiDung
    $sqlKhachHang = "SELECT * FROM taikhoan WHERE TaiKhoan.MaTaiKhoan = '$maTaiKhoan'";
    // Thực hiện truy vấn trên bảng NguoiDung trước
    $result = get_one($sqlKhachHang);
    // Trả về kết quả cuối cùng (có thể từ NguoiDung hoặc NhanVien)
    return $result;
}
function getLastName($fullName) {
    // Tách chuỗi họ và tên thành mảng
    $nameParts = explode(' ', trim($fullName));
    
    // Lấy phần tử cuối cùng của mảng
    $lastName = end($nameParts);
    
    return $lastName;
}
function test(){
        return "Tên đăng nhập, email hoặc CCCD đã tồn tại.";

}

function dangkytk($tenDangNhap, $matKhau, $hoTen, $email, $cccd, $dienThoai, $diaChi, $urlHinhNguoiDung = null) {
    $conn = connectDB();

    // Kiểm tra tên đăng nhập, email, hoặc cccd đã tồn tại
    $stmt = $conn->prepare("SELECT MaTaiKhoan FROM taikhoan WHERE TenDangNhap = ?");
    $stmt->bind_param("s", $tenDangNhap);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return "Tên đăng nhập đã tồn tại.";
    }

    $stmt = $conn->prepare("SELECT MaTaiKhoan FROM taikhoan WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return "Email đã tồn tại.";
    }

    $stmt = $conn->prepare("SELECT MaTaiKhoan FROM taikhoan WHERE Cccd = ?");
    $stmt->bind_param("s", $cccd);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return "CCCD đã tồn tại.";
    }

    // Thêm tài khoản mới
    // $matKhauHash = password_hash($matKhau, PASSWORD_BCRYPT);
    $stmt = $conn->prepare("INSERT INTO taikhoan (TenDangNhap, MatKhauHash, HoTen, Email, Cccd, DienThoai, DiaChi, URL_HinhNguoiDung) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $tenDangNhap, $matKhau, $hoTen, $email, $cccd, $dienThoai, $diaChi, $urlHinhNguoiDung);

    if ($stmt->execute()) {
        return true;
    } else {
        return "Đã xảy ra lỗi: " . $conn->error;
    }
}



function laymk($email) {
    $conn = connectDB();

    // Kiểm tra email tồn tại
    $stmt = $conn->prepare("SELECT MaTaiKhoan FROM taikhoan WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        return "Email không tồn tại.";
    }

    // Tạo mật khẩu tạm
    $matKhauTam = bin2hex(random_bytes(4)); // Mật khẩu tạm 8 ký tự
    $matKhauHash = password_hash($matKhauTam, PASSWORD_BCRYPT);

    // Cập nhật mật khẩu trong cơ sở dữ liệu
    $stmt = $conn->prepare("UPDATE taikhoan SET MatKhauHash = ? WHERE Email = ?");
    $stmt->bind_param("ss", $matKhauHash, $email);

    if ($stmt->execute()) {
        // Gửi email (giả sử hàm mail đã được cấu hình)
        $subject = "Đặt lại mật khẩu";
        $message = "Mật khẩu tạm của bạn là: $matKhauTam";
        $headers = "From: no-reply@example.com";

        if (mail($email, $subject, $message, $headers)) {
            return "Mật khẩu tạm đã được gửi tới email của bạn.";
        } else {
            return "Không thể gửi email. Vui lòng thử lại.";
        }
    } else {
        return "Đã xảy ra lỗi: " . $conn->error;
    }
}
?>

