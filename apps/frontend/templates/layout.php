<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
</head>
<body>
    <?php include_partial('global/header') ?>
    <div class="banner">
        <div class="wrapper">
            <ul>
                <li><a href="/" ><img src="/images/logo_big.png" width="184" height="350" alt="" /></a></li>
                <li class="lang-ru"></li>
                <?php include_component('default','language');?>
            </ul>
        </div>
    </div>
    <div class="start">
        <div class="content">
         <div class="main-part">
            <div class="right-side">
                <div class="location">
                    <span>г. Черкассы,</span>
                    <span>ул. Крещатик, 223</span>
                    <span class="marg">(0472) 503-117</span>
                    <span>(094) 985-5117</span>
                    <span class="time">Время работы</span>
                    <span>пн. - пт.: 8:00-20:00</span>
                    <span>сб.: 8:00-10:00</span>
                </div>
                <img src="/images/commercial.png" width="306" height="168" alt="" />
            </div>
            <div class="left-side">
                <h1>Йога в Черкассах</h1>
                <h2>Йога-центр Намасте</h2>
                <ul class="text">
                    <li class="first-child">

                        <p>Lorem ipsum dolor sit amet, curabitur nullam elit ac a amet. Viverra sit id vel, vestibulum sit diam, ante ut purus,
                        nulla quam est congue, risus vulputate vehicula neque amet sed. Dui volutpat ullamcorper suscipit, suspendisse
                        lacus luctus non duis posuere scelerisque. Tincidunt ornare ligula etiam pulvinar nulla
                        </p>
                        <h2>Йога-центр Намасте</h2>
                        <p>Lorem ipsum dolor sit amet, curabitur nullam elit ac a amet. Viverra sit id vel, vestibulum sit diam, ante ut purus,
                        nulla quam est congue, risus vulputate vehicula neque amet sed. Dui volutpat ullamcorper suscipit, suspendisse
                        lacus luctus non duis posuere scelerisque. Tincidunt ornare ligula etiam pulvinar nulla
                        </p>
                    </li>
                    <li>
                        <p>Lorem ipsum dolor sit amet, curabitur nullam elit ac a amet. Viverra sit id vel, vestibulum sit diam, ante ut purus,
                        nulla quam est congue, risus vulputate vehicula neque amet sed. Dui volutpat ullamcorper suscipit, suspendisse
                        lacus luctus non duis posuere scelerisque. Tincidunt ornare ligula etiam pulvinar nulla
                        </p>
                        <p>Lorem ipsum dolor sit amet, curabitur nullam elit ac a amet. Viverra sit id vel, vestibulum sit diam, ante ut purus,
                        nulla quam est congue, risus vulputate vehicula neque amet sed. Dui volutpat ullamcorper suscipit, suspendisse
                        lacus luctus non duis posuere scelerisque. Tincidunt ornare ligula etiam pulvinar nulla
                        </p>
                        <h2>Йога-центр Намасте</h2>
                    </li>
                </ul>
            </div>
         </div>

        <ul class="ads">
            <li class="joga"><a href="<?php echo url_for('@category_showcases') ?>" ><span><?php echo __('Все для йоги') ?></span></a></li>
            <li class="prices"><a href="<?php echo url_for('@price') ?>" ><span><?php echo __('Ціни і абонементи') ?></span></a></li>
            <li class="schedule last-child"><a href="<?php echo url_for('@timetable') ?>" ><span><?php echo __('Розклад') ?></span></a></li>
        </ul>

        <ul class="lastnews">
            <li class="first-child">
                <h2 class="news-caption"><?php echo __('Новини') ?></h2>
                <?php include_component('news', 'lastNews') ?>
            </li>
            <li>
                <h2 class="news-caption"><?php echo __('Статті') ?></h2>
                <?php include_component('article', 'lastArticle') ?>
            </li>
        </ul>

        </div>
    </div>
    <?php include_partial('global/footer') ?>
</body>
</html>
