<?php

require_once dirname(__FILE__).'/../lib/photogaleryGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/photogaleryGeneratorHelper.class.php';

/**
 * photogalery actions.
 *
 * @package    sf_sandbox
 * @subpackage photogalery
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class photogaleryActions extends autoPhotogaleryActions
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
      if($category = Doctrine_Core::getTable('CategoryPhoto')->find($request->getParameter('id')))
      {
          $form = new CategoryPhotoForm($category);
      }else{
          $form = new CategoryPhotoForm(null);
      }
      $form->addPhoto($number);
      return $this->renderPartial('photo_form',array('form' => $form, 'num' => $number));
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));
    $photos = $this->getRoute()->getObject()->getPhotos();
    if ($this->getRoute()->getObject()->delete())
    {
    foreach ($photos as $photo):
        $filename = $photo->getFilename();
        $form = new CategoryPhotoForm();
        $form->removeThumbnail(sfConfig::get('sf_upload_dir').'/photogalery',$filename);
        unlink( sfConfig::get('sf_upload_dir').'/photogalery/'.$filename);
        $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
    endforeach;

      $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
    }

    $this->redirect('@category_photo');
  }

   protected function executeBatchDelete(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');

    $records = Doctrine_Query::create()
      ->from('CategoryPhoto c')
      ->whereIn('id', $ids)
      ->leftJoin('c.Photos cp')
      ->execute();
    foreach ($records as $record)
    {
      if ($record->delete()):
      $photos = $record->getPhotos();
        foreach ($photos as $photo):
            $filename = $photo->getFilename();
            $form = new CategoryPhotoForm();
            $form->removeThumbnail(sfConfig::get('sf_upload_dir').'/photogalery',$filename);
            unlink( sfConfig::get('sf_upload_dir').'/photogalery/'.$filename);
            $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
        endforeach;
      endif;

    }

    $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
    $this->redirect('@category_photo');
  }
}
