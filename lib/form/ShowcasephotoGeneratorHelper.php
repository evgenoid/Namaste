<?php

/**
 * picture module helper.
 *
 * @package    sf_sandbox
 * @subpackage picture
 * @author     Your name here
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ShowcasephotoGeneratorHelper extends sfModelGeneratorHelper
{
     public function getUrlForAction($action)
  {
    return 'list' == $action ? 'showcase' : 'showcase_'.$action;
  }
}
