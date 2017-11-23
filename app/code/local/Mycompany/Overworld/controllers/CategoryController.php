<?php

require_once 'Mage/Catalog/controllers/CategoryController.php';

class Mycompany_Overworld_CategoryController extends Mage_Catalog_CategoryController
{
    public function viewAction()
    {
        //die('we can add our custom code here');
        parent::viewAction();
    }
}