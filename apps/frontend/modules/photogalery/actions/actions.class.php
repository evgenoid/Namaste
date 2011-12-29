<?php

/**
 * photogalery actions.
 *
 * @package    sf_sandbox
 * @subpackage photogalery
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class photogaleryActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->category_photos = Doctrine_Core::getTable('CategoryPhoto')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->category_photo = Doctrine_Core::getTable('CategoryPhoto')->findBySlug($request->getParameter('slug'));
    $this->forward404Unless($this->category_photo);
    $this->category_photo->getMetaDescription() ?
        $this->getResponse()->addMeta('description', $this->category_photo->getMetaDescription()):
        $this->getResponse()->addMeta('description', $this->category_photo->getDescription());
    if ($this->category_photo->getMetaKeywords()) {
        $this->getResponse()->addMeta('keywords', $this->category_photo->getMetaKeywords());
    }
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CategoryPhotoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CategoryPhotoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($category_photo = Doctrine_Core::getTable('CategoryPhoto')->find(array($request->getParameter('id'))), sprintf('Object category_photo does not exist (%s).', $request->getParameter('id')));
    $this->form = new CategoryPhotoForm($category_photo);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($category_photo = Doctrine_Core::getTable('CategoryPhoto')->find(array($request->getParameter('id'))), sprintf('Object category_photo does not exist (%s).', $request->getParameter('id')));
    $this->form = new CategoryPhotoForm($category_photo);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($category_photo = Doctrine_Core::getTable('CategoryPhoto')->find(array($request->getParameter('id'))), sprintf('Object category_photo does not exist (%s).', $request->getParameter('id')));
    $category_photo->delete();

    $this->redirect('photogalery/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $category_photo = $form->save();

      $this->redirect('photogalery/edit?id='.$category_photo->getId());
    }
  }
}
