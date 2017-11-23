<?php

class Mycompany_Overworld_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $model = Mage::getModel('catalog/category');
        echo get_class($model) . "<br>";

        $block = Mage::getBlockSingleton('catalog/breadcrumbs');
        echo get_class($block) . "<br>";

        $helper = Mage::helper('catalog/category');
        echo get_class($helper) . "<br>";
    }
}