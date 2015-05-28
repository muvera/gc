
  <!-- CSS -->
  <link rel="stylesheet" href="/assets/css/demo.css">
  <link rel="stylesheet" href="/assets/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/css/imgpicker.css">
  
  <!-- JavaScript -->
  <script src="/assets/js/jquery-1.11.0.min.js"></script>
  <script src="/assets/js/jquery.Jcrop.min.js"></script>
  <script src="/assets/js/jquery.imgpicker.js"></script>



    <div class="main">
    <div class="container"><div class="box">
      <div class="content clearfix">
        
        <img src="/assets/img/default-avatar.png" id="avatar2" width="150"><br>
        
        <button type="button" class="btn btn-default" data-ip-modal="#avatarModal">Edit avatar</button>
        
        <!-- Avatar Modal -->
        <div class="ip-modal" id="avatarModal">
          <div class="ip-modal-dialog">
            <div class="ip-modal-content">
              <div class="ip-modal-header">
                <a class="ip-close" title="Close">&times;</a>
                <h4 class="ip-modal-title">Change avatar</h4>
              </div>
              <div class="ip-modal-body">
                <div class="btn btn-primary ip-upload">Upload <input type="file" name="file" class="ip-file"></div>
                <button type="button" class="btn btn-primary ip-webcam">Webcam</button>
                <button type="button" class="btn btn-info ip-edit">Edit</button>
                <button type="button" class="btn btn-danger ip-delete">Delete</button>
                
                <div class="alert ip-alert"></div>
                <div class="ip-info">To crop this image, drag a region below and then click "Save Image"</div>
                <div class="ip-preview"></div>
                <div class="ip-rotate">
                  <button type="button" class="btn btn-default ip-rotate-ccw" title="Rotate counter-clockwise"><i class="icon-ccw"></i></button>
                  <button type="button" class="btn btn-default ip-rotate-cw" title="Rotate clockwise"><i class="icon-cw"></i></button>
                </div>
                <div class="ip-progress">
                  <div class="text">Uploading</div>
                  <div class="progress progress-striped active"><div class="progress-bar"></div></div>
                </div>
              </div>
              <div class="ip-modal-footer">
                <div class="ip-actions">
                  <button type="button" class="btn btn-success ip-save">Save Image</button>
                  <button type="button" class="btn btn-primary ip-capture">Capture</button>
                  <button type="button" class="btn btn-default ip-cancel">Cancel</button>
                </div>
                <button type="button" class="btn btn-default ip-close">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- end Modal -->

      </div>
    </div></div>
  </div>

  <script> 
    $(function() {
      var time = function(){return'?'+new Date().getTime()};
      
      // Avatar setup
      $('#avatarModal').imgPicker({
        url: 'ajax',
        aspectRatio: 1,
        deleteComplete: function() {
          $('#avatar2').attr('src', '/assets/img/default-avatar.png');
          this.modal('hide');
        },
        uploadSuccess: function(image) {
          // Calculate the default selection for the cropper
          var select = (image.width > image.height) ? 
              [(image.width-image.height)/2, 0, image.height, image.height] : 
              [0, (image.height-image.width)/2, image.width, image.width];

          this.options.setSelect = select;
        },
        cropSuccess: function(image) {
          $('#avatar2').attr('src', image.versions.avatar.url +time() );
          this.modal('hide');
        }
      });

      // Demo only
      $('.navbar-toggle').on('click',function(){$('.navbar-nav').toggleClass('navbar-collapse')});
      $(window).resize(function(e){if($(document).width()>=430)$('.navbar-nav').removeClass('navbar-collapse')});
    }); 
  </script>

