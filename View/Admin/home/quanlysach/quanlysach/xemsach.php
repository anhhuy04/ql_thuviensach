<div class="container-fluid px-4 radius-5px">
<!-- Thanh tìm kiếm -->
    <div class="row my-4 justify-content-center boxsearch items-center">
        <div class="col-md-8 pl20">
            <input class="form-control" type="text"
                placeholder="Tìm kiếm sách, mã sách, tên tác giả, thể loại...">
        </div>
        <div class="col-md-2">
            <button class="btn btn-success">tìm kiếm</button>
        </div>
        <div class="col-md-2">
            <a href="<?=$base_url_admin?>ql_sach/themsach" class="btn btn_custom_arrow_right float-end">Trang thêm sách <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>

<!-- Bảng danh sách sách -->
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <!-- Bảng ở đây -->
                <table class="table text-center table-hover mt-4 table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col" style="width:94px;">Hình ảnh</th>
                            <th scope="col"style="width:100px;" >Mã sách</th>
                            <th scope="col">Tên sách</th>
                            <th scope="col">Tác giả</th>
                            <th scope="col">Thể loại</th>
                            <th scope="col">Tổng số lượng</th>
                            <th scope="col">Số lượng còn lại</th>
                            <th scope="col" style="width: 150px;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php $stt = 1;
                            foreach($sach as $sach):
                        ?>
                        <tr onclick="window.location.href='<?=$base_url_admin?>ql_sach/update_book/<?=$sach['MaSach']?>'">
                            <th scope="row"><div ><?=$stt?></div></th>
                            <td >
                                <div class="img-sach"><img src="../../Assets/Upload/sach/biasach/<?=$sach["URL_HinhSach"]?>" alt=""></div>
                            </td>
                            <td><div class="hang1_table" style="max-width: 30px;min-width: 100px;"><?=$sach["MaSach"]?></div></td>
                            <td><div class="" style="max-width: 200px;min-width: 100px;"><?=$sach["TenSach"]?></div></td>
                            <td><div class="hang1_table" style="max-width: 200px;min-width: 100px;"><?=$sach["TacGia"]?></div></td>
                            <td><div class="hang1_table" style="max-width: 200px;min-width: 100px;"><?=$sach["DanhMuc"]?></div></td>
                            <td><div class="hang1_table" style="min-width: 50px;"><?=$sach["TongSL"]?></div></td>
                            <?php if($sach["SLConLai"] == 0):?>
                                <td><div class="hang1_table" style="min-width: 50px;"><span class="btn btn-danger">Hết sách</span></div></td>
                            <?php else:?>
                                <td><div class="hang1_table" style="min-width: 50px;"><?=$sach["SLConLai"]?></div></td>
                            <?php endif;?>
                            <td>
                                <div>
                                    <a href='<?=$base_url_admin?>ql_sach/update_book/<?=$sach['MaSach']?>?edit=true' class="btn btn-primary" onclick="event.stopPropagation();">Sửa</a>
                                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#actionModal" data-action="xoa" data-item="<?=$name?>" data-id="<?=$sach['MaSach']?>" onclick="event.stopPropagation()">Xóa</a>
                                </div>
                            </td>
                        </tr>
                        
                        <?php $stt++; endforeach; ?>
                    </tbody>
                </table>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1"
                            aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
