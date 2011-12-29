<?php

/**
 * TeamTranslation form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TeamTranslationForm extends BaseTeamTranslationForm
{
  public function configure()
  {
    $this->setWidget('biography', new nmWidgetFormTextareaTinyMCE(
       array(
          'width' => '700',
          'height' => '250',
       )
    ));
    $this->setWidget('description', new nmWidgetFormTextareaTinyMCE(
       array(
          'width' => '700',
          'height' => '150',
       )
    ));
  }
}
