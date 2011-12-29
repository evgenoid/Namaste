<?php

class showcaseComponents extends sfComponents
{
     public function executeMenu(sfWebRequest $request)
  {
      $this->items = CategoryShowcaseTable::getInstance()->findAll();
  }
}
?>
