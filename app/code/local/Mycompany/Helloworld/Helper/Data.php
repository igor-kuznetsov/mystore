<?php

class Mycompany_Helloworld_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function myTestHelperMethod($data)
    {
        echo $data;
    }

    public function anotherTestHelperMethod($data)
    {
        echo '<h1>' . $data . '</h1>';
    }

    public function getMyValue()
    {
        return Mage::getStoreConfig('dsfds.fdsfds.f.dsfsdf.dsfdf.sdf'); // not working!
    }
}