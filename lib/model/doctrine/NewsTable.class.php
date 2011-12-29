<?php

/**
 * NewsTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class NewsTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object NewsTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('News');
    }

    public function getLastNews($count = 1){

        $query = Doctrine_Query::create()
            ->from('News n')
            ->limit($count)
            ->orderBy('n.created_at DESC');
        if ($count > 1) {

            return $query->execute();
        } else {

            return $query->fetchOne();
        }
    }

    public function findBySlug($slug)
    {
        $q = Doctrine_Query::create()
        ->from('News n')
        ->leftJoin('n.Translation t')
        ->where('t.slug = ?',$slug);
     return $q->fetchOne();
    }

    public static function getNewsDesc()
    {
       $query = Doctrine_Query::create()
        ->from('News n')
        ->orderBy('n.updated_at DESC');
        return $query;
    }
}
