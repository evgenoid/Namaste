<ul class="breadcrumbs">
    <li class="no-bg no-padding"><?php echo link_to(__('Головна'), '@homepage') ?></li>
    <li class="active"><?php echo __('Галерея') ?></li>
</ul>
<h1><?php echo __('Галерея') ?></h1>
    <?php foreach ($category_photos as $category_photo): ?>
    <h2>
        <a href="<?php echo url_for('photogalery/show?slug='.$category_photo->getSlug()) ?>">
            <?php echo $category_photo->getName(); ?>
        </a>
    </h2>

    <?php foreach($category_photo->getPhotos() as $photo): ?>
        <img src="<?php echo '/uploads/photogalery/'.$photo->getFilename() ?>" >
    <?php endforeach; ?>
<?php endforeach; ?>
