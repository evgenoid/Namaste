<?php

/**
 * practice actions.
 *
 * @package    sf_sandbox
 * @subpackage practice
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class practiceActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->static_page = PageTable::getInstance()->findOneBy('name', 'practice');
        if ($this->static_page->getMetaDescription()) {
            $this->getResponse()->addMeta('description', $this->static_page->getMetaDescription());
        }
        if ($this->static_page->getMetaKeywords()) {
            $this->getResponse()->addMeta('keywords', $this->static_page->getMetaKeywords());
        }

    }

    public function executeShow(sfWebRequest $request)
    {
        $this->practice = Doctrine_Core::getTable('Practice')->findBySlug($request->getParameter('slug'));
        $this->forward404Unless($this->practice);
        if ($this->practice->getMetaDescription()) {
            $this->getResponse()->addMeta('description', $this->practice->getMetaDescription());
        }
        if ($this->practice->getMetaKeywords()) {
            $this->getResponse()->addMeta('keywords', $this->practice->getMetaKeywords());
        }
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new PracticeForm();
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new PracticeForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($practice = Doctrine_Core::getTable('Practice')->find(array($request->getParameter('id'))), sprintf('Object practice does not exist (%s).', $request->getParameter('id')));
        $this->form = new PracticeForm($practice);
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($practice = Doctrine_Core::getTable('Practice')->find(array($request->getParameter('id'))), sprintf('Object practice does not exist (%s).', $request->getParameter('id')));
        $this->form = new PracticeForm($practice);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $this->forward404Unless($practice = Doctrine_Core::getTable('Practice')->find(array($request->getParameter('id'))), sprintf('Object practice does not exist (%s).', $request->getParameter('id')));
        $practice->delete();

        $this->redirect('practice/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $practice = $form->save();
            $this->redirect('practice/edit?id='.$practice->getId());
        }
    }
}
