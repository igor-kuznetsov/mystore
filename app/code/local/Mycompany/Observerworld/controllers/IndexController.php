<?php

class Mycompany_Observerworld_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        Mage::dispatchEvent('observerworld_my_event', ['id' => 15]);
    }
}