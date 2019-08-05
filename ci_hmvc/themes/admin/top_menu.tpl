<div class="navbar navbar-default navbar-top first">
    <div class="container">
        <div class="navbar-header">
            <a href="/" class="navbar-brand" target="_blank"><?php echo $sitename; ?></a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
                <li><a href="http://mscms.com.ua">Поддержка</a></li>
                <!--<li><a href="#" data-toggle="modal" data-target="#callbackModal">Написать разработчику</a></li>-->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php // echo $this->session->userdata('name'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/auth/logout">Выйти</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-right" action="/admin/search" method="post">
                <input type="text" class="form-control col-lg-8" name="search" placeholder="Поиск">
            </form>
        </div>
    </div>
</div>