<?php

class Mycompany_Helloworld_Block_Adminhtml_Blogposts_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

    public function __construct()
    {
        parent::__construct(); // should be called first

        $this->setId('edit_tabs'); // html id (anything)
        $this->setDestElementId('edit_form'); // should be the same as the form id in the Mycompany_Helloworld_Block_Adminhtml_Blogposts_Edit_Form
        $this->setTitle(Mage::helper('mycompanyhelloworld')->__('Blog Post Information'));
    }

    protected function _beforeToHtml()
    {
        $tabBlock = $this->getLayout()->createBlock('mycompanyhelloworld/adminhtml_blogposts_edit_tab_general')->toHtml();

        $this->addTab('general_tab', [
            'label' => Mage::helper('mycompanyhelloworld')->__('General'), // text title
            'title' => Mage::helper('mycompanyhelloworld')->__('General'), // html attribute title
            'content' => $tabBlock // rendered html
        ]);

        return parent::_beforeToHtml();
    }
}