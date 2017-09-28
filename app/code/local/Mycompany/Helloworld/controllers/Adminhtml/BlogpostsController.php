<?php

class Mycompany_Helloworld_Adminhtml_BlogpostsController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Helloworld'));
        $this->_title($this->__('Blog Posts'));

        $this->loadLayout();
        $this->_setActiveMenu('mycompanymenu/blogpostsmenu');
        $this->_addContent($this->getLayout()->createBlock('mycompanyhelloworld/adminhtml_blogposts'));
        $this->renderLayout();
    }
}