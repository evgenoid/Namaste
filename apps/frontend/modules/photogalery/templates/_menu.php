<?php use_helper('nmUrl') ?>
<h2 class="shop-caption"><?php echo __('Галерея') ?></h2>
    <ul class="shop">
        <?php foreach ($items as $item): ?>
            <?php if (urlImcomingValidator($sf_request->getUri(), url_for('photogalery/show?slug='.$item->getSlug(), true))): ?>
                <li class="active"><a href="<?php echo url_for('photogalery/show?slug='.$item->getSlug()) ?>" class="active"><?php echo $item ?></a></li>
            <?php else: ?>
                <li><a href="<?php echo url_for('photogalery/show?slug='.$item->getSlug()) ?>"><?php echo $item ?></a></li>
            <?php endif; ?>
    <?php endforeach ?>
</ul>
