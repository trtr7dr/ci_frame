<div class="container">
    <div class="twelve-columns blog-header">
        <h1 class="blog-title"><?=("$meta_h1" != '') ? "$meta_h1" : "$name"?></h1>
        <p class="lead blog-description"><?=date("d-m-Y", strtotime($created))?></a></p>
    </div>
        
        <?php echo Modules::run('contact/show'); ?>
        
    </div>
</div>
