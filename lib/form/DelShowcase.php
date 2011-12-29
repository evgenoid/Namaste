<?php
class DelShowcase extends sfWidgetForm
{
    protected function configure($options = array(), $attributes = array())
    {
        $this->addOption('object', array());
    }
    public function render($name, $value = null, $attributes = array(), $errors = array())
    {
        $object = $this->getOption('object');
        $this->helper = new showcasephotoGeneratorHelper();
        return '<ul class="sf_admin_td_actions">'.
                $this->helper->linkToDelete($object, array('params' =>  '',  'confirm' => __('Удалить?'),  'class_suffix' => 'delete',  'label' => 'Delete',)).
                '</ul>';
    }
}