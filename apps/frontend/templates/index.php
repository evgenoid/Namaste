<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <title>
        <?php include_slot('title','Namaste · Черкассы') ?>
    </title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <script src="/js/highslide-<?php echo sfContext::getInstance()->getUser()->getCulture() ?>.js" type="text/javascript"></script>
</head>
<body>
    <?php include_partial('global/header') ?>
    <?php include_partial('global/info') ?>
    <div class="announce">
        <div class="content">
            <div class="right-side">
                <?php switch (sfContext::getInstance()->getModuleName()):
                    case 'practice':
                        include_component('practice', 'menu');
                        break;
                    case 'showcase':
                        include_component('showcase', 'menu');
                        break;
                    case 'massage':
                        include_component('massage', 'menu');
                        break;
                    case 'team':
                        include_component('team', 'menu');
                        break;
                    case 'photogalery':
                        include_component('photogalery', 'menu');
                        break;
                endswitch; ?>
                <img src="/images/commercial.png" width="306" height="168" />
                    <div class="news">
                        <h2><?php echo link_to(__('Новини'), '@news') ?></h2>
                        <?php include_component('news', 'lastSeveralNews') ?>
                        <h2><?php echo link_to(__('Статті'), '@articles') ?></h2>
                        <?php include_component('article', 'lastSeveralArticles') ?>
                    </div>
                </div>
                <div class="left-side">
                    <?php echo $sf_content;?>
                </div>
            </div>
        </div>
    <?php include_partial('global/footer') ?>
</body>
</html>


