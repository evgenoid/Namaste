<?php

class teamComponents extends sfComponents
{
     public function executeMenu(sfWebRequest $request)
  {
      $this->items = TeamTable::getInstance()->findAll();
  }
}
?>
