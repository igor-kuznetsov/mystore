<?php

class Mycompany_Helloworld_Block_Adminhtml_Blogposts extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'mycompanyhelloworld';
        $this->_controller = 'adminhtml_blogposts';
        $this->_headerText = Mage::helper('mycompanyhelloworld')->__('Blog Posts');

        parent::__construct(); // should be called after settings

        $this->_removeButton('add');
    }
}