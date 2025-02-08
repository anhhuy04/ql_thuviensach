
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

    <title>Trang người dùng</title>
</head>

<body class="sb-nav-fixed ">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html"><i class="fa-solid fa-user"></i>USER</a>

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
                            <a class="a_user-child" href="">
                                <img src="<?=$base_url?>Assets/Upload/nguoidung/<?=$_SESSION['user']['URL_HinhNguoiDung']?>" alt="User Image" class="user-img rounded-circle">
                                <span><?=$_SESSION['user']['HoTen']?></span>
                            </a>
                        </li>
                        
                        <?php if(isset($_SESSION['user']['MaVaiTro']) && $_SESSION['user']['MaVaiTro'] =='3' ):?>
                            <li><a class="dropdown-item" href="<?=$base_url?>Admin/home/home">Trang ADMIN</a></li>
                        <?php elseif(isset($_SESSION['user']['MaVaiTro']) && $_SESSION['user']['MaVaiTro'] =='2' ):?>
                            <li><a class="dropdown-item" href="<?=$base_url?>book/trangql">Trang quản lý</a></li>  
                        <?php endif;?>

                        <li><a class="dropdown-item" href="<?=$base_url?>book/home">Thoát trang người dùng</a></li>

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
                            <a class="nav-link <?= ($_GET["act"])== 'ql_user'? 'active' :''?>" data-title="Trang chủ" da href="<?=$base_url?>user/ql_user"><i class="fa-solid fa-address-book"></i>Hồ sơ</a>
                        </div>
                        <div class="content-link-icon">
                            <a class="nav-link <?= ($_GET["act"])== 'doimk'? 'active' :''?>" data-title="Quản lý nhân viên" href="<?=$base_url?>user/doimk" ><i class="bi bi-key-fill"></i>Đổi mật khẩu</a>
                        </div>
                        <div class="content-link-icon">
                            <a class="nav-link <?= ($_GET["act"])== 'sachluu'? 'active' :''?>" data-title="Quản lý khách hàng"  href="<?=$base_url?>user/sachluu"><i class="fa-solid fa-book"></i>Sách đã lưu</a>
                        </div>
                        <div class="content-link-icon">
                            <a class="nav-link <?= ($_GET["act"])== 'giosach'? 'active' :''?>"" data-title="Quản lý sách"  href="<?=$base_url?>user/giosach"><i class="bi bi-basket"></i>Giỏ hàng</a>
                        </div>
                        <div class="content-link-icon">
                            <a class="nav-link <?= ($_GET["act"])== 'xemsach'? 'active' :''?>"" data-title="Quản lý sách"  href="<?=$base_url?>user/xemsach"><i class="bi bi-book"></i></i>Xem sách</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="layoutSidenav_main" class="radius-5px ">
        <main id="mainContent">
            <div class="container-fluid px-4 radius-5px">
                <?php include_once("View/User/Home/nguoidung/".$view_name . '.php') ?>
            </div>
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
        <?php include ("View/Admin/home/xacnhan-thongbao.php");?>
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