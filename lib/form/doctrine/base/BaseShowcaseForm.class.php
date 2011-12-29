<?php

/**
 * Showcase form base class.
 *
 * @method Showcase getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseShowcaseForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'filename'     => new sfWidgetFormInputText(),
      'price'        => new sfWidgetFormInputText(),
      'article'      => new sfWidgetFormInputText(),
      'size'         => new sfWidgetFormInputText(),
      'category_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CategoryShowcase'), 'add_empty' => true)),
      'availability' => new sfWidgetFormInputCheckbox(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'filename'     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'price'        => new sfValidatorInteger(array('required' => false)),
      'article'      => new sfValidatorInteger(array('required' => false)),
      'size'         => new sfValidatorPass(array('required' => false)),
      'category_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CategoryShowcase'), 'required' => false)),
      'availability' => new sfValidatorBoolean(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('showcase[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Showcase';
  }

}
