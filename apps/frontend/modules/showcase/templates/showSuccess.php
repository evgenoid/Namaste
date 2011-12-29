<?php use_helper('Thumbnail') ?>
<?php slot('title',  sfConfig::get('app_title').$category_showcase->getMetaTitle());?>
<ul class="breadcrumbs">
    <li class="no-bg no-padding"><?php echo link_to(__('Головна'), '@homepage') ?></li>
    <li><?php echo link_to(__('Все для йоги'), '@category_showcases') ?></li>
    <li class="active"><?php echo $category_showcase->getName() ?></li>
</ul>
<h1><?php echo $category_showcase->getName() ?></h1>
<?php foreach ($category_showcase->getShowcases() as $showcase): ?>
    <ul class="photo">
        <li>
            <img src="<?php echo getThumbnail('/uploads/showcase/'.$showcase->getFilename(), 220)?>"
                 alt="<?php echo $showcase->getName() ?>"/>
        </li>
    </ul>
    <div class="description">
        <ul class="clear price-info">
            <li>
                <h2><?php echo link_to($showcase->getName(),
                    'showcase/showShowcase?parent_slug='.$category_showcase->getSlug().
                    '&slug='.$showcase->getSlug()) ?></h2>
            </li>
            <li>
                <span><?php echo __('Код товару') ?></span>
                <span class="code"><?php echo $showcase->getArticle() ?></span>
            </li>
            <li>
                <?php if (!$showcase->getAvailability()): ?>
                    <span class="in-stock"><?php echo __('Немає в наявності') ?></span>
                    <span class="in-stock price"><?php echo $showcase->getPrice() ?> грн.</span>
                <?php else: ?>
                    <span class="price"><?php echo $showcase->getPrice() ?> грн.</span>
                <?php endif ?>

            <li>
        </ul>
        <?php echo $showcase->getDescription() ?>
        <?php echo link_to(__('Читати далі...'),
                    'showcase/showShowcase?parent_slug='.$category_showcase->getSlug().
                    '&slug='.$showcase->getSlug()) ?>
    </div>
<?php endforeach ?>
