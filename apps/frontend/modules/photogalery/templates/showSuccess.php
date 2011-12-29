<?php use_helper('Thumbnail') ?>
<?php slot('title',  sfConfig::get('app_title').$category_photo->getMetaTitle());?>
<ul class="breadcrumbs">
    <li class="no-bg no-padding"><?php echo link_to(__('Головна'), '@homepage') ?></li>
    <li><?php echo link_to(__('Галерея'), '@photogalery') ?></li>
    <li class="active"><?php echo $category_photo->getName() ?></li>
</ul>
<h1><?php echo $category_photo->getName() ?></h1>
<ul>
    <li>
        <?php foreach ($category_photo->getPhotos() as $photo):?>
            <a href="<?php echo '/uploads/photogalery/'.$photo->getFilename(); ?>" class="highslide" onclick="return hs.expand(this,
                {wrapperClassName: 'borderless floating-caption', dimmingOpacity: 0.75, align: 'center'})">
                    <img src="<?php echo getThumbnail('/uploads/photogalery/'.$photo->getFilename(), 100)?>"
                         alt="<?php echo $photo->getDescription(); ?>"
                         title="<?php echo __('Натисніть для збільшення') ?>">
            </a>
            <div class="highslide-caption">
               <?php echo $photo->getDescription(); ?>
            </div>
        <?php endforeach; ?>
    </li>
</ul>
