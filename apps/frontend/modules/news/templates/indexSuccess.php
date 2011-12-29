<ul class="breadcrumbs">
    <li class="no-bg no-padding"><?php echo link_to(__('Головна'), '@homepage') ?></li>
    <li class="active"><?php echo __('Новини') ?></li>
</ul>
<h1><?php echo __('Новини') ?></h1>
<?php include_partial('news/page', array('news' => $pager->getResults())); ?>
<?php include_partial('news/pager', array('pager' => $pager)); ?>
