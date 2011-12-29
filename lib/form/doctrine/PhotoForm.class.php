<?php

/**
 * Photo form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PhotoForm extends BasePhotoForm
{
  public function configure()
  {
      unset(
          $this['created_at'],
          $this['updated_at'],
          $this['category_id']
      );
      $this->embedI18n(array('uk', 'ru'));
      $this->widgetSchema->setLabel('ru', 'Русский');
      $this->widgetSchema->setLabel('uk', 'Українська');
      $this->widgetSchema['uk']['description']->setLabel('description_uk');
      $this->widgetSchema['ru']['description']->setLabel('description_ru');

      $this->setWidget('filename', new sfWidgetFormInputFileEditable(array(
          'is_image'  => true,
          'edit_mode' => !$this->isNew(),
          'file_src'  =>  '/uploads/photogalery/'.$this->getObject()->getFilename(),
          'with_delete' => true,
          'template' => '%file%<br />%input%<br />%delete% %delete_label%'
      )));
      $this->setValidator('filename', new sfValidatorFile(array(
          'mime_type_guessers' => array('guessFromFileinfo'),
          'path' => sfConfig::get('sf_upload_dir').'/photogalery',
          'required' => false,
          'validated_file_class' => 'mdValidatedFile',
      )));
      $this->validatorSchema['filename_photo'] = new sfValidatorPass();
      $this->setWidget('delete_photo', new DelPhoto(array(
          'object' => $this->getObject(),
      )));
//      $this->widgetSchema['delete_photo']->setLabel(' ');
  }
}
