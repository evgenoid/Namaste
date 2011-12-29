<?php

require_once dirname(__FILE__).'/../lib/showcasephotoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/showcasephotoGeneratorHelper.class.php';

/**
 * showcasephoto actions.
 *
 * @package    sf_sandbox
 * @subpackage showcasephoto
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class showcasephotoActions extends autoShowcasephotoActions
{
      public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

    $filename = $this->getRoute()->getObject()->getFilename();
    if ($this->getRoute()->getObject()->delete()):
        $form = new ShowcaseForm();
        $form->removeThumbnail(sfConfig::get('sf_upload_dir').'/showcase',$filename);
        unlink( sfConfig::get('sf_upload_dir').'/showcase/'.$filename);
        $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
    endif;
    $this->redirect($request->getReferer());
  }
}
