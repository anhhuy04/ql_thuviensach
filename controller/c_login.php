<?php
    ob_start();
    include($_SERVER['DOCUMENT_ROOT'] . '/do_an_quanlythuvien/Model/m_login.php'); // Đảm bảo include file chứa hàm user_login
    include($_SERVER['DOCUMENT_ROOT'] . '/do_an_quanlythuvien/Model/library.php'); // Đảm bảo include file chứa hàm user_logi
    // Thực hiện kiểm tra đăng nhập
    if (isset($_POST['btn-login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        // Gọi hàm user_login() sau khi include file
        $kq = user_login($username, $password);
        
        if ($kq) {
            $user = getUserInfoByMaTaiKhoan($kq['MaTaiKhoan']);
            $_SESSION['user'] = $user;
            if($user['MaTrangThai'] == '1'){
                $_SESSION['last_name_user'] = getLastName($_SESSION['user']['HoTen']);
                header('location: /do_an_quanlythuvien/'); // Điều hướng sau khi đăng nhập thành công
            }elseif($user['MaTrangThai'] == '2'){
                $_SESSION['error'] = "Tài khoản của bạn đã bị khóa vui lòng liên hệ thư viện để mở khóa";
                unset($_SESSION['user']);
                unset($_SESSION['last_name_user']);
            }elseif($user['MaTrangThai'] == '3'){
                $_SESSION['error'] = "Vui lòng chờ xác nhận tạo tài khoản.<br>Có thể liên hệ thư viện qua số điện thoại: 0839557570";
                unset($_SESSION['user']);
                unset($_SESSION['last_name_user']);
            }

        } else {
            $_SESSION['error'] = "Tài khoản đăng nhập hoặc mật khẩu không đúng";
        }
    }
    if (isset($_POST['btn-dangky'])) {
        $hoten = $_POST['hoten'];
        $tendangnhap = $_POST['tendangnhap'];
        $email = $_POST['email'];
        $dienthoai = $_POST['dienthoai'];
        $cccd = $_POST['cccd'];
        $diachi = $_POST['diachi'];
        //$matkhau = password_hash($_POST['matkhau'], PASSWORD_BCRYPT); // Mã hóa mật khẩu
        $matkhau = $_POST['matkhau']; // Mã hóa mật khẩu

        try {
            $file_name = $_FILES['user_image']['name'];
            $file_tmp = $_FILES['user_image']['tmp_name'];

            // Tải tệp lên
            if (!move_uploaded_file($file_tmp, "../../../Assets/Upload/nguoidung/" . $file_name)) {
                throw new Exception("Không thể tải tệp lên.");
            }
            
            // Thêm bộ sách
            $result = dangkytk($tendangnhap, $matkhau, $hoten, $email, $cccd, $dienthoai, $diachi, $file_name);
            if ($result !== true) {
                throw new Exception("lỗi: ".$result);
            }
            // Hiển thị thông báo thành công
            echo "<script>alert('Vui lòng chờ thư viện xác nhận đăng ký tài khoản.');window.history.back();</script>";
            exit();
        } catch (Exception $e) {
            // Hiển thị thông báo lỗi
            echo "<script>alert('Đăng ký tài khoản thất bại: " . $e->getMessage() . "');window.history.back();</script>";
            exit();
        }
    }

    if (isset($_POST['btn-laymk'])) {
        
    }

?>
