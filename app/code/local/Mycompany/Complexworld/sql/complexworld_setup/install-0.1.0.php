<?php

$installer = $this;

$installer->startSetup();

// eav_attribute_group, eav_attribute_set, eav_entity_type
$installer->addEntityType('complexworld_company', [
    'entity_model' => 'complexworld/company',
    'table' => 'complexworld/company'
]);

/*
companies
companies_char
companies_datetime
companies_decimal
companies_int
companies_text
companies_varchar
*/
$installer->createEntityTables(
    $installer->getTable('complexworld/company') // 'companies'
);


// eav_attribute, eav_entity_attribute
$installer->addAttribute('complexworld_company', 'name', [
    'type' => 'varchar', // the EAV attribute type (e.g. table `companies_varchar`)
    'label' => 'Name', // input label in the admin panel
    'input' => 'text', // html input type in the admin panel
    'default' => '', // default value
    'required' => true,
    'user_defined' => false, // whether users can remove an attribute from attribute sets
    'unique' => false,
    'global' => true // attribute scope
]);

// eav_attribute, eav_entity_attribute
$this->addAttribute('complexworld_company', 'description', [
    'type' => 'text',
    'label' => 'Description',
    'input' => 'textarea',
]);

$installer->endSetup();