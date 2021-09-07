const uploadField = document.querySelector(".upload-file");

uploadField.addEventListener("change", function () {
  if (this.files[0].size > 2097152) {
    alert("File vượt quá 2MB!");
    this.value = "";
  }
});
