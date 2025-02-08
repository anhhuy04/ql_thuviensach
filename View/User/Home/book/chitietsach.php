<!-- main -->
<main class="main-ctsp">
    <div id="main-sanpham" role="main">
        <div class="container-sanpham">
            <div class="book_detail">
                <nav style="--bs-breadcrumb-divider: '>'; color: white;" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=$base_url?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?=$getOneSach['TenSach']?></li>
                    </ol>
                </nav>
                <div class="book_info">
                    <div class="book_avatar">
                        <img itemprop="image"
                            src="<?=$base_url?>Assets/Upload/sach/biasach/<?=$getOneSach['URL_HinhSach']?>">
                    </div>
                    <div class="book_other">
                        <h1 itemprop="name"><?=$getOneSach['TenSach']?></h1>
                        <div class="txt">
                            <ul class="list-info">
                                <li class="author row">
                                    <p class="name col-xs-3"><i class="fa fa-user"></i> Tác giả</p>
                                    <p class="col-xs-9"><a class="org" href=""><?=$getOneSach['TenTacGia']?></a></p>
                                </li>
                                <li class="status row">
                                    <p class="name col-xs-3"><i class="fa fa-rss"></i> Tình trạng</p>
                                    <p class="col-xs-9">
                                        <?=$getOneSach['SLConLai'] > 0 ? "Còn sách":"Hết sách" ?>
                                    </p>
                                </li>
                                <li class="status row">
                                    <p class="name col-xs-3"><i class="fa-solid fa-money-bill"></i> Giá:</p>
                                    <p class="col-xs-9 number-like"><?=$getOneSach['DonGia']?> VNĐ</p>

                                </li>
                                <li class="row">
                                    <p class="name col-xs-3"><i class="fa fa-thumbs-up"></i> Lượt thích</p>
                                    <p class="col-xs-9 number-like"><?=$getOneSach['LuotThich']?></p>
                                </li>
                                <li class="row">
                                    <p class="name col-xs-3"> <i class="fa fa-heart"></i> Lượt lưu</p>
                                    <p class="col-xs-9"><?=$getOneSach['LuotLuu']?></p>
                                </li>
                                <li class="row">
                                    <p class="name col-xs-3"><i class="fa fa-eye"></i> Lượt xem</p>
                                    <p class="col-xs-9"><?=$getOneSach['LuotXem']?></p>
                                </li>
                            </ul>
                        </div>
                        
                        <ul class="list01">
                            <?php
                            if(!empty($getDM_Sach)): 
                                foreach($getDM_Sach as $getDM_Sach): ?>
                                    <li class="li03"><a href="<?=$base_url?>book/danh-muc/<?=$getDM_Sach['MaDanhMuc']?>"><?=$getDM_Sach['TenDanhMuc']?></a></li>
                                <?php endforeach; ?>
                                <?php else: ?>
                                    <li class="li03"><a href="<?=$base_url?>book/danh-muc/0">Đang cập nhật</a></li>
                            <?php endif; ?>
                        </ul>
                        <div class="clear-both"></div>
                        <div class="menutuychon">
                            <ul>
                                <li><a href="" class="a-primary"><i class="fa fa-heart"></i>Lưu sách</a></li>
                                <li>
                                    <a href="<?=$base_url?>book/gio-sach?masach=<?=$_GET["id"]?>&dongia=<?=$getOneSach['DonGia']?>" class="a-datsach"><i class="fa-solid fa-ticket-simple"></i>Thêm vào giỏ sách</a>
                                </li>
                                <li><a href="" class="a-like"><i class="fa-solid fa-thumbs-up"></i>Thích</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clear-both"></div>
                    <hr>
                    <div class="gioithieu-sach">
                        <p><i class="bi bi-info-circle"></i> Giới thiệu</p>
                        <p id="noidung" class="collapsed">
                            <?=$getOneSach['MoTa']?>
                        </p>
                        <hr style="margin-bottom: 1px;">
                        <p style="text-align: center;">
                            <button type="button" class="btn btn-primary" id="toggleButton">Xem thêm</button>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
<div class="clear-both"></div>
