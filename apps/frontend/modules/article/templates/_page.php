<ul class="news-item">
    <?php foreach ($articles as $article): ?>
        <li>
            <h2 class="caption">
                <?php echo link_to($article->getTitle(), 'article/show?slug='.$article->getSlug()) ?>
            </h2>
            <p>
                <?php echo $article->getDescription() ?>
            </p>
            <?php echo link_to(__('Читати далі...'), 'article/show?slug='.$article->getSlug()) ?>
        </li>
    <?php endforeach; ?>
</ul>
