<?php use_helper('Thumbnail') ?>
<?php slot('title',  sfConfig::get('app_title').$team->getMetaTitle());?>
<ul class="breadcrumbs">
    <li class="no-bg no-padding"><?php echo link_to(__('Головна'), '@homepage') ?></li>
    <li><?php echo link_to(__('Наша команда'), '@team') ?></li>
    <li class="active"><?php echo $team->getName().' - '.$team->getSurname() ?></li>
</ul>
<h1><?php echo $team->getName().' - '.$team->getSurname();?></h1>
<ul class="team-photo">
    <li>
        <a href="<?php echo url_for('team/show?slug='.$team->getSlug()) ?>">
            <img src="<?php echo getThumbnail('/uploads/team/'.$team->getPhoto(),220, 190) ?>"/>
        </a>
    </li>
</ul>
<div class="description">
    <ul class="additional-info">
        <li><span class="label"><?php echo __('Посада: ') ?></span>
            <?php echo $team->getPost() ?>
        </li>
    </ul>
    <?php echo $team->getBiography() ?>
</div>
