window.addEventListener('DOMContentLoaded', () => {


    function readURL(input) {
        if (input.files && input.files[0]) {
          let read = new FileReader();
          read.onload = function (e) {
            $('#imgPreviewPublicacion').attr('src', e.target.result);
          }
          read.readAsDataURL(input.files[0]);
        }
      }
      $('#file').change(function () {
        readURL(this);
      });
    
    });
    