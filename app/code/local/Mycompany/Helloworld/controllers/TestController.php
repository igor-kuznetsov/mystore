<?php

/**
 * Class Mycompany_Helloworld_TestController
 */
class Mycompany_Helloworld_TestController extends Mage_Core_Controller_Front_Action
{
    public function categoriesAction()
    {
        // old output
//        $categories = Mage::getModel('catalog/category')->getCollection();
//        echo '<pre>';
//        print_r($categories);

        // new output
        $this->loadLayout();
        // create and append block programmatically
        $block = $this->getLayout()
            ->createBlock('mycompanyhelloworld/categories')
            ->setTemplate('mycompany/helloworld/categories.phtml');
        $this->getLayout()->getBlock('content')->append($block);
        // show list of all blocks on the page
//            echo '<pre>';
//            print_r(array_keys($this->getLayout()->getAllBlocks()));
//            die;
        $this->renderLayout();
    }

    public function categoryAction()
    {
        $id = (int) $this->getRequest()->getParam('id');

        if (empty($id)) {
            echo 'error: ID is invalid';
        } else {
            // old output
//            $category = Mage::getModel('catalog/category')->load($id);
//            echo '<pre>';
//            print_r($category);

            // new output
            $this->loadLayout();
            $this->getLayout()->getBlock('mycompany.helloworld.category')->assign('id', $id); // direct passing data
            Mage::register('helloworld_category_id', $id); // indirect passing data (preferable)
            $this->renderLayout();
        }
    }
}