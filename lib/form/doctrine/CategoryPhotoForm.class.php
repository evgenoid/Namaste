<?php

/**
 * CategoryPhoto form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CategoryPhotoForm extends BaseCategoryPhotoForm
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
      $this->widgetSchema['uk']['description']->setLabel('description_uk');
      $this->widgetSchema['uk']['meta_title']->setLabel('meta_title_uk');
      $this->widgetSchema['uk']['meta_keywords']->setLabel('meta_keywords_uk');
      $this->widgetSchema['uk']['meta_description']->setLabel('meta_description_uk');
      $this->widgetSchema['ru']['name']->setLabel('name_ru');
      $this->widgetSchema['ru']['description']->setLabel('description_ru');
      $this->widgetSchema['ru']['meta_title']->setLabel('meta_title_ru');
      $this->widgetSchema['ru']['meta_keywords']->setLabel('meta_keywords_ru');
      $this->widgetSchema['ru']['meta_description']->setLabel('meta_description_ru');

      $subForm = new sfForm();
      if ($this->getObject()->isNew()):
          $photo = new Photo();
          $photo->setCategoryPhoto($this->getObject());
          $form = new PhotoForm($photo);
          $subForm->embedForm(0, $form);
          $subForm->widgetSchema['0']->setLabel('Фото 1');
      else:
          $photos = $this->getObject()->getPhotos();
          $count = 0;
          foreach ($photos as $photo)
          {
              $form = new PhotoForm($photo);
              $subForm->embedForm($count, $form);
              $subForm->widgetSchema[$count]->setLabel('Фото '.(string)($count+1));
              $count ++;
          }
      endif;
      $this->embedForm('photos', $subForm);

      $this->setWidget('plus', new nmWidgetImage());
      $this->widgetSchema['plus']->setAttributes(array(
           'src' => '/images/plus.png',
           'id' => 'add_picture',
           'onmouseover' => "$(this).attr('src', '/images/plus_hover.png')",
           'onmouseout' => "$(this).attr('src', '/images/plus.png')",
           'onclick' => "$(this).attr('src', '/images/plus_click.png')",
      ));
      $this->setWidget('minus', new nmWidgetImage());
      $this->widgetSchema['minus']->setAttributes(array(
           'src' => '/images/minus.png',
           'id' => 'del_picture',
           'onmouseover' => "$(this).attr('src', '/images/minus_hover.png')",
           'onmouseout' => "$(this).attr('src', '/images/minus.png')",
           'onclick' => "$(this).attr('src', '/images/minus_click.png')",
      ));
  }

   public function addPhoto($num)
  {
      $photo = new Photo();
      $photo->CategoryPhoto = $this->getObject();
      $photo_form = new PhotoForm($photo);
      //Embedding the new picture in the container
      $this->embeddedForms['photos']->embedForm($num, $photo_form);
      //Re-embedding the container
      $this->embedForm('photos', $this->embeddedForms['photos']);


  }

  public function bind(array $taintedValues = null, array $taintedFiles = null)
  {
      foreach($taintedValues['photos'] as $key=>$newPic)
      {

          if (!isset($this['photos'][$key]))
          {
              $this->addPhoto($key);
          }
      }
      parent::bind($taintedValues, $taintedFiles);
  }
}
