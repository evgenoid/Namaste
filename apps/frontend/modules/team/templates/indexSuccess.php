<?php use_helper('Thumbnail') ?>
<ul class="breadcrumbs">
    <li class="no-bg no-padding"><?php echo link_to(__('Головна'), '@homepage') ?></li>
    <li class="active"><?php echo __('Наша команда') ?></li>
</ul>
<h1><?php echo __('Наша команда') ?></h1>

<?php foreach ($teams as $team): ?>
    <ul class="team-photo">
        <li>
            <a href="<?php echo url_for('team/show?slug='.$team->getSlug()) ?>">
                <img src="<?php echo getThumbnail('/uploads/team/'.$team->getPhoto(),220, 190) ?>"/>
            </a>
        </li>
    </ul>
    <div class="description">
        <ul>
            <li>
                
                <h2><?php echo link_to($team->getName().' '.$team->getSurname(), 'team/show?slug='.$team->getSlug()) ?></h2>
            </li>
        </ul>
        <ul class="additional-info">
            <li><span class="label"><?php echo __('Посада: ') ?></span>
                <?php echo $team->getPost() ?>
            </li>
        </ul>
        <?php echo $team->getDescription() ?>
        <?php echo link_to(__('Читати далі...'), 'team/show?slug='.$team->getSlug()) ?>
    </div>
<?php endforeach; ?>
