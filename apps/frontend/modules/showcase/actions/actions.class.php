<?php

/**
 * showcase actions.
 *
 * @package    sf_sandbox
 * @subpackage showcase
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class showcaseActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->static_page = PageTable::getInstance()->findOneBy('name', 'showcase');
    }

    public function executeShow(sfWebRequest $request)
    {
        $this->category_showcase = Doctrine_Core::getTable('CategoryShowcase')->findBySlug($request->getParameter('slug'));
        $this->forward404Unless($this->category_showcase);
        $this->category_showcase->getMetaDescription() ?
            $this->getResponse()->addMeta('description', $this->category_showcase->getMetaDescription()):
            $this->getResponse()->addMeta('description', $this->category_showcase->getDescription());
        if ($this->category_showcase->getMetaKeywords()) {
            $this->getResponse()->addMeta('keywords', $this->category_showcase->getMetaKeywords());
        }
    }

    public function executeShowShowcase(sfWebRequest $request)
    {
        $this->showcase = ShowcaseTable::getInstance()->findBySlug($request->getParameter('slug'));
        $this->forward404Unless($this->showcase);
        $this->showcase->getMetaDescription() ?
            $this->getResponse()->addMeta('description', $this->showcase->getMetaDescription()):
            $this->getResponse()->addMeta('description', $this->showcase->getDescription());
        if ($this->showcase->getMetaKeywords()) {
            $this->getResponse()->addMeta('keywords', $this->showcase->getMetaKeywords());
        }

    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new CategoryShowcaseForm();
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new CategoryShowcaseForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($category_showcase = Doctrine_Core::getTable('CategoryShowcase')->find(array($request->getParameter('id'))), sprintf('Object category_showcase does not exist (%s).', $request->getParameter('id')));
        $this->form = new CategoryShowcaseForm($category_showcase);
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($category_showcase = Doctrine_Core::getTable('CategoryShowcase')->find(array($request->getParameter('id'))), sprintf('Object category_showcase does not exist (%s).', $request->getParameter('id')));
        $this->form = new CategoryShowcaseForm($category_showcase);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $this->forward404Unless($category_showcase = Doctrine_Core::getTable('CategoryShowcase')->find(array($request->getParameter('id'))), sprintf('Object category_showcase does not exist (%s).', $request->getParameter('id')));
        $category_showcase->delete();

        $this->redirect('showcase/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $category_showcase = $form->save();

            $this->redirect('showcase/edit?id='.$category_showcase->getId());
        }
    }
}
