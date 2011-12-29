<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kula
 * Date: 30.11.11
 * Time: 15:33
 * To change this template use File | Settings | File Templates.
 */
 
class sfSignInForm extends BaseForm {

    public function setup()
    {
        $this->setWidgets(array(
            'login'   => new sfWidgetFormInputText(),
            'password'       => new sfWidgetFormInputPassword()
        ));
        $this->setValidators(array(
            'login'               => new sfValidatorString(array()),
            'password'            => new sfValidatorString(array()),
        ));
        $this->validatorSchema->setPostValidator(
            new sfValidatorSignIn()
        );
        $this->widgetSchema->setLabels(array(
            'login' => 'Логин',
            'password' => 'Пароль',
        ));
        $this->widgetSchema->setNameFormat('signin[%s]');
    }
}
