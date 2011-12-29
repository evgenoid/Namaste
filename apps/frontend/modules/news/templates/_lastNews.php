<h2 class="caption">
    <?php echo link_to($news->getTitle(), 'news/show?slug='.$news->getSlug()) ?>
</h2>
<span>
    <?php echo $news->getDateTimeObject('created_at')->format('d/m/Y');?>
</span>
<p>
    <?php echo $news->getDescription() ?>
</p>
<?php echo link_to('Читати далі...', 'news/show?slug='.$news->getSlug()) ?>

