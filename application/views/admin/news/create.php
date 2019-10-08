<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2><?php echo $title ?></h2>

            <?php echo validation_errors(); ?>

            <?php echo form_open('news/create') ?>

            <input type="input" name="url" placeholder="url" /><br />

            <select name="type">
                <option value="1">Релиз</option>
                <option value="2">Анонс</option>
            </select><br>


            <input type="input" name="pre_img" placeholder="ссылка на превью картинки" /><br />

            <input type="input" name="title" placeholder="заголовок" /><br />

            <textarea id="textarea" name="text" placeholder="содержание"></textarea><br />

            <input type="input" name="gallery" placeholder="ссылки на все картинки через пробел (путь по умолчанию /assets/news)" /><br />

            <input type="submit" name="submit" value="Создать" />

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