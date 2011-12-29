<?php $uri = $sf_request->getUri() ?>
<?php $module = $sf_context->getModuleName() ?>
<div class="header">
    <div class="wrapper">
        <ul>

            <li class="header-icons"><a href="/" class="home-icon"></a></li>
            <?php if ($module == 'practice'): ?>
                <li class="active"><?php echo link_to(__('Практика'), '@practice', array('class' => 'active')) ?></li>
            <?php else: ?>
                <li><?php echo link_to(__('Практика'), '@practice') ?></li>
            <?php endif; ?>
            <?php if ($module == 'massage'): ?>
                <li class="active"><?php echo link_to(__('Масаж'), '@massage', array('class' => 'active')) ?></li>
            <?php else: ?>
                <li><?php echo link_to(__('Масаж'), '@massage') ?></li>
            <?php endif; ?>
            <?php if ($uri == url_for('@page', true)): ?>
                <li class="in-two-lines active"><?php echo link_to(__('Статичні сторіники'), '@page', array('class' => 'active')) ?></li>
            <?php else: ?>
                <li class="in-two-lines"><?php echo link_to(__('Статичні сторіники'), '@page') ?></li>
            <?php endif; ?>
            <?php if ($module == 'team'): ?>
                <li class="in-two-lines active"><?php echo link_to(__('Наша команда'), '@team', array('class' => 'active')) ?></li>
            <?php else: ?>
                <li class="in-two-lines"><?php echo link_to(__('Наша команда'), '@team') ?></li>
            <?php endif; ?>
            <?php if ($module == 'photogalery'): ?>
                <li class="active"><?php echo link_to(__('Галерея'), '@category_photo', array('class' => 'active')) ?></li>
            <?php else: ?>
                <li><?php echo link_to(__('Галерея'), '@category_photo') ?></li>
            <?php endif; ?>
            <?php if ($module == 'showcase'): ?>
                <li class="in-two-lines active"><?php echo link_to(__('Все для йоги'), '@category_showcase', array('class' => 'active')) ?></li>
            <?php else: ?>
                <li class="in-two-lines"><?php echo link_to(__('Все для йоги'), '@category_showcase') ?></li>
            <?php endif; ?>
            <?php if ($module == 'news'): ?>
                <li class="active"><?php echo link_to(__('Новини'), '@news', array('class' => 'active')) ?></li>
            <?php else: ?>
                <li><?php echo link_to(__('Новини'), '@news') ?></li>
            <?php endif; ?>
            <?php if ($module == 'article'): ?>
                <li class="active"><?php echo link_to(__('Статті'), '@article', array('class' => 'active')) ?></li>
            <?php else: ?>
                <li><?php echo link_to(__('Статті'), '@article') ?></li>
            <?php endif; ?>
            <li><?php echo link_to(__('Вийти'), 'default/signOut') ?></li>
        </ul>
    </div>
</div>
