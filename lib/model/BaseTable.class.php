<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kula
 * Date: 15.12.11
 * Time: 15:39
 * To change this template use File | Settings | File Templates.
 */
 
class BaseTable extends Doctrine_Table {

    public static function getCultureSlug($model ,$slug)
    {
        $subq = Doctrine_Query::create()
            ->select ('m.id')
            ->from("$model m")
            ->leftJoin('m.Translation t')
            ->where('t.slug = ?', $slug)
            ->fetchOne();
        if ($subq):
        $query = Doctrine_Query::create()
            ->from("$model m")
            ->leftJoin('m.Translation t')
            ->where('m.id = ?', $subq->getId());

            return $query->fetchOne();
        endif;
    }

}
