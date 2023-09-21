<script>
    function showBannerImage(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#BannerImg').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
    }


    function showSelectedImage(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#SelectedImg').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
    }


    function showSelectedImages(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#SelectedImgs').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
    }
</script>
