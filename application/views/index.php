
Главная страница 

<div>
<?php foreach ($news as $news_item): ?>
    <a href="/news/<?php echo $news_item['url']; ?>"><?php echo ($news_item['title']); ?></a> <br>
<?php endforeach; ?>
</div>
                