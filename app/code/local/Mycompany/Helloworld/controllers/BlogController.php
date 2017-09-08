<?php

/**
 * Class Mycompany_Helloworld_BlogController
 */
class Mycompany_Helloworld_BlogController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $blogpost = Mage::getModel('mycompanyhelloworld/blogpost');

        var_dump(get_class($blogpost));
    }

    public function dataAction()
    {
        $blogpost = Mage::getModel('mycompanyhelloworld/blogpost');

        $id = (int) $this->getRequest()->getParam('id');
        $blogpost->load($id);

        echo $blogpost->getData()['title'] . '<br>';
        echo $blogpost->getData('title') . '<br>';
        $blogpost->setData('title', 'New Title Set');
        echo $blogpost->getData('title') . '<br>';
        echo $blogpost->getOrigData('title') . '<br>';

        $title = $blogpost->getTitle();
        echo $title . '<br>';
        $blogpost->setTitle($title . '-' . time());
        echo $blogpost->getTitle() . '<br>';

        var_dump($blogpost->hasTitle());
        echo '<br>';
        $blogpost->unsTitle(); // unset
        var_dump($blogpost->hasTitle());

    }

    public function readAction()
    {
        $blogpost = Mage::getModel('mycompanyhelloworld/blogpost');

        $id = (int) $this->getRequest()->getParam('id');
        $blogpost->load($id);
        $data = $blogpost->getData();

        echo '<pre>';
        print_r($data);
    }

    public function createAction()
    {
        $blogpost = Mage::getModel('mycompanyhelloworld/blogpost');
        $blogpost->setTitle('Auto Post '.time());
        $blogpost->setPost('This post was created automatically');
        $blogpost->save();

        echo "new post created";
    }

    public function updateAction()
    {
        $blogpost = Mage::getModel('mycompanyhelloworld/blogpost');

        $id = (int) $this->getRequest()->getParam('id');
        $blogpost->load($id);
        $blogpost->setTitle("The First post!");
        $blogpost->save();

        echo "post #$id edited";
    }

    public function deleteAction()
    {
        $blogpost = Mage::getModel('mycompanyhelloworld/blogpost');

        $id = (int) $this->getRequest()->getParam('id');
        $blogpost->load($id);
        $blogpost->delete();

        echo "post #$id deleted";
    }

    public function listAction()
    {
        $posts = Mage::getModel('mycompanyhelloworld/blogpost')->getCollection();

        foreach ($posts as $blogpost) {
            echo '<h3>'.$blogpost->getTitle().'</h3>';
            echo '<p>'.$blogpost->getPost().'</p>';
        }
    }
}