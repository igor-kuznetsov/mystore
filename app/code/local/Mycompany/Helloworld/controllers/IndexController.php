<?php

/**
 * Class Mycompany_Helloworld_IndexController
 */
class Mycompany_Helloworld_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        echo 'Hello World';
    }

    public function paramsAction()
    {
        foreach ($this->getRequest()->getParams() as $key => $value) {
            echo 'Param: ' . $key. '<br>';
            echo 'Value: ' . $value . '<br>';
        }
    }

    public function modelAction()
    {
        $blogpost = Mage::getModel('mycompanyhelloworld/blogpost');

        var_dump(get_class($blogpost));

//        $id = (int) $this->getRequest()->getParam('id');
//        $blogpost->load($id);
//        $data = $blogpost->getData();
//
//        echo '<pre>';
//        print_r($data);
    }

    public function createNewPostAction()
    {
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->setTitle('Code Post!');
        $blogpost->setPost('This post was created from code!');
        $blogpost->save();
        echo 'post with ID ' . $blogpost->getId() . ' created';
    }
}