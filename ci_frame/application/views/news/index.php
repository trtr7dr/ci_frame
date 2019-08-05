<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/blog.css">
<div class="container">
<h2><?php echo $title ?></h2>

<?php foreach ($news as $news_item): ?>

<h3><a href="<?php echo base_url() . 'news/' . $news_item['slug']?>"><?php echo $news_item['title'] ?></a></h3>
        <div class="main">
            <p><?php echo $news_item['PREVIEW_TEXT'] ?></p>
        </div>

<?php endforeach; ?>
<div class="paginate">
<?php echo $paginator->create_links();?>
</div>
</div>