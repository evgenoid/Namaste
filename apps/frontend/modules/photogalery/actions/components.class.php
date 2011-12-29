<?php

class photogaleryComponents extends sfComponents
{
     public function executeMenu(sfWebRequest $request)
  {
      $this->items = CategoryPhotoTable::getInstance()->findAll();
  }
}
?>
