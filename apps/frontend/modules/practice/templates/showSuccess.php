<?php slot('title',  sfConfig::get('app_title').$practice->getMetaTitle());?>
<ul class="breadcrumbs">
    <li class="no-bg no-padding"><?php echo link_to(__('Головна'), '@homepage') ?></li>
    <li><?php echo link_to(__('Практики'), '@practices') ?></li>
    <li class="active"><?php echo $practice->getName() ?></li>
</ul>
<h1><?php echo $practice->getName() ?></h1>
<?php echo $practice->getText() ?>
