<?php

class Mycompany_Complexworld_Model_Resource_Company_Collection extends Mage_Eav_Model_Entity_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('complexworld/company');
    }
}