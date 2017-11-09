<?php

class Mycompany_Complexworld_Model_Resource_Company extends Mage_Eav_Model_Entity_Abstract
{
    protected function _construct()
    {
        $resource = Mage::getSingleton('core/resource');

        $this->setType('complexworld_company'); // eav_entity_type

        $this->setConnection(
            $resource->getConnection('complexworld_read'),
            $resource->getConnection('complexworld_write')
        );
    }
}