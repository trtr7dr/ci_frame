<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2><?php echo $title ?></h2>

            <?php echo validation_errors(); ?>

            <?php echo form_open('news/edit/' . $news->id) ?>

            <input type="input" name="url" placeholder="url" value="<?php echo $news->url; ?>" /><br />

            <select name="type">
                <option value="1" <?php $an = ($news->type == 1) ? 'selected' : ''; echo $an; ?>>Релиз</option>
                <option value="2" <?php $an = ($news->type == 2) ? 'selected' : ''; echo $an; ?>>Анонс</option>
            </select><br>


            <input type="input" name="pre_img" placeholder="ссылка на превью картинки" value="<?php echo $news->pre_img; ?>" /><br />

            <input type="input" name="title" placeholder="заголовок" value="<?php echo $news->title; ?>" /><br />

            <textarea id="textarea" name="text" placeholder="содержание"><?php echo $news->text; ?></textarea><br />

            <input type="input" name="gallery" placeholder="ссылки на все картинки через пробел (путь по умолчанию /assets/news)" value="<?php echo $news->gallery; ?>"/><br />

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