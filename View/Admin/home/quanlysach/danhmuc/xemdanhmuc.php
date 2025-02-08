<div class="container-fluid px-4 radius-5px">
    <!-- Thanh tìm kiếm -->
    <div class="row my-4 justify-content-center boxsearch items-center">
        <div class="col-md-8 pl20">
            <input class="form-control" type="text"
                placeholder="Tìm kiếm tên danh mục, mã danh mục">
        </div>
        <div class="col-md-2">
            <button class="btn btn-success">tìm kiếm</button>
        </div>
        <div class="col-md-2">
            <a class="btn btn_custom_arrow_right float-end" href="<?=$base_url_admin?>ql_sach/themdm">Trang thêm danh mục <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>

    <!-- Bảng danh sách sách -->
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                
                <!-- Bảng ở đây -->
                <table class="table text-center table-hover mt-4 table-fixed table-bordered table-striped">
                    <thead class="thead-dark">
                    
                        <tr>
                            <th scope="col" style="width: 100px">STT</th>
                            <th class="text-center" scope="col" style="width: 200px">Hình ảnh</th>
                            <th scope="col" style="width: 150px;">Mã danh mục</th>
                            <th scope="col" style="max-width: 200px;">Tên danh mục</th>
                            <th scope="col" >Mô tả</th>
                            <th class="text-center" scope="col" ">Hành động</th>
                        </tr>
                    
                    </thead>
                    <tbody class="table-group-divider"> 
                    <?php $stt = 1;
                        foreach($danhmuc_view as $danhmuc_view):
                    ?>
                        <tr onclick="window.location.href='<?=$base_url_admin?>ql_sach/update_DanhMuc/<?= $danhmuc_view['MaDanhMuc'] ?>'">
                            <th scope="row"><?= $stt ?></th>
                            <td class="img-sach">
                                <div>
                                    <img src="../../Assets/Upload/sach/danhmuc/<?= $danhmuc_view["URL_HinhDM"]?>" alt="">
                                </div>
                            </td>
                            <td><?= $danhmuc_view["MaDanhMuc"] ?></td>
                            <td><div class="truncate-fixed-height text-lg-start"><?= $danhmuc_view["TenDanhMuc"] ?></div></td>
                            <td> <div class="truncate-fixed-height text-lg-start"> <?=$danhmuc_view["MoTa"] ?> </div></td>
                            <td class="text-center">
                                <!-- Nút sửa ngoài trang -->
                                <a href="<?=$base_url_admin?>ql_sach/update_DanhMuc/<?= $danhmuc_view['MaDanhMuc'] ?>?edit=true" 
                                class="btn btn-primary">Sửa</a>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#actionModal" data-action="xoa" data-item="<?=$name?>" data-id="<?= $danhmuc_view["MaDanhMuc"] ?>" onclick="event.stopPropagation()">Xóa</a>
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