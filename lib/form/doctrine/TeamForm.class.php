<?php

/**
 * Team form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TeamForm extends BaseTeamForm
{
  public function configure()
  {
      $this->embedI18n(array('uk', 'ru'));
      $this->widgetSchema->setLabel('ru', 'Русский');
      $this->widgetSchema->setLabel('uk', 'Українська');
      $this->widgetSchema->setLabel('uk', 'Українська');
      $this->widgetSchema['uk']['name']->setLabel('name_uk');
      $this->widgetSchema['uk']['surname']->setLabel('surname_uk');
      $this->widgetSchema['uk']['description']->setLabel('description_uk');
      $this->widgetSchema['uk']['biography']->setLabel('biography_uk');
      $this->widgetSchema['uk']['post']->setLabel('post_uk');
      $this->widgetSchema['uk']['meta_title']->setLabel('meta_title_uk');
      $this->widgetSchema['uk']['meta_keywords']->setLabel('meta_keywords_uk');
      $this->widgetSchema['uk']['meta_description']->setLabel('meta_description_uk');
      $this->widgetSchema['ru']['name']->setLabel('name_ru');
      $this->widgetSchema['ru']['surname']->setLabel('surname_ru');
      $this->widgetSchema['ru']['description']->setLabel('description_ru');
      $this->widgetSchema['ru']['biography']->setLabel('biography_ru');
      $this->widgetSchema['ru']['post']->setLabel('post_ru');
      $this->widgetSchema['ru']['meta_title']->setLabel('meta_title_ru');
      $this->widgetSchema['ru']['meta_keywords']->setLabel('meta_keywords_ru');
      $this->widgetSchema['ru']['meta_description']->setLabel('meta_description_ru');

      $this->setWidget('photo', new sfWidgetFormInputFileEditable(array(
          'is_image'  => true,
          'edit_mode' => !$this->isNew(),
          'file_src'  =>  '/uploads/team/'.$this->getObject()->getPhoto(),
          'with_delete' => true,
          'template' => '%file%<br />%input%<br />%delete% %delete_label%'
      )));
      $this->setValidator('photo', new sfValidatorFile(array(
          'mime_type_guessers' => array('guessFromFileinfo'),
          'path' => sfConfig::get('sf_upload_dir').'/team',
          'required' => false,
          'validated_file_class' => 'mdValidatedFile',
      )));
      $this->validatorSchema['photo_delete'] = new sfValidatorPass();
  }
}
