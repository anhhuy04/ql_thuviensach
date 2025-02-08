
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
                        foreach($get_ALL_tk_xn as $get_ALL_tk_xn):
                    ?>
                        <tr >
                            <th scope="row"><?= $stt ?></th>
                            <td class="img-sach">
                                <div>
                                    <img src="../../Assets/Upload/nguoidung/<?= $get_ALL_tk_xn["URL_HinhNguoiDung"]?>" alt="">
                                </div>
                            </td>
                            <td><div class="truncate-fixed-height text-lg-start"><?= $get_ALL_tk_xn["MaTaiKhoan"] ?></div></td>
                            <td><div class="truncate-fixed-height text-lg-start"><?= $get_ALL_tk_xn["HoTen"] ?></div></td>
                            <td><div class="truncate-fixed-height text-lg-start"><?= $get_ALL_tk_xn["Email"] ?></div></td>
                            <td> <div class="truncate-fixed-height text-lg-start"> <?=$get_ALL_tk_xn["DiaChi"] ?> </div></td>
                            <td><div class="truncate-fixed-height text-lg-start"><?= $get_ALL_tk_xn["DienThoai"] ?></div></td>
                            <td class="text-center">
                                <!-- Nút sửa ngoài trang -->
                                 <form class="d-flex flex-wrap justify-content-center gap-2" action="<?=$base_url_admin?>ql_kh/xacnhan_tk?mataikhoan=<?= $get_ALL_tk_xn["MaTaiKhoan"] ?>" method="post">
                                    <button name="submit_xacnhan_tk" class="btn btn-primary flex-fill">Xác nhận tạo</button>
                                    <button name="submit_xoa_tk" class="btn btn-danger flex-fill">Xóa</button>
                                 </form>
                                
                                <!-- <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#actionModal" data-action="xoa" data-item="<?=$name?>" data-id="<?= $get_ALL_tk_xn['MaBoSach'] ?>" onclick="event.stopPropagation()">Xóa</a> -->
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

