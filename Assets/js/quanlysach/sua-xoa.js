document.getElementById("editButton").addEventListener("click", function () {
  document.getElementById("saveButton").classList.remove("d-none");
  document.getElementById("editButton").classList.add("d-none");
  
  // Tìm tất cả các input và textarea trong form và kiểm tra nếu có thuộc tính disabled
  let inputs = document.querySelectorAll("form input, form textarea, form select");

  inputs.forEach(input => {
      if (input.hasAttribute("disabled")) {
          input.removeAttribute("disabled");
      }
  });
});
var loadFile = function (event) {
  var preview = document.getElementById("preview");
  preview.src = URL.createObjectURL(event.target.files[0]);
  preview.onload = function () {
    URL.revokeObjectURL(preview.src); // free memory
  };
};
