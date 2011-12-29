<ul>
    <?php foreach($articles as $article): ?>
    <li>
        <?php echo link_to($article->getTitle(), 'article/show?slug='.$article->getSlug()) ?>
        <?php echo $article->getDescription() ?>
    </li>
    <?php endforeach; ?>
</ul>
