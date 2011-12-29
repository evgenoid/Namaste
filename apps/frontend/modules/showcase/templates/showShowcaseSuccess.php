<?php use_helper('Thumbnail') ?>
<?php slot('title',  sfConfig::get('app_title').$showcase->getMetaTitle());?>
<ul class="breadcrumbs">
    <li class="no-bg no-padding"><?php echo link_to(__('Головна'), '@homepage') ?></li>
    <li><?php echo link_to(__('Все для йоги'), '@category_showcases') ?></li>
    <li><?php echo link_to($showcase->getCategoryShowcase(), 'showcase/show?slug='.$showcase->getCategoryShowcase()->getSlug()) ?></li>
    <li class="active"><?php echo $showcase->getName() ?></li>
</ul>
<h1><?php echo $showcase->getName() ?></h1>
<ul class="photo">
    <li>
        <!-- ZOOM --->
<!--        <a href="--><?php //echo '/uploads/showcase/'.$showcase->getFilename(); ?><!--" class="highslide" onclick="return hs.expand(this,-->
<!--            {wrapperClassName: 'borderless floating-caption', dimmingOpacity: 0.75, align: 'center'})">-->
<!--                <img src="--><?php //echo getThumbnail('/uploads/showcase/'.$showcase->getFilename(), 220)?><!--"-->
<!--                     alt="--><?php //echo $showcase->getDescription(); ?><!--"-->
<!--                     title="--><?php //echo __('Натисніть для збільшення') ?><!--">-->
<!--        </a>-->
<!--        <div class="highslide-caption">-->
<!--            --><?php //echo $showcase->getDescription(); ?>
<!--        </div>-->
        <img src="<?php echo getThumbnail('/uploads/showcase/'.$showcase->getFilename(), 220)?>"
             alt="<?php echo $showcase->getName() ?>"/>
    </li>
</ul>
<div class="description">
    <ul class="clear price-info">
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
    <ul class="additional-info">
        <li><span class="label"><?php echo __('Країна виробник: ') ?></span>
            <?php echo $showcase->getCountry() ?>
        </li>
        <li><span class="label"><?php echo __('Розміри: ') ?></span>
             <?php echo $showcase->getSize() ?>см
        </li>
    </ul>
    <?php echo $showcase->getDescription() ?>
</div>
