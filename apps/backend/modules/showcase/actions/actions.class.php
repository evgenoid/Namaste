<?php

require_once dirname(__FILE__).'/../lib/showcaseGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/showcaseGeneratorHelper.class.php';

/**
 * showcase actions.
 *
 * @package    sf_sandbox
 * @subpackage showcase
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class showcaseActions extends autoShowcaseActions
{
    public function executeAjax($request)
  {
    $q = array();
    $q = preg_split("/(,\s)/", $request->getParameter('q'));
    $q = $q[count($q)-1];
    $this->getResponse()->setContentType('application/json');
    $tags = WorkTable::retrieveForSelect(
            $q,
            $request->getParameter('limit')
            );

    return $this->renderText(json_encode($tags));
  }

  public function executeAddPicForm($request)
  {
      $this->forward404unless($request->isXmlHttpRequest());
      $number = intval($request->getParameter('num'));
      if($category = Doctrine_Core::getTable('CategoryShowcase')->find($request->getParameter('id')))
      {
          $form = new CategoryShowcaseForm($category);
      }else{
          $form = new CategoryShowcaseForm(null);
      }
      $form->addShowcase($number);
      return $this->renderPartial('showcase_form',array('form' => $form, 'num' => $number));
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));
    $showcases = $this->getRoute()->getObject()->getShowcases();
    if ($this->getRoute()->getObject()->delete())
    {
    foreach ($showcases as $showcase):
        $filename = $showcase->getFilename();
        $form = new CategoryShowcaseForm();
        $form->removeThumbnail(sfConfig::get('sf_upload_dir').'/showcase',$filename);
        unlink( sfConfig::get('sf_upload_dir').'/showcase/'.$filename);
        $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
    endforeach;

      $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
    }

    $this->redirect('@category_showcase');
  }

   protected function executeBatchDelete(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');

    $records = Doctrine_Query::create()
      ->from('CategoryShowcase c')
      ->whereIn('id', $ids)
      ->leftJoin('c.Showcases cs')
      ->execute();
    foreach ($records as $record)
    {
      if ($record->delete()):
      $showcases = $record->getShowcases();
        foreach ($showcases as $showcase):
            $filename = $showcase->getFilename();
            $form = new CategoryShowcaseForm();
            $form->removeThumbnail(sfConfig::get('sf_upload_dir').'/showcase',$filename);
            unlink( sfConfig::get('sf_upload_dir').'/showcase/'.$filename);
            $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
        endforeach;
      endif;

    }

    $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
    $this->redirect('@category_showcase');
  }
}