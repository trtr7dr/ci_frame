<div class="col-md-2"></div>

<div class="col-md-8 feedback">
<h2><?php echo $title ?></h2>

<p><a href="<?= base_url() ?>assets/media/doc/anketa.docx">Анкета</a></p>
<p><a href="<?= base_url() ?>assets/media/doc/sogl.docx">Согласие на обработку персональных данных</a></p>
<p><a href="<?= base_url() ?>assets/media/doc/zayavlenie.docx">Заявление</a></p>

<?php echo validation_errors(); ?>

<?php echo form_open('feedback/create') ?>

<!--    <label for="name">Имя</label>-->
<input type="input" name="name" placeholder="ФИО" /><br />

<!--    <label for="text">Текст</label>-->
    <textarea name="text" placeholder="Текст сообщения, ссылки на документы"></textarea><br />

    <input type="submit" name="submit" value="Отправить" />

</form>
</div>
<div class="col-md-2"></div>