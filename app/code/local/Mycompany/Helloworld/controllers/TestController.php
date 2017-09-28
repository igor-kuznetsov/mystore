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

    public function blocksAction()
    {
        $this->loadLayout();
        // shows a list of all blocks on the page
        echo '<pre>';
        print_r(array_keys($this->getLayout()->getAllBlocks()));
        die;
    }

    public function helpersAction()
    {
        Mage::helper('mycompanyhelloworld/data')->myTestHelperMethod('test helper method');
        Mage::helper('mycompanyhelloworld')->anotherTestHelperMethod('test helper method');
        echo Mage::helper('mycompanyhelloworld')->removeTags('<h2>Some header</h2>');

        echo '<hr>';
        echo Mage::helper('mycompanyhelloworld')->__('some string to be translated');

        echo '<hr>';
        echo Mage::helper('core')->formatCurrency(10.5);
        echo '<br>';
        $encoded_url = Mage::helper('core')->urlEncode('http://somesite.com/catelog/test?page=10&per_page=5');
        echo $encoded_url . '<br>';
        echo Mage::helper('core')->urlDecode($encoded_url);
        echo '<br>';
        echo Mage::helper('core')->formatdate('12-12-2016 20:10:05');

        //Mage::helper('tax')
        //Mage::helper('catalog/image')
    }
}