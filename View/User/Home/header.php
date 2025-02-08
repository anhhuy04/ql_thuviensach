
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thư viện sách</title>
    <!-- Linl css -->
    <link rel="stylesheet" href="<?=$base_url?>Assets/css/boostraps/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$base_url?>Assets/css/main.css">
    <link rel="stylesheet" href="<?=$base_url?>Assets/css/style.css">

    <!-- Link Icon -->
    <link rel="icon" href="<?=$base_url?>Assets/img/logo/Logo_home.png" type="icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="body-home">
    <!-- header -->
    <section id="section-home"></section>
    <header id="header-home" class="header d-flex align-items-center fixed-top">
        <div class="nav-container"></div>
        <div class="logo">
            <a href="<?=$base_url?>"><img src="<?=$base_url?>Assets/img/logo/Logo_home.png" alt="Thuvien Logo"></a>
        </div>
        <nav>
            <ul class="nav-links">
                <li class="dropdowns">
                    <a href="<?=$base_url?>">Trang chủ</i></a>

                </li>
                <li class="dropdowns">
                    <a href="#">Danh mục<i class="fa-solid fa-caret-right fa-xs"></i></a>
                    <ul class="dropdown-menu-custom shadou">
                        <?php foreach($danhmuc_view as $danhmuc_view): ?>
                            <li><a href="<?=$base_url?>book/danh-muc/<?=$danhmuc_view['MaDanhMuc']?>"><?=$danhmuc_view['TenDanhMuc']?></a></li>
                        <?php endforeach; ?>            
                    </ul>
                </li>
            </ul>
        </nav>
        <form class="search-box" action="<?=$base_url?>book/search" method="post">
                <input type="text" name="keyword" placeholder="Tìm kiếm...">
                <button><i class="fas fa-search"></i></button>
        </form>
        <?php if (!isset($_SESSION['user'])): ?>
            <div class="login-home">
                <a href="<?=$base_url?>book/login">Login</a>
            </div>
        <?php else: ?>
            <div class="user-login ">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <!-- Thay thế icon người dùng bằng hình ảnh tròn -->
                    <a class="nav-link dropdown-toggle a-img" id="navbarDropdown" href="" role="button" data-bs-toggle="dropdown"
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
                            <li><a class="dropdown-item" href="<?=$base_url?>Admin/home/home">Trang ADMIN</a></li>
                        <?php elseif(isset($_SESSION['user']['MaVaiTro']) && $_SESSION['user']['MaVaiTro'] =='2' ):?>
                            <li><a class="dropdown-item" href="<?=$base_url?>book/trangql">Trang quản lý</a></li>  
                        <?php endif;?>
                        
                        <li><a class="dropdown-item" href="<?=$base_url?>user/sachluu">Sách đã Lưu</a></li>
                        <li><a class="dropdown-item" href="<?=$base_url?>user/giosach">Giỏ hàng</a></li>
                        <li>
                            <hr class="dropdown-divider"/>
                        </li>
                        <li><a class="dropdown-item" href="<?=$base_url?>book/logout">Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <?php endif; ?>
        </div>
    </header>
    <div class="clear-both"></div>
