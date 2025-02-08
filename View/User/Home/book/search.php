<!-- main -->
<main class="main-ctsp">
    <div id="main-sanpham" role="main">
        <div class="container-sanpham">
            <div class="book_detail">
                <nav style="--bs-breadcrumb-divider: '>'; color: white;" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=$base_url?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?=$base_url?>">Search</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?=$_GET['keyword']?></li>
                    </ol>
                </nav>
                
                    <hr>
                    <div class="gioithieu-sach">
                        <p><i class="bi bi-info-circle"></i> Sách</p>
                        <div class="container-content flex-wrap w-full">
                        <?php foreach($kq as $getSach):?>
                            <div class="content radius-5px shadou" style="width: 19%;">
                                <a href="<?=$base_url?>book/detail/<?=$getSach['MaSach']?>">
                                <img src="<?=$base_url?>Assets/Upload/sach/biasach/<?=$getSach['URL_HinhSach']?>" alt="">
                                <p class="title-content"><?=$getSach['TenSach']?></p></a>
                            </div>
                        <?php endforeach;?>
                        </div>
                    </div>
                    <hr>
                    <nav aria-label="Page navigation example ">
                        <ul class="pagination justify-content-center ">
                            <li class="page-item">
                                <a class="page-link <?=($page <= 1 ? 'disabled':'')?>" href="<?=$base_url?>book/search/<?=$_GET['keyword']?>/page/<?=$page-1?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php for($i = 1; $i <= $sotrang; $i++):?>
                            <li class="page-item <?=($page == $i ? 'active':'')?>"><a class="page-link" href="<?=$base_url?>book/search/<?=$_GET['keyword']?>/page/<?=$i?>"><?=$i?></a></li>
                        <?php endfor;?>
                            <li class="page-item">
                                <a class="page-link <?=($page >= $sotrang ? 'disabled':'')?>" href="<?=$base_url?>book/search/<?=$_GET['keyword']?>/page/<?=$page+1?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                        </nav>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="clear-both"></div>
