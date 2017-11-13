<?php

class Mycompany_Complexworld_Model_Resource_Company extends Mage_Eav_Model_Entity_Abstract
{
    protected function _construct()
    {
        $this->setType('complexworld_company'); // eav_entity_type

        $resource = Mage::getSingleton('core/resource');

        $this->setConnection(
            $resource->getConnection('core_read'),
            $resource->getConnection('core_write')
        );
    }
}