<?php $uri = $sf_request->getUri() ?>
<?php $module = $sf_context->getModuleName() ?>
<div class="header">
    <div class="wrapper">
        <ul>
            <?php if ($uri == url_for('@homepage_localized', true)): ?>
                <li class="header-icons active"><a href="<?php echo url_for('@homepage') ?>" class="active home-icon"></a></li>
            <?php else: ?>
                <li class="header-icons"><a href="<?php echo url_for('@homepage') ?>" class="home-icon"></a></li>
            <?php endif; ?>
            <?php if ($module == 'practice'): ?>
                <li class="active"><?php echo link_to(__('Практика'), '@practices', array('class' => 'active')) ?></li>
            <?php else: ?>
                <li><?php echo link_to(__('Практика'), '@practices') ?></li>
            <?php endif; ?>
            <?php if ($module == 'massage'): ?>
                <li class="active"><?php echo link_to(__('Масаж'), '@massages', array('class' => 'active')) ?></li>
            <?php else: ?>
                <li><?php echo link_to(__('Масаж'), '@massages') ?></li>
            <?php endif; ?>
            <?php if ($uri == url_for('@price', true)): ?>
                <li class="in-two-lines active"><?php echo link_to(__('Ціни і абонементи'), '@price', array('class' => 'active')) ?></li>
            <?php else: ?>
                <li class="in-two-lines"><?php echo link_to(__('Ціни і абонементи'), '@price') ?></li>
            <?php endif; ?>
            <?php if ($uri == url_for('@timetable', true)): ?>
                <li class="active"><?php echo link_to(__('Розклад'), '@timetable', array('class' => 'active')) ?></li>
            <?php else: ?>
                <li><?php echo link_to(__('Розклад'), '@timetable') ?></li>
            <?php endif; ?>
            <?php if ($module == 'team'): ?>
                <li class="in-two-lines active"><?php echo link_to(__('Наша команда'), '@team', array('class' => 'active')) ?></li>
            <?php else: ?>
                <li class="in-two-lines"><?php echo link_to(__('Наша команда'), '@team') ?></li>
            <?php endif; ?>
            <?php if ($module == 'photogalery'): ?>
                <li class="active"><?php echo link_to(__('Галерея'), '@photogalery', array('class' => 'active')) ?></li>
            <?php else: ?>
                <li><?php echo link_to(__('Галерея'), '@photogalery') ?></li>
            <?php endif; ?>
            <?php if ($module == 'showcase'): ?>
                <li class="in-two-lines active"><?php echo link_to(__('Все для йоги'), '@category_showcases', array('class' => 'active')) ?></li>
            <?php else: ?>
                <li class="in-two-lines"><?php echo link_to(__('Все для йоги'), '@category_showcases') ?></li>
            <?php endif; ?>
            <?php if ($uri == url_for('@contacts', true)): ?>
                <li class="active"><?php echo link_to(__('Контакти'), '@contacts', array('class' => 'active')) ?></li>
            <?php else: ?>
                <li><?php echo link_to(__('Контакти'), '@contacts') ?></li>
            <?php endif; ?>
            <?php if ($uri == url_for('@contacts', true)): ?>
                <li class="header-icons active"><a href="<?php echo url_for('@contacts') ?>" class="active mail-icon"></a></li>
            <?php else: ?>
                <li class="header-icons"><a href="<?php echo url_for('@contacts') ?>" class="mail-icon"></a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>
