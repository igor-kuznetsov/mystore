<?php

class Mycompany_Helloworld_Adminhtml_HelloworldController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('My Company'));
        $this->_title($this->__('Hello World'));

        $this->loadLayout();
        $this->_setActiveMenu('mycompanymenu');
        $this->renderLayout();
    }
}