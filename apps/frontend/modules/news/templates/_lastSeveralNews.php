<ul>
    <?php foreach($news as $item): ?>
    <li>
        <span><?php echo $item->getDateTimeObject('created_at')->format('d/m/Y');?></span>
        <?php echo link_to($item->getTitle(), 'news/show?slug='.$item->getSlug()) ?>
        <?php echo $item->getDescription() ?>
    </li>
    <?php endforeach; ?>
</ul>
