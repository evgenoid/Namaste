<?php

/**
 * picture module helper.
 *
 * @package    sf_sandbox
 * @subpackage picture
 * @author     Your name here
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PhotoGeneratorHelper extends sfModelGeneratorHelper
{
     public function getUrlForAction($action)
  {
    return 'list' == $action ? 'photo' : 'photo_'.$action;
  }
}
