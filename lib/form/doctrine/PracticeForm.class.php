<?php

/**
 * Practice form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PracticeForm extends BasePracticeForm
{
  public function configure()
  {
       unset(
        $this['created_at'],
        $this['updated_at']
      );
      $this->embedI18n(array('uk', 'ru'));
      $this->widgetSchema->setLabel('ru', 'Русский');
      $this->widgetSchema->setLabel('uk', 'Українська');
      $this->widgetSchema['uk']['name']->setLabel('name_uk');
      $this->widgetSchema['uk']['text']->setLabel('text_uk');
      $this->widgetSchema['uk']['meta_title']->setLabel('meta_title_uk');
      $this->widgetSchema['uk']['meta_keywords']->setLabel('meta_keywords_uk');
      $this->widgetSchema['uk']['meta_description']->setLabel('meta_description_uk');
      $this->widgetSchema['ru']['name']->setLabel('name_ru');
      $this->widgetSchema['ru']['text']->setLabel('text_ru');
      $this->widgetSchema['ru']['meta_title']->setLabel('meta_title_ru');
      $this->widgetSchema['ru']['meta_keywords']->setLabel('meta_keywords_ru');
      $this->widgetSchema['ru']['meta_description']->setLabel('meta_description_ru');
  }
}
