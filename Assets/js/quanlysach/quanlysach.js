
// hiển thị danh muc// Mã JavaScript cho menu Danh mục
document.addEventListener("DOMContentLoaded", function () {
  const inputDanhMuc = document.getElementById("multiSelectInput-danhmuc");
  const menuDanhMuc = document.getElementById("multiSelectMenu-danhmuc");
  const checkboxesDanhMuc = menuDanhMuc.querySelectorAll("input[type='checkbox']");
  const labelDanhMuc = document.getElementById("label-danhmuc");

  // Hiển thị menu khi nhấp vào input
  inputDanhMuc.addEventListener("focus", function () {
    menuDanhMuc.style.display = "flex";
  });

  // Ẩn menu khi nhấp ra ngoài
  document.addEventListener("click", function (event) {
    if (!inputDanhMuc.contains(event.target) && !menuDanhMuc.contains(event.target)) {
      menuDanhMuc.style.display = "none";
    }
  });

  // Lọc các mục trong menu dựa vào văn bản nhập vào
  inputDanhMuc.addEventListener("input", function () {
    const filter = inputDanhMuc.value.toLowerCase();
    const labels = menuDanhMuc.getElementsByTagName("label");

    for (let i = 0; i < labels.length; i++) {
      const label = labels[i];
      const text = label.textContent.toLowerCase();
      if (text.includes(filter)) {
        label.style.display = "block";
      } else {
        label.style.display = "none";
      }
    }
  });

  // Cập nhật nội dung ô input khi chọn các danh mục
  checkboxesDanhMuc.forEach((checkbox) => {
    checkbox.addEventListener("change", updateSelectedCategoriesDanhMuc);
  });
  
  function updateSelectedCategoriesDanhMuc() {
    const selectedCategories = [];
    checkboxesDanhMuc.forEach((checkbox) => {
      if (checkbox.checked) {
        selectedCategories.push(checkbox.nextElementSibling.textContent.trim());
      }
    });

    labelDanhMuc.textContent = selectedCategories.length
      ? `Danh mục: ${selectedCategories.join(", ")}`
      : "Danh mục";
  }
});

// Mã JavaScript cho menu Tác giả
document.addEventListener("DOMContentLoaded", function () {
  const inputTacGia = document.getElementById("multiSelectInput-tacgia");
  const menuTacGia = document.getElementById("multiSelectMenu-tacgia");
  const checkboxesTacGia = menuTacGia.querySelectorAll("input[type='checkbox']");
  const labelTacGia = document.getElementById("label-tacgia");

  // Hiển thị menu khi nhấp vào input
  inputTacGia.addEventListener("focus", function () {
    menuTacGia.style.display = "flex";
  });

  // Ẩn menu khi nhấp ra ngoài
  document.addEventListener("click", function (event) {
    if (!inputTacGia.contains(event.target) && !menuTacGia.contains(event.target)) {
      menuTacGia.style.display = "none";
    }
  });

  // Lọc các mục trong menu tác giả dựa vào văn bản nhập vào
  inputTacGia.addEventListener("input", function () {
    const filter = inputTacGia.value.toLowerCase();
    const labels = menuTacGia.getElementsByTagName("label");

    for (let i = 0; i < labels.length; i++) {
      const label = labels[i];
      const text = label.textContent.toLowerCase();
      if (text.includes(filter)) {
        label.style.display = "block";
      } else {
        label.style.display = "none";
      }
    }
  });

  // Cập nhật nội dung ô input khi chọn các tác giả
  checkboxesTacGia.forEach((checkbox) => {
    checkbox.addEventListener("change", updateSelectedCategoriesTacGia);
  });
  
  function updateSelectedCategoriesTacGia() {
    const selectedCategories = [];
    checkboxesTacGia.forEach((checkbox) => {
      if (checkbox.checked) {
        selectedCategories.push(checkbox.nextElementSibling.textContent.trim());
      }
    });

    labelTacGia.textContent = selectedCategories.length
      ? `Tác giả: ${selectedCategories.join(", ")}`
      : "Tác giả";
  }
});
