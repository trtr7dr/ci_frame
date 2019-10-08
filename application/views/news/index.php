
    <div class="flat-courses clearfix isotope-courses">
        <?php foreach ($news as $news_item): ?><br>
        <?php echo $news_item['title']; ?> <br>
        <?php echo $news_item['url']; ?> <br>
        <?php echo $news_item['text']; ?> <br>
        <?php echo $news_item['created']; ?><br>
        
        <?php endforeach; ?>
    </div> 

    <div class="paginate">
        <?php
        echo ($paginator - 1) . ' <a href="/news/p/' . $paginator . '">' . $paginator . '</a>';
        ?>
    </div>