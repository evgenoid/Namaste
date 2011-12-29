<?php

require_once dirname(__FILE__).'/../lib/photoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/photoGeneratorHelper.class.php';

/**
 * photo actions.
 *
 * @package    sf_sandbox
 * @subpackage photo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class photoActions extends autoPhotoActions
{
     public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

    $filename = $this->getRoute()->getObject()->getFilename();
    if ($this->getRoute()->getObject()->delete()):
        $form = new PhotoForm();
        $form->removeThumbnail(sfConfig::get('sf_upload_dir').'/photogalery',$filename);
        unlink( sfConfig::get('sf_upload_dir').'/photogalery/'.$filename);
        $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
    endif;
    $this->redirect($request->getReferer());
  }
}
