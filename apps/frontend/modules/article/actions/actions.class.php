<?php

/**
 * article actions.
 *
 * @package    sf_sandbox
 * @subpackage article
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class articleActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->pager = new sfDoctrinePager('Article',sfConfig::get('app_max_articles_per_page'));
    $this->pager->getQuery();
    $this->pager->setTableMethod('getArticleDesc');
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
    $this->page = $request->getParameter('page');
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->article = Doctrine_Core::getTable('Article')->findBySlug($request->getParameter('slug'));
    $this->forward404Unless($this->article);
    $this->article->getMetaDescription() ?
        $this->getResponse()->addMeta('description', $this->article->getMetaDescription()):
        $this->getResponse()->addMeta('description', $this->article->getDescription());
    if ($this->article->getMetaKeywords()) {
        $this->getResponse()->addMeta('keywords', $this->article->getMetaKeywords());
    }
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ArticleForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ArticleForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($article = Doctrine_Core::getTable('Article')->find(array($request->getParameter('id'))), sprintf('Object article does not exist (%s).', $request->getParameter('id')));
    $this->form = new ArticleForm($article);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($article = Doctrine_Core::getTable('Article')->find(array($request->getParameter('id'))), sprintf('Object article does not exist (%s).', $request->getParameter('id')));
    $this->form = new ArticleForm($article);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($article = Doctrine_Core::getTable('Article')->find(array($request->getParameter('id'))), sprintf('Object article does not exist (%s).', $request->getParameter('id')));
    $article->delete();

    $this->redirect('article/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $article = $form->save();

      $this->redirect('article/edit?id='.$article->getId());
    }
  }
}
