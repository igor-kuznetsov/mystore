<?php

class Mycompany_Helloworld_Block_Adminhtml_Blogposts_Edit_Tab_General extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);

        $fieldset = $form->addFieldset('blogposts_tab_general', [
            'legend' => Mage::helper('mycompanyhelloworld')->__('General')
        ]);

        $fieldset->addField('title', 'text', [
            'label' => Mage::helper('mycompanyhelloworld')->__('Title'),
            'class' => 'required-entry', // html attribute
            'required' => true,
            'name' => 'title', // html attribute
        ]);

        $fieldset->addField('post', 'editor', [
            'name' => 'post', // html attribute
            'label' => Mage::helper('mycompanyhelloworld')->__('Post'),
            'title' => Mage::helper('mycompanyhelloworld')->__('Post'), // html attribute
            'style' => 'height:100px;', // html attribute
            'wysiwyg' => false,
            'required' => false
        ]);

        $dateFormatIso = Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
        $fieldset->addField('date', 'date', [
            'name' => 'date', // html attribute
            'label' => Mage::helper('mycompanyhelloworld')->__('Date'),
            'image' => $this->getSkinUrl('images/grid-cal.gif'),
            'format' => $dateFormatIso,
            'disabled' => false,
            'required' => false,
            'time' => false,
            'class' => 'validate-date' // html attribute
        ]);

        if (Mage::getSingleton('adminhtml/session')->getBlogpostsData()) {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getBlogpostsData());
            Mage::getSingleton('adminhtml/session')->setBlogpostsData(false);
        } elseif (Mage::registry('blogposts_data')) {
            $form->setValues(Mage::registry('blogposts_data')->getData());
        }

        return parent::_prepareForm();
    }
}