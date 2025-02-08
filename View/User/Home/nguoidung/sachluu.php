<?php if(!empty($sachluu)):?>
<div class="row justify-content-center needs-validation">
    <!-- Tiểu sử -->
    <div class="row items-center ">
        <!-- Bảng hiển thị danh sách sách đã mượn -->
        <div class="border border-secondary rounded position-relative mt-4">
            <span class="border-title text-secondary">Danh sách sách lưu</span>
            <div class="text-end">
                <a href="" class="btn btn-danger ">Xóa hết</a>
            </div>
            <div class="table-responsive">
            <table class="table text-center table-hover mt-4 table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col" style="width:94px;">Hình ảnh</th>
                        <th scope="col">Mã sách</th>
                        <th scope="col">Tên sách</th>
                        <th scope="col">Vị trí</th>
                        <th scope="col">Số lượng còn lại</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col" style="width: 200px;">Hành động</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php $stt = 1;
                        foreach($sachluu as $sachluu):
                    ?>
                    <tr>
                        <th scope="row"><div ><?=$stt?></div></th>
                        <td >
                            <div class="img-sach"><img src="<?=$base_url?>Assets/Upload/sach/biasach/<?=$sachluu["URL_HinhSach"]?>" alt=""></div>
                        </td>
                        <td><div class="hang1_table" style="max-width: 100px;min-width: 10px;"><?=$sachluu["MaSach"]?></div></td>
                        <td><div class="hang1_table" style="max-width: 200px;min-width: 100px;"><?=$sachluu["TenSach"]?></div></td>
                        <td><div class="hang1_table" style="max-width: 200px;min-width: 100px;"><?=$sachluu["ViTriSach"]?></div></td>
                        <?php if($sachluu["SLConLai"] == 0):?>
                            <td><div class="hang1_table" style="min-width: 50px;"><span class="btn btn-danger">Hết sách</span></div></td>
                        <?php else:?>
                            <td><div class="hang1_table" style="min-width: 50px;"><?=$sachluu["SLConLai"]?></div></td>
                        <?php endif;?>
                        <td><div class="hang1_table" style="max-width: 200px;min-width: 100px;"><?=$sachluu["DonGia"]?></div></td>
                        <td>
                            <div>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#actionModal" data-action="xoa" data-item="<?=$name?>" data-id="<?=$sachluu['MaSach']?>">Xóa</a>
                                <a class="btn btn-warning" href="<?=$base_url?>book/detail/<?=$sachluu['MaSach']?>">Xem sách</a>
                            </div>
                        </td>
                    </tr>
                    
                    <?php $stt++; endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
    
<?php else:?>
    <div class="text-center">
            <span colspan="10"><b>Hiện không có sách nào được lưu</b></span>    
    </div>
<?php endif;?>