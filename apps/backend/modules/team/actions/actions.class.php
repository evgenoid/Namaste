<?php

require_once dirname(__FILE__).'/../lib/teamGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/teamGeneratorHelper.class.php';

/**
 * team actions.
 *
 * @package    sf_sandbox
 * @subpackage team
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class teamActions extends autoTeamActions
{
      public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));
    $filename = $this->getRoute()->getObject()->getPhoto();
    if ($this->getRoute()->getObject()->delete()):
        $form = new TeamForm();
        $form->removeThumbnail(sfConfig::get('sf_upload_dir').'/team',$filename);
        unlink( sfConfig::get('sf_upload_dir').'/team/'.$filename);
        $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
    endif;
    $this->redirect('@team');
  }

  protected function executeBatchDelete(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');

    $records = Doctrine_Query::create()
      ->from('Team')
      ->whereIn('id', $ids)
      ->execute();

    foreach ($records as $record)
    {
      $record->delete();
      unlink( sfConfig::get('sf_upload_dir').'/team/'.$record->getPhoto());
    }

    $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
    $this->redirect('@team');
  }
}
