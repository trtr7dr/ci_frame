<form method="post" action="<?=base_url()?>contact/send" id="contact_form">
	<div class="input-row field form-group">
        <input class="form-control input-field required" type="text" id="name" name="name" placeholder="Ваше имя">
    </div>
    <div class="input-row field form-group">
        <input class="form-control input-field required-email" type="email" id="mail" name="mail" placeholder="Ваш email">
    </div>
    <div class="input-row form-group">
        <textarea  class="form-control input-field textarea" cols="30" rows="10" id="text" name="text" placeholder="Комментарий"></textarea>
    </div>
    <div class="input-row">
        <input class="btn btn-info contact-submit" type="submit" value="Отправить">
    </div>
</form>