<ul class="breadcrumbs">
    <li class="no-bg no-padding"><?php echo link_to(__('Головна'), '@homepage') ?></li>
    <li class="active"><?php echo __('Статті') ?></li>
</ul>
<h1><?php echo __('Статті') ?></h1>
<?php include_partial('article/page', array('articles' => $pager->getResults())); ?>
<?php include_partial('article/pager', array('pager' => $pager)); ?>
