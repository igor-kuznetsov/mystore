<?php

class Mycompany_Helloworld_Block_Adminhtml_Blogposts_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

    public function __construct()
    {
        parent::__construct();

        $this->setId('edit_tabs');
        $this->setDestElementId('edit_form'); // should be the same as the form id in the Mycompany_Helloworld_Block_Adminhtml_Blogposts_Edit_Form
        $this->setTitle(Mage::helper('mycompanyhelloworld')->__('Blog Post Information'));
    }

    protected function _beforeToHtml()
    {
        $block = $this->getLayout()->createBlock('mycompanyhelloworld/adminhtml_blogposts_edit_tab_form')->toHtml();
        $this->addTab('form_section', [
            'label' => Mage::helper('mycompanyhelloworld')->__('General'),
            'title' => Mage::helper('mycompanyhelloworld')->__('General'),
            'content' => $block
        ]);

        return parent::_beforeToHtml();
    }
}