<?php

/**
 * team actions.
 *
 * @package    sf_sandbox
 * @subpackage team
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class teamActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->teams = Doctrine_Core::getTable('Team')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->team = Doctrine_Core::getTable('Team')->findBySlug($request->getParameter('slug'));
    $this->forward404Unless($this->team);
    $this->team->getMetaDescription() ?
        $this->getResponse()->addMeta('description', $this->team->getMetaDescription()):
        $this->getResponse()->addMeta('description', $this->team->getDescription());
    if ($this->team->getMetaKeywords()) {
        $this->getResponse()->addMeta('keywords', $this->team->getMetaKeywords());
    }
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TeamForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TeamForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($team = Doctrine_Core::getTable('Team')->find(array($request->getParameter('id'))), sprintf('Object team does not exist (%s).', $request->getParameter('id')));
    $this->form = new TeamForm($team);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($team = Doctrine_Core::getTable('Team')->find(array($request->getParameter('id'))), sprintf('Object team does not exist (%s).', $request->getParameter('id')));
    $this->form = new TeamForm($team);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($team = Doctrine_Core::getTable('Team')->find(array($request->getParameter('id'))), sprintf('Object team does not exist (%s).', $request->getParameter('id')));
    $team->delete();

    $this->redirect('team/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $team = $form->save();

      $this->redirect('team/edit?id='.$team->getId());
    }
  }
}
