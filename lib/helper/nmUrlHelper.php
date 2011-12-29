<?php

    function urlImcomingValidator($url, $urlexpression) {
        $urlexpression = str_replace('/', '\/', $urlexpression);
        $urlexpression = str_replace('.html', '', $urlexpression);

        return preg_match('/(^'.$urlexpression.')/', $url);
    }
