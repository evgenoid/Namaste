<?php

/**
 * news actions.
 *
 * @package    sf_sandbox
 * @subpackage news
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->pager = new sfDoctrinePager('News',sfConfig::get('app_max_news_per_page'));
    $this->pager->getQuery();
    $this->pager->setTableMethod('getNewsDesc');
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
    $this->page = $request->getParameter('page');
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->news = Doctrine_Core::getTable('News')->findBySlug($request->getParameter('slug'));
    $this->forward404Unless($this->news);
    $this->news->getMetaDescription() ?
        $this->getResponse()->addMeta('description', $this->news->getMetaDescription()):
        $this->getResponse()->addMeta('description', $this->news->getDescription());
    if ($this->news->getMetaKeywords()) {
        $this->getResponse()->addMeta('keywords', $this->news->getMetaKeywords());
    }
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new NewsForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new NewsForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($news = Doctrine_Core::getTable('News')->find(array($request->getParameter('id'))), sprintf('Object news does not exist (%s).', $request->getParameter('id')));
    $this->form = new NewsForm($news);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($news = Doctrine_Core::getTable('News')->find(array($request->getParameter('id'))), sprintf('Object news does not exist (%s).', $request->getParameter('id')));
    $this->form = new NewsForm($news);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($news = Doctrine_Core::getTable('News')->find(array($request->getParameter('id'))), sprintf('Object news does not exist (%s).', $request->getParameter('id')));
    $news->delete();

    $this->redirect('news/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $news = $form->save();

      $this->redirect('news/edit?id='.$news->getId());
    }
  }
}
