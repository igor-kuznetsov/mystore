<?php

class Mycompany_Helloworld_Adminhtml_HelloworldController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Helloworld'));
        $this->_title($this->__('Index'));

        $this->loadLayout();
        $this->_setActiveMenu('mycompanymenu/helloworldmenu');
        $this->renderLayout();
    }
}