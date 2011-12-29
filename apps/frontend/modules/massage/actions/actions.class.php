<?php

/**
 * massage actions.
 *
 * @package    sf_sandbox
 * @subpackage massage
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class massageActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->static_page = PageTable::getInstance()->findOneBy('name', 'massage');
        if ($this->static_page->getMetaDescription()) {
            $this->getResponse()->addMeta('description', $this->static_page->getMetaDescription());
        }
        if ($this->static_page->getMetaKeywords()) {
            $this->getResponse()->addMeta('keywords', $this->static_page->getMetaKeywords());
        }
    }

    public function executeShow(sfWebRequest $request)
    {
        $this->massage = Doctrine_Core::getTable('Massage')->findBySlug($request->getParameter('slug'));
        $this->forward404Unless($this->massage);
        if ($this->massage->getMetaDescription()) {
            $this->getResponse()->addMeta('description', $this->massage->getMetaDescription());
        }
        if ($this->massage->getMetaKeywords()) {
            $this->getResponse()->addMeta('keywords', $this->massage->getMetaKeywords());
        }
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new MassageForm();
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new MassageForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($massage = Doctrine_Core::getTable('Massage')->find(array($request->getParameter('id'))), sprintf('Object massage does not exist (%s).', $request->getParameter('id')));
        $this->form = new MassageForm($massage);
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($massage = Doctrine_Core::getTable('Massage')->find(array($request->getParameter('id'))), sprintf('Object massage does not exist (%s).', $request->getParameter('id')));
        $this->form = new MassageForm($massage);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $this->forward404Unless($massage = Doctrine_Core::getTable('Massage')->find(array($request->getParameter('id'))), sprintf('Object massage does not exist (%s).', $request->getParameter('id')));
        $massage->delete();

        $this->redirect('massage/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $massage = $form->save();

            $this->redirect('massage/edit?id='.$massage->getId());
        }
    }
}
