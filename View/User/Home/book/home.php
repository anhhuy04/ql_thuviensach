
<!-- main -->
<main>
<!-- Main trái -->
<div id="main-left">
    <!-- slide -->
    <div class="slideshow-container">

        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="<?=$base_url?>Assets/img/img-banner/1600w-JUT8DwjmSUI.png" style="width:100%">
            <div class="text"></div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="<?=$base_url?>Assets/img/img-banner/banner-sach-inkythuatso-13-12-42-20.jpg"
                style="width:100%">
            <div class="text"></div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="<?=$base_url?>Assets/img/img-banner/1600w-JUT8DwjmSUI.png" style="width:100%">
            <div class="text"></div>
        </div>

    </div>
    <br>
    <div style="text-align:center" class="w-full mt10">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
    <!-- sách nổi bật -->

    <div class="relative container-title" role="region">
        <section id="section-hot" class="section-conten"></section>
        <header class="pd10 flex items-center header-content">
            <div class=" flex before-content items-center w-full">
                <h2 class="">Sách Ghim </h2>
                <a href="" class="xemthem text-deco-none text-white uppercase right ">Xem thêm</a>
            </div>
        </header>
    </div>
    <div class="container-content w-94">
    <?php foreach($getSachGhim as $getSach):?>
        <div class="content radius-5px shadou">
            <a href="<?=$base_url?>book/detail/<?=$getSach['MaSach']?>">
            <img src="<?=$base_url?>Assets/Upload/sach/biasach/<?=$getSach['URL_HinhSach']?>" alt="">
            <p class="title-content"><?=$getSach['TenSach']?></p></a>
        </div>
    <?php endforeach;?>
    </div>
    <!-- sách mới -->
    <div class="clear-both"></div>
    <div class="relative container-title" role="region">
        <section id="section-new" class="section-conten"></section>
        <header class="pd10 flex items-center header-content">
            <div class=" flex before-content items-center w-full">
                <h2 class="flex ">Sách mới </h2>
                <a href="" class="xemthem text-deco-none text-white uppercase right ">Xem thêm</a>
            </div>
        </header>
    </div>

    <div class="container-content">
    <?php foreach($getSachMoi as $getSach):?>
        <div class="content radius-5px shadou">
            <a href="<?=$base_url?>book/detail/<?=$getSach['MaSach']?>">
            <img src="<?=$base_url?>Assets/Upload/sach/biasach/<?=$getSach['URL_HinhSach']?>" alt="">
            <p class="title-content"><?=$getSach['TenSach']?></p></a>
        </div>
    <?php endforeach;?>
    </div>
    <!-- sách top sach xem-->
    <div class="clear-both"></div>
    <div class="relative container-title" role="region">
        <section id="section-topxem" class="section-conten"></section>
        <header class="pd10 flex items-center header-content">
            <div class=" flex before-content items-center w-full relative">
                <h2 class="flex ">Top sách nhiều người xem </h2>
                <a href="" class="xemthem text-deco-none text-white uppercase right ">Xem thêm</a>
            </div>
        </header>
    </div>

    <div class="container-content">
    <?php foreach($getSachXemNhieu as $getSach):?>
        <div class="content radius-5px shadou">
            <a href="<?=$base_url?>book/detail/<?=$getSach['MaSach']?>">
            <img src="<?=$base_url?>Assets/Upload/sach/biasach/<?=$getSach['URL_HinhSach']?>" alt="">
            <p class="title-content"><?=$getSach['TenSach']?></p></a>
        </div>
    <?php endforeach;?>
    </div>
    <div class="clear-both"></div>
    <!-- top sach muon -->
    <div class="relative container-title" role="region">
        <section id="section-topmuon" class="section-conten"></section>
        <header class="pd10 flex items-center header-content">
            <div class=" flex before-content items-center w-full">
                <h2 class="flex ">Top sách nhiều người mượn </h2>
                <a href="" class="xemthem text-deco-none text-white uppercase right ">Xem thêm</a>
            </div>

        </header>
    </div>
    <div class="container-content">
    <?php foreach($getSachMuonNhieu as $getSach):?>
        <div class="content radius-5px shadou">
            <a href="<?=$base_url?>book/detail/<?=$getSach['MaSach']?>">
            <img src="<?=$base_url?>Assets/Upload/sach/biasach/<?=$getSach['URL_HinhSach']?>" alt="">
            <p class="title-content"><?=$getSach['TenSach']?></p></a>
        </div>
    <?php endforeach;?>
    </div>
</div>
<div class="clear-both"></div>
<!-- Menu phải -->
<div id="main-right" class="r0 pt10">
    <h3 class="ml10 dieuhuong">Thanh điều hướng</h3>
    <a href="#section-home">
        <p class="radius-5px">Home</p>
    </a>
    <a href="#section-hot">
        <p class="radius-5px">Sách Ghim</p>
    </a>
    <a href="#section-new">
        <p class="radius-5px">Sách mới</p>
    </a>
    <a href="#section-topxem">
        <p class="radius-5px">Top sách nhiều người xem</p>
    </a>
    <a href="#section-topmuon">
    <p class="radius-5px">Top sách nhiều người mượn</p>
    </a>
</div>
</main>