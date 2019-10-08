<?php echo form_open('penetration/in') ?>

<style>
    label {
        display: block;
            margin-top: 5px;
    }
    input[type="submit"] {
        margin-top: 10px;
        font-size: 20px !important;
    }
    body {
        font-size: 20px !important;
    }
    
</style>


<label for="name">Лог</label>
<input type="input" name="name" /><br />

<label for="pass">Пасс</label>
<input type="password" name="pass" /><br />


<input type="submit" name="submit" value="Войти" />

</form>