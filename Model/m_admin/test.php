<?php
    <?php
    // Kết nối cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "thu_vien";  // Tên cơ sở dữ liệu
    
    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    
    // Lấy dữ liệu từ form
    $TenSach = $_POST['TenSach'];
    $MoTa = $_POST['MoTa'];
    $NhaXuatBan = $_POST['NhaXuatBan'];
    $NgayXuatBan = $_POST['NgayXuatBan'];
    $ISBN = $_POST['ISBN'];
    $URL_HinhSach = $_POST['URL_HinhSach'];
    $ViTriSach = $_POST['ViTriSach'];
    $MaBoSach = isset($_POST['MaBoSach']) ? $_POST['MaBoSach'] : NULL;
    $CreatedAt = date('Y-m-d H:i:s');
    $UpdatedAt = date('Y-m-d H:i:s');
    
    // SQL để thêm sách mới
    $sql = "INSERT INTO sach (TenSach, MoTa, NhaXuatBan, NgayXuatBan, ISBN, URL_HinhSach, ViTriSach, MaBoSach, CreatedAt, UpdatedAt)
    VALUES ('$TenSach', '$MoTa', '$NhaXuatBan', '$NgayXuatBan', '$ISBN', '$URL_HinhSach', '$ViTriSach', '$MaBoSach', '$CreatedAt', '$UpdatedAt')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Thêm sách thành công!";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
    
    // Đóng kết nối
    $conn->close();
    ?>
    // Kiểm tra ISBN có hợp lệ không
$isbn = $_POST['ISBN'];

if (!preg_match('/^\d{3}-\d{1,5}-\d{1,7}-\d{1,7}-\d{1}$/', $isbn)) {
    echo "Mã ISBN không hợp lệ!";
    exit;
}

?>

<?php
// Kết nối cơ sở dữ liệu
$conn = new mysqli("localhost", "username", "password", "database");

// 1. Thêm sách mới vào bảng Sach
$sqlSach = "INSERT INTO Sach (TenSach, MoTa, NhaXuatBan, ...) VALUES (?, ?, ?, ...)";
$stmtSach = $conn->prepare($sqlSach);
$stmtSach->bind_param("sss...", $tenSach, $moTa, $nhaXuatBan, ...);
$stmtSach->execute();

// Lấy MaSach vừa thêm
$maSach = $conn->insert_id;

// 2. Thêm tác giả nếu chưa có trong bảng TacGia
$sqlTacGia = "SELECT MaTacGia FROM TacGia WHERE TenTacGia = ?";
$stmtTacGia = $conn->prepare($sqlTacGia);
$stmtTacGia->bind_param("s", $tenTacGia);
$stmtTacGia->execute();
$resultTacGia = $stmtTacGia->get_result();

if ($resultTacGia->num_rows > 0) {
    // Tác giả đã tồn tại
    $row = $resultTacGia->fetch_assoc();
    $maTacGia = $row['MaTacGia'];
} else {
    // Thêm tác giả mới
    $sqlInsertTacGia = "INSERT INTO TacGia (TenTacGia, TieuSu, NgaySinh) VALUES (?, ?, ?)";
    $stmtInsertTacGia = $conn->prepare($sqlInsertTacGia);
    $stmtInsertTacGia->bind_param("sss", $tenTacGia, $tieuSu, $ngaySinh);
    $stmtInsertTacGia->execute();
    $maTacGia = $conn->insert_id;
}

// 3. Thêm vào bảng SachTacGia
$sqlSachTacGia = "INSERT INTO SachTacGia (MaSach, MaTacGia) VALUES (?, ?)";
$stmtSachTacGia = $conn->prepare($sqlSachTacGia);
$stmtSachTacGia->bind_param("ii", $maSach, $maTacGia);
$stmtSachTacGia->execute();

// Kiểm tra và thông báo
if ($stmtSachTacGia->affected_rows > 0) {
    echo "Thêm sách và tác giả thành công!";
} else {
    echo "Có lỗi xảy ra!";
}

$conn->close();
?>



// nhập danh mục
$maSach = 1; // Mã sách cần thêm danh mục
$tenDanhMucList = "giáo dục, y học"; // Chuỗi chứa các tên danh mục, cách nhau bởi dấu phẩy

// Tách chuỗi thành mảng
$danhMucArray = explode(', ', $tenDanhMucList);

foreach ($danhMucArray as $tenDanhMuc) {
    // Giả sử bạn có hàm `getMaDanhMuc` để lấy `MaDanhMuc` từ `TenDanhMuc`
    $maDanhMuc = getMaDanhMuc($tenDanhMuc);

    if ($maDanhMuc) { // Kiểm tra nếu `MaDanhMuc` tồn tại
        $sql = "INSERT INTO SachDanhMuc (MaSach, MaDanhMuc) VALUES ($maSach, $maDanhMuc)";

        // Thực hiện câu lệnh SQL với cơ sở dữ liệu
        if (mysqli_query($conn, $sql)) {
            echo "Thêm thành công danh mục '$tenDanhMuc' cho sách $maSach<br>";
        } else {
            echo "Lỗi: " . mysqli_error($conn) . "<br>";
        }
    } else {
        echo "Danh mục '$tenDanhMuc' không tồn tại trong hệ thống.<br>";
    }
}


// lệnh để khi lỗi ko bị tăng mã
<?php
    // Kết nối cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Bắt đầu giao dịch
$conn->begin_transaction();

try {
    // Câu lệnh INSERT vào bảng TaiKhoan
    $sql1 = "INSERT INTO TaiKhoan (TenDangNhap, MatKhauHash, VaiTro) 
             VALUES ('user123', 'hashedpassword', 'docgia')";
    $conn->query($sql1);
    
    // Câu lệnh INSERT vào bảng NhanVien hoặc NguoiDung
    $sql2 = "INSERT INTO NhanVien (MaTaiKhoan, NgayVaoLam, ChucVu) 
             VALUES (LAST_INSERT_ID(), '2024-01-01', 'nhanvien')";
    $conn->query($sql2);

    // Nếu mọi thứ đều ổn, commit giao dịch
    $conn->commit();
    echo "Thêm dữ liệu thành công!";
} catch (Exception $e) {
    // Nếu có lỗi, rollback
    $conn->rollback();
    echo "Lỗi xảy ra: " . $e->getMessage();
}

// Đóng kết nối
$conn->close();

?>