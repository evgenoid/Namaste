<?php

class practiceComponents extends sfComponents
{
     public function executeMenu(sfWebRequest $request)
  {
      $this->items = PracticeTable::getInstance()->findAll();
  }
}
?>
