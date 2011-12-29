<?php
class pageComponents extends sfComponents
{
    public function executeContacts(sfWebRequest $request){
        $this->contacts = Doctrine_Core::getTable('Page')->findOneBy('name', 'contacts');
    }
}