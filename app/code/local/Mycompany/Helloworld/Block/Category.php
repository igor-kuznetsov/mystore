<?php

class Mycompany_Helloworld_Block_Category extends Mage_Core_Block_Template
{
    public function getCurrentCategory()
    {
        $id = Mage::registry('helloworld_category_id'); // indirect getting data

        return Mage::getModel('catalog/category')->load($id);
    }
}