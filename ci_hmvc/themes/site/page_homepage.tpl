<div class="container">
    <div class="twelve-columns blog-header">
        <h1 class="blog-title"><?=("$meta_h1" != '') ? "$meta_h1" : "$name"?></h1>
        <p class="lead blog-description"><?=date("d-m-Y", strtotime($created))?></a></p>
    </div>
    
	
 
    <div class="row">
        <div class=" blog-main">
            <?php if($image != '') { ?>
                <img class="img-thumbnail" src="<?=$image?>" alt="image description" >
            <?php } ?>            
            <?=$content?>
            
            <div class="author">Автор: <a href=""><?=$author?></a></div>
        </div>
        
 
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
	        <!--
            <div class="sidebar-module sidebar-module-inset">
                <h4>О сайте</h4>
                <p>Текст <em>с описанием</em> зачем нам нужен этот сайт.</p>
            </div>
            
            <div class="sidebar-module">
                <h4>Страницы</h4>
                <ol class="list-unstyled">
                    <li><a href="/ci/ci_1/page/view/homepage">Главная</a></li>
                </ol>
            </div>
            -->
            
            
        </div>
        
        <?php echo Modules::run('contact/show'); ?>
        
    </div>
</div>
