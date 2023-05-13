$(document).ready(function () {
  // Mostrar vista previa de la imagen seleccionada
  $("#imagen").on("change", function () {
    var file = this.files[0];
    if (file) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $("#preview").html(
          '<img src="' +
            e.target.result +
            '" class="img-thumbnail" width="200">'
        );
      };
      reader.readAsDataURL(file);
    }
  });
});
