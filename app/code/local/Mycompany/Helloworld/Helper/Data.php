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
}