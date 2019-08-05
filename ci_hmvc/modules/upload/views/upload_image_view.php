<html>
<head>
<script type="text/javascript" src = "<?php echo base_url(); ?>themes/site/js/jquery-3.1.1.min.js"> </script>
	         
<script  type="text/javascript" src = "<?php echo base_url(); ?>themes/site/js/script.js"> </script>

<script type="text/javascript" src = "<?php echo base_url(); ?>themes/site/js/jquery.form.min.js"> </script>
	         
<title>Upload Form</title>
</head>
<body>
    <!-- AJAX Response will be outputted on this DIV container -->
    <div class = "upload-image-messages"></div>

    <div class = "col-md-6">
        <!-- Generate the form using form helper function: form_open_multipart(); -->
        <?php echo form_open_multipart('upload/do_upload', array('class' => 'upload-image-form'));?>
            <input type="file" multiple = "multiple" accept = "image/*" class = "form-control" name="uploadfile[]" size="20" /><br />
            <input type="submit" name = "submit" value="Upload" class = "btn btn-primary" />
        </form>

        
    </div>
</body>
</html>