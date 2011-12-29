<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * defaultActions module.
 *
 * @package    symfony
 * @subpackage action
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class defaultActions extends sfActions
{
  /**
   * Congratulations page for creating an application
   *
   */
  public function executeIndex(sfWebRequest $request)
  {
    if (!$request->getParameter('sf_culture'))
    {
        $this->redirect('homepage_localized');
    }
  }

  /**
   * Congratulations page for creating a module
   *
   */
  public function executeModule()
  {
  }

  /**
   * Error page for page not found (404) error
   *
   */
  public function executeError404()
  {
  }

  /**
   * Warning page for restricted area - requires login
   *
   */
  public function executeSecure()
  {
  }

  /**
   * Warning page for restricted area - requires credentials
   *
   */
  public function executeLogin()
  {
  }

  /**
   * Module disabled in settings.yml
   *
   */
  public function executeDisabled()
  {
  }

  public function executeSendmess(sfWebRequest $request)
  {
    $this->culture = $this->getUser()->getCulture();
    $this->form = new SendmessForm();
    $parameters = $request->getPostParameter('message');
    if ($request->isMethod('post')) {
    $this->form->bind($request->getParameter($this->form->getName()));
        if ($this->form->isValid()) {
            try {
                $message = Swift_Message::newInstance();
                $message = $this->getMailer()->compose(
                $parameters['mail'],
                sfConfig::get('app_contact_email'),
                $parameters['theme'],
                'Прислал '.$parameters['name'].':
                '.$parameters['text']
                );
                if ($this->getMailer()->send($message)){
                    $notice = 'Сообщение отправлено успешно';
                }
            }
            catch (Doctrine_Validator_Exception $e) {
            }
            $this->getUser()->setFlash('notice', $notice);
        } else {
            $this->getUser()->setFlash('error', 'Сообщение не отправлено', false);
        }
    }
  }
}
