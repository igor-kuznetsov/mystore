<?php

/**
 * Class Mycompany_Helloworld_IndexController
 */
class Mycompany_Helloworld_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        //echo 'Hello World';
        $this->loadLayout();
        $this->renderLayout();
    }

    public function paramsAction()
    {
        foreach ($this->getRequest()->getParams() as $key => $value) {
            echo 'Param: ' . $key. '<br>';
            echo 'Value: ' . $value . '<br>';
        }
    }
}