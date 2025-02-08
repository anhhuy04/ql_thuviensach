<!-- Điều hướng trang -->
<nav class="tabs">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                aria-selected="true">Quản lý sách</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                data-bs-target="#themsach-tab-pane" type="button" role="tab"
                aria-controls="themsach-tab-pane" aria-selected="false">Thêm sách mới</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                data-bs-target="#contact-tab-pane" type="button" role="tab"
                aria-controls="contact-tab-pane" aria-selected="false">Sách bị lỗi</button>
        </li>
    </ul>
</nav>
<!-- Nội dung trong trang điều hướng -->
<div class="container-fluid px-4">
    <div class="tab-content" id="myTabContent">
        <!-- from quản lý sách -->
        <div class="tab-pane fade show active " id="home-tab-pane" role="tabpanel"
            aria-labelledby="home-tab" tabindex="0">
            <!-- Thanh tìm kiếm -->
            <div class="row my-4 justify-content-center boxsearch">
                <div class="col-md-8 pl20">
                    <input class="form-control" type="text"
                        placeholder="Tìm kiếm sách, mã sách, tên tác giả, thể loại...">
                </div>
                <div class="col-md-4">
                    <button class="btn btn-success">tìm kiếm</button>
                </div>
            </div>

            <!-- Bảng danh sách sách -->
            <div class="row">
                <div class="col">
                    <!-- Bảng ở đây -->
                    <table class="table table-hover mt-4">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Mã sách</th>
                                <th scope="col" style="width: 200px;">Tên sách</th>
                                <th scope="col">Tác giả</th>
                                <th scope="col">Thể loại</th>
                                <th scope="col">Số lượng còn lại</th>
                                <th scope="col">Tổng số lượng</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td class="img-sach"><img
                                        src="../../Assets/img/img-sach/khong-ai-song-giong-ai-trong-cuoc-doi-nay-jean-paul-dubois.jpg"
                                        alt=""></td>
                                <td>100001</td>
                                <td>Harry Potter</td>
                                <td>J.K. Rowlings</td>
                                <td>Fantasy</td>
                                <td>13</td>
                                <td>15</td>
                                <td>
                                    <button class="btn btn-primary">Sửa</button>
                                    <button class="btn btn-danger">Xóa</button>
                                    <button class="btn btn-info">Xem chi tiết</button>
                                </td>
                            </tr>
                            <!-- Các dòng dữ liệu tiếp theo -->
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
        </div>
        <!-- Form thêm sach mới -->
        <div class="tab-pane fade" id="themsach-tab-pane" role="tabpanel" aria-labelledby="themsach-tab" tabindex="0">
            <div class="container mt-3 mb-3">
                <div class="row justify-content-center">
                    <div class="form-container">
                        <h2 class="text-center">Thêm Sách Mới</h2>
                        <form class="row g-3 needs-validation" action="" method="post" novalidate>

                            <div class="col-md-3 me-5">
                                <label for="URL_HinhSach" class="form-label">Hình Ảnh Sách</label>
                                <div class="row justify-content-md-center">
                                    <div class="mb-3 d-flex justify-content-center">
                                        <img id="preview" class="preview-img" src="https://via.placeholder.com/250x400" alt="Hình Sách">
                                    </div>
                                    <input class="form-control form-control-sm" type="file" id="URL_HinhSach" accept="image/*" onchange="loadFile(event)" required>
                                    <div class="invalid-feedback">
                                        Vui lòng chọn hình ảnh hợp lệ.
                                    </div>
                                </div>
                            </div>
                            <div class="  col-md-8 ">
                                <label for="validationCustom02" class="form-label">nhập tên sách</label>
                                <input type="text" class="form-control" id="validationCustom02" placeholder="Tên sách" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                                

                            </div>

                            <div class="text-center">
                                <button class="btn btn-primary" type="submit">Thêm Sách</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">tab3</div>
    </div>
</div>
</div>

<script>
    var loadFile = function(event) {
        var preview = document.getElementById('preview');
        preview.src = URL.createObjectURL(event.target.files[0]);
        preview.onload = function() {
            URL.revokeObjectURL(preview.src); // free memory
        }
    };

    // Ngăn form submit và kiểm tra tính hợp lệ
    (function() {
        'use strict';

        // Lấy tất cả các form cần kiểm tra
        var forms = document.querySelectorAll('.needs-validation');

        // Lặp qua các form để ngăn việc gửi đi khi form chưa hợp lệ
        Array.prototype.slice.call(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault(); // Ngăn chuyển trang
                    event.stopPropagation(); // Ngăn việc gửi form lên server
                }

                form.classList.add('was-validated'); // Kích hoạt CSS báo lỗi
            }, false);
        });
    })();
</script>