<?php /* var $pager sfDoctrinePager */ ?>
<div class="pager" style="width: <?php echo count($pager->getLinks())*30+120 ?>px">
    <ul>
        <?php if ($pager->haveToPaginate()): ?>
            <li>
                <?php echo link_to('<img src="/images/arrow_left.png" alt="Предыдущая страница" />', 'article/index?page='.$pager->getPreviousPage()) ?>
            </li>
            <?php foreach ($pager->getLinks() as $page): ?>
                <?php if ($page == $pager->getPage()): ?>
                    <li class="currpage">
                        <?php echo $page ?>
                    </li>
                <?php else: ?>
                    <li class="page">
                        <?php echo link_to($page, 'article/index?page='.$page) ?>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
            <li>
                <?php echo link_to('<img src="/images/arrow_right.png" alt="Следуюющая страница" />', 'article/index?page='.$pager->getNextPage()) ?>
            </li>
        <?php endif;?>
    </ul>
</div>
