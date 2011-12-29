<?php

/**
 * TeamTranslation filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTeamTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'             => new sfWidgetFormFilterInput(),
      'surname'          => new sfWidgetFormFilterInput(),
      'description'      => new sfWidgetFormFilterInput(),
      'biography'        => new sfWidgetFormFilterInput(),
      'post'             => new sfWidgetFormFilterInput(),
      'meta_title'       => new sfWidgetFormFilterInput(),
      'meta_keywords'    => new sfWidgetFormFilterInput(),
      'meta_description' => new sfWidgetFormFilterInput(),
      'slug'             => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'             => new sfValidatorPass(array('required' => false)),
      'surname'          => new sfValidatorPass(array('required' => false)),
      'description'      => new sfValidatorPass(array('required' => false)),
      'biography'        => new sfValidatorPass(array('required' => false)),
      'post'             => new sfValidatorPass(array('required' => false)),
      'meta_title'       => new sfValidatorPass(array('required' => false)),
      'meta_keywords'    => new sfValidatorPass(array('required' => false)),
      'meta_description' => new sfValidatorPass(array('required' => false)),
      'slug'             => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('team_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TeamTranslation';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'name'             => 'Text',
      'surname'          => 'Text',
      'description'      => 'Text',
      'biography'        => 'Text',
      'post'             => 'Text',
      'meta_title'       => 'Text',
      'meta_keywords'    => 'Text',
      'meta_description' => 'Text',
      'lang'             => 'Text',
      'slug'             => 'Text',
    );
  }
}
