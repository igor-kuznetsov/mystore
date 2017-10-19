<?php

class Mycompany_Helloworld_Block_Adminhtml_Blogposts_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct(); // should be called first

        $this->_objectId = 'id'; // optional
        $this->_mode = 'edit'; // optional

        $this->_blockGroup = 'mycompanyhelloworld';
        $this->_controller = 'adminhtml_blogposts';
        // ->createBlock($this->_blockGroup.'/'.$this->_controller.'_'.$this->_mode.'_form');

        $this->_updateButton('save', 'label', Mage::helper('mycompanyhelloworld')->__('Save Blog Post')); // optional
        $this->_updateButton('delete', 'label', Mage::helper('mycompanyhelloworld')->__('Delete Blog Post')); // optional
    }

    public function getHeaderText()
    {
        $model = Mage::registry('blogposts_data');

        if ($model && $model->getId()) {
            $title = $this->escapeHtml($model->getTitle());

            return Mage::helper('mycompanyhelloworld')->__("Edit Blog Post '%s'", $title);
        } else {
            return Mage::helper('mycompanyhelloworld')->__('Add Blog Post');
        }
    }
}