
<?php 
if( !isset($_SESSION['user']['MaVaiTro']) || $_SESSION['user']['MaVaiTro'] !='3' ){
    header('location: /do_an_quanlythuvien/'); // Điều hướng sau khi đăng nhập thành công
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (isset($useSelect2) && $useSelect2): ?>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <?php endif; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?=$base_url?>Assets/css/boostraps/bootstrap.css">
    <link rel="stylesheet" href="<?=$base_url?>Assets/css/admin.css">
    <link rel="stylesheet" href="<?=$base_url?>Assets/css/style.css">
    <link rel="icon" href="<?=$base_url?>Assets/img/logo/admin.png" type="icon">

    <title>Trang quản lý</title>
</head>

<body class="sb-nav-fixed ">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html"><i class="fa-solid fa-screwdriver-wrench"></i>ADMIN</a>

        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- hiện tên trang -->
        <span class="hienten"  id="title_bar"> <?= $title_bar ?></span>
        <!-- Navbar Search-->
        
        <!-- Navbar-->
        <div class="user-login ">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <!-- Thay thế icon người dùng bằng hình ảnh tròn -->
                    <a class="nav-link dropdown-toggle a-img" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="<?=$base_url?>Assets/Upload/nguoidung/<?=$_SESSION['user']['URL_HinhNguoiDung']?>" alt="User Image" class="user-img rounded-circle">
                        <span> xin chào, <?=$_SESSION['last_name_user']?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end user-login_dropdown-custom" aria-labelledby="navbarDropdown">
                        <li >
                            <a class="a_user-child" href="<?=$base_url?>user/ql_user">
                                <img src="<?=$base_url?>Assets/Upload/nguoidung/<?=$_SESSION['user']['URL_HinhNguoiDung']?>" alt="User Image" class="user-img rounded-circle">
                                <span><?=$_SESSION['user']['HoTen']?></span>
                            </a>
                        </li>
                        <?php if(isset($_SESSION['user']['MaVaiTro']) && $_SESSION['user']['MaVaiTro'] =='3' ):?>
                            <li><a class="dropdown-item" href="<?=$base_url?>book/home">Thoát trang admin</a></li>
                        <?php endif;?>
                        
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="<?=$base_url?>book/logout">Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <div class="leftmain sb-sidenav ">
                <div class="sb-sidenav-menu sb-sidenav-dark">
                    <div class="layoutSidenav_nav_content ">
                        <div class="content-link-icon">
                            <a class="nav-link <?= ($_GET["mod"])== 'home'? 'active' :''?>" data-title="Trang chủ" da href="<?=$base_url_admin?>home/home"><i class="fa-solid fa-house"></i>Trang chủ</a>
                        </div>
                        <div class="content-link-icon">
                            <a class="nav-link <?= ($_GET["mod"])== 'ql_nv'? 'active' :''?>" data-title="Quản lý nhân viên" href="<?=$base_url_admin?>ql_nv/home" ><i class="fa-solid fa-address-book"></i>Quản lý nhân viên</a>
                        </div>
                        <div class="content-link-icon">
                            <a class="nav-link <?= ($_GET["mod"])== 'ql_kh'? 'active' :''?>" data-title="Quản lý khách hàng"  href="<?=$base_url_admin?>ql_kh/xemdocgia"><i class="fa-solid fa-users"></i>Quản lý khách hàng</a>
                        </div>
                        <div class="content-link-icon">
                            <a class="nav-link <?= ($_GET["mod"])== 'ql_sach'? 'active' :''?>"" data-title="Quản lý sách"  href="<?=$base_url_admin?>ql_sach/sach"><i class="fa-solid fa-book"></i>Quản lý sách</a>
                        </div>
                        <div class="content-link-icon">
                            <a class="nav-link <?= ($_GET["mod"])== 'ql_muon_sach'? 'active' :''?>" data-title="Quản lý mượn sách"  href="<?=$base_url_admin?>ql_muon_sach/muonsach"><i class="fa-solid fa-list-check"></i>Quản lý mượn sách</a>
                        </div>
                        <!-- <div class="content-link-icon">
                            <a class="nav-link <?= ($_GET["mod"])== 'ql_dat_cho'? 'active' :''?>" data-title="Quản lý đặt chỗ"  href="<?=$base_url_admin?>ql_dat_cho/home"><i class="fa-solid fa-house"></i>Quản lý đặt chỗ</a>
                        </div> -->
                        <div class="content-link-icon">
                            <a class="nav-link <?= ($_GET["mod"])== 'ql_thongke'? 'active' :''?>" data-title="Thống kê"  href="<?=$base_url_admin?>ql_thongke/home"><i class="fa-solid fa-chart-line"></i>Thống kê</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="layoutSidenav_main" class="radius-5px ">
        <main id="mainContent">
            <?php include_once('home/' . $view_name . '.php') ?>
        </main>
        </div>
    </div>
    
    <script src="<?=$base_url?>Assets/js/togglebtn.js"></script>
    <script src="<?=$base_url?>Assets/js/admin_nav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
        <?php include "xacnhan-thongbao.php";?>

    <script>
        function showToast(type, message = '') {
            if (type === 'success') {
                var toastSuccess = document.getElementById('toastSuccess');
                toastSuccess.querySelector('.toast-body').textContent = message;
                new bootstrap.Toast(toastSuccess).show();
            } else if (type === 'error') {
                var toastError = document.getElementById('toastError');
                toastError.querySelector('.toast-body').textContent = message;
                new bootstrap.Toast(toastError).show();
            }
        }
    </script>
 
</body>

</html>