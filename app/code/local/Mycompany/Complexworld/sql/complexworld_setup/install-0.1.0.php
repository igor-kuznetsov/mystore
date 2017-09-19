<?php

$installer = $this;

$installer->startSetup();

$installer->addEntityType('complexworld_company', [
    'entity_model' => 'complexworld/company',
    'table' => 'complexworld/company'
]);
$installer->createEntityTables(
    $installer->getTable('complexworld/company')
);

$installer->addAttribute('complexworld_company', 'name', [
    'type' => 'varchar', // the EAV attribute type (e.g. table `companies_varchar`)
    'label' => 'Name', // input label in the admin panel
    'input' => 'text', // input type in the admin panel
    'frontend_class' => '', //
    'backend' => '', // backend model
    'frontend' => '', // frontend model
    'source' => '', // source model
    'default' => '', // default value
    'required' => true,
    'user_defined' => false, // whether users can remove an attribute from attribute sets
    'unique' => false,
    'global' => true // attribute scope
]);
$this->addAttribute('complexworld_company', 'description', [
    'type' => 'text',
    'label' => 'Description',
    'input' => 'textarea',
]);

$installer->endSetup();