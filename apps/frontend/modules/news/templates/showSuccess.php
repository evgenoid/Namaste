<ul class="breadcrumbs">
    <li class="no-bg no-padding"><?php echo link_to(__('Головна'), '@homepage') ?></li>
    <li><?php echo link_to(__('Новини'), '@news') ?></li>
    <li class="active"><?php echo $news->getTitle() ?></li>
</ul>
<h1><?php echo $news->getTitle() ?></h1>
<div class="news-item">
    <span><?php echo $news->getDateTimeObject('created_at')->format('d/m/Y');?></span>
    <?php echo $news->getText() ?>
</div>
