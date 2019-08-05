<div class="navbar navbar-default navbar-top first">
    <div class="container">
        <div class="navbar-header">
            <a href="/" class="navbar-brand" target="_blank"><?php echo $this->settings['sitename'] ?></a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $this->session->userdata('username'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?=base_url();?>admin/auth/edit_user/<?php // echo $this->session->userdata('user_id'); ?>"><i class="fa fa-asterisk"></i> Мой профиль</a></li>
                        <li class="divider"></li>
                        <li><a href="<?=base_url();?>admin/auth/logout"><i class="fa fa-lock"></i> Выйти</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-right search-form" action="/admin/search" method="post">
                <input type="text" class="form-control" name="search" placeholder="Поиск">
                <a href="#" class="submit" id="search-submit"><i class="fa fa-search fa-lg"></i></a>
            </form>
        </div>
    </div>
</div>

<div class="navbar navbar-inverse navbar-fixed-top second">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="hmenu" class="navbar-collapse collapse navbar-inverse-collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?=base_url();?>admin"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Главная</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> Материалы<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Страницы</li>
                        <li><a href="<?=base_url();?>admin/page">Все страницы</a></li>
                        <li><a href="<?=base_url();?>admin/page/add">Создать страницу</a></li>
                        <li class="dropdown-header">Категории</li>
                        <li><a href="<?=base_url();?>admin/category">Все категории</a></li>
                        <li><a href="<?=base_url();?>admin/category/add">Создать категорию</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
