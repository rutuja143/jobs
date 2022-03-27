<div class="panel-body">
    <div class="dropzone" id="dropzoneFileUpload">
        <div class="fallback">
            <input id="files" multiple="true" name="name" type="file">
        </div>
        <a href="javascript:;" onclick="location.reload();" class="btn-gap-v btn-w-lg btn-export btn pull-right"><strong><i class="fa fa-refresh"></i>&nbsp;&nbsp;Refresh</strong></a>
        <br />
    </div>
    <div id="main">
        <div class="main-content">
            <div class="content-full-width">
                <div class="fullwidth-section browse">
                    <div class="container-fluid">
                        <br />
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="<?php echo base_url(); ?>css/dropzone/dropzone.min.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="<?php echo JS_PATH_BACKEND ?>dropzone.js"></script>
<script>
            Dropzone.autoDiscover = false;

            jQuery(document).ready(function () {

                var myDropzone = new Dropzone("#dropzoneFileUpload",
                        {
                            url: "<?php echo site_url('media/image_upload/do_upload_ck_editor'); ?>",
                            paramName: "upload", // The name that will be used to transfer the file
                            maxFilesize: 4, // MB,
                            dictDefaultMessage: "Drop File(s) Here or Click to Upload",
                            maxFiles: 1000,
                            acceptedFiles: "image/*",
                            addRemoveLinks: true,
                            dictRemoveFile: "Remove Image",
                            dictInvalidFileType: "Only Image allowed",
                            removedfile: function (file) {
                                jQuery('input[type="hidden"][data-original="' + file.name + '"]').remove();
                                var _ref;
                                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                            },
                            dictMaxFilesExceeded: "Maximum upload limit reached",
                            init: function () {
                                this.on("addedfile", function (file) {
                                    var _this = this;

                                });
                                this.on("success", function (file, responseText) {
                                   // alert('Image upload successfully');
                                });
                            }
                        });

            });
</script>
