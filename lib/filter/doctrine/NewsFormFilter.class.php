<?php

/**
 * News filter form.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NewsFormFilter extends BaseNewsFormFilter
{
  public function configure()
  {
       unset(
        $this['created_at'],
        $this['updated_at']
      );
  }
}
