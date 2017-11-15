<?php

class Mycompany_Helloworld_QueryController extends Mage_Core_Controller_Front_Action
{
    public function rawAction()
    {
        echo '<pre>';
        Mage::helper('mycompanyhelloworld/query')->makeRawRead();
        Mage::helper('mycompanyhelloworld/query')->makeRawWrite();
    }

    public function directAction()
    {
        echo '<pre>';
        Mage::helper('mycompanyhelloworld/query')->makeDirectRead();
        //Mage::helper('mycompanyhelloworld/query')->makeDirectWrite();
    }
}