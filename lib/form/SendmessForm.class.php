<?php

/**
 * News form base class.
 *
 * @method News getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */

class SendmessForm extends BaseFormDoctrine
{
    public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormInputText(),
      'theme'       => new sfWidgetFormInputText(),
      'mail'        => new sfWidgetFormInputText(),
      'text'        => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorString(array('required' => true)),
      'theme'       => new sfValidatorString(array('required' => true)),
      'mail'        => new sfValidatorEmail(array('required' => true)),
      'text'        => new sfValidatorString(array('required' => true)),
    ));

    $this->widgetSchema->setNameFormat('message[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }
     public function configure()
  {       
       $this->widgetSchema->setLabels(array(
          'name'   => "Ім'я",
          'theme'  => 'Тема',
          'mail'   => 'E-mail',
          'text'   => 'Повідомленя',
        ));
       $this->widgetSchema['text']->setAttribute('rows',5);
       $this->widgetSchema['text']->setAttribute('cols',50);
       $this->validatorSchema['name']->setMessage('required', "*Відсутнє ім'я");
       $this->validatorSchema['theme']->setMessage('required', '*Відсутня тема');
       $this->validatorSchema['mail']->setMessage('invalid', '*Введіть коректный e-mail');
       $this->validatorSchema['mail']->setMessage('required', '*Відсутня зворотня адреса');
       $this->validatorSchema['text']->setMessage('required', '*Відсутній текст повідомлення');
  }
     public function getModelName()
  {
    return 'Page';
  }
}
