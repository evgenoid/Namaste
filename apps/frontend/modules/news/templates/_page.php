<ul class="news-item">
    <?php foreach ($news as $item): ?>
        <li>
            <h2 class="caption">
                <?php echo link_to($item->getTitle(), 'news/show?slug='.$item->getSlug()) ?>
            </h2>
            <span>
                <?php echo $item->getDateTimeObject('created_at')->format('d/m/Y');?>
            </span>
            <p>
                <?php echo $item->getDescription() ?>
            </p>
            <?php echo link_to(__('Читати далі...'), 'news/show?slug='.$item->getSlug()) ?>
        </li>
    <?php endforeach; ?>
</ul>
