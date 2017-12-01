<?php

class Mycompany_Overworld_Model_Observer extends Mage_Catalog_Model_Observer
{
    public function addCatalogToTopmenuItems(Varien_Event_Observer $observer)
    {
        parent::addCatalogToTopmenuItems($observer);
    }
}