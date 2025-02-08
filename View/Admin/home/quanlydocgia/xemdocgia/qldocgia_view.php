<div class="container-fluid px-4 radius-5px">
    <!-- Thanh tìm kiếm -->
    <div class="row my-4 justify-content-center boxsearch items-center">
        <div class="col-md-8 pl20">
            <input class="form-control" type="text"
                placeholder="Tìm kiếm mã tài khoản, họ tên, số điện thoại">
        </div>
        <div class="col-md-2">
            <button class="btn btn-success">tìm kiếm</button>
        </div>
        <div class="col-md-2">
            <a class="btn btn_custom_arrow_right float-end" href="">Trang thêm tài khoản <i class="bi bi-arrow-right"></i></a>
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
                            <th scope="col" style="width: 150px;">Mã tài khoản</th>
                            <th scope="col" style="width: 150px;">Họ tên</th>
                            <th scope="col" >Email</th>

                            <th scope="col" style="max-width: 200px;">Địa chỉ</th>
                            <th scope="col" >Số điện thoại</th>
                            <th class="text-center" scope="col" ">Hành động</th>
                        </tr>
                    
                    </thead>
                    <tbody class="table-group-divider"> 
                    <?php $stt = 1;
                        foreach($view_docgia as $view_docgia):
                    ?>
                        <tr >
                            <th scope="row"><?= $stt ?></th>
                            <td class="img-sach">
                                <div>
                                    <img src="../../Assets/Upload/nguoidung/<?= $view_docgia["URL_HinhNguoiDung"]?>" alt="">
                                </div>
                            </td>
                            <td><div class="truncate-fixed-height text-lg-start"><?= $view_docgia["MaTaiKhoan"] ?></div></td>
                            <td><div class="truncate-fixed-height text-lg-start"><?= $view_docgia["HoTen"] ?></div></td>
                            <td><div class="truncate-fixed-height text-lg-start"><?= $view_docgia["Email"] ?></div></td>
                            <td> <div class="truncate-fixed-height text-lg-start"> <?=$view_docgia["DiaChi"] ?> </div></td>
                            <td><div class="truncate-fixed-height text-lg-start"><?= $view_docgia["DienThoai"] ?></div></td>
                            <td class="text-center">
                                <div class="d-flex flex-wrap justify-content-center gap-2">
                                    <!-- Nút sửa ngoài trang -->
                                    <a href="<?=$base_url_admin?>ql_sach/update_BoSach/<?= $view_docgia['DienThoai'] ?>?edit=true" 
                                    class="btn btn-primary flex-fill ">Sửa</a>
                                    <a class="btn btn-danger flex-fill " 
                                    data-bs-toggle="modal" data-bs-target="#actionModal" 
                                    data-action="xoa" onclick="event.stopPropagation()">Xóa</a>
                                    <form action="<?=$base_url_admin?>ql_kh/xemdocgia?mataikhoan=<?= $view_docgia["MaTaiKhoan"] ?>" 
                                        method="post" class="flex-fill">
                                        <button name="submit_khoa_tk" class="btn btn-warning w-100">Khóa</button>
                                    </form>
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

