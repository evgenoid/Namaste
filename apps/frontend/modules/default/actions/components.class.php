<?php

class defaultComponents extends sfComponents
{
     public function executeLanguage(sfWebRequest $request)
  {
      $this->culture = $this->getUser()->getCulture();
      $this->route_name = '@'.$this->getContext()->getRouting()->getCurrentRouteName();
      $this->getContext()->getRouting();



  }
}
?>
