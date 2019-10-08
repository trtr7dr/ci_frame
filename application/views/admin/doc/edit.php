<div class="container">
    <div class="row">
        <div class="col-md-12">

            <?php echo validation_errors(); ?>

            <?php echo form_open('doc/edit/') ?>
            
            <textarea id="textarea" name="text" placeholder="содержание"><?php echo $news->text; ?></textarea><br />
 
            <input type="submit" name="submit" value="Обновить" />

            </form>
        </div>
    </div>
</div>
<link href="/assets/Trumbowyg-master/dist/ui/trumbowyg.min.css" rel="stylesheet" type="text/css"/>
<script src="/assets/js/jquery.min.js" type="text/javascript"></script>
<script src="/assets/Trumbowyg-master/dist/trumbowyg.min.js" type="text/javascript"></script>

<script>
$('#textarea').trumbowyg();
</script>