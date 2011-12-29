<?php slot('title',  sfConfig::get('app_title').$static->getMetaTitle());?>
<ul class="breadcrumbs">
    <li class="no-bg no-padding"><?php echo link_to(__('Головна'), '@homepage') ?></li>
    <li class="active"><?php echo $static->getTitle() ?></li>
</ul>
<h1><?php echo $static->getTitle() ?></h1>
<?php echo $static->getText() ?>

