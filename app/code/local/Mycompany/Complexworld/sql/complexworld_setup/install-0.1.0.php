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
    'type' => 'varchar', //the EAV attribute type (table `companies_varchar`)
    'label' => 'Name',
    'input' => 'text',
    'class' => '',
    'backend' => '',
    'frontend' => '',
    'source' => '',
    'required' => true,
    'user_defined' => true,
    'default' => '',
    'unique' => false,
]);
$this->addAttribute('complexworld_company', 'description', [
    'type' => 'text',
    'label' => 'Description',
    'input' => 'textarea',
]);

$installer->endSetup();