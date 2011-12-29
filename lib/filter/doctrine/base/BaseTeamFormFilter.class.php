<?php

/**
 * Team filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTeamFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'photo' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'photo' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('team_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Team';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'photo' => 'Text',
    );
  }
}
