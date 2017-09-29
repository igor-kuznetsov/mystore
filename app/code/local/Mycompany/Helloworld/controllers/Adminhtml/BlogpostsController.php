<?php

class Mycompany_Helloworld_Adminhtml_BlogpostsController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('My Company'));
        $this->_title($this->__('Blog Posts'));

        $this->loadLayout();
        $this->_setActiveMenu('mycompanymenu/blogpostsmenu');
        $this->_addContent($this->getLayout()->createBlock('mycompanyhelloworld/adminhtml_blogposts'));
        $this->renderLayout();
    }

    // ajax action
    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('mycompanyhelloworld/adminhtml_blogposts_grid')->toHtml()
        );
    }
}