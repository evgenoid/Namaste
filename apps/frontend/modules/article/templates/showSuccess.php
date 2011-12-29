<ul class="breadcrumbs">
    <li class="no-bg no-padding"><?php echo link_to(__('Головна'), '@homepage') ?></li>
    <li><?php echo link_to(__('Статті'), '@articles') ?></li>
    <li class="active"><?php echo $article->getTitle() ?></li>
</ul>
<h1><?php echo $article->getTitle() ?></h1>
<?php echo $article->getText() ?>

