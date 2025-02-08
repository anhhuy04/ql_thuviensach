document.addEventListener('DOMContentLoaded', function () {
    const loginTab = document.getElementById('login-form-tab');
    const registerTab = document.getElementById('register-form-tab');
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
  
    // Hàm chuyển đổi giữa các tab
    function switchTabs(activeTab, inactiveTab, activeForm, inactiveForm) {
      activeTab.classList.add('active');
      inactiveTab.classList.remove('active');
  
      // Ẩn form không còn hiển thị trước khi thay đổi max-height
      inactiveForm.style.maxHeight = inactiveForm.scrollHeight + 'px'; // Đặt max-height để thu nhỏ
      setTimeout(() => {
        inactiveForm.classList.remove('show'); // Ẩn form không còn hiển thị
        inactiveForm.style.maxHeight = 0; // Đặt max-height về 0 để thu nhỏ
      }, 300); // Thời gian cho transition
  
      // Hiển thị form mới
      setTimeout(() => {
        activeForm.classList.add('show'); // Hiển thị form mới
        activeForm.style.maxHeight = activeForm.scrollHeight + 'px'; // Đặt max-height để phóng to
      }, 300); // Thời gian trễ để cho hiệu ứng thu nhỏ diễn ra
    }
  
    loginTab.addEventListener('click', function () {
      switchTabs(loginTab, registerTab, loginForm, registerForm);
    });
  
    registerTab.addEventListener('click', function () {
      switchTabs(registerTab, loginTab, registerForm, loginForm);
    });
  });
  