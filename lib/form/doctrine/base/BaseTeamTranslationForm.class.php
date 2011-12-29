<?php

/**
 * TeamTranslation form base class.
 *
 * @method TeamTranslation getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTeamTranslationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'name'             => new sfWidgetFormInputText(),
      'surname'          => new sfWidgetFormInputText(),
      'description'      => new sfWidgetFormInputText(),
      'biography'        => new sfWidgetFormInputText(),
      'post'             => new sfWidgetFormInputText(),
      'meta_title'       => new sfWidgetFormInputText(),
      'meta_keywords'    => new sfWidgetFormInputText(),
      'meta_description' => new sfWidgetFormInputText(),
      'lang'             => new sfWidgetFormInputHidden(),
      'slug'             => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'             => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'surname'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'description'      => new sfValidatorPass(array('required' => false)),
      'biography'        => new sfValidatorPass(array('required' => false)),
      'post'             => new sfValidatorPass(array('required' => false)),
      'meta_title'       => new sfValidatorPass(array('required' => false)),
      'meta_keywords'    => new sfValidatorPass(array('required' => false)),
      'meta_description' => new sfValidatorPass(array('required' => false)),
      'lang'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('lang')), 'empty_value' => $this->getObject()->get('lang'), 'required' => false)),
      'slug'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'TeamTranslation', 'column' => array('slug', 'lang')))
    );

    $this->widgetSchema->setNameFormat('team_translation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TeamTranslation';
  }

}
