<?php

class massageComponents extends sfComponents
{
     public function executeMenu(sfWebRequest $request)
  {
      $this->items = MassageTable::getInstance()->findAll();
  }
}
?>
