<?php

class Mycompany_Helloworld_Block_Categories extends Mage_Core_Block_Template
{
    public function getCategories()
    {
        $collection = Mage::getModel('catalog/category')->getCollection();
        $categories = [];

        foreach ($collection as $entity) {
            $categories[] = $entity->getEntityId();
        }

        return $categories;
    }
}