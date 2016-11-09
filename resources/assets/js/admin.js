$(document).ready(function(){
  $('.alert.alert-success').fadeIn(600).delay(3000).fadeOut(600);
  $('.alert.alert-warning').fadeIn(600).delay(3000).fadeOut(600);
  $('.deleteBtn').click(function(){
    $('#modal-main').modal('show');
  });
  $('.dismiss-modal').click(function(){
    $('.modal').modal('hide');
  });
  $('#imageUpload').click(function(e){
    e.preventDefault();
    $('.thumbnail').show();
    $('#image-upload').modal('show');
  });
  if ($('#newImage').length) {
    $('#image-upload').modal('show');
  }
  $('.chooseImage').click(function(e){
    e.preventDefault();
    $('#image-reference').val(e.target.id);
    $('#image-url').val(e.target.src);
    $('.currentImage').attr('src', e.target.src);
    $('#image-upload').modal('hide');
  });

  $('.btn.disabled').click(function(e){
    e.preventDefault();
  });

  $('.image-block').length ? equalHeight($('.image-block')) : '';

  function equalHeight(el) {
    var biggest = null;
    el.each(function(i, block) {
      if ($(block).height() > biggest) {
        biggest = $(block).height()
      }
    });
    $(el).height(biggest);
  }

});

(function() {
    Dropzone.options.imageUpload = {
        paramName           :       "image", // The name that will be used to transfer the file
        maxFiles            :       1,
        maxFilesize         :       2, // MB
        dictDefaultMessage  :       "Drop File here or Click to upload Image",
        thumbnailWidth      :       "300",
        thumbnailHeight     :       "300",
        accept              :       function(file, done) { done() },
        success             :       uploadSuccess,
        complete            :       uploadCompleted
    };

    function uploadSuccess(data, file) {
        var messageContainer    =   $('.dz-success-mark');

        messageContainer.addClass('show');
        $('#image-reference').val(JSON.parse(file).image_id);
        $('#image-url').val(JSON.parse(file).original_path);
        $('.currentImage').attr('src', JSON.parse(file).original_path);
        $('.image-upload').modal('refresh');
    }

    function uploadCompleted(data) {
        if(data.status != "success")
        {
            var error_message   =   $('.dz-error-mark'),
                message         =   $('<p></p>', {
                    'text' : 'Image Upload Failed'
                });

            message.appendTo(error_message);
            error_message.addClass('show');
            return;
        }
    }
})();

tinymce.init({
  selector: '#richedit',  // change this value according to your HTML
  theme: 'modern',
  plugins: [
    'advlist autolink link image lists charmap hr anchor',
    'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking',
    'save table contextmenu directionality template paste textcolor'
  ],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor',
  file_browser_callback: function(field_name, url, type, win) {
    var mceModal = $('#mce-modal-block'),
        mcePanel = $('.mce-panel');
    mceModal.hide();
    mcePanel.hide();
    $('.image-upload')
      .modal({
        onHide: function() {
          document.getElementById(field_name).value = $('#image-url').val();
          mceModal.show();
          mcePanel.show();
        }
      })
      .modal('show');
  }
});
