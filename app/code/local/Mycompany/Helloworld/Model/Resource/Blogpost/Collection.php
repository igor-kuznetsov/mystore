<?php

/**
 * Class Mycompany_Helloworld_Model_Resource_Blogpost_Collection
 */
class Mycompany_Helloworld_Model_Resource_Blogpost_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('mycompanyhelloworld/blogpost');
    }
}