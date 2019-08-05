
<div class="container">
    <div class="blog-header">
        <h1 class="blog-title"><?=("$meta_h1" != '') ? "$meta_h1" : "$name"?></h1>
    </div>
    <div class="row">
        <div class="col-sm-8 blog-main">
            <?php if(!empty($categories)): ?>
                <div class="row">
                <?php foreach ($categories as $category): ?>
                    <div class="col-sm-4">
                        <?=($category['image'] != '') ? '<a href="'.base_url().'category/'.$category['meta_url'].'"><img class="img-thumbnail" src="'.base_url().$category['image'].' "></a>':'<a href="'.base_url().'category/'.$category['meta_url'].'"><img class="img-thumb" src="'.base_url().'themes/site/images/photo.jpg"></a>'?>
                        <h2><a href="<?=base_url()?>category/<?=$category['meta_url']?>"><?=$category['name']?></a></h2>
                    </div>
                <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <hr>
            <?php if(empty($pages)): ?>
                <p>В категории нет страниц</p>
                
            <?php else: ?>
                <?php foreach ($pages as $page): ?>
                    <div class="row">
                        <div class="col-sm-3">
                            <?=($page['image'] != '') ? '<a href="'.base_url().'page/'.$page['meta_url'].'"><img class="img-thumbnail" src="'.$page['image'].'"></a>':'<a href="'.base_url().'page/'.$page['meta_url'].'"><img class="img-thumbnail" src="'.base_url().'/themes/site/images/no_photo.jpg"></a>'?>
 
                        </div>
                        <div class="col-sm-9">
                            <h4><a href="<?=base_url()?>page/<?=$page['meta_url']?>"><?=$page['name']?></a></h4>
                            <div><?=$page['content']?> <a href="<?=base_url()?>page/<?=$page['meta_url']?>">Далее</a></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
 
            <div class="row">
                <div class="col-sm-12 text-center">
                    <?=$links?>
                </div>
            </div>
 
            <?php if($content != '') { ?>
                <hr>
                <?php if($image != '') { ?>
                    <img class="img-thumbnail" src="<? echo base_url().$image?>" alt="image description" >
                <?php } ?>
                <?=$content?>
            <?php } ?>
        </div>
 
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>О сайте</h4>
                <p>Текст <em>с описанием</em> зачем нам нужен этот сайт.</p>111
            </div>
            <div class="sidebar-module">
                
            </div>
        </div>
	
    </div>
</div>



