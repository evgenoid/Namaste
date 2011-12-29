<?php
class nmWidgetImage extends sfWidgetForm
{
   public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    return $this->renderTag('img', array_merge(array('type' => $this->getOption('type'), 'name' => $name, 'value' => $value), $attributes));

  }
}
?>
