<?php

/**
 * Showcase filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseShowcaseFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'filename'     => new sfWidgetFormFilterInput(),
      'price'        => new sfWidgetFormFilterInput(),
      'article'      => new sfWidgetFormFilterInput(),
      'size'         => new sfWidgetFormFilterInput(),
      'category_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CategoryShowcase'), 'add_empty' => true)),
      'availability' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'filename'     => new sfValidatorPass(array('required' => false)),
      'price'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'article'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'size'         => new sfValidatorPass(array('required' => false)),
      'category_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CategoryShowcase'), 'column' => 'id')),
      'availability' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('showcase_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Showcase';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'filename'     => 'Text',
      'price'        => 'Number',
      'article'      => 'Number',
      'size'         => 'Text',
      'category_id'  => 'ForeignKey',
      'availability' => 'Boolean',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
