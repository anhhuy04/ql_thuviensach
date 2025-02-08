<!-- main -->
<main class="main-ctsp">
    <div id="main-sanpham" role="main">
        <div class="container-sanpham">
            <div class="book_detail">
                <nav style="--bs-breadcrumb-divider: '>'; color: white;" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=$base_url?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?=$base_url?>"><?=$_GET['act'] == 'danh-muc' ? "Danh mục" : ($_GET['act'] == 'the-loai' ? "Thể loại" : "")?>
                        </a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?=$getDM['TenDanhMuc']?></li>
                    </ol>
                </nav>
                <div class="book_info">
                    <!-- <div class="book_avatar" style="width: 150px; height: 200px;">
                        <img itemprop="image"
                            src="<?=$base_url?>Assets/Upload/sach/<?=$_GET['act'] == 'danh-muc' ? "danhmuc" : ''?>/<?=$getDM['URL_HinhDM']?>">
                    </div> -->
                </div>
                    <!-- <div class="book_other"> -->
                    <div class="">
                    
                        <h1 class="text-center" itemprop="name"><?=$getDM['TenDanhMuc']?></h1>
                        <div class="txt">
                            <p><?=$getDM['MoTa']?></p>
                        </div>
                    </div>
                    <div class="clear-both"></div>
                    <hr>
                    <div class="gioithieu-sach ">
                        <p><i class="bi bi-info-circle"></i> Sách</p>
                        <div class="container-content flex-wrap w-full">
                        <?php foreach($getSach as $getSach):?>
                            <div class="content radius-5px shadou" style="width: 19%;">
                                <a href="<?=$base_url?>book/detail/<?=$getSach['MaSach']?>">
                                <img src="<?=$base_url?>Assets/Upload/sach/biasach/<?=$getSach['URL_HinhSach']?>" alt="">
                                <p class="title-content"><?=$getSach['TenSach']?></p></a>
                            </div>
                        <?php endforeach;?>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</main>
<div class="clear-both"></div>
