<?php

class Mycompany_Helloworld_Adminhtml_BlogpostsController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('My Company'));
        $this->_title($this->__('Blog Posts'));

        $this->loadLayout();
        $this->_setActiveMenu('mycompanymenu');

        $this->_addContent($this->getLayout()->createBlock('mycompanyhelloworld/adminhtml_blogposts'));

        $this->renderLayout();
    }

    // ajax action
    public function gridAction()
    {
        $this->loadLayout();
        $renderedGridBlock = $this->getLayout()->createBlock('mycompanyhelloworld/adminhtml_blogposts_grid')->toHtml();
        $this->getResponse()->setBody($renderedGridBlock);

        // we do not render layout!
    }

    public function editAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
        $model = Mage::getModel('mycompanyhelloworld/blogpost')->load($id);

        if ($model->getId() || $id == 0) {
            Mage::register('blogposts_data', $model);

            $this->loadLayout();
            $this->_setActiveMenu('mycompanymenu');
            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true); // load ExtJs library

            $this->_addContent($this->getLayout()->createBlock('mycompanyhelloworld/adminhtml_blogposts_edit'));
            $this->_addLeft($this->getLayout()->createBlock('mycompanyhelloworld/adminhtml_blogposts_edit_tabs'));

            $this->renderLayout();
        } else {
            $error = Mage::helper('mycompanyhelloworld')->__('Blog Post does not exist');
            Mage::getSingleton('adminhtml/session')->addError($error);
            $this->_redirect('*/*/index');
        }
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function saveAction()
    {
        $post = $this->getRequest()->getPost();
        $id = (int) $this->getRequest()->getParam('id');

        if ($post) {
            try {
                $post = $this->_filterDates($post, ['date']);

                $model = Mage::getModel('mycompanyhelloworld/blogpost');
                if ($id) {
                    $model->load($id);
                }

                $model->setTitle($post['title']);
                $model->setPost($post['post']);
                $model->setDate($post['date']);
                $model->save();

                $success = Mage::helper('adminhtml')->__('Blog Post was successfully saved');
                Mage::getSingleton('adminhtml/session')->addSuccess($success);
                Mage::getSingleton('adminhtml/session')->setBlogpostsData(false);
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setBlogpostsData($post);
                $this->_redirect('*/*/edit', ['id' => $id]);
                return;
            }
        }

        $this->_redirect('*/*/');
    }

    public function deleteAction()
    {
        $id = (int) $this->getRequest()->getParam('id');

        if ($id > 0) {
            try {
                $model = Mage::getModel('mycompanyhelloworld/blogpost');
                $model->setId($id)->delete();

                $success = Mage::helper('adminhtml')->__('Blog Post was successfully deleted');
                Mage::getSingleton('adminhtml/session')->addSuccess($success);
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', ['id' => $id]);
                return;
            }
        }

        $this->_redirect('*/*/');
    }
}