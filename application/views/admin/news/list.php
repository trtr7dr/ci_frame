<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php foreach ($news as $news_item): ?>
            <div class="row news_elem">
                <div class="col-md-8">
                    <?php echo $news_item['title']; ?>
                </div>
                <div class="col-md-2 edit"><a href="/news/edit/<?php echo $news_item['id']; ?>">Изменить</a></div>
                <div class="col-md-2 delet"><a href="/news/del/<?php echo $news_item['id']; ?>">Удалить</a></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>