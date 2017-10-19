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
            'class' => 'required-entry',
            'required' => true,
            'name' => 'title',
        ]);

        $fieldset->addField('post', 'editor', [
            'name' => 'post',
            'label' => Mage::helper('mycompanyhelloworld')->__('Post'),
            'title' => Mage::helper('mycompanyhelloworld')->__('Post'),
            'style' => 'height:100px;',
            'wysiwyg' => false,
            'required' => false
        ]);

        $dateFormatIso = Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
        $fieldset->addField('date', 'date', [
            'name' => 'date',
            'label' => Mage::helper('mycompanyhelloworld')->__('Date'),
            'image' => $this->getSkinUrl('images/grid-cal.gif'),
            'format' => $dateFormatIso,
            'disabled' => false,
            'time' => false,
            'class' => 'validate-date validate-date-range date-range-custom_theme-from'
        ]);

        if (Mage::getSingleton('adminhtml/session')->getBlogpostsData()) {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getBlogpostsData());
            Mage::getSingleton('adminhtml/session')->setBlogpostsData(null);
        } elseif (Mage::registry('blogposts_data')) {
            $form->setValues(Mage::registry('blogposts_data')->getData());
        }

        return parent::_prepareForm();
    }
}