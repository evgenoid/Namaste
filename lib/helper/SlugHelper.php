<?php

    function getCultureSlug($slug = '', $culture = 'ru', $module, $model = '')
    {
        switch ($module){
            case 'practice':
                if ($model) {
                    $object = BaseTable::getCultureSlug($model, $slug);
                }
                else {
                    $object = BaseTable::getCultureSlug('Practice', $slug);
                }

                return $object->Translation[$culture]['slug'];
            case 'massage':
                if ($model) {
                    $object = BaseTable::getCultureSlug($model, $slug);
                }
                else {
                    $object = BaseTable::getCultureSlug('Massage', $slug);
                }

                return $object->Translation[$culture]['slug'];
            case 'photogalery':
                if ($model) {
                    $object = BaseTable::getCultureSlug($model, $slug);
                }
                else {
                    $object = BaseTable::getCultureSlug('CategoryPhoto', $slug);
                }

                return $object->Translation[$culture]['slug'];
            case 'showcase':
                if ($model) {
                    $object = BaseTable::getCultureSlug($model, $slug);
                }
                else {
                    $object = BaseTable::getCultureSlug('CategoryShowcase', $slug);
                }

                return $object->Translation[$culture]['slug'];
        }
    }

?>
