<?php

/**
 * CategoryShowcase form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CategoryShowcaseForm extends BaseCategoryShowcaseForm
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
          $showcase = new Showcase();
          $showcase->setCategoryShowcase($this->getObject());
          $form = new ShowcaseForm($showcase);
          $subForm->embedForm(0, $form);
          $subForm->widgetSchema['0']->setLabel('Фото 1');
      else:
          $showcases = $this->getObject()->getShowcases();
          $count = 0;
          foreach ($showcases as $showcase)
          {
              $form = new ShowcaseForm($showcase);
              $subForm->embedForm($count, $form);
              $subForm->widgetSchema[$count]->setLabel('Фото '.(string)($count+1));
              $count ++;
          }
      endif;
      $this->embedForm('showcases', $subForm);

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

   public function addShowcase($num)
  {
      $showcase = new Showcase();
      $showcase->CategoryShowcase = $this->getObject();
      $showcase_form = new ShowcaseForm($showcase);
      //Embedding the new picture in the container
      $this->embeddedForms['showcases']->embedForm($num, $showcase_form);
      //Re-embedding the container
      $this->embedForm('showcases', $this->embeddedForms['showcases']);


  }

  public function bind(array $taintedValues = null, array $taintedFiles = null)
  {
      foreach($taintedValues['showcases'] as $key=>$newPic)
      {

          if (!isset($this['showcases'][$key]))
          {
              $this->addShowcase($key);
          }
      }
      parent::bind($taintedValues, $taintedFiles);
  }
}
