<?php slot('title',  sfConfig::get('app_title').$massage->getMetaTitle());?>
<ul class="breadcrumbs">
    <li class="no-bg no-padding"><?php echo link_to(__('Головна'), '@homepage') ?></li>
    <li><?php echo link_to(__('Масаж'), '@massages') ?></li>
    <li class="active"><?php echo $massage->getName() ?></li>
</ul>
<h1><?php echo $massage->getName() ?></h1>
<?php echo $massage->getText() ?>
