<!-- thông báo  -->
<?php
if (isset($_SESSION['thongbao'])) {
  echo $_SESSION['thongbao'];
  unset($_SESSION['thongbao']); // Xóa thông báo sau khi đã hiển thị
}
?>
<!-- Toast Thông Báo Thành Công -->
<div id="toastSuccess" class="toast align-items-center position-fixed bottom-0 end-0 mb-2 m-lg-2" role="alert" aria-live="assertive" aria-atomic="true" style="z-index: 1050;">
  <div class="toast-header bg-success ">
    <strong class="me-auto text-white">Thông báo</strong>
    <button type="button" class="btn-close btn-close-white fa" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
  </div>
</div>

<!-- Toast Thông Báo Lỗi -->
<div id="toastError" class="toast align-items-center position-fixed bottom-0 end-0 mb-2 m-lg-2" role="alert" aria-live="assertive" aria-atomic="true" style="z-index: 1050;">
  <div class="toast-header bg-danger">
    <strong class="me-auto text-white">Lỗi</strong>
    <button type="button" class="btn-close btn-close-white fa" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    <!-- Nội dung lỗi sẽ được cập nhật bằng JavaScript -->
  </div>
</div>

<!-- Modal Linh Hoạt -->
<div class="modal fade" id="actionModal" tabindex="-1" aria-labelledby="actionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="actionModalLabel">Xác nhận <span class="action-title"></span> <span class="action-item"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
      </div>
      <div class="modal-body">
        Bạn có chắc chắn muốn <span class="action-title"></span> <span class="action-item"></span> này không?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
        <a id="confirmAction" class="btn">Xác nhận</a>
      </div>
    </div>
  </div>
</div>

<script>
  // Định nghĩa các URL cố định cho từng hành động và loại đối tượng
  // Định nghĩa các URL cố định cho từng hành động và loại đối tượng
  var base_url = "/do_an_quanlythuvien/";
  var base_url_admin = "/do_an_quanlythuvien/Admin/";
  const urlMap = {
    'sua': {
      'tác giả': base_url_admin + 'ql_sach/update_TacGia/',
      'danh mục': base_url_admin + 'ql_sach/update_DanhMuc/',
      'sách': base_url_admin + 'ql_sach/update_book/',
      'bộ sách': base_url_admin + 'ql_sach/update_BoSach/'
    },
    'xoa': {
      'tác giả': base_url_admin + 'ql_sach/deleteTacGia/',
      'danh mục': base_url_admin + 'ql_sach/deleteDanhMuc/',
      'sách': base_url_admin + 'ql_sach/deleteSach/',
      'bộ sách': base_url_admin + 'ql_sach/deleteBoSach/',
      'sách lưu': base_url + 'user/sachluu/delete_sachluu/'
    },
    'them': {
      'tác giả': base_url_admin + 'ql_sach/themtg/',
      'danh mục': base_url_admin + 'ql_sach/themdm/',
      'sách': base_url_admin + 'ql_sach/themsach/',
      'bộ sách': base_url_admin + 'ql_sach/thembosach/'
    }
  };

  // Định nghĩa màu sắc cho từng hành động
  const colorMap = {
    'sua': 'btn-warning',
    'xoa': 'btn-danger',
    'them': 'btn-primary'
  };

  // Lấy modal và nút xác nhận
  var actionModal = document.getElementById('actionModal');
  var confirmAction = document.getElementById('confirmAction');

  // Lắng nghe sự kiện hiển thị modal
  actionModal.addEventListener('show.bs.modal', function(event) {
    // Lấy thông tin từ nút nhấn
    var button = event.relatedTarget;
    var actionType = button.getAttribute('data-action'); // 'xem', 'sua', 'xoa'
    var itemType = button.getAttribute('data-item'); // 'tác giả', 'danh mục', 'sách'
    var itemId = button.getAttribute('data-id'); // ID của đối tượng cần thao tác

    // Lấy URL và màu từ map
    var actionUrl = urlMap[actionType][itemType] + itemId;
    var actionColor = colorMap[actionType];
    var actionText = ""
    // Cập nhật tiêu đề, nội dung và màu của modal
    if(actionType == "xoa"){
      var actionText = "xóa"
    }
    var actionTitle = document.querySelectorAll('.action-title');
    actionTitle.forEach(function(element) {
        element.textContent = actionText;
    });
    actionItem = document.querySelectorAll('.action-item');
    actionItem.forEach(function(element) {
        element.textContent = itemType;
    });
    confirmAction.setAttribute('href', actionUrl);
    confirmAction.textContent = actionText
    confirmAction.className = 'btn ' + actionColor; // Đặt màu cho nút xác nhận
  });


  // Xử lý xóa danh mục
  // var xoaModal = document.getElementById('xoaModal');
  //   xoaModal.addEventListener('show.bs.modal', function(event) {
  //   var button = event.relatedTarget; // Nút "Xóa" danh mục
  //   var title = button.getAttribute('data-ten'); // Lấy mã danh mục từ thuộc tính data-madm
  //   var link = button.getAttribute('data-link')
  //   var nutXoa = document.getElementById('nutXoa');
  //   nutXoa.setAttribute('href', link); // Cập nhật URL của nút Xóa danh mục
  //   var deleteItems = document.querySelectorAll('.delete-item');
  //   deleteItems.forEach(function(element) {
  //       element.textContent = title;
  //   });
  // });

  
</script>
