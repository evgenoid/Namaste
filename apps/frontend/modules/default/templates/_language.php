<?php use_helper('Slug') ?>
<?php $module = $sf_context->getModuleName()?>
<?php $slug = $sf_request->getParameter('slug') ?>
<?php $parent_slug = $sf_request->getParameter('parent_slug'); ?>
<li class="last-child">
    <?php
    switch ($culture):
        case 'uk': ?>
            <?php if($slug && $parent_slug):
                echo link_to('рус.', $route_name.
                     '?sf_culture=ru&parent_slug='.getCultureSlug($parent_slug,'ru', $module).
                     '&slug='.getCultureSlug($slug,'ru', $module, 'Showcase'));
            elseif ($slug):
                echo link_to('рус.', $route_name.'?sf_culture=ru&slug='.getCultureSlug($slug,'ru', $module));
            else:
                echo link_to('рус.', $route_name.'?sf_culture=ru');
            endif; ?>
            <a class="lang-active">укр.</a>
        <?php
            break;
        case 'ru': ?>
            <a class="lang-active">рус.</a>
            <?php if($slug && $parent_slug):
                echo link_to('укр.', $route_name.
                     '?sf_culture=uk&parent_slug='.getCultureSlug($parent_slug,'uk', $module).
                     '&slug='.getCultureSlug($slug,'uk', $module, 'Showcase'));
            elseif ($slug):
                echo link_to('укр.', $route_name.'?sf_culture=uk&slug='.getCultureSlug($slug,'uk', $module));
            else:
                echo link_to('укр.', $route_name.'?sf_culture=uk');
            endif; ?>
        <?php break;
    endswitch;
    ?>
</li>
