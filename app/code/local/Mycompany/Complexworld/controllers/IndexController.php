<?php

/**
 * Class Mycompany_Complexworld_IndexController
 */
class Mycompany_Complexworld_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $company = Mage::getModel('complexworld/company');
        var_dump($company);
    }

    public function populateAction()
    {
        for ($i = 1; $i <= 3; $i++) {
            $company = Mage::getModel('complexworld/eavblogpost');
            $company->setName('Test company ' . $i);
            $company->setDescription('Test company description ' . $i);
            $company->save();
        }

        echo 'Done';
    }

    public function listAction()
    {
        $company = Mage::getModel('complexworld/company');

        $entries = $company->getCollection()
            ->addAttributeToSelect('name')
            ->addAttributeToSelect('description');
        $entries->load();

        foreach($entries as $entry) {
            echo '<h2>' . $entry->getName() . '</h2>';
            echo '<p>' . $entry->getDescription() . '</p>';
        }
    }
}