<?php

/**
 * Class Mycompany_Helloworld_Model_Resource_Blogpost
 */
class Mycompany_Helloworld_Model_Resource_Blogpost extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('mycompanyhelloworld/blogpost', 'blogpost_id');
    }
}