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
            <a href="<?=$base_url_admin?>ql_sach/themtg" class="btn btn_custom_arrow_right float-end">Trang thêm tác giả<i class="bi bi-arrow-right"></i></a>
        </div>
    </div>

    <!-- Bảng danh sách sách -->
    <div class="row">
        <div class="col table-responsive">
            <!-- Bảng ở đây -->
            <table class="table table-hover mt-4 table-fixed table-striped table-bordered text-center">
                <thead class="thead-dark">
                
                    <tr class="table-primary">
                        <th class="col-stt" scope="col" >#</th>
                        <th class="col-matg"scope="col">Mã tác giả</th>
                        <th class="col-tentg" scope="col" >Tên Tác giả</th>
                        <th scope="col" >Tiểu sử</th>
                        <th class="col-tentg"scope="col">Hành động</th>
                    </tr>
                
                </thead>
                <tbody class="table-group-divider"> 
                <?php $stt = 1;
                    foreach($tacgia_view as $tacgia_view):
                ?>
                    <tr onclick="window.location.href='<?=$base_url_admin?>ql_sach/update_TacGia/<?=$tacgia_view['MaTacGia']?>'">
                        <th scope="row"><?= $stt ?></th>
                        <td><?= $tacgia_view["MaTacGia"] ?></td>
                        <td style="max-width: 100px;"><div class="hang1_table" ><?= $tacgia_view["TenTacGia"] ?></div></td>
                        <td > <div class="truncate-fixed-height text-lg-start" style="max-width: 450px;"> <?=$tacgia_view["TieuSu"] ?> </div></td>
                        <td>
                            <a href='<?=$base_url_admin?>ql_sach/update_TacGia/<?=$tacgia_view['MaTacGia']?>?edit=true' class="btn btn-primary" onclick="event.stopPropagation();">Sửa</a>
                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#actionModal" data-action="xoa" data-item="<?=$name?>" data-id="<?=$tacgia_view['MaTacGia']?>" onclick="event.stopPropagation()">Xóa</a>
                        </td>
                    </tr>   
                    <?php $stt++; endforeach; ?>            
                </tbody>
            </table>
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
<div>