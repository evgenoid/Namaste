<h2 class="shop-caption"><?php echo __('Масаж') ?></h2>
    <ul class="shop">
        <?php foreach ($items as $item): ?>
            <?php if ($sf_request->getUri() == url_for('massage/show?slug='.$item->getSlug(), true)): ?>
                <li class="active"><a href="<?php echo url_for('massage/show?slug='.$item->getSlug()) ?>" class="active"><?php echo $item ?></a></li>
            <?php else: ?>
                <li><a href="<?php echo url_for('massage/show?slug='.$item->getSlug()) ?>" ><?php echo $item ?></a></li>
            <?php endif; ?>
    <?php endforeach ?>
</ul>
