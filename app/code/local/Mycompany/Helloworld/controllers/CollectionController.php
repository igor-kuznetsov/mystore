<?php

class Mycompany_Helloworld_CollectionController extends Mage_Core_Controller_Front_Action
{
    public function selectAction()
    {
        $products = Mage::getModel('catalog/product')->getCollection();

//        $products->addAttributeToSelect('*'); // for EAV models only
//        $products->addAttributeToSelect('name'); // for EAV models only
//        $products->addAttributeToSelect('name')->addAttributeToSelect('price'); // for EAV models only

//        var_dump($products->getSelect());
        echo (string) $products->getSelect();
    }

    public function lazyAction()
    {
        $products = Mage::getModel('catalog/product')->getCollection(); // just a PHP object, zero DB query has been made
        $products->addAttributeToSelect('name'); // still just an object
        $products->addAttributeToSelect('sku'); // still just an object

//        echo $products->count(); // an actual DB query has been made because we need to return real data
//        echo count($products);

//        echo $products->getFirstItem()->getName();
//        echo $products->getLastItem()->getName();

//        foreach ($products as $product) {
//            // DB query made before collection iterates over its individual objects
//            echo $product->getName() . "<br>";
//        }
    }

    public function whereAction()
    {
        $products = Mage::getModel('catalog/product')->getCollection();
        $products->addAttributeToSelect('price');
        $products->addAttributeToSelect('sku');

        $products->addFieldToFilter('sku', 'PRDCT-2'); // WHERE `sku` = 'PRDCT-2'

//        $products->addFieldToFilter('sku', ['eq' => 'PRDCT-2']); // WHERE `sku` = 'PRDCT-2'
//        $products->addFieldToFilter('sku', ['neq' => 'PRDCT-2']); // WHERE `sku` != 'PRDCT-2'
//        $products->addFieldToFilter('sku', ['like' => 'PRDCT-2']); // WHERE `sku` LIKE 'PRDCT-2'
//        $products->addFieldToFilter('sku', ['nlike' => 'PRDCT-2']); // WHERE `sku` NOT LIKE 'PRDCT-2'
//        $products->addFieldToFilter('sku', ['in' => ['PRDCT-1', 'PRDCT-2']]); // WHERE `sku` IN ('PRDCT-1', 'PRDCT-2')
//        $products->addFieldToFilter('sku', ['nin' => ['PRDCT-3', 'PRDCT-4']]); // WHERE `sku` NOT IN ('PRDCT-1', 'PRDCT-2')
//        $products->addFieldToFilter('sku', ['null' => true]); // WHERE `sku` IS NULL
//        $products->addFieldToFilter('sku', ['notnull' => true]); // WHERE `sku` IS NOT NULL
//        $products->addFieldToFilter('price', ['gt' => 50]); // WHERE `price` > 50
//        $products->addFieldToFilter('price', ['lt' => 100]); // WHERE `price` < 100
//        $products->addFieldToFilter('price', ['gteq' => 60]); // WHERE `price` >= 60
//        $products->addFieldToFilter('price', ['lteq' => 90]); // WHERE `price` <= 90
//        $products->addFieldToFilter('price', ['from' => 30, 'to' => 40]); // WHERE `price` >= 30 AND `price` <= 40
//
        echo (string) $products->getSelect();
    }

    public function booleanAction()
    {
        $items = Mage::getModel('mycompanyhelloworld/blogpost')->getCollection();

        // AND
//        $items->addFieldToFilter('title', ['neq' => 'Test Post 1']);
//        $items->addFieldToFilter('date', ['gt' => '2017-09-15']);

        // OR
        $skuFilter = ['neq' => 'Test Post 1'];
        $priceFilter = ['gt' => '2017-09-15'];
        $items->addFieldToFilter(['title', 'date'], [$skuFilter, $priceFilter]);

        echo (string) $items->getSelect();
    }

    public function sortFlatAction()
    {
        $posts = Mage::getModel('mycompanyhelloworld/blogpost')->getCollection();

        $posts->getSelect()->order('title DESC');
        //$posts->setOrder('title', 'DESC'); // method of Varien_Data_Collection

        echo $posts->getSelect();
        echo "<hr>";

        foreach ($posts as $post) {
            echo $post->getTitle() . "<br>";
        }
    }

    public function sortEavAction()
    {
        $products = Mage::getModel('catalog/product')->getCollection();
        $products->addAttributeToSelect('name');
        $products->addAttributeToSort('name', 'ASC'); // for EAV only
        //$products->setOrder('name', 'ASC');

        echo $products->getSelect();
        echo "<hr>";

        foreach ($products as $product) {
            echo $product->getName() . "<br>";
        }
    }

    public function paginateFlatAction()
    {
        $posts = Mage::getModel('mycompanyhelloworld/blogpost')->getCollection();
        $pageNum = 2;
        $pageSize = 2;
        $posts->getSelect()->limit($pageSize, $pageSize * ($pageNum - 1)); // limit, offset
        //$posts->setPageSize($pageSize)->setCurPage($pageNum); // methods of Varien_Data_Collection

        echo $posts->getSelect();
        echo "<hr>";

        foreach ($posts as $post) {
            echo $post->getTitle() . "<br>";
        }
    }

    public function paginateEavAction()
    {
        $products = Mage::getModel('catalog/product')->getCollection();
        $products->addAttributeToSelect('name');
        $pageNum = 2;
        $pageSize = 2;
        $products->getSelect()->limit($pageSize, $pageSize * ($pageNum - 1));
        //$products->setPageSize($pageSize)->setCurPage($pageNum);
        //$products->setPage($pageNum, $pageSize); // for EAV only, alias for ->setCurPage()->setPageSize()

        echo $products->getSelect();
        echo "<hr>";

        foreach ($products as $product) {
            echo $product->getName() . "<br>";
        }
    }

    public function loadAction()
    {
        $posts = Mage::getModel('mycompanyhelloworld/blogpost')->getCollection();
        $posts->addFieldToFilter('title', ['like' => '%test%']);
        echo $posts->getSelect();
        $posts->load(); // load posts from DB

        //var_dump($posts->isLoaded()); // true
        echo '<hr>';

        $posts->clear(); // clear loaded data from collection
        echo $posts->getSelect();
        //var_dump($posts->isLoaded()); // false
    }
}