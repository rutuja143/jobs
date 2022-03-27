
<?php ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Example: Browsing Files</title>
        <link id="default-css" href="<?php echo CSS_PATH_FRONTEND; ?>style.css" rel="stylesheet" media="all" />
        <link id="default-css" href="<?php echo CSS_PATH_FRONTEND; ?>custom.css" rel="stylesheet" media="all" />
        <link id="shortcodes-css" href="<?php echo CSS_PATH_FRONTEND; ?>shortcodes.css" rel="stylesheet" media="all" />
        <script>
            // Helper function to get parameters from the query string.
            function getUrlParam(paramName) {
                var reParam = new RegExp('(?:[\?&]|&)' + paramName + '=([^&]+)', 'i');
                var match = window.location.search.match(reParam);

                return (match && match.length > 1) ? match[1] : null;
            }
            // Simulate user action of selecting a file to be returned to CKEditor.
            function returnFileUrl(path) {

                var funcNum = getUrlParam('CKEditorFuncNum');
                var fileUrl = path;
                window.opener.CKEDITOR.tools.callFunction(funcNum, fileUrl);
                window.close();
            }
        </script>

    </head>
    <body>
        <div id="main">
            <div class="main-content">
                <div class="content-full-width">
                    <div class="fullwidth-section browse">
                        <div class="container">

                            <?php
                            $log_directory = 'media/'.date("Y").'/'.date("m");
                            foreach (glob($log_directory . '/*.*') as $file) {
                                ?>
                            <a class="dt-sc-one-sixth column image-box"><img width="100" src="<?php echo site_url() . $file; ?>">
                                    <button class="dt-sc-button" onclick="returnFileUrl('<?php echo site_url() . $file; ?>')">Select File</button>
                                </a>

                                <?php
                            };
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>