<?php

/**
 * BaseShowcase
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property text $name
 * @property string $filename
 * @property text $description
 * @property integer $price
 * @property integer $article
 * @property text $size
 * @property text $country
 * @property bigint $category_id
 * @property boolean $availability
 * @property text $meta_title
 * @property text $meta_keywords
 * @property text $meta_description
 * @property CategoryShowcase $CategoryShowcase
 * 
 * @method text             getName()             Returns the current record's "name" value
 * @method string           getFilename()         Returns the current record's "filename" value
 * @method text             getDescription()      Returns the current record's "description" value
 * @method integer          getPrice()            Returns the current record's "price" value
 * @method integer          getArticle()          Returns the current record's "article" value
 * @method text             getSize()             Returns the current record's "size" value
 * @method text             getCountry()          Returns the current record's "country" value
 * @method bigint           getCategoryId()       Returns the current record's "category_id" value
 * @method boolean          getAvailability()     Returns the current record's "availability" value
 * @method text             getMetaTitle()        Returns the current record's "meta_title" value
 * @method text             getMetaKeywords()     Returns the current record's "meta_keywords" value
 * @method text             getMetaDescription()  Returns the current record's "meta_description" value
 * @method CategoryShowcase getCategoryShowcase() Returns the current record's "CategoryShowcase" value
 * @method Showcase         setName()             Sets the current record's "name" value
 * @method Showcase         setFilename()         Sets the current record's "filename" value
 * @method Showcase         setDescription()      Sets the current record's "description" value
 * @method Showcase         setPrice()            Sets the current record's "price" value
 * @method Showcase         setArticle()          Sets the current record's "article" value
 * @method Showcase         setSize()             Sets the current record's "size" value
 * @method Showcase         setCountry()          Sets the current record's "country" value
 * @method Showcase         setCategoryId()       Sets the current record's "category_id" value
 * @method Showcase         setAvailability()     Sets the current record's "availability" value
 * @method Showcase         setMetaTitle()        Sets the current record's "meta_title" value
 * @method Showcase         setMetaKeywords()     Sets the current record's "meta_keywords" value
 * @method Showcase         setMetaDescription()  Sets the current record's "meta_description" value
 * @method Showcase         setCategoryShowcase() Sets the current record's "CategoryShowcase" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseShowcase extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('showcase');
        $this->hasColumn('name', 'text', null, array(
             'type' => 'text',
             ));
        $this->hasColumn('filename', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('description', 'text', null, array(
             'type' => 'text',
             ));
        $this->hasColumn('price', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('article', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('size', 'text', null, array(
             'type' => 'text',
             ));
        $this->hasColumn('country', 'text', null, array(
             'type' => 'text',
             ));
        $this->hasColumn('category_id', 'bigint', null, array(
             'type' => 'bigint',
             ));
        $this->hasColumn('availability', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('meta_title', 'text', null, array(
             'type' => 'text',
             ));
        $this->hasColumn('meta_keywords', 'text', null, array(
             'type' => 'text',
             ));
        $this->hasColumn('meta_description', 'text', null, array(
             'type' => 'text',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('CategoryShowcase', array(
             'local' => 'category_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'name',
              1 => 'description',
              2 => 'country',
              3 => 'meta_title',
              4 => 'meta_keywords',
              5 => 'meta_description',
             ),
             ));
        $sluggable1 = new Doctrine_Template_Sluggable(array(
             'fields' => 
             array(
              0 => 'name',
             ),
             'unique' => true,
             'type' => 'string',
             'builder' => 
             array(
              0 => 'Slug',
              1 => 'slugify',
             ),
             'indexName' => 'slugShowcase',
             'uniqueBy' => 
             array(
              0 => 'lang',
             ),
             ));
        $i18n0->addChild($sluggable1);
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($i18n0);
        $this->actAs($timestampable0);
    }
}