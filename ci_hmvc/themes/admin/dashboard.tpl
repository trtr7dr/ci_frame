<link href="<?=base_url();?>modules/admin/assets/css/admin-index.css" rel="stylesheet">
<script type="text/javascript" src="<?=base_url();?>modules/admin/assets/js/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>modules/admin/assets/js/moment.js"></script>
<script type="text/javascript" src="<?=base_url();?>modules/admin/assets/js/admin.js"></script>

<div id="main">
    <div class="row">
        <div class="col-sm-12">
            <ul class="breadcrumb dashboard">
                <li class="active"><i class="fa fa-dashboard"></i> Панель управления</li>
            </ul>
        </div>

    </div>

    <!-- admin_top_menu -->
    <div class="menu-header" id="banner">
        <div class="hidden-xs">

                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>admin/auth/users_list">
                                <div class="circle-tile-heading dark-blue">
                                    <i class="fa fa-users fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-description text-faded">
                                    Пользователи
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?php // echo $users?>
                                    <span id="sparklineA"></span>
                                </div>
                                <a href="#" class="circle-tile-footer">Подробнее <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>admin/page">
                                <div class="circle-tile-heading green">
                                    <i class="fa fa-image fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content green">
                                <div class="circle-tile-description text-faded">
                                    Материалы
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?=$pages+$category?>
                                    <span id="sparklineB"><?php  echo $pages?>, <?php  echo $category?></span>
                                </div>
                                <a href="#" class="circle-tile-footer">Подробнее <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>admin/modules">
                                <div class="circle-tile-heading blue">
                                    <i class="fa fa-cogs fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue">
                                <div class="circle-tile-description text-faded">
                                    Модули
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?=$modules?>
                                </div>
                                <a href="#" class="circle-tile-footer">Подробнее <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>admin/forms">
                                <div class="circle-tile-heading red">
                                    <i class="fa fa-comments fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content red">
                                <div class="circle-tile-description text-faded">
                                    Заявки
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?=$forms?>
                                    <span id="sparklineD"></span>
                                </div>
                                <a href="#" class="circle-tile-footer">Подробнее <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
    <!-- admin_top_menu -->


    <div class="row">
        <div class="col-sm-3">
            <div id="mscms">
                <a target="_blank" href="http://mscms.com.ua"><img src="<?=base_url();?>modules/admin/assets/images/mscms_2.png" title="http://mscms.com.ua" alt="http://mscms.com.ua" class="img-thumbnail" /></a>
            </div>
            <div class="panel panel-info" style="margin-top: 20px;">
                <div class="panel-heading">Информация о системе</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <p><?=$_SERVER['SERVER_SOFTWARE']?></p>
                            <hr>
                            <p>Версия MySQL: </p>
                            <p>Версия PHP: <?=phpversion()?></p>
                            <p>IP сервера: <?=$_SERVER['SERVER_ADDR']?></p>
                            <p>IP пользователя: <?=$_SERVER["REMOTE_ADDR"]?></p>
                            <hr>
                            <p></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>