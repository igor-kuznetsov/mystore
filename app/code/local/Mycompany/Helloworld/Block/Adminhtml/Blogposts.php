<?php

class Mycompany_Helloworld_Block_Adminhtml_Blogposts extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'mycompanyhelloworld'; // left-side part of block type
        $this->_controller = 'adminhtml_blogposts'; // right-side part of block type
        // ->createBlock($this->_blockGroup.'/'.$this->_controller);
        $this->_headerText = Mage::helper('mycompanyhelloworld')->__('Blog Posts'); // $this->__();

        parent::__construct(); // should be called after settings

        $this->_removeButton('add');
    }
}