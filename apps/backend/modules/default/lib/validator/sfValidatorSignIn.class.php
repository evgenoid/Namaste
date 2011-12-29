<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kula
 * Date: 06.12.11
 * Time: 8:44
 * To change this template use File | Settings | File Templates.
 */
 
class sfValidatorSignIn extends sfValidatorBase
{
    protected function configure($options = array(), $messages = array())
    {
        $this->setMessage('invalid', 'Неправильный логин или пароль');
    }

    protected function doClean($values)
    {
        if (null === $values)
        {
          $values = array();
        }
        if (!is_array($values))
        {
          throw new InvalidArgumentException('You must pass an array parameter to the clean() method');
        }
        $login  = $values['login'];
        $password = $values['password'];

        if ($login !== sfConfig::get('app_login') || $password !== sfConfig::get('app_password'))
        {
            throw new sfValidatorError($this, 'invalid', array('value' => $values));
        }
      
        return $values;
    }
}
